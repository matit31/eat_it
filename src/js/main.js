import $ from 'jquery';
import 'bootstrap';
import 'owl.carousel';

$(document).ready(function() {
    $('.carousel-news').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });
});