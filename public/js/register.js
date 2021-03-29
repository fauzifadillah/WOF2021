const form = document.getElementById('register');
const username = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirmPass = document.getElementById('confirm');

form.addEventListener('submit', (e) => {
    const nameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const confirmValue = confirmPass.value.trim()

    if (nameValue === '' || emailValue === '' || passwordValue === '' || confirmValue === '') {
        e.preventDefault()
        if (nameValue === '') {
            setErrorFor(username, 'Name cannot be blank')
        } else {
            setSuccessFor(username);
        }
    
        if (emailValue === '') {
            setErrorFor(email, 'Email cannot be blank')
        } else {
            setSuccessFor(email);
        }
    
        if (passwordValue === '') {
            setErrorFor(password, 'Password cannot be blank')
        } else {
            setSuccessFor(password);
        }
    
        if (confirmValue === '') {
            setErrorFor(confirmPass, 'Confirm password cannot be blank')
        }  else if (passwordValue !== confirmValue) {
            setErrorFor(confirmPass, 'Passwords does not match')
        }
        else {
            setSuccessFor(confirmPass);
        }
    }
    else{
        if($('#name').parent('.form-control').hasClass('error')){
            $('#name').parent('.form-control').removeClass('error');
        }
        if($('#name').parent('.form-control').hasClass('success')){
            $('#name').parent('.form-control').removeClass('success');
        }
        if($('#email').parent('.form-control').hasClass('error')){
            $('#email').parent('.form-control').removeClass('error');
        }
        if($('#email').parent('.form-control').hasClass('success')){
            $('#email').parent('.form-control').removeClass('success');
        }
        if($('#password').parent('.form-control').hasClass('error')){
            $('#password').parent('.form-control').removeClass('error');
        }
        if($('#password').parent('.form-control').hasClass('success')){
            $('#password').parent('.form-control').removeClass('success');
        }
        if($('#confirm').parent('.form-control').hasClass('error')){
            $('#confirm').parent('.form-control').removeClass('error');
        }
        if($('#confirm').parent('.form-control').hasClass('success')){
            $('#confirm').parent('.form-control').removeClass('success');
        }
    }
})

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

$('#name').keypress(function(){
    if($('#name').parent('.form-control').hasClass('error')){
        $('#name').parent('.form-control').removeClass('error');
    }
    if($('#name').parent('.form-control').hasClass('success')){
        $('#name').parent('.form-control').removeClass('success');
    }
})

$('#email').keypress(function(){
    if($('#email').parent('.form-control').hasClass('error')){
        $('#email').parent('.form-control').removeClass('error');
    }
    if($('#email').parent('.form-control').hasClass('success')){
        $('#email').parent('.form-control').removeClass('success');
    }
})

$('#password').keypress(function(){
    if($('#password').parent('.form-control').hasClass('error')){
        $('#password').parent('.form-control').removeClass('error');
    }
    if($('#password').parent('.form-control').hasClass('success')){
        $('#password').parent('.form-control').removeClass('success');
    }
})

$('#confirm').keypress(function(){
    if($('#confirm').parent('.form-control').hasClass('error')){
        $('#confirm').parent('.form-control').removeClass('error');
    }
    if($('#confirm').parent('.form-control').hasClass('success')){
        $('#confirm').parent('.form-control').removeClass('success');
    }
})