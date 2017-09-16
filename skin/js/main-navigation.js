/**
 * Created by Karina Hinkelthein
 * 16.09.2017
 *
 * Handle main navigation functionality.
 */

(function() {
    var MainNav = {
        mainNav: null,
        navToggler: null,
        toggleClassName: 'open',

        init: function() {
            // Define DOM elements:
            MainNav.mainNav = document.getElementById('main-nav');
            MainNav.navToggler = document.querySelector('[data-toggle="main-navigation"]');

            // Bind events:
            MainNav.navToggler.addEventListener('click', MainNav.toggleNavState, false);
        },

        toggleNavState: function(event) {
            event.currentTarget.classList.toggle(MainNav.toggleClassName);
            MainNav.mainNav.classList.toggle(MainNav.toggleClassName);
        }
    };

    window.addEventListener('load', MainNav.init, false);
})();