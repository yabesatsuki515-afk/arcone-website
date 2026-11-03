/**
 * Opening animation splash — enhanced arc-one-opening.html.
 */
export function initIntro(onComplete) {
    const splash = document.getElementById('intro-splash');
    const siteContent = document.getElementById('site-content');
    const frame = document.getElementById('intro-frame');

    if (!splash) {
        document.documentElement.classList.remove('intro-pending');
        siteContent?.classList.add('is-visible');
        onComplete?.();

        return;
    }

    let finished = false;
    let autoTimer = null;

    document.body.classList.add('intro-active');

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function revealSite() {
        document.documentElement.classList.remove('intro-pending');
        siteContent?.classList.add('is-visible');
    }

    function finish() {
        if (finished) {
            return;
        }

        finished = true;

        if (autoTimer) {
            clearTimeout(autoTimer);
        }

        removeInteractionListeners();
        window.removeEventListener('message', onMessage);

        splash.classList.add('is-exiting');
        revealSite();
        window.scrollTo(0, 0);

        setTimeout(() => {
            document.body.classList.remove('intro-active');
            splash.remove();
            window.scrollTo(0, 0);
            onComplete?.();
        }, 900);
    }

    function onUserIntent(event) {
        if (finished) {
            return;
        }

        if (event.type === 'keydown') {
            const dismissKeys = ['Enter', ' ', 'Escape', 'ArrowDown', 'ArrowUp', 'PageDown', 'PageUp'];

            if (!dismissKeys.includes(event.key)) {
                return;
            }
        }

        finish();
    }

    function onMessage(event) {
        if (event.origin !== window.location.origin) {
            return;
        }

        if (event.data?.type === 'arc-one-opening-dismiss') {
            finish();
        }
    }

    function removeInteractionListeners() {
        interactionEvents.forEach((type) => {
            window.removeEventListener(type, onUserIntent, interactionOptions);
            document.removeEventListener(type, onUserIntent, interactionOptions);
            splash.removeEventListener(type, onUserIntent, interactionOptions);
            frame?.removeEventListener(type, onUserIntent, interactionOptions);
        });
    }

    const interactionEvents = ['wheel', 'touchstart', 'touchmove', 'touchend', 'pointerdown', 'keydown', 'scroll', 'click'];
    const interactionOptions = { passive: true, capture: true };

    interactionEvents.forEach((type) => {
        window.addEventListener(type, onUserIntent, interactionOptions);
        document.addEventListener(type, onUserIntent, interactionOptions);
        splash.addEventListener(type, onUserIntent, interactionOptions);
        frame?.addEventListener(type, onUserIntent, interactionOptions);
    });

    window.addEventListener('message', onMessage);

    autoTimer = setTimeout(finish, prefersReducedMotion ? 900 : 7500);
}
