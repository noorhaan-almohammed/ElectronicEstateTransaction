const menuToggel = document.getElementById('openMenu');
const mobileMenu = document.getElementById('mobileMenu');

menuToggel.onclick = (e) => {

    if (e.target.className.includes('menu')) {
        mobileMenu.style.display = 'block';
        e.target.className = 'bx bx-x'
    } else {
        mobileMenu.style.display = 'none';
        e.target.className = 'bx bx-menu-alt-left'
    }
}