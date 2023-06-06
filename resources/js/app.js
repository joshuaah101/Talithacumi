require('./bootstrap');

import 'flowbite'

document.addEventListener("DOMContentLoaded", () => {

//mobile menu toggle
const btnMenu = document.getElementById('btn-menu')
const closeMobileMenu = document.getElementById('close')
const mobileMenu = document.getElementById('mobile-menu')

if(btnMenu){
    btnMenu.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden')
    })
}
if(closeMobileMenu){
    closeMobileMenu.addEventListener('click', () => {
        mobileMenu.classList.add('hidden')
    })
}


})

