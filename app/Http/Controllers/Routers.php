<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Type\Parameter;

class Routers extends Controller
{
    
    public function home() {
        session_start() ; 
        $user_session = @$_SESSION['user']['id'];
        // visitor 
        if(@$_SESSION['account'] == 'blocked') {
            return '
            <h1>Blocked</h1>
           <p> your account has been blocked by admin</p>  <a style = "padding : 10px ; border : solid 1px silver ; color : blue; margin : 10px;" href = "'.route('logout').'">Logout</a>' ; 
        }
        
        
        if(!isset($user_session)){
            $user_cookie = @$_COOKIE['auth'];
            if($user_cookie) {
                $check_cookie = DB::table('users')->where('id' , $user_cookie)->first() ;
                if($check_cookie) {

                    $_SESSION['user'] = [


                        'id'            =>      $check_cookie->id ,
                        'first_name'    =>      $check_cookie->first_name ,
                        'last_name'     =>      $check_cookie->last_name ,
                        'username'      =>      $check_cookie->provider_username ,
                        'email'         =>      $check_cookie->provider_email ,
                        'avatar'        =>      $check_cookie->provider_avatar ,
                        
    
                    ];
                    $_SESSION['account'] = $check_cookie->user_type ;

                    if($_SESSION['account']  == 'new') {
                        return redirect() -> route('verify') ;
                    }
                    
                    $get = function ( $key) {
                        $user = $_SESSION['user']['id'] ; 
                        $check = DB::table('users_info')->where('for_user_id' , $user)->first() ; 
                        if($check) {
                            return $check->$key ; 
                        }

                        return 'link the sink user' ; 
                    } ;
                    $skills = DB::table('skills')->where('for_user_id' , $user_session)->get() ; 

                    //Admin checking
                    $admin = DB::table('admin')->where('user_id'  ,$user_session)->first() ; 
                    if($admin) {
                        return view('pages.home')->with('get' , $get)->with('skills' , $skills)->with('admin' , true);
                    }
                    $new_visit = DB::table('visitors')->insert([
                        'vis_id' => $_SESSION['user']['id'] 
                    ]);
                    
                    
                    return view('pages.home')->with('get' , $get)->with('skills' , $skills)->with('admin' , false);  
                }
            }
            return redirect()->route('login') ; 
        }

        $user_id = $_SESSION['user']['id'] ;
        $check_user = DB::table('users')->where('id' , $user_id )->orWhere('provider_id' , $user_id)->first() ; 
        
        if($check_user){

            $_SESSION['account'] = $check_user->user_type ;
            if($_SESSION['account']  == 'new') {
                return redirect() -> route('verify') ;
            }

            //set new cookie 
            setcookie('auth' , $_SESSION['user']['id'] , time() * 100 , '/');
            $get = function ($key) {
                
                $user = $_SESSION['user']['id'] ; 
                $check = DB::table('users_info')->where('for_user_id' , $user)->first() ; 
                if($check) {
                    return $check->$key ; 
                }

                return 'link the sink user' ; 
            } ;
            
            $skills = DB::table('skills')->where('for_user_id' , $user_session)->get() ; 
            $admin = DB::table('admin')->where('user_id'  ,$user_session)->first() ; 
            if($admin) {
                return view('pages.home')->with('get' , $get)->with('skills' , $skills)->with('admin' , true);
            }
            $new_visit = DB::table('visitors')->insert([
                'vis_id' => $_SESSION['user']['id'] 
            ]);

            

            return view('pages.home')->with('get' , $get)->with('skills' , $skills)->with('admin' , false);  
        }

        return redirect()->route('login') ; 
        
        
    }
    public function login() {
        return view('auth.login');
    }
    public function register() {
        return view('auth.register');
    }

    public function new() {
        session_start() ; 
        
        if($_SESSION['account'] == 'blocked') {
            return '
            <h1>Blocked</h1>
           <p> your account has been blocked by admin</p>  <a style = "padding : 10px ; border : solid 1px silver ; color : blue; margin : 10px;" href = "'.route('logout').'">Logout</a>' ; 
        }
        return view('pages.create') ; 
    }

