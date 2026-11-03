import { initIntro } from './intro.js';
import { initWave } from './wave.js';

function initScrollReveal() {
    const elements = document.querySelectorAll('[data-reveal]');

    if (!elements.length) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -40px 0px' },
    );

    elements.forEach((el) => observer.observe(el));
}

function initActiveNav() {
    const navLinks = document.querySelectorAll('.nav-link[data-section]');

    if (!navLinks.length) {
        return;
    }

    const sections = document.querySelectorAll('section[id]');

    if (sections.length) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        navLinks.forEach((link) => {
                            link.classList.toggle('is-active', link.dataset.section === entry.target.id);
                        });
                    }
                });
            },
            { threshold: 0.3, rootMargin: '-20% 0px -60% 0px' },
        );

        sections.forEach((section) => observer.observe(section));

        return;
    }

    const path = window.location.pathname.replace(/\/$/, '') || '/';

    navLinks.forEach((link) => {
        const href = link.getAttribute('href');

        if (!href) {
            return;
        }

        try {
            const linkPath = new URL(href, window.location.origin).pathname.replace(/\/$/, '') || '/';
            link.classList.toggle('is-active', linkPath === path);
        } catch {
            // ignore invalid href
        }
    });
}

function initFaq() {
    document.querySelectorAll('.faq-item').forEach((item) => {
        const trigger = item.querySelector('.faq-trigger');

        if (!trigger) {
            return;
        }

        trigger.addEventListener('click', () => {
            const isOpen = item.classList.contains('is-open');

            document.querySelectorAll('.faq-item.is-open').forEach((openItem) => {
                if (openItem !== item) {
                    openItem.classList.remove('is-open');
                    openItem.querySelector('.faq-trigger')?.setAttribute('aria-expanded', 'false');
                }
            });

            item.classList.toggle('is-open', !isOpen);
            trigger.setAttribute('aria-expanded', String(!isOpen));
        });
    });
}

function initMobileMenu() {
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    if (!btn || !menu) {
        return;
    }

    const open = () => {
        menu.classList.add('is-open');
        btn.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    };

    const close = () => {
        menu.classList.remove('is-open');
        btn.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    };

    btn.addEventListener('click', () => {
        if (menu.classList.contains('is-open')) {
            close();
        } else {
            open();
        }
    });

    menu.querySelectorAll('a').forEach((link) => link.addEventListener('click', close));

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
            close();
        }
    });
}

function initHeaderScroll() {
    const header = document.getElementById('site-header');

    if (!header) {
        return;
    }

    const onScroll = () => {
        header.classList.toggle('header-scrolled', window.scrollY > 20);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

function initSmoothAnchorScroll() {
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (event) => {
            const href = anchor.getAttribute('href');

            if (!href || href === '#') {
                return;
            }

            const target = document.querySelector(href);

            if (!target) {
                return;
            }

            event.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            history.pushState(null, '', href);
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initWave();

    initIntro(() => {
        initScrollReveal();
        initActiveNav();
        initFaq();
        initMobileMenu();
        initHeaderScroll();
        initSmoothAnchorScroll();
    });
});
