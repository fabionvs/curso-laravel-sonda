<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;

class AuthController extends Controller
{
    public function login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token_time = now()->addHours(1);
            Passport::personalAccessTokensExpireIn($token_time);
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;

            $u = User::where('id', $user->id)->first();
            $cliente = Cliente::where('user_id', $u->id)->first();
            return response()->json(compact('token', 'user', 'cliente')); 
        }
    }

}
