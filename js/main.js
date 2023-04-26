
$(document).ready(function () {
    //Owl
    $('.hero-slider').owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        navText: ['PREV', 'NEXT'],
        smartSpeed: 1000,
        autoplay: true,
        autoplayTimeout: 7000,
        responsive: {
            0: {
                nav: false,
            },
            768: {
                nav: true,
            }
        }
    })

    // Our Experties

    $('#projects-slider').owlCarousel({
        loop: true,
        nav: false,
        items: 2,
        dots: false,
        smartSpeed: 600,
        center: true,
        autoplay: false,
        autoplayTimeout: 4000,
        responsive: {
            0: {
                items: 1,
                
            },
            768: {
                items: 2,
                margin: 8,
            }
        }
    })

    $('.reviews-slider').owlCarousel({
        loop: true,
        nav: true,
        navText: ['<', '>'],
        dots:false,
        smartSpeed: 900,
        items: 1,
        margin: 24,
        autoplay:false,
        autoplayTimeout: 4000,
    })
});
    
