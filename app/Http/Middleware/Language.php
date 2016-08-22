<?php

namespace App\Http\Middleware;

use App;
use Config;
use Closure;
use Session;

class Language
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
        if (Session::has('locale') AND array_key_exists(Session::get('locale'), Config::get('languages'))) {
            App::setLocale(Session::get('locale'));
        }

        return $next($request);
    }
}
