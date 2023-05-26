@extends('auth.app')

@section('title' , 'Reset your password')
@section('where')
    <a href='/login' >
        <span class="text-sm font-medium text-blue-500">Back to login</span>
    </a>
    
   
    
@endsection
@section('content')
<div class="my-2 flex flex-col">
    <label for="username" class="mb-2">
        <span class="font-medium py-1">New password</span>
    </label>
    <div id="send-backup" class="text-red-500"></div>
    <input type="password" id="new-password" class="border focus:outline-none w-full h-10 pl-3" placeholder="New password " autocomplete="off" required>
    <label for="username" class="mb-2">
        <span class="font-medium py-1">Confirm new password</span>
    </label>
    <div id="send-backup" class="text-red-500"></div>
    <input type="password" id="re-password" class="border focus:outline-none w-full h-10 pl-3" placeholder="Password again " autocomplete="off" required>
    <div class="w-full my-3">
        <button id="auth-btn" onclick="send_new_password_loading() ;new_password() ;" class="w-full bg-blue-500 h-10 shadow-md hover:opacity-80 transition">
            <span class="text-white">
                Save
            </span>
        </button>
    </div>
</div>





@endsection