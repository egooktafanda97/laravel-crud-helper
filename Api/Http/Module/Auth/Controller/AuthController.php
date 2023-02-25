<?php

namespace Api\Http\Module\Auth\Controller;

use Api\App\Controller as AppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Hash, Validator, Crypt};
use Carbon\Carbon;

class AuthController extends AppController
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    // login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $exp = 1440;
        if ($request->remember_me)
            $exp = $this->expires_in_remember();
        if (!$token = auth()->guard("api")->setTTL($exp)->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    // logout
    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully logged out.']);
    }

    // refresh
    public function refresh()
    {
        return $this->respondWithToken(auth("api")->refresh());
    }

    public function expires_in_remember()
    {
        return Carbon::now()->addYears(2)->getTimestamp();
    }

    // token
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
