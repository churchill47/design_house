<?php

   namespace App\Http\Middleware;

   use Closure;
   use Illuminate\Http\Request;
   use Illuminate\Support\Facades\Auth;

   class Role
   {
       public function handle(Request $request, Closure $next, $role)
       {
           if (Auth::user()->role !== $role) {
            return redirect()->route('dashboard')->with('error','you do no');

          }
           return $next($request);
       }
   }