<?php
namespace Woldy\Cms\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class AdminAuth
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
        return $next($request);
        if ($request->session()->has('admin')) {
            return $next($request);
        }else{
            return response('forbidden', 403);
            //return redirect()->route('/auth/login');/auth/login
        }
    }
}
