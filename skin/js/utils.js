/**
 * Created by Karina Hinkelthein
 * 14.01.2015
 */

window.addEventListener('load', initPage, false);

function initPage() {
    // Init smooth scrolling.
    var linkElements = document.querySelectorAll('a[href^="#"]');
    for (var i = 0; i < linkElements.length; i++) {
        linkElements[i].addEventListener('click', smoothScroll, false);
    }
}

function smoothScroll() {
    // Only execute if link target belongs to the same page.
    if ((location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')) && (location.hostname == this.hostname)) {
        var targetId = this.hash.replace('#', '');
        var target = document.getElementById(targetId);

        var speed = 500;
        var movingFrequency = 15;
        var hopCount = speed/movingFrequency;
        var startTop = 0;
        var targetTop = target.offsetTop;
        var gap = (targetTop - startTop) / hopCount;

        for (var i = 1; i <= hopCount; i++) {
            (function() {
                var hopTopPosition = gap * i;
                setTimeout(function() {
                    window.scrollTo(0, hopTopPosition + startTop);
                }, movingFrequency * i);
            })();
        }

        return false;
    }
}