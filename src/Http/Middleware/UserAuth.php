<?php
namespace Woldy\Cms\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Cfg;
use User;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     *
     * @return mixed
     */
    private $socialite;
    private $auth;
    private $users;

    public function handle($request, Closure $next, $guard = null)
    {
 
        if ($request->session()->has('user')) {
            return $next($request);
        }else{

            $login_url=Cfg::get('login_url');
                header("Location:{$login_url}");
            exit;
        }
    }
}
