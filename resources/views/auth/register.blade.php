@extends('auth.app')

@section('content')
    <div class="my-2 flex flex-col">
        <label for="first_name" class="mb-2">
            <span class="font-medium py-1">First name</span>
        </label>
        <input type="text" id="first_name" class="border focus:outline-none w-full h-10 pl-3" placeholder="First name" autocomplete="off" required>
    </div>
    <div class="my-2 flex flex-col">
        <label for="last_name" class="mb-2">
            <span class="font-medium py-1">Last name</span>
        </label>
        <input type="text" id="last_name" class="border focus:outline-none w-full h-10 pl-3" placeholder="Last name" autocomplete="off" required>
    </div>
    <div class="my-2 flex flex-col">
        <label for="username" class="mb-2">
            <span class="font-medium py-1">Username</span>
        </label>
        <input type="text" id="username" class="border focus:outline-none w-full h-10 pl-3" placeholder="User provider name" autocomplete="off" required>
    </div>
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

@section('title' , 'Register')
@section('where')
    <a href='/login' >
        <span class="text-sm font-medium text-blue-500">Already have an account?</span>
    </a>
    
   
    
@endsection
    
@section('button')

<button id="auth-btn" onclick="register_validation();" class="w-full bg-blue-500 h-10 shadow-md hover:opacity-80 transition">
    <span class="text-white">
        @yield('title')
    </span>
</button>
    
@endsection