<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AuthRepositoryInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    protected $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function create()
    {
        return view('auth.register');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        
        if ($this->authRepository->login($credentials)) {

            $request->session()->regenerate();
                return redirect('/profile');
        }

        return back()->withInput($request->only('email'));
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        
        $user = $this->authRepository->register($data);

        $role = $data['role'];

        if ($role === 'organizer') {
            $user->assignRole('organizer');
            
            return redirect('/login');
            
        } elseif ($role === 'spectator') {
            $user->assignRole('spectator');
        }
            return redirect('/login');
    }

    public function logout(Request $request)
    {
        $this->authRepository->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $data = $request->validate(['email' => 'required|email']);

        $this->authRepository->forgotPassword($data);
        return back()->with(['status' => 'Password reset link sent successfully']);
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $this->authRepository->resetPassword($data);
        return redirect()->route('login')->with('status', 'Password reset successfully');
    }
}
