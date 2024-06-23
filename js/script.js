// debut menu hamburger
const hamburger = document.querySelector(".hamburger") ;
const navmenu = document.querySelector(".navbars-menu") ;
const lien=document.querySelectorAll(".navbars-menu a")

hamburger.addEventListener('click', ()=>{

    hamburger.classList.toggle('active');
    navmenu.classList.toggle('active');
});

array.forEach(lien => {lien.addEventListener('click',()=>{
     navmenu.remove('active')
})
    
});


//fin menu hamburger


//  caroussel

document.addEventListener("DOMContentLoaded", function() {
    const slides = document.querySelectorAll(".slide");
    let currentSlide = 0;

    function nextSlide() {
        slides[currentSlide].classList.remove("active");
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add("active");
    }

    setInterval(nextSlide, 5000); // Change d'image toutes les 5 secondes
});
