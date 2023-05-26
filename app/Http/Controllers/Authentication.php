<?php
//return '<script>closeLoginLoading()</script>All fileds required !' ; 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Authentication extends Controller
{
    public function login(Request $request) {
        $email = $request->email ; 
        $password = $request->password ; 

        if($email == null || $password == null ){
            return '<script>closeLoginLoading()</script>All fileds required !' ; 
        }

        $select_email = DB::table('users')->where('provider_email' ,$email)->first() ; 
        if($select_email && $select_email->provider == 'server' || $select_email->provider == 'admin') {
            $password_verify = password_verify($password , $select_email->password) ; 
            if($password_verify){
                session_start();
                $_SESSION['user'] = [


                    'id'            =>      $select_email->id ,
                    'first_name'    =>      $select_email->first_name ,
                    'last_name'     =>      $select_email->last_name ,
                    'username'      =>      $select_email->provider_username ,
                    'email'         =>      $select_email->provider_email ,
                    'avatar'        =>      $select_email->provider_avatar ,
                    

                ];
                //setcookie('auth' ,  $select_email->id  , time() * 100 , '/');
                return '<script>location.href = "./" </script>' ; 
            }

            return '<script>closeLoginLoading()</script>Invalid password !' ; 
            

        }else{
            return '<script>closeLoginLoading()</script> Invalid email or password !' ; 
        }


    } 

    public function register(Request $request) {
        $first_name = $request -> first_name ; 
        $last_name = $request -> last_name ; 
        $username = $request -> username ; 
        $email = $request -> email ; 
        $password = $request -> password ; 

        if(
            $first_name == null ||
            $last_name == null ||
            $username == null ||
            $email == null ||
            $password == null 
        ){
            return '<script>closeRegisterLoading()</script>All fileds required !' ; 
        }

        if(strlen($password) < 6 ){
            return '<script>closeRegisterLoading()</script>Password too short !' ; 
        } 

        $check_username = DB::table('users')->where('provider_username' , $username)->first() ; 

        if($check_username) {
            return '<script>closeRegisterLoading()</script>Username already token!' ; 
        }
        $check_email = DB::table('users')->where('provider_email' , $email)->first() ; 

        if($check_email) {
            return '<script>closeRegisterLoading()</script>Email already exist!' ; 
        }

        $hash_password = password_hash($password , PASSWORD_DEFAULT) ;
        $ip_address = $request-> ip() ; 
        $insert_new_user = DB::table('users')->insert([

            'provider'          => 'server' , 
            'provider_id'       => 00 ,
            'user_type'         => 'new' , 
            'first_name'        => $first_name , 
            'last_name'         => $last_name , 
            'provider_username' => $username , 
            'provider_email'    => $email , 
            'password'          => $hash_password , 
            'provider_avatar'   => 'https://cdn.icon-icons.com/icons2/2643/PNG/512/male_man_people_person_avatar_white_tone_icon_159363.png' , 
            'code'              => 0 ,
            'device_ip_address' => $ip_address , 
            'uploaded_at'       => Carbon::now()->format('Y-m-d')


        ]);

        if($insert_new_user) {
            // Login user


            $select_email = DB::table('users')->where('provider_email' ,$email)->first() ; 
            if($select_email && $select_email->provider == 'server') {
                $password_verify = password_verify($password , $select_email->password) ; 
                if($password_verify){
                    session_start();
                    $_SESSION['user'] = [


                        'id'            =>      $select_email->id ,
                        'first_name'    =>      $select_email->first_name ,
                        'last_name'     =>      $select_email->last_name ,
                        'username'      =>      $select_email->provider_username ,
                        'email'         =>      $select_email->provider_email ,
                        'avatar'        =>      $select_email->provider_avatar ,
                        

                    ];

                    

                    return '<script>location.href = "./" </script>' ; 
                }

                return '<script>closeRegisterLoading()</script>Password verfication server error 500 !' ; 
                

            }else{
                return '<script>closeRegsiterLoading()</script> Getting email server error 500 !' ; 
            }
        }


    }

    public function logout() {

        session_start() ; 
        session_unset() ; 
        session_destroy() ; 

        return  redirect() -> route('login') ; 

    }

    public function verify() {
        session_start();
       
        
        function code () {
            $numbers = '123456790' ; 
            return str_shuffle($numbers) ; 
        }
        
        
        $to = $_SESSION['user']['email'] ; 
        $code = code() ; 

        $put_code = DB::table('users')->where('provider_email' , $to)->update([
            'code'  => $code
        ]);

        

       try{
        require base_path("vendor/autoload.php");

       

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        // Set SMTP settings for Gmail
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';

        // Your Gmail account credentials
        $mail->Username = 'senderemail41@gmail.com';
        $mail->Password = 'mkuzubbeamxlwuls';

        // Set "From" and "AddAddress" fields
        $mail->setFrom('senderemail41@gmail.com');
        $mail->addAddress($to);

        // Set email content
        $mail->isHTML(true);
        $mail->Subject = 'code';
        $mail->Body = '<div class = "w-full flex justify-center">'.$code.'</div>';

        $mail -> send() ; 

        return view('auth.verify') ; 

       }catch(e) {

        return abort(500) ; 

       }
       

        
    }

    public function forgot() {
        
        return view('auth.forgot') ; 

    }

    public function forgot_code(Request $request) {
        $email = $request -> email ; 
        $check_email = DB::table('users')->where('provider_email' , $email)->where('provider' , 'server')->orWhere('provider' , 'admin')->first() ; 
        if($check_email)  
        {
            function code () {
                $numbers = '123456790' ; 
                return str_shuffle($numbers) ; 
            }
            $code = code() ; 
            $put_code = DB::table('users')->where('provider_email' , $email)->update([
                'code'  => $code
            ]);

            
            try{
                require base_path("vendor/autoload.php");

            

                // Create a new PHPMailer instance
                $mail = new PHPMailer(true);

                // Set SMTP settings for Gmail
                $mail->IsSMTP();
                $mail->CharSet = 'UTF-8';
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';

                // Your Gmail account credentials
                $mail->Username = 'senderemail41@gmail.com';
                $mail->Password = 'mkuzubbeamxlwuls';

                // Set "From" and "AddAddress" fields
                $mail->setFrom('senderemail41@gmail.com');
                $mail->addAddress($email);

                // Set email content
                $mail->isHTML(true);
                $mail->Subject = 'reset code';
                $mail->Body = '<div class = "w-full flex justify-center">This is your reset password code ['.$code.']</div>';

                $mail -> send() ; 

                return '<script>location.href = "/verify-reset" </script>' ; 

            }catch(e) {

                return abort(500) ; 

            }

        }

        return '<p class = "p-3" >Coudnt found your email !</p><script> send_reset_Unloading() </script>' ; 
        
    }

    public function new_password(Request $request) {
        $new_password = $request -> password ; 
        $re_password = $request -> passwordRe ; 
        session_start() ; 
        $id = $_SESSION['token'] ; 
        if($new_password == null || $re_password == null ) {
            return '<script>send_new_password_Unloading()</script><p>All fields required</p>' ; 
        }
        if($new_password != $re_password) {
            return '<script>send_new_password_Unloading()</script><p>Password not matched!  </p>' ; 
        }

        $update = DB::table('users')->where('id' , $id)->where('provider' , 'server')->orWhere('provider' , 'admin')->update([

            'password'  => password_hash($new_password , PASSWORD_DEFAULT) ,
            'code'      => 0
            
        ]);

        $_SESSION['token'] = null ; 

        return '<script>location.href = "/login" </script>' ; 
    }
}









