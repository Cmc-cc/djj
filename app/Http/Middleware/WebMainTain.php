<?php

namespace App\Http\Middleware;

use App\Models\SystemConfig;
use Closure;
use Auth;
use Session;
use Route;
use Illuminate\Support\Facades\App;
class WebMainTain
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
        if(Session::has('lang'))
        {
            $lang = Session::get('lang');            
            App::setLocale($lang);        
        }
        $sys = SystemConfig::findOrFail(1);


        if ($sys->is_maintain == 1)
            return redirect()->to(route('web.maintain'));

        if (Auth::guard('member')->user())
        {
            if(Session::getId() != Auth::guard('member')->user()->last_session){

                if (is_Mobile())
                {
                    Auth::guard('member')->logout();
                    return redirect()->route('wap.index');
                } else {
                    Auth::guard('member')->logout();
                    return redirect()->route('web.index');
                }
            }
        }


        return $next($request);
    }
}
