<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        // Perform action
        //print_r($request->session()->all());
        if (Session::has('userid')) {
        	if($request->route()->uri == "/" || $request->route()->uri == "login"){
        		return redirect("/");
        	}
        }else{
        	if($request->route()->uri == "/" || $request->route()->uri == "login"){
        		//Later
        	}else{
        		return redirect("/");
        	}
        }
        return $next($request);
    }
}