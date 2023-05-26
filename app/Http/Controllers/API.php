<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class API extends Controller
{
    public function complete(Request $request) {
        session_start() ; 
        
        if($request->type == 'guest' ) {
            return 'Please select account type '; 
        }else{
            if($request->type == 'jobseeker') {
                $cv = $request->file('cv');
                $pdfName =  '[link-the-sink]_(CV)_' . time() .'.' .$cv->getClientOriginalExtension();
                $cv->move(public_path('cv'), $pdfName);
              

                DB::table('users_info')->insert([

                    'for_user_id'  => $_SESSION['user']['id'] ,
                    'linkedin_link' => $request->linkedin , 
                    'github_link'  => $request->github ,
                    'bio'           => $request->bio , 
                    'cv_path'       => 'cv/' . $pdfName
                ]); 
                

            }else{
                DB::table('users_info')->insert([
                    'for_user_id'  => $_SESSION['user']['id'] ,
                    'linkedin_link' => 'empty' , 
                    'github_link'  => 'empty' ,
                    'bio'           => $request->bio , 
                    
                ]); 
            }

            DB::table('users')->where('provider_username' , $_SESSION['user']['username'])->update([
                'user_type'  => $request->type 
            ]);

            $_SESSION['account'] = $request-> type ; 
            return "<script>location.reload()</script>" ; 
            

        }
       
    }
    public function submit_post(Request $request){
        session_start() ; 
        $request->validate([
            'title' => 'required', // Adjust the rules as needed
            'des' => 'required', // Adjust the rules as needed
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the rules as needed
        ]);
        
        $title = $request->input('title') ; 
        $des = $request->input('des') ; 
        $link = $request->input('link') ; 
        
        
         

        $insert = DB::table('posts')->insert([
            'from_user_id' => $_SESSION['user']['id'] , 
            'title'        => $title , 
            'description'  => $des ,
            'link'         => $link , 
            'accepted_by'  => 0

        ]);

        session()->flash('success', 'Add success !');

        return redirect()->back() ; 

    

    }

    public function delete_post(Request $request) {
        $id = $request->id ; 
        DB::table('posts')->where('id' , $id)->delete() ; 
        return '<script>location.reload()</script>' ; 
    }

    public function verify(Request $request) {
        $code = $request ->code ; 
        session_start() ; 
        $username = $_SESSION['user']['username'] ; 
        $check = DB::table('users')->where('code' , $code)->first();
        if($check) {

            $check = DB::table('users')->where('code' , $code)->update([
                'code' => 0 , 
                'user_type' => 'verified' 
            ]);
            $_SESSION['account'] = 'verified' ; 

            return '<script>location.href = "/" </script>' ;
        }


        return 'Incorrect code !' ; 

    }

    public function apply(Request $request) {
        session_start();
        $from = $_SESSION['user']['id'];
        $to = $request -> to ; 
        $check = DB::table('applies')->where('apply_from' , $from)->where('to_post_id' , $to)->first();
        if($check){
            $remove_apply = DB::table('applies')->where('apply_from' , $from)->where('to_post_id' , $to)->delete() ; 

        }else{
            $new_apply =  DB::table('applies')->insert([

                'apply_from' => $from , 
                'to_post_id'    => $to
            ]);
        }

        $check_id = function($post_id) {
            $from = $_SESSION['user']['id'];
            $check = DB::table('applies')->where('apply_from' , $from)->where('to_post_id' , $post_id)->first();
            if($check) {

                return true ; 
            }

            return false ; 
        };
       
        $all_posts = DB::table('posts')->get() ; 
        $get = function ($user_id , $key) {
            $check = DB::table('users')->where('id' , $user_id) ->first() ;
            if($check) {
                return $check->$key ;
            }

            return 'link the sink user' ; 
        } ;

        return view('components.posts')->with('posts' , $all_posts)->with('check' , $check_id)->with('get' , $get) ; 

        
    }
    public function show_apply(Request $request) {
        session_start();
        $from = $_SESSION['user']['id'];
        $to = $request -> to ; 
        $check = DB::table('applies')->where('apply_from' , $from)->where('to_post_id' , $to)->first();
        if($check){
            $remove_apply = DB::table('applies')->where('apply_from' , $from)->where('to_post_id' , $to)->delete() ; 

        }else{
            $new_apply =  DB::table('applies')->insert([

                'apply_from' => $from , 
                'to_post_id'    => $to
            ]);
        }

        $check_id = function($post_id) {
            $from = $_SESSION['user']['id'];
            $check = DB::table('applies')->where('apply_from' , $from)->where('to_post_id' , $post_id)->first();
            if($check) {

                return true ; 
            }

            return false ; 
        };
       
        
       return '<script>location.reload()</script>';

        
    }

    public function delete_own_apply(Request $request) {
        $id = $request->to ;
        $delete = DB::table('applies')->where('id' , $id)->delete() ; 

        return '<script>location.reload()</script>';
    }

    public function image_change(Request $request) {
        session_start() ; 
        $image = $request->file('img');
        if($image != null) {
            $imageName =  '[link-the-sink]_' . time() .'.' .$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $update_avatar = DB::table('users')->where('id' , $_SESSION['user']['id'])->update([
                'provider_avatar'  => 'images/' . $imageName
            ]);
            if($update_avatar) {
                // update session 
                $_SESSION['user']['avatar'] = 'images/' . $imageName;
            }
        }

        return redirect()->back(); 
    }

    public function skills(Request $request) {
        session_start() ; 
        $user_id = $_SESSION['user']['id'] ; 
        $skill = $request -> skill ; 
        $check_skill = DB::table('skills')->where('for_user_id' , $user_id)->where('skill' , $skill)->first() ; 
        if(!$check_skill) {
            DB::table('skills')->insert([
                'for_user_id' => $user_id , 
                'skill'  => $skill 
            ]);
        }
    }

    public function verify_code(Request $request) {
        $code = $request -> code ; 
        $check = DB::table('users')->where('code' , $code)->first() ; 
        if($check) {
            $update = DB::table('users')->where('code' , $code)->update(['code' => 0]);
            session_start();
            $_SESSION['token'] = $check -> id ; 

            return '<script>send_verify_Unloading(); location.href = "/new-password" </script>' ; 
        }

        return '<script>send_verify_Unloading();</script><p class = "p-2" >Invalid code!</p>' ; 
    }

    public function remove_alert(Request $request) {
        $alert_id = $request -> id ; 

        $delete = DB::table('alerts')->where('id' , $alert_id)->delete() ; 

        return '<script>location.reload()</script>' ; 
    }

    
}
