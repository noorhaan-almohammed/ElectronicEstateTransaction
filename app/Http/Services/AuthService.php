<?php
namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService {

    public function register(array $data){
        $data['password'] = bcrypt($data['password']);
        return  User::create($data);
    }
    public function attemptLogin(array $credentials)
    {
        if (!$token = Auth::attempt($credentials)) {
            return false;
        }
        return $token;
    }
    public function logout()
    {
      return Auth::logout();
    }
}
