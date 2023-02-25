<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Session;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected $guards = [];
    public function handle($request, Closure $next, ...$guards)
    {
        $this->guards = $guards;
        if (!in_array("api", $this->guards) && !empty(auth()->user())) {
            Session::put('token', auth()->guard("api")->login(auth()->user()));
        }
        return parent::handle($request, $next, ...$guards);
    }
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (in_array("api", $this->guards)) {
                abort(response()->json(['error' => 'You don\'t have access', 'response' => 'Unauthorized', "auth" => false], 403));
            } else {
                return route('login');
            }
        }
    }
}
