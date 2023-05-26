function apply(id) {
    $.ajax({
        url : "api/apply" , 
        type : "POST" , 
        data : {
            to : id
        } , 
        success : (res) => {
            $("#posts-backup").html(res) ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
}
function show_apply(id) {
    $.ajax({
        url : "../api/show_apply" , 
        type : "POST" , 
        data : {
            to : id
        } , 
        success : (res) => {
            $("#show-backup").html(res) ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
}

function remove_own_apply(id) {
    $.ajax({
        url : "../api/delete_own_apply" , 
        type : "POST" , 
        data : {
            to : id
        } , 
        success : (res) => {
            $("#hire-backup").html(res) ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
}

function remove_alert(id) {
    $.ajax({
        url : "../api/remove-alert" , 
        type : "POST" , 
        data : {
            id : id
        } , 
        success : (res) => {
            $("#alert-backup").html(res) ; 
        } , 
        error : (err) => {
            console.log(err);
        }
    })
}