document.addEventListener('DOMContentLoaded', function () {
    const menuButton = document.querySelector('.mobile-menu-button');
    const menu = document.querySelector('.mobile-menu');
    const burgerIcon = document.querySelector('.burger-icon');
    const closeIcon = document.querySelector('.close-icon');

    menuButton.addEventListener('click', function () {
        menu.classList.toggle('hidden');
        burgerIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
});
