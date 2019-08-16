<?php


namespace App\Http\Middleware;


use App\User;
use Closure;
use Exception;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use http\Env\Response;


class JwtMiddleware
{

    public function handle($request, Closure $next, $guard = null){


$token = $request->get('token');

if(!$token){

    return response()->json(['error'=>'Token missing'],401);
}

try{

    $credentials = JWT::decode($token,env('JWT_SECRET'),['HS256']);

} catch (ExpiredException $e){

    return response()->json([
        'error'=>'token expired'
    ],400);
}

catch (Exception $e){
    return response()->json([
        'error'=>'Erro on Decode token',
        'error'=>$e->getMessage()
    ],400);
}


$user = User::find($credentials->sub);
$request->auth=$user;
return $next($request);

    }








}
