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

//Initialize the Slick Carousel
$(function(){
    $('.slider').slick({
        slidesToShow: 4, // Number of slides to show on desktop
        slidesToScroll: 3,
        dots: false,
        swipe: true,
        cssEase: 'ease',
        swipeToSlide: true,
        arrows: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1, // Number of slides to show on mobile
                    slidesToScroll: 1,
                }
            }
        ]
    });
});

