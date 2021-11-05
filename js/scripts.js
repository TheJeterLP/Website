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
        "popup": {"background": "#3c404d", "text": "#d6d6d6"},
        "button": {"background": "#8769c3"}},
    "theme": "edgeless",
    "position": "top",
    "content": {
        "message": "Diese Webseite verwendet Cookies, um Ihnen ein angenehmeres Surfen zu ermöglichen.",
        "dismiss": "Akzeptieren",
        "link": "Mehr erfahren",
        "href": "/datenschutz"
    }
});







