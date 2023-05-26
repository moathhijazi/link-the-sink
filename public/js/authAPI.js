function API_login() {
    $.ajax({
        url : "api/login" , 
        type : "POST" , 
        data : {
            email : $("#email").val() , 
            password : $("#password").val()
        } , 
        success : (res) => {
            $('#backup-auth').html(res) ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
}
function API_register() {
    $.ajax({
        url : "api/register" , 
        type : "POST" , 
        data : {
            first_name : $("#first_name").val() , 
            last_name : $("#last_name").val() , 
            username : $("#username").val() , 
            email : $("#email").val() , 
            password : $("#password").val()
        } , 
        success : (res) => {
            $('#backup-auth').html(res) ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
}


function verify() {
    $.ajax({
        url : "api/verify" , 
        type : "POST" , 
        data : {
          
            code : $("#code").val()
        } , 
        success : (res) => {
            $('#verify-backup').html(res) ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
}

function send_forgot() {
    $.ajax({
        url : "../api/forgot" , 
        type : "POST" , 
        data : {
            email : $('#email').val()
        } , 
        success : (res) => {
            $("#send-backup").html(res) ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
}

function verify_reset() {
    $.ajax({
        url : "../api/verify-code" , 
        type : "POST" , 
        data : {
            code : $('#code').val()
        } , 
        success : (res) => {
            $("#send-backup").html(res) ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
}
function new_password() {
    let password = document.querySelector('#new-password').value;
    let passwordRe = document.querySelector('#re-password').value;
    $.ajax({
        url : "../api/new-password" , 
        type : "POST" , 
        data : {
            password , 
            passwordRe
        } , 
        success : (res) => {
            $("#send-backup").html(res) ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
}