<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class AuthRepository implements AuthRepositoryInterface
{
    public function login(array $credentials)
    {
        return Auth::attempt($credentials);
    }
    public function register(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        
        return User::create($data);
    }
    public function logout()
    {
        Auth::logout();
    }
    public function forgotPassword(array $data)
    {
        return Password::sendResetLink($data);
    }
    public function resetPassword(array $data)
    {
        return Password::reset($data, function ($user, $password) {
            $user->password = bcrypt($password);
            $user->save();
        });
    }
}