    public function own() {
        session_start() ; 
        //With search 
        $search = request('search') ; 
        if(isset($search)) {
            $select_posts = DB::table('posts')->where('from_user_id' , $_SESSION['user']['id'])->where('title', 'like', '%'.$search.'%')->get() ; 
            return view('pages.own')->with('posts' , $select_posts);
        }
        //without search
        
        $select_posts = DB::table('posts')->where('from_user_id' , $_SESSION['user']['id'])->get() ; 
        if($_SESSION['account'] == 'blocked') {
            return '
            <h1>Blocked</h1>
           <p> your account has been blocked by admin</p>  <a style = "padding : 10px ; border : solid 1px silver ; color : blue; margin : 10px;" href = "'.route('logout').'">Logout</a>' ; 
        }
        return view('pages.own')->with('posts' , $select_posts);
    }

    public function jobseekers() {
        session_start() ; 
        // With search
        $search = request('search') ; 
        if(isset($search)) {
            
                $users = DB::table('users')
                ->join('skills', 'users.id', '=', 'skills.for_user_id')
                
                ->where('skills.skill', $search)
                ->where('users.user_type', 'jobseeker')
                ->select('users.*')
                ->get();

                
                
            
            $get_info_by_id =  function ($id , $key) {

                $check = DB::table('users_info')->where('for_user_id' , $id)->first() ; 
                if($check){
                    return $check->$key ; 
                }

                return 'link the sink user' ; 

            };

            if($_SESSION['account'] == 'blocked') {
                return '
                <h1>Blocked</h1>
               <p> your account has been blocked by admin</p>  <a style = "padding : 10px ; border : solid 1px silver ; color : blue; margin : 10px;" href = "'.route('logout').'">Logout</a>' ; 
            }
            return view('pages.joobseekers')->with('users' , $users)->with('get' , $get_info_by_id) ; 
            
        }

        // Without search
        $jobseekers = DB::table('users')->where('user_type' , 'jobseeker')->get() ; 
        $get_info_by_id =  function ($id , $key) {

            $check = DB::table('users_info')->where('for_user_id' , $id)->first() ; 
            if($check){
                return $check->$key ; 
            }

            return 'link the sink user' ; 

        };
        if($_SESSION['account'] == 'blocked') {
            return '
                <h1>Blocked</h1>
            <p> your account has been blocked by admin</p>  <a style = "padding : 10px ; border : solid 1px silver ; color : blue; margin : 10px;" href = "'.route('logout').'">Logout</a>' ; 
        }

         return view('pages.joobseekers')->with('users' , $jobseekers)->with('get' , $get_info_by_id) ; 
    }

    public function posts() {
        session_start() ; 
        // With search

        $search = request('search') ; 
        if(isset($search)) {
            $searched_posts = DB::table('posts')->where('title', 'like', '%'.$search.'%')->where('post_status' , 'active')->get(); 
            if($searched_posts) {
                $check_id = function($post_id) {
                    $from = $_SESSION['user']['id'];
                    $check = DB::table('applies')->where('apply_from' , $from)->where('to_post_id' , $post_id)->first();
                    if($check) {
        
                        return true ; 
                    }
        
                    return false ; 
                };
                $get = function ($user_id , $key) {
                    $check = DB::table('users')->where('id' , $user_id) ->first() ;
                    if($check) {
                        return $check->$key ;
                    }

                    return 'link the sink user' ; 
                } ;

                if($_SESSION['account'] == 'blocked') {
                    return '
                    <h1>Blocked</h1>
                   <p> your account has been blocked by admin</p>  <a style = "padding : 10px ; border : solid 1px silver ; color : blue; margin : 10px;" href = "'.route('logout').'">Logout</a>' ; 
                }

                return view('pages.posts')->with('posts' , $searched_posts)->with('check' , $check_id)->with('get' , $get) ; 
            }
        }


        // Without search

       
        $all_posts = DB::table('posts')->where('post_status' , 'active')->get() ; 
        $check_id = function($post_id) {
            $from = $_SESSION['user']['id'];
            $check = DB::table('applies')->where('apply_from' , $from)->where('to_post_id' , $post_id)->first();
            if($check) {

                return true ; 
            }

            return false ; 
        };
        $get = function ($user_id , $key) {
            $check = DB::table('users')->where('id' , $user_id) ->first() ;
            if($check) {
                return $check->$key ;
            }

            return 'link the sink user' ; 
        } ;

        if($_SESSION['account'] == 'blocked') {
            return '
            <h1>Blocked</h1>
           <p> your account has been blocked by admin</p>  <a style = "padding : 10px ; border : solid 1px silver ; color : blue; margin : 10px;" href = "'.route('logout').'">Logout</a>' ; 
        }
        return view('pages.posts')->with('posts' , $all_posts)->with('check' , $check_id)->with('get' , $get) ; 
       
       
    }

