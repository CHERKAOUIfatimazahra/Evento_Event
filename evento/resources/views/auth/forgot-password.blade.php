@extends('layout.app')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center login_img_section">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 max-w-md w-full">
        <h1 class="text-center text-2xl font-bold mb-6">Forgot Password</h1>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">
                    Email Address
                </label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Enter your email address" />
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">
                Reset Password
            </button>
        </form>
        @if (session('message'))
            <p class="text-green-500 text-xs italic mt-2">{{ session('message') }}</p>
        @endif
    </div>
</div>
@endsection

<style>
    .login_img_section {
        background: url('images/user-forgot-password.jpg') center center;
        background-size: cover;
    }
</style>
