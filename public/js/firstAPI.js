function validate_complete() {
    let type = document.querySelector("#type") ; 
    let bio = document.querySelector("#bio") ; 

    if(type.value == 'jobseeker') {
        let linkedin = document.querySelector("#linkedin") ; 
        let github = document.querySelector("#github") ; 
        if(bio.value == '') {

            bio.classList.remove('border-gray-300') ; 
            bio.classList.add('border-red-500') ; 
        }else{
            bio.classList.remove('border-red-500') ; 
            bio.classList.add('border-gray-300') ; 

        }
        if(linkedin.value == '') {

            linkedin.classList.remove('border-gray-300') ; 
            linkedin.classList.add('border-red-500') ; 
        }else{
            linkedin.classList.remove('border-red-500') ; 
            linkedin.classList.add('border-gray-300') ; 
            
        }
        if(github.value == '') {

            github.classList.remove('border-gray-300') ; 
            github.classList.add('border-red-500') ; 
        }else{
            github.classList.remove('border-red-500') ; 
            github.classList.add('border-gray-300') ; 
            
        }

        if(
            bio.value != null &&
            github.value != null &&
            linkedin.value != null 

        ){
            sendAPI() ; 
        }

        

    }else{

        if(bio.value == '') {

            bio.classList.remove('border-gray-300') ; 
            bio.classList.add('border-red-500') ; 

        }else{
            bio.classList.remove('border-red-500') ; 
            bio.classList.add('border-gray-300') ; 
            sendAPI() ; 

        }
        
    }


}

function sendAPI() {
    let type = document.querySelector("#type") ; 
    let bio = document.querySelector("#bio") ; 

    if(type.value == 'jobseeker') {

       

        let linkedin = document.querySelector("#linkedin") ; 
        let github = document.querySelector("#github") ; 
        var fileInput = document.getElementById('cv');
        var file = fileInput.files[0];

        var pdfData = new FormData();
        pdfData.append('cv', file);
        pdfData.append('type', type.value);
        pdfData.append('bio', bio.value);
        pdfData.append('linkedin', linkedin.value);
        pdfData.append('github', github.value);

        $.ajax({
        url: "api/complete",
        type: "POST",
        data: pdfData,
        processData: false,
        contentType: false,
        success: function(res) {
            $("#complete-backup").html(res) ; 
        },
        error: function(err) {
            console.log(err);
        }
        });

    }else{
        $.ajax({
            url : "api/complete" , 
            type : "POST" , 
            data : {
                type : type.value , 
                bio : bio.value
            } , 
            success : (res) => {
                $("#complete-backup").html(res) ; 
            } , 
            error : (err) => {
                console.log(err);
            }
        })

    }
   
}

function deletePost(id) {
    if(confirm('Are you sure to delete one post ? ')){
        $.ajax({
            url : "api/delete_post" , 
            type : "POST" , 
            data : {

                id
            } , 
            success : (res) => {
                $("#own-backup").html(res) ; 
            } , 
            error : (err) => {
                console.log(err);
            }
        })
    }
}