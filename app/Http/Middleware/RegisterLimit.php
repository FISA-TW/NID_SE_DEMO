<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RegisterLimit
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $allowRegister = env('ALLOW_REGISTER', true);
        if (!$allowRegister) {
            return redirect()->route('home')
                ->with('warning', '您只是一般使用者，您不需要註冊。<br />請直接由首頁完成報名申請');
        }

        return $next($request);
    }
}
