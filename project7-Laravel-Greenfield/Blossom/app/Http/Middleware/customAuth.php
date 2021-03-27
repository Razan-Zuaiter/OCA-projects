<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class customAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $path = $request->path();
        if (($path == "userLog" || $path == "userReg") && Session::get('user')) {
            return redirect('index');
        } else if (($path != "userLog" && !Session::get('user')) && ($path != "userReg" && !Session::get('user'))) {
            return redirect('/userLog');
        }
        return $next($request);
    }
}
