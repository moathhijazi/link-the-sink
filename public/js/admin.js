
function admin_accept_post(id) {
    if(confirm('Are you sure to accept the post ? ')) {
        
        $.ajax({
            url : "../api/admin-accept-post" , 
            type : "POST" , 
            data : {id} , 
            success : () => {
                $('#requests-backup').html('<script>location.reload()</script>') ; 
            } , 
            error : (err) => {
                console.log(err);
            }
        })
    }
}

function admin_reject_post(id) {
    if(confirm('Are you sure to reject the post ? ')) {
        
        $.ajax({
            url : "../api/admin-reject-post" , 
            type : "POST" , 
            data : {id} , 
            success : () => {
                $('#requests-backup').html('<script>location.reload()</script>') ; 
            } , 
            error : (err) => {
                console.log(err);
            }
        })
    }
}

function admin_message() {
    let messageID = $('#message-id').val() ; 
    let messageTitle = $('#message-title').val() ; 
    let messageText = $('#message-text').val() ; 

    if(messageID != ''){

        // send api 

        $.ajax({
            url : "../api/admin-message" , 
            type : "POST" , 
            data : {

                messageID , 
                messageTitle , 
                messageText
            } , 
            success : () => {
                $('#message-id').val('') ; 
                $('#message-title').val('') ; 
                $('#message-text').val('') ; 
            } , 
            error : (err) => {
                console.log(err);
            }
        })
    }
        
    
}

function admin_post() {
    let postTitle = $('#post-title').val() ; 
    let postText = $('#post-text').val() ; 
    let postLink = $('#post-link').val() ; 

    $.ajax({
        url : "../api/admin-post" , 
        type : "POST" , 
        data : {
            postTitle , 
            postLink , 
            postText
        } , 
        success : () => {

            $('#post-title').val('') ; 
            $('#post-text').val('') ; 
            $('#post-link').val('') ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
}

function admin_block(id) {
    if(confirm('Are you sure ? ')) {

        $.ajax({
            url : "../api/admin-block" , 
            type : "POST" , 
            data : {id} , 
            success : () => {
                $('#users-backup').html('<script>location.reload()</script>') ; 
            } , 
            error : (err) => {
                console.log(err);
            }
        })
        
    }
}


function admin_delete_user(id) {
    if(confirm('Are you sure to delete the user ? ')) {

        $.ajax({
            url : "../api/admin-delete-user" , 
            type : "POST" , 
            data : {id} , 
            success : () => {
                $('#users-backup').html('<script>location.reload()</script>') ; 
            } , 
            error : (err) => {
                console.log(err);
            }
        })
        
    }
}

function add_user_to_confirm(id) {

    let inputHiddenForUserId = document.querySelector('#user-id');
    inputHiddenForUserId.value = id ; 


}

function remove_new_admin_id() {

    let inputHiddenForUserId = document.querySelector('#user-id');
    inputHiddenForUserId.value = null ; 


}

function admin_new_admin() {
    let id = document.querySelector('#user-id').value ; 

    $.ajax({

        url : "../api/admin-new-admin" , 
        type : "POST" , 
        data : {id} , 
        success : () => {
            $('#admin-new-backup').html('<script>location.reload()</script>') ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
        
    
}

function search_users_for_hire() {

    let search = document.querySelector("#users-search").value ; 

    $.ajax({

        url : "../api/admin-new-search" , 
        type : "POST" , 
        data : {search} , 
        success : (res) => {

            $('#inner-table').html(res) ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
  
    
}

function admin_new_user() {

    $.ajax({

        url : "../api/admin-new-user" , 
        type : "POST" , 
        data : {
            first : $('#first').val() ,
            last : $('#last').val(),
            username : $('#username').val(),
            email : $('#email').val(),
            password : $('#password').val(),
            type : $('#type').val(),
            username : $('#username').val(),
            bio : $('#bio').val(),
            linkedin : $('#linkedin').val(),
            github : $('#github').val(),
       
        } , 
        success : (res) => {

            $('#inner-new-user').html(res) ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
  
}