let hideScroll = window.pageYOffset;
let currentScrollPos = window.pageYOffset
let nav = document.querySelector("nav")
addEventListener('scroll', () => {
    if (hideScroll < window.pageYOffset && !nav.classList.contains('sembunyi')) {
        nav.classList.add('sembunyi')
    }
    else if (hideScroll > window.pageYOffset && nav.classList.contains('sembunyi')) {
        nav.classList.remove('sembunyi')
    }
    currentScrollPos = window.pageYOffset
    hideScroll = currentScrollPos;
}) 