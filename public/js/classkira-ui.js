/* ============================================================
   CLASSKIRA UI — Vanilla JS
   Scroll observer, navbar, modal, multi-step form,
   password toggle, hamburger, animations
   ============================================================ */
'use strict';

document.addEventListener('DOMContentLoaded', function () {

  /* ---------- 1. INTERSECTION OBSERVER — SCROLL REVEALS ---------- */
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) e.target.classList.add('visible');
    });
  }, { threshold: 0.12 });
  document.querySelectorAll('.ck-reveal').forEach(function (el) {
    observer.observe(el);
  });

  /* ---------- 2. NAVBAR SHADOW ON SCROLL ---------- */
  var nav = document.querySelector('.ck-nav');
  if (nav) {
    window.addEventListener('scroll', function () {
      nav.classList.toggle('scrolled', window.scrollY > 20);
    });
    // Trigger on load
    nav.classList.toggle('scrolled', window.scrollY > 20);
  }

  /* ---------- 3. HAMBURGER MENU ---------- */
  (function() {
    const toggle = document.getElementById('mobileMenuToggle') || document.querySelector('.hamburger, .navbar-toggler, .menu-toggle');
    const menu = document.getElementById('mobileMenu') || document.querySelector('.mobile-menu, .nav-drawer');

    if (!toggle || !menu) return;

    toggle.addEventListener('click', function(e) {
      e.stopPropagation();
      menu.classList.toggle('open');
      toggle.classList.toggle('is-open');
    });

    document.addEventListener('click', function(e) {
      if (!menu.contains(e.target) && !toggle.contains(e.target)) {
        menu.classList.remove('open');
        toggle.classList.remove('is-open');
      }
    });

    menu.querySelectorAll('a, button').forEach(el => {
      el.addEventListener('click', () => {
        menu.classList.remove('open');
        toggle.classList.remove('is-open');
      });
    });
  })();

  /* ---------- 4. PASSWORD TOGGLE ---------- */
  var pwdToggle = document.getElementById('ckPwdToggle');
  var pwdInput = document.getElementById('password');
  if (pwdToggle && pwdInput) {
    pwdToggle.addEventListener('click', function () {
      var isPassword = pwdInput.type === 'password';
      pwdInput.type = isPassword ? 'text' : 'password';
      // Swap eye icon
      pwdToggle.innerHTML = isPassword
        ? '<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>'
        : '<svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>';
    });
  }

  /* ---------- 5. LOGIN FORM LOADING STATE ---------- */
  var loginForm = document.getElementById('ckLoginForm');
  if (loginForm) {
    loginForm.addEventListener('submit', function () {
      var btn = loginForm.querySelector('.ck-submit');
      if (btn) btn.classList.add('loading');
    });
  }

  /* ---------- 6. ROLE TAB SELECTION ---------- */
  document.querySelectorAll('.ck-role-tab').forEach(function (tab) {
    tab.addEventListener('click', function () {
      document.querySelectorAll('.ck-role-tab').forEach(function (t) { t.classList.remove('active'); });
      tab.classList.add('active');
    });
  });

  /* ---------- 7. REGISTRATION MODAL ---------- */
  window.openRegisterModal = function() {
    const modal = document.getElementById('registerModal');
    if (!modal) return;
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    // Always reset to step 1 on open
    document.querySelectorAll('.modal-step')
      .forEach(s => s.classList.remove('active'));
    const step1 = document.querySelector(
      '.modal-step[data-step="1"]');
    if (step1) step1.classList.add('active');
  };

  window.closeRegisterModal = function() {
    const modal = document.getElementById('registerModal');
    if (!modal) return;
    modal.style.display = 'none';
    document.body.style.overflow = '';
  };

  // Backdrop click closes modal
  document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('registerModal');
    if (modal) {
      modal.addEventListener('click', function(e) {
        if (e.target === this) closeRegisterModal();
      });
    }
  });

  // Escape key closes modal
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeRegisterModal();
  });

  /* ---------- 8. MULTI-STEP FORM LOGIC ---------- */
  var currentStep = 1;
  var progressBar = document.getElementById('ckProgressBar');

  window.goToStep = function (stepNumber, direction) {
    direction = direction || 'forward';
    var current = document.querySelector('.modal-step.active');
    var next = document.querySelector('.modal-step[data-step="' + stepNumber + '"]');
    if (!current || !next) return;

    // Validate current step before advancing
    if (direction === 'forward') {
      var requiredFields = current.querySelectorAll('[required]');
      var valid = true;
      requiredFields.forEach(function (field) {
        if (!field.value.trim()) {
          field.style.borderColor = '#e53e3e';
          field.style.boxShadow = '0 0 0 4px rgba(229,62,62,.1)';
          valid = false;
        } else {
          field.style.borderColor = '';
          field.style.boxShadow = '';
        }
      });
      if (!valid) return;
    }

    // Animate transition
    current.style.transform = direction === 'forward' ? 'translateX(-40px)' : 'translateX(40px)';
    current.style.opacity = '0';
    setTimeout(function () {
      current.classList.remove('active');
      current.style.transform = '';
      current.style.opacity = '';
      next.classList.add('active');
      next.style.transform = direction === 'forward' ? 'translateX(40px)' : 'translateX(-40px)';
      next.style.opacity = '0';
      setTimeout(function () {
        next.style.transform = 'translateX(0)';
        next.style.opacity = '1';
      }, 20);
    }, 200);

    currentStep = stepNumber;
    // Update progress bar
    if (progressBar) {
      var percent = Math.round((stepNumber / 3) * 100);
      progressBar.style.width = percent + '%';
    }

    // Populate summary in step 3
    if (stepNumber === 3) {
      var schoolNameEl = document.getElementById('regSchoolName');
      var adminNameEl = document.getElementById('regAdminName');
      var summarySchool = document.getElementById('summarySchool');
      var summaryAdmin = document.getElementById('summaryAdmin');
      if (schoolNameEl && summarySchool) summarySchool.textContent = schoolNameEl.value || '—';
      if (adminNameEl && summaryAdmin) summaryAdmin.textContent = adminNameEl.value || '—';
    }
  };

  /* ---------- 9. REGISTRATION FORM SUBMIT ---------- */
  var regForm = document.getElementById('ckRegForm');
  if (regForm) {
    regForm.addEventListener('submit', function (e) {
      e.preventDefault();
      // Show success state
      document.querySelectorAll('.modal-step').forEach(function (s) { s.classList.remove('active'); });
      var successStep = document.getElementById('regSuccess');
      if (successStep) {
        successStep.classList.add('active');
        successStep.style.opacity = '1';
        successStep.style.transform = 'translateX(0)';
      }
      if (progressBar) progressBar.style.width = '100%';
    });
  }

  /* ---------- 10. SMOOTH SCROLL FOR NAV LINKS ---------- */
  document.querySelectorAll('a[href^="#"]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      var targetId = this.getAttribute('href');
      if (targetId && targetId.length > 1) {
        var target = document.querySelector(targetId);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }
    });
  });

});
