const form = document.getElementById('login');
const email = document.getElementById('email');
const password = document.getElementById('password');

form.addEventListener('submit', (e) => {
    checkInputs();
})

function checkInputs() {
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();

    if (emailValue === '') {
        e.preventDefault()
        setErrorFor(email, 'Email cannot be blank')
    } else {
        setSuccessFor(email);
    }

    if (passwordValue === '') {
        e.preventDefault()
        setErrorFor(password, 'Password cannot be blank')
    } else {
        setSuccessFor(password);
    }
}

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