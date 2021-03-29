const form = document.getElementById('login');
const email = document.getElementById('email');
const password = document.getElementById('password');

form.addEventListener('submit', (e) => {
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();

    if (emailValue === '' || passwordValue === ''){
        e.preventDefault()
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
    }
    else{
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