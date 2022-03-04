<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $now = Carbon::now();

       if($now->gt($request->user()->days) || $request->user()->days == null){
           $user = User::find($request->user()->id);
           if(!$request->user()->roles ){
            $user->removeRole($request->user()->getRoleNames()[0]);
            $user->save();
           }

           return response("Se te acabo tu suscripcion", 404);
       }
       return $next($request);

    }
}
