<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ; 

class ADMIN extends Controller
{
    public function accept_post(Request $request) {

        $post_id = $request->id ; 
        $check = DB::table('posts')->where('id' , $post_id)->update([
            'post_status'  =>  'active'
        ]);
    }
    public function reject_post(Request $request) {

        $post_id = $request->id ; 
        $check = DB::table('posts')->where('id' , $post_id)->update([
            'post_status'  =>  'reject'
        ]);
    }
    public function message(Request $request) {

        $id = $request->messageID ; 
        $title = $request->messageTitle ; 
        $text = $request->messageText ; 

        if($id != null ){
            $message = DB::table('alerts')->insert([

                'alert_from_id'  =>  0 , 
                'to_id'  => $id , 
                'title'  => $title , 
                'status'  => 'new' , 
                'description'  => $text 

            ]);
        }
    }
    public function post(Request $request) {

        $title = $request -> postTitle ; 
        $text   = $request -> postText ; 
        $link  = $request -> postLink ; 

        $insert_post = DB::table('posts')->insert([

            'from_user_id'  =>  0 ,
            'title'         => $title  , 
            'description'   => $text , 
            'link'          => $link , 
            'post_status'   => 'active' ,
            'accepted_by'   => 0

        ]);

    }
    public function block(Request $request) {
        $user_id = $request->id ; 

        $check_block = DB::table('users')->where('id' , $user_id)->where('user_type' , 'blocked')->first() ; 

        if($check_block) {
            $unblock_user = DB::table('users')->where('id' , $user_id)->update([
                'user_type'  => 'jobseeker'
            ]);
        }else{
            $block_user = DB::table('users')->where('id' , $user_id)->update([
                'user_type'  => 'blocked'
            ]);
        }
       
    }
    public function update(Request $request) {

        session_start() ; 
        $user_id    =        $_SESSION['user']['id'] ; 
        $id         =        $request -> input('id');
        $first      =        $request -> input('edit-first');
        $last       =        $request -> input('edit-last');
        $username   =        $request -> input('edit-username');
        $email      =        $request -> input('edit-email');
        $type       =        $request -> input('edit-type');

        $check_data = DB::table('users')->where('provider_email'  , $email)->whereNot('id' , $id)->first() ;
        if($check_data){
            return 'This email is already exist!' ; 
        }

        $check_data = DB::table('users')->where('provider_username'  , $username)->whereNot('id' , $id)->first() ;
        if($check_data){
            return 'This username is already exist!' ; 
        }

        
        $update = DB::table('users')->where('id' , $id)->update([

            'first_name'  =>  $first , 
            'last_name'  => $last , 
            'provider_username'  => $username , 
            'provider_email'  => $email , 
            'user_type'  => $type

        ]);

        return redirect() -> back() ; 
      
    }
    public function delete_user(Request $request) {

        $user_id = $request -> id ; 
        $delete = DB::table('users')->where('id' , $user_id)->delete() ; 
        $delete_info = DB::table('users_info')->where('for_user_id' , $user_id)->delete() ; 

    }
    public function new_admin(Request $request) {

        session_start() ;
        $from = $_SESSION['user']['id'];
        $user_id = $request -> id ; 
        $check_him = DB::table('admin')->where('user_id' , $user_id)->first() ; 
        if(!$check_him){

            $make_him_as_admin = DB::table('admin')->insert([
                'user_id' => $user_id , 
                'added_by_id'  => $from
            ]);
    

        }
        
    }
    public function new_admin_search(Request $request) {
        session_start() ; 
        $check_admin = function($id){

            $check = DB::table('admin')->where('user_id' , $id)->first() ; 
            if($check){
                return true ;
            }

            return false ; 
        };
        $user_session = $_SESSION['user']['id'] ; 
        $search = $request ->search ; 
        $all_users = DB::table('users')->whereNot('id'  , $user_session)->where('first_name', 'like', '%'.$search.'%')->orWhere('provider_username', 'like', '%'.$search.'%')->whereNot('id'  , $user_session)->get() ; 
        return view('components.search-users')->with('search' , $all_users)->with('check' , $check_admin);
       
    }
    public function new_user(Request $request) {
        $first = $request -> first; 
        $last = $request -> last; 
        $email = $request -> email; 
        $username = $request -> username; 
        $password = $request -> password; 
        $type = $request -> type; 
        $bio = $request -> bio; 
        $linkedin = $request -> linkedin; 
        $github = $request -> github; 

        if(
            $first == null ||
            $last == null ||
            $email == null ||
            $username == null ||
            $password == null ||
            $type == null ||
            $bio == null ||
            $linkedin == null ||
            $github == null 
        ){
            return 'All fields required !' ; 
        }

        // first injection 
        $usersname_check = DB::table('users')->where('provider_username' , $username)->first() ; 
        if($usersname_check) return 'This username already token!' ; 

        $email_check = DB::table('users')->where('provider_email' , $email)->first() ; 
        if($email_check) return 'This email already exist!' ; 

        $users_injection = DB::table('users')->insert([

            'provider'          =>      'admin' , 
            'provider_id'       =>      0 ,
            'first_name'        =>      $first , 
            'last_name'         =>      $last ,
            'provider_username' =>      $username , 
            'provider_email'    =>      $email , 
            'user_type'         =>      $type , 
            'code'              =>      0 , 
            'password'          =>      password_hash($password , PASSWORD_DEFAULT) , 
            'provider_avatar'   =>      'https://cdn.icon-icons.com/icons2/2643/PNG/512/male_man_people_person_avatar_white_tone_icon_159363.png' , 
            'device_ip_address' =>      $request->ip()

        ]);

        $check = DB::table('users')->where('provider_username' , $username)->first() ; 
        //second injection 
        $second_injection = DB::table('users_info')->insert([

            'for_user_id'      =>       $check->id ,
            'linkedin_link'    =>       $linkedin  , 
            'github_link'      =>       $github    ,
            'cv_path'          =>       'empty'   ,
            'bio'              =>       $bio

        ]);

        return '<script>location.reload()</script>' ; 
    }
}
