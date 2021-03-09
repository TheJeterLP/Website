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

document.addEventListener('DOMContentLoaded', function () {
    particlesJS.load('particles-js', 'https://www.thejeterlp.dev/js/particlesjs-config.json', function () {
        return console.log('Particles.js config loaded');
    });
});