    public function profile( $username) {
        session_start() ; 
        $me = $_SESSION['user']['username'];
        if($username == $me) {

            return redirect()->route('home') ;

        }
        $get = function ($id , $key) {
            $check = DB::table('users_info')->where('for_user_id' , $id) -> first() ; 
            if($check) {
                return $check->$key ; 
            }

            return 'link the sink user' ; 
        };
        $check = DB::table('users')->where('provider_username' , $username) -> first() ; 
        $skills = DB::table('skills')->where('for_user_id' , $check->id)->get() ; 
        if($check) {

            return view('pages.profile')->with('user' , $check)->with('get' , $get)->with('skills' , $skills) ; 
        }

       

        return abort(404) ; 
    }

    public function show($id) {
        session_start() ; 
        $check = DB::table('posts')->where('id' , $id) -> first() ; 
        if($check) {
            $check_id = function($post_id) {
                $from = $_SESSION['user']['id'];
                $check = DB::table('applies')->where('apply_from' , $from)->where('to_post_id' , $post_id)->first();
                if($check) {
    
                    return true ; 
                }
    
                return false ; 
            };

            $get = function($user_id , $key) {
                $check = DB::table('users')->where('id' , $user_id)->first() ; 
                if($check) {
                    return $check->$key ; 
                }

                return 'link the sink user' ; 
            };
            if($_SESSION['account'] == 'blocked') {
                return '
                <h1>Blocked</h1>
               <p> your account has been blocked by admin</p>  <a style = "padding : 10px ; border : solid 1px silver ; color : blue; margin : 10px;" href = "'.route('logout').'">Logout</a>' ; 
            }

            return view('pages.show')->with('post' , $check)->with('check' , $check_id)->with('get' , $get) ;
        }

        return abort(404) ; 
    }

    public function hire($pid) {
        session_start()  ;
        $from  = $_SESSION['user']['id'] ; 
        $check_own = DB::table('posts')->where('id' , $pid)->where('from_user_id' , $from)->first() ; 
        if($check_own) {
            $check_apply = DB::table('applies')->where('to_post_id' , $pid)->get() ; 
            $get = function ($user_id , $key) {
                $check_user = DB::table('users')->where('id' , $user_id)->first() ; 
                if($check_user) {
                    return $check_user->$key ; 
                }

                return 'link the sink user' ; 
            };
            $get_info = function ($user_id , $key) {

                $check = DB::table('users_info')->where('for_user_id' , $user_id)->first() ; 
                if($check) {
                    return $check->$key ; 
                }

                return 'link the sink user' ; 
            } ;
            if($_SESSION['account'] == 'blocked') {
                return '
                <h1>Blocked</h1>
               <p> your account has been blocked by admin</p>  <a style = "padding : 10px ; border : solid 1px silver ; color : blue; margin : 10px;" href = "'.route('logout').'">Logout</a>' ; 
            }
            return view('pages.hire')->with('applies' , $check_apply)->with('post' , $check_own)->with('get' , $get)->with('info' , $get_info);
        }

        return abort(403) ; 
        
    }

    public function notifications() {
        session_start() ;
        $user = $_SESSION['user']['id'] ; 
        $alerts = DB::table('alerts')->where('to_id' , $user)->get() ; 
        if($_SESSION['account'] == 'blocked') {
            return '
            <h1>Blocked</h1>
           <p> your account has been blocked by admin</p>  <a style = "padding : 10px ; border : solid 1px silver ; color : blue; margin : 10px;" href = "'.route('logout').'">Logout</a>' ; 
        }
        return view('pages.alerts')->with('alerts'  ,$alerts);
    }

    public function admin() {
        session_start() ; 
        $user_session = @$_SESSION['user']['id'] ; 
        $check_admin = DB::table('admin')->where('user_id' , $user_session)->first() ; 

        // visitors count 
        $visitors = DB::table('visitors')->count() ; 

        // users count
        $users = DB::table('users')->count() ; 

        //cvs count
        $cv = DB::table('users_info')->count() ; 

        // posts count 
        $posts = DB::table('posts')->count() ; 

        // accepted posts count
        $accept = DB::table('posts')->where('post_status' , 'active')->count() ; 

        // rejected posts count
        $reject = DB::table('posts')->where('post_status' , 'reject')->count() ; 

        //all admins 
        $admins = DB::table('admin')->get() ; 

        //funciton to get data 
        $get = function ($admin_id , $key) {
            $check = DB::table('users')->where('id' , $admin_id)->first() ; 
            if($check){
                return $check->$key ; 
            }
            return 'link-the-sink-admin' ; 
        };

        if($check_admin){

            return view('admin.panel')
            ->with('visit' ,$visitors )
            ->with('users' , $users)
            ->with('cv' , $cv)
            ->with('posts' , $posts)
            ->with('accept' , $accept)
            ->with('reject' , $reject)
            ->with('admins' , $admins)
            ->with('get' , $get);
        }

        return abort(403) ; 
    }

