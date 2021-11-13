<?php

// namespace App\Http\Middleware;
//
// use Closure;
// use Illuminate\Http\Request;
//
// class JwtAuth
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @return mixed
//      */
//      public function handle($request, Closure $next)
//     {
//         if ($request->has('token')) {
//             try {
//                 $this->auth = JWTAuth::parseToken()->authenticate();
//                 return $next($request);
//             } catch (JWTException $e) {
//                 return redirect()->guest('user/login');
//             }
//         }
//     }
// }
