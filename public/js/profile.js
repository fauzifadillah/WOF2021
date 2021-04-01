const form = document.getElementById('PROFILE');
const name = document.getElementById('name');

form.addEventListener('submit', (e) => {
    e.preventDefault()

    checkInputs();
})

function checkInputs() {
    const nameValue = current.value.trim();

    if (nameValue === '') {
        setErrorFor(Name, 'Name cannot be blank')
    } else {
        setSuccessFor(Name);
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