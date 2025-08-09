import '../css/style.css';
import "@iconify/iconify";
import Glide from '@glidejs/glide';

document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.glide')) {
        new Glide('.testimonials-carousel', {
            type: 'carousel',
            perView: 3,
            gap: 32,
            autoplay: 5000,
            breakpoints: {
                768: {
                    perView: 1
                },
                1024: {
                    perView: 2
                },
                1280: {
                    perView: 3
                }
            }
        }).mount();
    }

    const menuButton = document.querySelector('[data-menu-button]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    const mobileOverlay = document.querySelector('[data-overlay]');
    const closeMenuButton = document.querySelector('[data-close-menu]');
    const submenuToggles = document.querySelectorAll('[data-submenu-toggle]');
    let isMenuOpen = false;
    
    function toggleMobileMenu() {
        isMenuOpen = !isMenuOpen;
        
        if (isMenuOpen) {
            mobileMenu.classList.remove('translate-x-full');
            mobileMenu.classList.add('translate-x-0');
            mobileOverlay.classList.remove('opacity-0', 'pointer-events-none');
            mobileOverlay.classList.add('opacity-100', 'pointer-events-auto');
            menuButton.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
        } else {
            mobileMenu.classList.remove('translate-x-0');
            mobileMenu.classList.add('translate-x-full');
            mobileOverlay.classList.remove('opacity-100', 'pointer-events-auto');
            mobileOverlay.classList.add('opacity-0', 'pointer-events-none');
            menuButton.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
            
            document.querySelectorAll('[data-submenu]').forEach(submenu => {
                submenu.style.maxHeight = '0';
                const toggle = document.querySelector(`[data-submenu-toggle="${submenu.dataset.submenu}"] .iconify`);
                if (toggle) {
                    toggle.style.transform = 'rotate(0deg)';
                }
            });
        }
    }
    
    function closeMobileMenu() {
        if (isMenuOpen) {
            toggleMobileMenu();
        }
    }
    
    function toggleSubmenu(index) {
        const submenu = document.querySelector(`[data-submenu="${index}"]`);
        const toggle = document.querySelector(`[data-submenu-toggle="${index}"] .iconify`);
        
        if (submenu && toggle) {
            const isOpen = submenu.style.maxHeight && submenu.style.maxHeight !== '0px';
            
            if (isOpen) {
                submenu.style.maxHeight = '0';
                toggle.style.transform = 'rotate(0deg)';
                toggle.parentElement.setAttribute('aria-expanded', 'false');
            } else {
                submenu.style.maxHeight = submenu.scrollHeight + 'px';
                toggle.style.transform = 'rotate(180deg)';
                toggle.parentElement.setAttribute('aria-expanded', 'true');
            }
        }
    }
    
    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', function(e) {
            e.preventDefault();
            toggleMobileMenu();
        });
        
        if (closeMenuButton) {
            closeMenuButton.addEventListener('click', function(e) {
                e.preventDefault();
                closeMobileMenu();
            });
        }
        
        if (mobileOverlay) {
            mobileOverlay.addEventListener('click', function(e) {
                e.preventDefault();
                closeMobileMenu();
            });
        }
        
        submenuToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const index = this.dataset.submenuToggle;
                toggleSubmenu(index);
            });
        });
        
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (isMenuOpen) {
                    closeMobileMenu();
                }
            });
        });
        
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024 && isMenuOpen) {
                closeMobileMenu();
            }
        });
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isMenuOpen) {
                closeMobileMenu();
            }
        });
    }
});

export default {};