    public function admin_requests() {
        session_start() ; 
        $user_session = @$_SESSION['user']['id'] ; 
        $check_admin = DB::table('admin')->where('user_id' , $user_session)->first() ; 

        // posts requested
        $requests = DB::table('posts')->where('post_status' , 'pending')->get() ; 

        if($check_admin){

            return view('admin.requests')->with('posts' , $requests);
        }

        return abort(403) ; 
    }

    public function call_center() {
        session_start() ; 
        
        $id_request = request('id') ; 
        $user_session = @$_SESSION['user']['id'] ; 
        $check_admin = DB::table('admin')->where('user_id' , $user_session)->first() ; 
        if($check_admin){

            return view('admin.call')->with('id' , $id_request);
        }

        return abort(403) ; 
    }

    public function admin_post() {
        session_start() ; 
        $user_session = @$_SESSION['user']['id'] ; 
        $check_admin = DB::table('admin')->where('user_id' , $user_session)->first() ; 
        if($check_admin){
            return view('admin.new_post');
        }

        return abort(403) ; 
    }

    public function admin_users() {
        session_start() ; 

        //Search 
        $search = request('search') ; 
        if(isset($search)) {
            $user_session = @$_SESSION['user']['id'] ; 
            $check_admin = DB::table('admin')->where('user_id' , $user_session)->first() ; 
            $users_searched = DB::table('users')->whereNot('id' , 0)->whereNot('id' , $user_session)->where('provider_username' , 'like' , '%'.$search.'%')->get(); 
            if($check_admin){

                return view('admin.users')->with('users' , $users_searched);
            }
        }
        // Search end 

        $user_session = @$_SESSION['user']['id'] ; 
        $check_admin = DB::table('admin')->where('user_id' , $user_session)->first() ; 
        $users = DB::table('users')->whereNot('id' , 0)->whereNot('id' , $user_session)->get(); 
        if($check_admin){

            return view('admin.users')->with('users' , $users);
        }

        return abort(403) ; 
    }

    public function admin_new_user() {
        session_start() ; 
        $user_session = @$_SESSION['user']['id'] ; 
        $check_admin = DB::table('admin')->where('user_id' , $user_session)->first() ; 
        if($check_admin){

            return view('admin.new_user');
        }

        return abort(403) ; 
    }
    
    public function admin_new_admin() {
        session_start() ; 
        $user_session = @$_SESSION['user']['id'] ; 
        $check_admin = DB::table('admin')->where('user_id' , $user_session)->first() ; 
        if($check_admin){
         
            $all_users = DB::table('users')->whereNot('id'  , $user_session)->get() ; 
            $check_admin = function($id){

                $check = DB::table('admin')->where('user_id' , $id)->first() ; 
                if($check){
                    return true ;
                }

                return false ; 
            };
            return view('admin.new_admin')->with('users' , $all_users)->with('check' , $check_admin);

        }

        return abort(403) ; 
    }
    public function admin_edit() {
        session_start() ; 
        $user_session = @$_SESSION['user']['id'] ; 
        $check_admin = DB::table('admin')->where('user_id' , $user_session)->first() ; 
        if($check_admin){
            $user = request('uid') ; 
            $check_user = DB::table('users')->where('id' , $user)->first() ; 
            if($check_user) {
                return view('admin.edit')->with('user' , $check_user);
            }
            return abort(404) ; 
        }

        return abort(403) ; 
        

        
        
    }

    public function verify_reset() {

        return view('auth.verify_code') ;
    }

    public function new_password() {
        session_start() ; 
        $access = @$_SESSION['token'] ; 
        if(isset($access)) {
            return view('auth.reset_password');
        }

        return abort(403) ; 
    }

    public function admin_all_posts() {
        session_start() ; 
        $user_session = @$_SESSION['user']['id'] ; 

        $check_admin = DB::table('admin')->where('user_id' , $user_session)->first() ; 
        if($check_admin){
            $posts = DB::table('posts')->get() ; 
            return view('admin.all_posts')->with('posts' , $posts);
        }

        return abort(403) ; 
    }
  
}
