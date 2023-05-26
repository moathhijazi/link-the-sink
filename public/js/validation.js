function register_validation() {

    let firstName = document.querySelector('#first_name');
    let secondName = document.querySelector('#last_name');
    let username = document.querySelector('#username');
    let email = document.querySelector('#email');
    let password = document.querySelector('#password');
    let button = document.querySelector('#auth-btn');
    let google = document.querySelector('#google');
    let github = document.querySelector('#github');

    firstName.setAttribute('disabled' , true) ; 
    secondName.setAttribute('disabled' , true) ; 
    username.setAttribute('disabled' , true) ; 
    email.setAttribute('disabled' , true) ; 
    password.setAttribute('disabled' , true) ; 
    button.setAttribute('disabled' , true) ; 
    google.setAttribute('disabled' , true) ; 
    github.setAttribute('disabled' , true) ; 

    firstName.style.opacity = ".7" ;
    secondName.style.opacity = ".7" ;
    username.style.opacity = ".7" ;
    email.style.opacity = ".7" ;
    password.style.opacity = ".7" ;
    button.style.opacity = ".7" ;
    google.style.opacity = ".7" ;
    github.style.opacity = ".7" ;

    spinner = 
    `
    
        <div role="status" class = "flex justify-center items-center">
            <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-blue-300 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>

    ` ; 

    button.innerHTML = spinner ; 
    API_register();


}
function closeRegisterLoading() {
    
    let firstName = document.querySelector('#first_name');
    let secondName = document.querySelector('#last_name');
    let username = document.querySelector('#username');
    let email = document.querySelector('#email');
    let password = document.querySelector('#password');
    let button = document.querySelector('#auth-btn');
    let google = document.querySelector('#google');
    let github = document.querySelector('#github');

    firstName.removeAttribute('disabled' , true) ; 
    secondName.removeAttribute('disabled' , true) ; 
    username.removeAttribute('disabled' , true) ; 
    email.removeAttribute('disabled' , true) ; 
    password.removeAttribute('disabled' , true) ; 
    button.removeAttribute('disabled' , true) ; 
    google.removeAttribute('disabled' , true) ; 
    github.removeAttribute('disabled' , true) ; 

    firstName.style.opacity = "1" ;
    secondName.style.opacity = "1" ;
    username.style.opacity = "1" ;
    email.style.opacity = "1" ;
    password.style.opacity = "1" ;
    button.style.opacity = "1" ;
    google.style.opacity = "1" ;
    github.style.opacity = "1" ;

    button.innerHTML = '<span class = "text-white">Register</span>' ;
}


function login_validation() {
    let email = document.querySelector('#email');
    let password = document.querySelector('#password');
    let button = document.querySelector('#auth-btn');
    let google = document.querySelector('#google');
    let github = document.querySelector('#github');

    email.setAttribute('disabled' , true) ; 
    password.setAttribute('disabled' , true) ; 
    button.setAttribute('disabled' , true) ; 
    google.setAttribute('disabled' , true) ; 
    github.setAttribute('disabled' , true) ; 

    email.style.opacity = ".7" ;
    github.style.opacity = ".7" ;
    google.style.opacity = ".7" ;
    password.style.opacity = ".7" ;
    button.style.opacity = ".7" ;

    spinner = 
    `
    
        <div role="status" class = "flex justify-center items-center">
            <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-blue-300 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>

    ` ; 

    button.innerHTML = spinner ; 
    API_login();
}
function closeLoginLoading() {
    let email = document.querySelector('#email');
    let password = document.querySelector('#password');
    let button = document.querySelector('#auth-btn');
    let google = document.querySelector('#google');
    let github = document.querySelector('#github');

    email.removeAttribute('disabled' , true) ; 
    password.removeAttribute('disabled' , true) ; 
    button.removeAttribute('disabled' , true) ; 
    google.removeAttribute('disabled' , true) ; 
    github.removeAttribute('disabled' , true) ; 

    email.style.opacity = "1" ;
    github.style.opacity = "1" ;
    google.style.opacity = "1" ;
    password.style.opacity = "1" ;
    button.style.opacity = "1" ;

    button.innerHTML = '<span class = "text-white">Login</span>' ;

}

function send_reset_loading() {

    let button = document.querySelector('#auth-btn');
    let email = document.querySelector('#email');
    
    spinner = 
    `
    
        <div role="status" class = "flex justify-center items-center">
            <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-blue-300 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>

    ` ; 
    button.setAttribute('disabled' , true) ; 
    email.setAttribute('disabled' , true) ; 
    button.style.opacity = ".7" ;
    email.style.opacity = ".7" ;
    
    button.innerHTML = spinner ; 

}

function send_verify_loading() {

    let button = document.querySelector('#auth-btn');
    let email = document.querySelector('#code');
    
    spinner = 
    `
    
        <div role="status" class = "flex justify-center items-center">
            <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-blue-300 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>

    ` ; 
    button.setAttribute('disabled' , true) ; 
    email.setAttribute('disabled' , true) ; 
    button.style.opacity = ".7" ;
    email.style.opacity = ".7" ;
    
    button.innerHTML = spinner ; 

}
function send_new_password_loading() {

    let button = document.querySelector('#auth-btn');
    let password = document.querySelector('#new-password');
    let passwordRe = document.querySelector('#re-password');
    
    spinner = 
    `
    
        <div role="status" class = "flex justify-center items-center">
            <svg aria-hidden="true" class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-blue-300 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>

    ` ; 
    button.innerHTML = spinner ; 
    button.setAttribute('disabled' , true) ; 
    password.setAttribute('disabled' , true) ; 
    passwordRe.setAttribute('disabled' , true) ; 
    button.style.opacity = ".7" ;
    password.style.opacity = ".7" ;
    passwordRe.style.opacity = ".7" ;
    
   

}

function send_verify_Unloading() {

    let button = document.querySelector('#auth-btn');
    let email = document.querySelector('#code');
    
    spinner = 
    `
    <span class = "text-white" >
     Send
    </span>
    ` ; 
    button.removeAttribute('disabled' , true) ; 
    email.removeAttribute('disabled' , true) ; 
    button.style.opacity = "1" ;
    email.style.opacity = "1" ;

    button.innerHTML = spinner ; 

}

function send_new_password_Unloading() {

    
    let button = document.querySelector('#auth-btn');
    let password = document.querySelector('#new-password');
    let passwordRe = document.querySelector('#re-password');
    
    spinner = 
    `
    <span class = "text-white" >
     Send
    </span>
    ` ; 
    button.removeAttribute('disabled' , true) ; 
    password.removeAttribute('disabled' , true) ; 
    passwordRe.removeAttribute('disabled' , true) ; 
    button.style.opacity = "1" ;
    password.style.opacity = "1" ;
    passwordRe.style.opacity = "1" ;

    button.innerHTML = spinner ; 

}
function send_reset_Unloading() {

    let button = document.querySelector('#auth-btn');
    let email = document.querySelector('#email');
    
    spinner = 
    `
    <span class = "text-white" >
     Send
    </span>
    ` ; 
    button.removeAttribute('disabled' , true) ; 
    email.removeAttribute('disabled' , true) ; 
    button.style.opacity = "1" ;
    email.style.opacity = "1" ;

    button.innerHTML = spinner ; 

}