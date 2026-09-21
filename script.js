console.info('portfolio script.js v3 loaded');
const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/* ========== Mobile menu ========== */
const menuIcon = document.querySelector('#menu-icon');
const navLinks = document.querySelector('.nav-links');

menuIcon.onclick = () => {
    navLinks.classList.toggle('active');
};

// close the menu after clicking a link
navLinks.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => navLinks.classList.remove('active'));
});

/* ========== Toast messages ========== */
const toastContainer = document.querySelector('#toast-container');

function showToast(type, message) {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;

    const icon = document.createElement('i');
    icon.className = type === 'success'
        ? 'fa-solid fa-circle-check'
        : 'fa-solid fa-circle-exclamation';

    const text = document.createElement('span');
    text.textContent = message;

    toast.append(icon, text);
    toastContainer.appendChild(toast);

    // the CSS animation (toastIn -> toastOut) lasts about 4s, then remove the element
    setTimeout(() => toast.remove(), 4200);
}

/* ========== Contact form (Formspree) ==========
   Flow: send in the background -> on success store the result,
   refresh the page -> after the refresh show the snackbar. */
const form = document.querySelector('#contact-form');
const submitBtn = document.querySelector('#submit-btn');
const STATUS_KEY = 'contactStatus';

function reloadPage() {
    window.location.reload();
}

form.addEventListener('submit', async (e) => {
    // stop the browser from navigating to the Formspree "thank you" page
    e.preventDefault();

    if (form.action.includes('YOUR_FORM_ID')) {
        showToast('danger', 'Contact form is not configured yet.');
        return;
    }

    const originalText = submitBtn.textContent;
    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending...';

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: { Accept: 'application/json' },
        });

        if (response.ok) {
            // remember the result, refresh, and show it after the reload
            sessionStorage.setItem(STATUS_KEY, JSON.stringify({
                type: 'success',
                message: 'Your message has been sent successfully!',
            }));
            reloadPage();
            return; // keep the button disabled until the page reloads
        }

        // failed: stay on the page so the visitor doesn't lose what they typed
        let msg = 'Please check the entered data.';
        try {
            const data = await response.json();
            if (data.errors && data.errors.length) {
                msg = data.errors.map((err) => err.message).join(', ');
            }
        } catch (_) { /* keep default message */ }
        showToast('danger', msg);
    } catch (error) {
        showToast('danger', 'Network error. Please try again.');
    }

    submitBtn.disabled = false;
    submitBtn.textContent = originalText;
});

// after the refresh: show the stored result once
(function showStoredStatus() {
    let saved = null;
    try {
        saved = JSON.parse(sessionStorage.getItem(STATUS_KEY));
        sessionStorage.removeItem(STATUS_KEY);
    } catch (_) { /* storage blocked: nothing to show */ }

    if (saved && saved.message) {
        document.querySelector('#contact').scrollIntoView();
        setTimeout(() => showToast(saved.type, saved.message), 400);
    }
})();

/* ========== Scroll progress bar + header state ========== */
const progressBar = document.querySelector('#scroll-progress');
const header = document.querySelector('header');

function onScroll() {
    const scrollTop = window.scrollY;
    const height = document.documentElement.scrollHeight - window.innerHeight;
    const progress = height > 0 ? scrollTop / height : 0;

    progressBar.style.transform = `scaleX(${progress})`;
    header.classList.toggle('scrolled', scrollTop > 50);
}
window.addEventListener('scroll', onScroll, { passive: true });
onScroll();

/* ========== Highlight the current section in the nav ========== */
const sections = document.querySelectorAll('section[id]');
const spy = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            navLinks.querySelectorAll('a').forEach((a) => {
                a.classList.toggle('active', a.getAttribute('href') === `#${entry.target.id}`);
            });
        }
    });
}, { rootMargin: '-40% 0px -55% 0px' });
sections.forEach((section) => spy.observe(section));

/* ========== Reveal on scroll ========== */
if (!reduceMotion) {
    const targets = document.querySelectorAll(
        '.section-title, .grid-card, .project-card, .experience-info > img, #contact-form'
    );

    const reveal = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                observer.unobserve(entry.target); // animate once
            }
        });
    }, { threshold: 0.15 });

    targets.forEach((el) => {
        el.classList.add('reveal');
        if (el.matches('.experience-info > img')) el.classList.add('from-right');

        // small stagger between siblings (cards inside the same grid)
        const siblings = el.parentElement.querySelectorAll(`:scope > .${el.classList[0]}`);
        const index = Array.prototype.indexOf.call(siblings, el);
        el.style.setProperty('--d', `${Math.max(index, 0) * 0.12}s`);

        reveal.observe(el);
    });
}

/* ========== Typing effect for the role ========== */
const role = document.querySelector('#typed-role');

if (role && !reduceMotion) {
    const words = role.dataset.words.split('|');
    let wordIndex = 0;
    let charIndex = 0;
    let deleting = false;

    function type() {
        const word = words[wordIndex];
        role.textContent = word.slice(0, charIndex);

        let delay = deleting ? 40 : 90;

        if (!deleting && charIndex === word.length) {
            delay = 1800;            // pause on the full word
            deleting = true;
        } else if (deleting && charIndex === 0) {
            deleting = false;
            wordIndex = (wordIndex + 1) % words.length;
            delay = 400;
        }

        charIndex += deleting ? -1 : 1;
        setTimeout(type, delay);
    }

    role.textContent = '';
    setTimeout(type, 1000);          // start after the hero entrance
}