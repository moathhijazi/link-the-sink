function toggleDropdown() {
    let dorpdown = document.querySelector("#dropdown") ; 

    dorpdown.classList.toggle('hidden') ; 
}

function check_type() {
   
    let select = document.querySelector('#type') ; 
    let pushed = document.querySelector('#pushed') ; 
    const payload = `
    
    <div class="my-2 flex flex-col">
        <label for="type" class="">LinkedIn profile link</label>
        <input type = 'text' id = 'linkedin' class="w-full border border-gray-300 h-12 focus:outline-none px-3 mt-2" required>

    </div>
    <div class="my-2 flex flex-col">
        <label for="type" class="">Github profile link</label>
        <input type = 'text' id = 'github' class="w-full border border-gray-300 h-12 focus:outline-none px-3 mt-2" required>

    </div>
    <div class="my-2 flex flex-col">
        <label for="type" class="">Cv *(PDF files only)</label>
        <input type = 'file' id = 'cv' accept = 'application/pdf' class="w-full border border-gray-300 h-12 focus:outline-none px-3 mt-2 flex justify-center items-center pt-2" required>

    </div>
`;
    if(select.value == 'jobseeker') {
        pushed.innerHTML = payload ; 
    }else{
        pushed.innerHTML = '' ; 
    }
}

function image_change() {
    let image = document.querySelector('#image');
    let formChange = document.querySelector('#form-change');
    image.addEventListener('mouseover' , () => {
        document.querySelector('#image-changer').classList.toggle('hidden') ; 
    })
    image.addEventListener('mouseout' , () => {
        document.querySelector('#image-changer').classList.toggle('hidden') ; 
    })
    formChange.addEventListener('change' , () => {
        formChange.submit() ; 
    })

}image_change()


function addSkill() {
    let skillsInput = document.querySelector("#skills-input") ; 
    let father = document.querySelector('#skills') ; 
    let payload = ` 
    <button  class="py-2 px-6 text-white cursor-default transition mt-3" style="background : var(--blue) ;">
        <span>
            ${skillsInput.value}
            
            <i class="fa-solid fa-tag ml-2"></i>
        </span>
    </button>` ; 
    if(skillsInput.value != '') {
        father.innerHTML = father.innerHTML + payload ; 
        sendAPItoSkills() ; 
    }
    


}

function sendAPItoSkills() {
    let skillsInput = document.querySelector("#skills-input") ; 
    $.ajax({
        url : "api/skills" , 
        type : "POST" , 
        data : {

            skill : skillsInput.value
        } , 
        success : () => {
            skillsInput.value = ''
        },
        error : (err) => {
            console.log(err);
        }
    })
}