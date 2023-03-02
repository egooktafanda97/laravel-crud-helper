<?php

namespace Api\Http\Module\Auth\Controller;

use Illuminate\Http\Request;
use Api\App\Controller as AppController;

use Api\Http\Module\Instansi\Scema\init;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends AppController
{
    private $send = "email"; // OR ["wa" => "noTelp"]
    public $scema;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
        $this->scema = init::InitScema();
    }
    public function sendLink(Request $request)
    {
        switch ($this->send) {
            case 'email':
                $validator = \Validator::make($request->all(), [
                    'email' => 'required|email',
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 422);
                }
                $email = $this->scema->getModel()::whereEmail($request->email)->first();
                if (!$email)
                    return response()->json(["error" => "email not found"], 401);
                $token = Str::random(64);
                DB::table('password_resets')->insert([
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
                $this->sendEmail($request->email, $token);
                break;

            default:

                break;
        }
    }
    public function sendEmail($email, $token)
    {
        $details = [
            "email" => $email,
            "token" => $token,
            "link" => url('/reset-password?token=' . $token),
        ];
        dispatch(new \App\Jobs\EmailJob($details));
        return response()->json("e-mail sent", 200);
    }
    public function reset_pwd(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'token' => 'required',
                'password' => 'required|confirmed|min:6',
            ]);
            if ($validator->fails())
                return response()->json($validator->errors(), 422);

            $token = $request->token;
            $email = $request->email;

            $Q = DB::table('password_resets')->where([
                "email" => $email,
                "tokon" => $token
            ])->first();
            if (!$Q)
                return response()->json(["error" => "invalid token!"], 401);

            $user = $this->scema->getModel()::whereEmail($Q->email)->first();
            $user->password = bcrypt($request->password);
            $s = $user->save();

            $Q = \DB::table('password_resets')->where([
                "email" => $email,
                "tokon" => $token
            ])->delete();

            if ($s)
                return response()->json(["response" => "success reset password!"], 200);

            return response()->json(["error" => "invalid token!"], 501);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
}
