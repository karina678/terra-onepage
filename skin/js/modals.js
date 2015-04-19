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

    /**
     * All elements that are used to open a modal.
     */
    var modalTriggers;

    /**
     * The currently open modal.
     */
    var modal;

    /**
     * Overlay to hide main content.
     */
    var overlay;

    /**
     * Flag variable.
     * @type {boolean}
     */
    var modalOpen = false;

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
        // dataset property IE11+
        modal = document.getElementById(lastFocus.dataset.modal);
        modalOpen = true;
        modal.setAttribute('aria-hidden', 'false');
        modal.setAttribute('role', 'dialog');

        // Create overlay.
        overlay = document.createElement('div');
        // classList property IE10+
        overlay.classList.add('modal-overlay');
        document.body.appendChild(overlay);

        // Set focus to the modal and keep it there as long as it is active.
        modal.setAttribute('tabindex', '0');
        modal.focus();
        keepFocus();

        // Handle closing.
        var closeButton = modal.querySelectorAll('.modal-close').item(0);
        closeButton.addEventListener('click', modalClose, false);
        modal.addEventListener('keydown', modalClose, false);
    };

    var modalClose = function(event) {
        if (event.type === 'click' || !event.keyCode || event.keyCode === 27) {
            // Remove focus from modal.
            modal.removeAttribute('tabindex');
            // Set focus on last focused element in the main content.
            lastFocus.focus();
            modalOpen = false;
            modal.setAttribute('aria-hidden', 'true');
            modal.removeAttribute('role');
            // Remove overlay.
            document.body.removeChild(overlay);
        }
    };

    /**
     * Prevents tabbing out of active modal.
     *
     * @param event
     */
    var keepFocus = function(event) {
        document.addEventListener('focus', function(event) {
            if (modalOpen && !modal.contains(event.target)) {
                event.stopPropagation();
                modal.focus();
            }
        }, true);
    };
}