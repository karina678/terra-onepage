/**
 * Created by Karina Hinkelthein
 * 14.01.2015
 */

/*$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
        || location.hostname == this.hostname) {

        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    }
});*/

window.onload = initPage;

function initPage() {
    var linkElements = document.querySelectorAll('a[href^="#"]');

    for (var i = 0; i < linkElements.length; i++) {
        linkElements[i].addEventListener('click', smoothScroll, false);
    }
}

function smoothScroll() {
    var targetId = this.hash.replace('#', '');
    var target = document.getElementById(targetId);
    console.log(target);
}