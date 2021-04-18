<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Closure;

class MiddlewareService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        // STEP 1: you can use the following to get the route URI $request->path() or
        // can also use the request->is();
        $path = $request->path();
        Log::info("Entering MiddleWareService in handle() at path: " . $path);
        // STEP 2: run the business rules that check for the URI's that you do not need to secure
        $secured = true;
        
        // Add in || $request->is('usersrest') || $request->is('usersrest/') when part B is done
        if($request->is('/') || $request->is('login') || $request->is('doLogin') ||
            $request->is('usersrest') || $request->is('register')){
                
                $secured = false;
        }
        Log::info($secured ? "Security Middleware in handle()... needs security" :
            "Security middleware in handle()... no security Required");
        
        // STEP 3: If entering a secure URI with no security token then do a redirect to the
        // root URI or login passed
        Log::info("This is the session in middleware: " . $request->session()->get('security'));
        
        Log::info("This is the session username: " . $request->session()->get('userName'));
             
        if($secured == true && $request->session()->get('userName') == null){
            Log::info("Leaving MySecurityMiddleware in handle(), doing a redirect back to login");
            return redirect('/login');
            
        }

        return $next($request);
    }
    
    public function IsNullOrEmptyString($str){
        return (!isset($str) || trim($str) === '');
    }
}
