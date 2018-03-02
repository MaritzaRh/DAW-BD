$(document).ready(function () {
    $(".button-collapse").sideNav();
    $('.slider').slider({
        indicators: false,
        interval: 10000
    });
    $(".dropdown-button").dropdown({
        hover: true
    });
    $('.modal').modal();
});

