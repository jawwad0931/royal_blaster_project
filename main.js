const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click", function(){
    document.querySelector("#sidebar").classList.toggle("collapsed");
});

document.querySelector(".theme-toggle").addEventListener("click", ()=> {
    toggleLocalStrorage();
    toggleRootClass();
});

function toggleRootClass() {
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme', inverted);    
}

function toggleLocalStrorage(){
    if(isLight()){
        localStorage.removeItem("item");
    }else{
        localStorage.setItem("light", "set");
    }
}

function isLight(){
    return localStorage.getItem("light");
}

if(isLight()){
    toggleRootClass();
}

function closeCard(button){
    const card = button.closest('.card');
    card.remove();
}


// form validation script code
//  Example starter JavaScript for disabling form submissions if there are invalid fields
 (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()


function checkPasswordLength(input) {
    var password = input.value;
    var passwordHelpBlock = document.getElementById("passwordHelpBlock");

    if (password.length >= 8) {
        passwordHelpBlock.style.display = "none"; // Hide the validation message
    } else {
        passwordHelpBlock.style.display = "block"; // Show the validation message
    }
}