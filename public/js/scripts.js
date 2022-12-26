(function () {
    var burger = document.querySelector('.burger');
    var menu = document.querySelector('#' + burger.dataset.target);
    burger.addEventListener('click', function () {
        burger.classList.toggle('is-active');
        menu.classList.toggle('is-active');
    });
})();

document.addEventListener('DOMContentLoaded', () => {
    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
        $notification = $delete.parentNode;
        $delete.addEventListener('click', () => {
            jQuery($notification).fadeOut().promise();
        });
    });
});

window.cookieconsent.initialise({
    "palette": {
        "popup": {
            "background": "#252e39"
        },
        "button": {
            "background": "#14a7d0"
        }
    },
    "position": "top",
    "static": true
});

window.onload = async function () {
    Particles.init({ 
        selector: '.background' ,
        maxParticles: 200,
        connectParticles: true,
        responsive: [
            {
              breakpoint: 768,
              options: {
                maxParticles: 200,
              }
            }, {
              breakpoint: 425,
              options: {
                maxParticles: 100,
              }
            }, {
              breakpoint: 320,
              options: {
                maxParticles: 0
                // disables particles.js
              }
            }
          ]
    });
};