@extends('auth.app')

@section('title' , 'Enter your email')
@section('where')
    <a href='/login' >
        <span class="text-sm font-medium text-blue-500">Back to login</span>
    </a>
    
   
    
@endsection
@section('content')
<div class="my-2 flex flex-col">
    <label for="username" class="mb-2">
        <span class="font-medium py-1">Enter your email</span>
    </label>
    <div id="send-backup" class="text-red-500"></div>
    <input type="text" id="email" class="border focus:outline-none w-full h-10 pl-3" placeholder="Email " autocomplete="off" required>
    <div class="w-full my-3">
        <button id="auth-btn" onclick="send_reset_loading();send_forgot();" class="w-full bg-blue-500 h-10 shadow-md hover:opacity-80 transition">
            <span class="text-white">
                Send
            </span>
        </button>
    </div>
</div>





@endsection