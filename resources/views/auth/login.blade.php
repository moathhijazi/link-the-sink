@extends('auth.app')

@section('content')
    <div class="my-2 flex flex-col">
        <label for="email" class="mb-2">
            <span class="font-medium py-1">Email address</span>
        </label>
        <input type="email" id="email" class="border focus:outline-none w-full h-10 pl-3" placeholder="Email" autocomplete="off" required>
    </div>
    <div class="my-2 flex flex-col">
        <label for="password" class="mb-2">
            <span class="font-medium py-1">Password</span>
        </label>
        <input type="password" id="password" class="border focus:outline-none w-full h-10 pl-3" placeholder="Password" autocomplete="off" required>
    </div>
@endsection

@section('title' , 'Login')
@section('where')
    <a href='/register' >
        <span class="text-sm font-medium text-blue-500">Create new account?</span>
    </a>
    <a href='/forgot' >
        <span class="text-sm font-medium hover:underline">forgot password</span>
    </a>
    
@endsection
@section('button')

<button id="auth-btn" onclick="login_validation();" class="w-full bg-blue-500 h-10 shadow-md hover:opacity-80 transition">
    <span class="text-white">
        @yield('title')
    </span>
</button>
    
@endsection
    
