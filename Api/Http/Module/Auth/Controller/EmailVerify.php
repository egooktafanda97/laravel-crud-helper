<?php

namespace Api\Http\Module\Auth\Controller;

use Illuminate\Http\Request;
use Api\App\Controller as AppController;

use Api\Http\Module\Instansi\Scema\init;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmailVerify extends AppController
{
    private $send = "email";
    public $scema;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
        $this->scema = init::InitScema();
    }
    public function sendLink(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $email = $this->scema->getModel()::whereEmail($request->email)->first();
        if (!$email)
            return response()->json(["error" => "email not found"], 401);

        do {
            $token = random_int(4);
            $cek = DB::table('email_verify')->where("token", Crypt::encrypt($token))->first();
        } while (!empty($cek));
        $details = [
            "email" => $email,
            "token" => $token,
            "link" => url('/verify-email?token=' . Crypt::encrypt($token)),
        ];
        dispatch(new \App\Jobs\EmailJob($details));
        return response()->json("e-mail sent");
    }

    public function sendEmail($email, $token)
    {
        $details = [
            "email" => $email,
            "token" => $token,
            "link" => url('/reset-password?token=' . $token),
        ];
        dispatch(new \App\Jobs\EmailJob($details));
        return response()->json("e-mail sent");
    }
    public function verify_token(Request $request)
    {
        try {
            if (!$request->query('token'))
                $token = $request->query('token');
            if (!$request->token)
                $token = Crypt::encrypt($request->token);
            $user = $this->scema->getModel()::whereHas('email_verify', function ($q) use ($token) {
                $q->where('token', $token);
            })->first();

            if (!$user)
                return response()->json(["error" => "invalid token!"], 401);
            $us = $this->scema->getModel()::find($user->id);
            $us->email_verified_at =  now();
            $s = $us->save();

            if ($s) {
                DB::table('email_verify')->where("token", $token)->delete();
                return response()->json(["response" => "email verify!"], 200);
            }
            return response()->json(["error" => "invalid token!"], 501);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], 500);
        }
    }
}
