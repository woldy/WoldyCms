<?php
namespace Woldy\Cms\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Setting;
use User;

class WikiAuth
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
            $login_url=Setting::get('login_url');
            return redirect($login_url);
        }
    }
}
