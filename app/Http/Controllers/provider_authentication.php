<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class provider_authentication extends Controller
{
    public function google() {
        try{
            return Socialite::driver('google')->redirect();

        }catch(e){
            return redirect()->back();
        }
    }

    public function google_callback() {
        function random_() {
            $str = 'abcdefghijklmnopqrstuvwxyz1234567890*/-%^@#%' ;
            $random = str_shuffle($str) ;

            return $random ;
        }
        $google = Socialite::driver('google')->stateless()->user();
        $check_email = DB::table('users')->where('provider_email' , $google->email)->first();

        if($check_email && $check_email->provider == 'server'){
            return redirect() -> route('home')->with('error' , 'The email already exist!') ; 
        }


        $user = DB::table('users')->insertOrIgnore([

            'provider'          => 'google' , 
            'provider_id'       => $google->id ,
            'user_type'         => 'verified' , 
            'first_name'        => $google->user['given_name'] , 
            'last_name'         => $google->user['family_name'] , 
            'provider_username' => $google->name , 
            'provider_email'    => $google->email , 
            'password'          => random_() , 
            'provider_avatar'   => $google->avatar , 
            'code'              => 0 ,
            'device_ip_address' => '0.0.0.0', 
            'uploaded_at'       => $date = Carbon::now()->format('Y-m-d')

            


       ]);
       $re_select = DB::table('users')->where('provider_id' , $google->id)->first() ; 
        session_start() ;

        $_SESSION['user'] = [
            'id' => $re_select->id,
            'username' => $google->name ,
            'email' => $google->email ,
            'avatar' => $google->avatar
        ];

        return redirect()->route('home');
    }

    public function github() {
        try{
            return Socialite::driver('github')->redirect();

        }catch(e){

            return redirect()->back();
        }
    }

    public function github_callback() {
        function random_() {
            $str = 'abcdefghijklmnopqrstuvwxyz1234567890*/-%^@#%' ;
            $random = str_shuffle($str) ;

            return $random ;
        }
        $github = Socialite::driver('github')->stateless()->user();
        $check_email = DB::table('users')->where('provider_email' , $github->email)->first();

        if($check_email && $check_email->provider == 'server'){
            return redirect() -> route('home')->with('error' , 'The email already exist!') ; 
        }


        $user = DB::table('users')->insertOrIgnore([

            'provider'          => 'github' , 
            'provider_id'       => $github->id ,
            'user_type'         => 'verified' , 
            'first_name'        => 'Github' , 
            'last_name'         => 'User' , 
            'provider_username' => $github->name , 
            'provider_email'    => $github->email , 
            'password'          => random_() , 
            'provider_avatar'   => $github->avatar , 
            'code'              => 0 ,
            'device_ip_address' => '0.0.0.0', 
            'uploaded_at'       => $date = Carbon::now()->format('Y-m-d')

            


       ]);
       $re_select = DB::table('users')->where('provider_id' , $github->id)->first() ; 
        session_start() ;

        $_SESSION['user'] = [
            'id' => $re_select->id,
            'username' => $github->name ,
            'email' => $github->email ,
            'avatar' => $github->avatar
        ];

        return redirect()->route('home');

        
    }
    
}

