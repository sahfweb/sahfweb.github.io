/***const carousel = document.querySelector('.carousel');
firstImg = carousel.querySelectorAll("img")[0];
arrOwIcons = document.querySelectorAll('.wrapper i');

let isDragstart = false, prevpageX, prevScrollLeft;
let firstImgwidth = firstImg.clientWidth + 0;


arrOwIcons.forEach(icon => {
    icon.addEventListener("click", () =>{
        carousel.scrollLeft += icon.id == "left" ? -firstImgwidth : firstImgwidth;
    });
});

const dragStart = (e) =>{
    isDragstart = true;
    prevpageX = e.pageX;
    prevScrollLeft = carousel.scrollLeft;
}
const dragging = (e) =>{
    if(!isDragstart)return;
    e.preventDefault();
    carousel.classList.add('dragging');
    let positionDiff = e.pageX - prevpageX;
    carousel.scrollLeft = prevScrollLeft - positionDiff ;
   
}

const dragStop = () =>{
    isDragstart = false;
    carousel.classList.remove('dragging');
}

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
carousel.addEventListener("mouseup", dragStop);  ***/



$(document).ready(function(){
    $( ' #owl_car1 .owl-carousel').owlCarousel({
        items: 4,
        margin:10,
        loop:true,
        nav: true,
        autoplay:true,
        autoplayTimeout:5000,
        dots:false,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            768:{
                items:1,
                nav:true
            }
        }

    });
    
})





