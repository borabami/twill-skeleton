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

document.addEventListener('DOMContentLoaded', function () {
    
    const clickableTitles = document.querySelectorAll('.children-link');

    clickableTitles.forEach(function(clickableTitle) {
        clickableTitle.addEventListener('click', function () {

            const menuId = clickableTitle.parentElement.querySelector('nav').id;
            const navMenu = document.getElementById(menuId);

            const downIcon = clickableTitle.querySelector('.menu-down');
            const upIcon = clickableTitle.querySelector('.menu-up');

            if (navMenu) {
                navMenu.classList.toggle('hidden');
                downIcon.classList.toggle('hidden');
                upIcon.classList.toggle('hidden');
            }
        });
    });
});
