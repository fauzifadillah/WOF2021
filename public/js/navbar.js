const burger = document.querySelector('.navbar__hamburger img')
const burgerActive = document.querySelector('.navbar__content')
const closed = document.querySelector('.navbar__content__close img')

burger.onclick = function() {
    burgerActive.classList.add('nav-active');
}
closed.onclick = function() {
    burgerActive.classList.remove('nav-active');
}