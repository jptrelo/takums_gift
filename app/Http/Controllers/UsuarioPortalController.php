<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuarioPortal;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UsuarioPortalController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['login']]);
    }
 
    public function login(Request $request)
    {
        // credenciales para loguear al usuario
        $credenciales = $request->only('email', 'password');

        try {
            // si los datos de login no son correctos
            if (! $token = JWTAuth::attempt($credenciales)) {
                return response()->json(['error' => 'Error, something went wrong. Invalid credentials.'], 401);
            }
        } catch (JWTException $e) {
            // si no se puede crear el token
            return response()->json(['error' => 'Error, something went wrong. Could not create token'], 500);
        }
 
        // todo bien devuelve el token
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        // Si esta todo correcto con el token, se envia el usuario
        return response()->json(compact('user'));
    }
}
