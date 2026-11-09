/**
 * main.js — JavaScript Utama SMA Negeri 1 Kota Kediri (SMAST)
 * Covers: Light/Dark Mode Toggle, Navbar, Hero Slideshow, Stats Count-Up, Ticker, Scroll Reveal,
 *         Lightbox, Gallery Filter, Contact Validation, Page Transitions
 */

document.addEventListener('DOMContentLoaded', function () {

    // ─── 0. LIGHT / DARK MODE TOGGLE ─────────────────────────────────────────
    var themeToggleBtns = [
        document.getElementById('theme-toggle'),
        document.getElementById('theme-toggle-mobile')
    ];

    function updateThemeIcons(theme) {
        var isDark = (theme === 'dark');
        var icons = document.querySelectorAll('#theme-icon, #theme-icon-mobile');
        icons.forEach(function (ic) {
            if (isDark) {
                ic.classList.remove('fa-moon');
                ic.classList.add('fa-sun');
            } else {
                ic.classList.remove('fa-sun');
                ic.classList.add('fa-moon');
            }
        });
    }

    function setTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        localStorage.setItem('smast-theme', theme);
        updateThemeIcons(theme);
    }

    // Init theme icon state on load
    var currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
    updateThemeIcons(currentTheme);

    themeToggleBtns.forEach(function (btn) {
        if (!btn) return;
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            var active = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
            setTheme(active);
        });
    });

    if (window.matchMedia) {
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function (e) {
            if (!localStorage.getItem('smast-theme')) {
                setTheme(e.matches ? 'dark' : 'light');
            }
        });
    }

    // ─── 1. NAVBAR SCROLL ──────────────────────────────────────────────────
    var navbar = document.getElementById('smast-navbar');
    if (navbar) {
        window.addEventListener('scroll', function () {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        }, { passive: true });
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    }

    // ─── 2. HAMBURGER MOBILE MENU (DASHBOARD DRAWER) ─────────────────────────
    var ham      = document.getElementById('smast-hamburger');
    var mob      = document.getElementById('smast-mobile-nav');
    var mobClose = document.getElementById('mobile-drawer-close');

    function openMobileNav() {
        if (!ham || !mob) return;
        ham.classList.add('open');
        mob.classList.add('open');
        mob.setAttribute('aria-hidden', 'false');
        ham.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileNav() {
        if (!ham || !mob) return;
        ham.classList.remove('open');
        mob.classList.remove('open');
        mob.setAttribute('aria-hidden', 'true');
        ham.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    if (ham && mob) {
        ham.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            if (mob.classList.contains('open')) {
                closeMobileNav();
            } else {
                openMobileNav();
            }
        });

        if (mobClose) {
            mobClose.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                closeMobileNav();
            });
        }

        document.addEventListener('click', function (e) {
            if (mob.classList.contains('open') && !mob.contains(e.target) && !ham.contains(e.target)) {
                closeMobileNav();
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && mob.classList.contains('open')) {
                closeMobileNav();
            }
        });

        mob.querySelectorAll('a').forEach(function (a) {
            a.addEventListener('click', function () {
                closeMobileNav();
            });
        });
    }

    // ─── 2.1 SEARCH MODAL DIALOG ────────────────────────────────────────────
    var searchTrigger = document.getElementById('search-modal-trigger');
    var searchModal   = document.getElementById('smast-search-modal');
    var searchClose   = document.getElementById('search-close-btn');
    var searchBackdrop= document.getElementById('smast-search-modal-close');

    function openSearchModal() {
        if (!searchModal) return;
        searchModal.classList.add('open');
        searchModal.setAttribute('aria-hidden', 'false');
        var input = searchModal.querySelector('input[type="search"]');
        if (input) setTimeout(function () { input.focus(); }, 100);
        document.body.style.overflow = 'hidden';
    }

    function closeSearchModal() {
        if (!searchModal) return;
        searchModal.classList.remove('open');
        searchModal.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    if (searchTrigger) searchTrigger.addEventListener('click', openSearchModal);
    if (searchClose) searchClose.addEventListener('click', closeSearchModal);
    if (searchBackdrop) searchBackdrop.addEventListener('click', closeSearchModal);
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && searchModal && searchModal.classList.contains('open')) {
            closeSearchModal();
        }
    });

    // ─── 3. HERO SLIDESHOW (Multi-Slide Carousel) ─────────────────────────
    var heroSlides = document.querySelectorAll('.smast-hero-slide');
    var heroDots   = document.querySelectorAll('.smast-hero-dot');
    var heroPrev   = document.getElementById('hero-prev-btn');
    var heroNext   = document.getElementById('hero-next-btn');
    var heroSlider = document.getElementById('hero');
    var curSlide   = 0;
    var slideTimer = null;
    var totalSlides = heroSlides.length;

    function goToSlide(idx) {
        if (totalSlides === 0) return;
        if (idx < 0) idx = totalSlides - 1;
        if (idx >= totalSlides) idx = 0;

        heroSlides.forEach(function (slide, i) {
            slide.classList.toggle('active', i === idx);
        });
        heroDots.forEach(function (dot, i) {
            dot.classList.toggle('active', i === idx);
        });
        curSlide = idx;
    }

    function startSlideTimer() {
        if (totalSlides <= 1) return;
        clearInterval(slideTimer);
        slideTimer = setInterval(function () {
            goToSlide(curSlide + 1);
        }, 6000);
    }

    function stopSlideTimer() {
        clearInterval(slideTimer);
    }

    if (totalSlides > 0) {
        goToSlide(0);
        startSlideTimer();

        if (heroPrev) {
            heroPrev.addEventListener('click', function (e) {
                e.preventDefault();
                goToSlide(curSlide - 1);
                startSlideTimer();
            });
        }

        if (heroNext) {
            heroNext.addEventListener('click', function (e) {
                e.preventDefault();
                goToSlide(curSlide + 1);
                startSlideTimer();
            });
        }

        heroDots.forEach(function (dot, i) {
            dot.addEventListener('click', function (e) {
                e.preventDefault();
                goToSlide(i);
                startSlideTimer();
            });
        });

        if (heroSlider) {
            heroSlider.addEventListener('mouseenter', stopSlideTimer);
            heroSlider.addEventListener('mouseleave', startSlideTimer);

            // Touch Swipe Gesture di HP
            var touchStartX = 0;
            var touchEndX = 0;
            heroSlider.addEventListener('touchstart', function (e) {
                if (e.changedTouches && e.changedTouches[0]) {
                    touchStartX = e.changedTouches[0].screenX;
                }
            }, { passive: true });

            heroSlider.addEventListener('touchend', function (e) {
                if (e.changedTouches && e.changedTouches[0]) {
                    touchEndX = e.changedTouches[0].screenX;
                    var diffX = touchStartX - touchEndX;
                    if (Math.abs(diffX) > 40) {
                        if (diffX > 0) {
                            goToSlide(curSlide + 1); // Swipe kiri -> slide berikutnya
                        } else {
                            goToSlide(curSlide - 1); // Swipe kanan -> slide sebelumnya
                        }
                        startSlideTimer();
                    }
                }
            }, { passive: true });
        }
    }

    // ─── 3.1 COPY ARTICLE LINK (Detail Berita) ──────────────────────────────
    var copyBtn = document.getElementById('copy-article-link');
    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            var url = this.getAttribute('data-url') || window.location.href;
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(url).then(function () {
                    copyBtn.innerHTML = '<i class="fas fa-check" aria-hidden="true"></i> Tersalin!';
                    setTimeout(function () {
                        copyBtn.innerHTML = '<i class="fas fa-link" aria-hidden="true"></i> Salin Tautan';
                    }, 2500);
                });
            } else {
                var temp = document.createElement('input');
                temp.value = url;
                document.body.appendChild(temp);
                temp.select();
                try {
                    document.execCommand('copy');
                    copyBtn.innerHTML = '<i class="fas fa-check" aria-hidden="true"></i> Tersalin!';
                } catch (err) {}
                document.body.removeChild(temp);
                setTimeout(function () {
                    copyBtn.innerHTML = '<i class="fas fa-link" aria-hidden="true"></i> Salin Tautan';
                }, 2500);
            }
        });
    }

    // ─── 4. STATS COUNT-UP ─────────────────────────────────────────────────
    var statEls = document.querySelectorAll('.smast-stat-number[data-target]');

    function countUp(el) {
        var target   = parseInt(el.getAttribute('data-target'), 10);
        var suffix   = el.getAttribute('data-suffix')  || '';
        var prefix   = el.getAttribute('data-prefix')  || '';
        var duration = 1800;
        var start    = performance.now();
        (function step(now) {
            var p = Math.min((now - start) / duration, 1);
            var eased = 1 - Math.pow(1 - p, 3);
            el.textContent = prefix + Math.round(eased * target).toLocaleString('id-ID') + suffix;
            if (p < 1) requestAnimationFrame(step);
        })(start);
    }

    if (statEls.length && 'IntersectionObserver' in window) {
        var so = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) { countUp(e.target); so.unobserve(e.target); }
            });
        }, { threshold: 0.4 });
        statEls.forEach(function (el) { so.observe(el); });
    } else {
        statEls.forEach(function (el) {
            el.textContent = (el.getAttribute('data-prefix') || '') +
                parseInt(el.getAttribute('data-target') || 0).toLocaleString('id-ID') +
                (el.getAttribute('data-suffix') || '');
        });
    }

    // ─── 5. SCROLL REVEAL ──────────────────────────────────────────────────
    var revEls = document.querySelectorAll('.smast-reveal, .smast-reveal-left, .smast-reveal-right');
    if (revEls.length && 'IntersectionObserver' in window) {
        var ro = new IntersectionObserver(function (entries) {
            entries.forEach(function (e) {
                if (e.isIntersecting) { e.target.classList.add('active'); ro.unobserve(e.target); }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -48px 0px' });
        revEls.forEach(function (el) { ro.observe(el); });
    } else {
        revEls.forEach(function (el) { el.classList.add('active'); });
    }

    // ─── 6. SMOOTH SCROLL FOR ANCHOR LINKS ─────────────────────────────────
    document.querySelectorAll('a[href^="#"]').forEach(function (a) {
        a.addEventListener('click', function (e) {
            var href = this.getAttribute('href');
            if (href === '#') return;
            var target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                var offset = navbar ? navbar.offsetHeight + 16 : 80;
                window.scrollTo({ top: target.getBoundingClientRect().top + window.scrollY - offset, behavior: 'smooth' });
            }
        });
    });

    // ─── 7. BCACHE & PAGE RESTORE SAFETY (Mencegah Layar Blank saat Back) ───
    window.addEventListener('pageshow', function (event) {
        document.body.classList.remove('fade-out');
        document.body.style.opacity = '1';
        document.body.style.overflow = '';
        if (ham && mob) {
            ham.classList.remove('open');
            mob.classList.remove('open');
            mob.setAttribute('aria-hidden', 'true');
            ham.setAttribute('aria-expanded', 'false');
        }
    });

    // ─── 8. ACTIVE NAV LINK ──────────────────────────────────────────────────
    var params = new URLSearchParams(window.location.search);
    var curPage = params.get('page') || 'beranda';
    document.querySelectorAll('.smast-nav-menu > li > a').forEach(function (a) {
        try {
            var ap = new URLSearchParams(new URL(a.href, window.location.href).search).get('page') || 'beranda';
            if (ap === curPage) a.classList.add('active');
        } catch (_) {}
    });

    // ─── 9. GALLERY FILTER ───────────────────────────────────────────────────
    var filterBtns = document.querySelectorAll('.filter-btn');
    var galleryItems = document.querySelectorAll('.gallery-item');
    if (filterBtns.length && galleryItems.length) {
        filterBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                filterBtns.forEach(function (b) { b.classList.remove('active'); });
                this.classList.add('active');
                var val = this.getAttribute('data-filter');
                galleryItems.forEach(function (item) {
                    var cat = item.getAttribute('data-category');
                    if (val === 'all' || val === cat) {
                        item.style.display = 'block';
                        setTimeout(function () { item.style.opacity = '1'; item.style.transform = 'scale(1)'; }, 30);
                    } else {
                        item.style.opacity = '0'; item.style.transform = 'scale(0.85)';
                        setTimeout(function () { item.style.display = 'none'; }, 280);
                    }
                });
            });
        });
    }

    // ─── 10. LIGHTBOX ───────────────────────────────────────────────────────
    var lightbox        = document.getElementById('lightbox');
    var lightboxImg     = document.getElementById('lightbox-img');
    var lightboxCaption = document.getElementById('lightbox-caption');
    var lightboxClose   = document.getElementById('lightbox-close');

    function openLB(src, caption) {
        if (!lightbox || !lightboxImg) return;
        lightboxImg.src = src;
        if (lightboxCaption) lightboxCaption.textContent = caption || '';
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeLB() {
        if (!lightbox) return;
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.gallery-item').forEach(function (item) {
        item.addEventListener('click', function () {
            var img = this.querySelector('img');
            var cap = this.querySelector('.gallery-title');
            if (img) openLB(img.src, cap ? cap.textContent : '');
        });
    });

    document.querySelectorAll('.poster-btn-zoom').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            var card = this.closest('.poster-card');
            var img  = card ? card.querySelector('img') : null;
            var cap  = card ? card.querySelector('h3') : null;
            if (img) openLB(img.src, cap ? cap.textContent : '');
        });
    });

    if (lightboxClose) lightboxClose.addEventListener('click', closeLB);
    if (lightbox) {
        lightbox.addEventListener('click', function (e) { if (e.target === lightbox) closeLB(); });
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeLB(); });
    }

    // ─── 11. CONTACT FORM VALIDATION ────────────────────────────────────────
    var form = document.getElementById('contact-form');
    if (form) {
        form.addEventListener('submit', function (e) {
            var fields = ['nama', 'email', 'subjek', 'pesan'].map(function (id) { return document.getElementById(id); });
            var ok = true;
            fields.forEach(function (f) { if (f) f.style.borderColor = ''; });
            if (fields[0] && !fields[0].value.trim()) { fields[0].style.borderColor = 'red'; ok = false; }
            if (fields[1] && (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(fields[1].value))) { fields[1].style.borderColor = 'red'; ok = false; }
            if (fields[2] && !fields[2].value.trim()) { fields[2].style.borderColor = 'red'; ok = false; }
            if (fields[3] && !fields[3].value.trim()) { fields[3].style.borderColor = 'red'; ok = false; }
            if (!ok) { e.preventDefault(); alert('Mohon lengkapi seluruh isian formulir dengan benar.'); }
        });
    }

});
