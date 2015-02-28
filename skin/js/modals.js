/**
 * Created by Karina Hinkelthein
 * 28.02.2015
 */

var modal = new Modal();
window.onload = modal.init;

function Modal() {
    /**
     * The last focused element before opening the modal - generally the trigger element.
     */
    var lastFocus;

    var modalTriggers;

    this.init = function() {
        modalTriggers = document.querySelectorAll('[data-trigger="modal"]');
        setListeners(modalTriggers);
    };

    var setListeners = function(elements) {
        for (var i = 0; i < elements.length; ++i) {
            elements[i].addEventListener('click', modalShow, false);
        }
    };

    var modalShow = function() {
        lastFocus = document.activeElement;
        console.log(lastFocus);
    };

    var modalClose = function() {
        // Set focus on last focused element in the main content.
        lastFocus.focus();
    };
};