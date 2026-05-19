/* ============================================================================
   Loan Streamline Pro — main.js (vanilla JS)
   - Mobile menu toggle
   - Multi-step form navigation & validation
   - AJAX form submission with detailed error reporting
   - Sticky-CTA show/hide near footer
   ============================================================================ */
(function () {
  'use strict';

  // ---- Mobile menu ---------------------------------------------------------
  const menuBtn = document.getElementById('mobileMenuBtn');
  const menu    = document.getElementById('mobileMenu');
  if (menuBtn && menu) {
    menuBtn.addEventListener('click', () => {
      const isOpen = !menu.classList.toggle('hidden');
      menuBtn.setAttribute('aria-expanded', String(isOpen));
    });
  }

  // ---- Sticky CTA: hide near footer ---------------------------------------
  const stickyCta = document.getElementById('stickyCta');
  if (stickyCta) {
    const footer = document.querySelector('footer');
    const update = () => {
      if (!footer) return;
      const footerTop = footer.getBoundingClientRect().top;
      if (footerTop < window.innerHeight) {
        stickyCta.classList.add('translate-y-full', 'opacity-0');
      } else {
        stickyCta.classList.remove('translate-y-full', 'opacity-0');
      }
    };
    stickyCta.style.transition = 'transform .25s ease, opacity .25s ease';
    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
    update();
  }

  // ---- Multi-step form -----------------------------------------------------
  const form = document.getElementById('leadForm');
  if (!form) return;

  // Record submission timestamp (used in consent audit trail)
  const consentTimestamp = form.querySelector('#consentTimestamp');
  if (consentTimestamp) consentTimestamp.value = new Date().toISOString();

  const steps = form.querySelectorAll('fieldset[data-step]');
  const dots  = document.querySelectorAll('[data-step-dot]');
  let current = 1;

  function showStep(n) {
    steps.forEach(fs => {
      const s = parseInt(fs.dataset.step, 10);
      fs.classList.toggle('hidden', s !== n);
    });
    dots.forEach(dot => {
      const s = parseInt(dot.dataset.stepDot, 10);
      dot.classList.toggle('active', s === n);
      dot.classList.toggle('complete', s < n);
    });
    current = n;
    if (n > 1) form.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }

  function validateStep(n) {
    const fs = form.querySelector('fieldset[data-step="' + n + '"]');
    if (!fs) return true;
    const fields = fs.querySelectorAll('input, select, textarea');
    for (const f of fields) {
      if (!f.checkValidity()) { f.reportValidity(); return false; }
    }
    if (n === 1) {
      const selected = form.querySelector('input[name="debt_amount"]:checked');
      if (!selected) {
        const first = form.querySelector('input[name="debt_amount"]');
        if (first) first.reportValidity();
        return false;
      }
    }
    return true;
  }

  form.querySelectorAll('.next-step').forEach(btn => {
    btn.addEventListener('click', () => {
      if (validateStep(current)) showStep(current + 1);
    });
  });
  form.querySelectorAll('.prev-step').forEach(btn => {
    btn.addEventListener('click', () => showStep(current - 1));
  });

  // Submit via fetch with detailed error reporting
  form.addEventListener('submit', async (ev) => {
    if (!('fetch' in window)) return;          // graceful fallback to native POST
    ev.preventDefault();
    if (!validateStep(current)) return;

    const status    = document.getElementById('formStatus');
    const submitBtn = form.querySelector('button[type="submit"]');
    const setStatus = (msg, cls) => {
      if (!status) return;
      status.className   = 'text-sm ' + (cls || 'text-slate-500');
      status.textContent = msg;
    };
    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.dataset._label = submitBtn.textContent;
      submitBtn.textContent = 'Submitting…';
    }
    setStatus('Sending your information securely…', 'text-slate-500');

    let res, raw = '', data = {};
    try {
      const fd = new FormData(form);
      res = await fetch(form.action, {
        method:  'POST',
        body:    fd,
        headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        credentials: 'same-origin',
      });
      raw  = await res.text();
      try { data = raw ? JSON.parse(raw) : {}; } catch (_) { data = {}; }

      if (res.ok && data.ok) {
        setStatus('Success — redirecting…', 'text-green-600');
        window.location.assign(data.redirect || '/thank-you');
        return;
      }

      // ----- Failure path: show as much detail as we can --------------------
      let msg = (data && data.message) || ('Request failed (HTTP ' + res.status + ')');
      if (data && data.php_error)         msg += '  ·  ' + data.php_error;
      else if (data && Array.isArray(data.errors)) msg += '  ·  ' + data.errors.join(' ');
      else if (!data || Object.keys(data).length === 0) {
        // Backend returned non-JSON (probably a blank 500). Show first line of raw response.
        const firstLine = (raw || '').replace(/<[^>]+>/g, '').trim().split('\n')[0].slice(0, 200);
        if (firstLine) msg += '  ·  ' + firstLine;
      }
      setStatus(msg, 'text-red-600');
      // Log full details to the browser console so the dev tools show everything.
      console.error('[lead form] submission failed', { status: res.status, raw, parsed: data });

    } catch (err) {
      setStatus('Network error: ' + (err && err.message ? err.message : 'unknown'), 'text-red-600');
      console.error('[lead form] network error', err);
    } finally {
      if (submitBtn) {
        submitBtn.disabled    = false;
        submitBtn.textContent = submitBtn.dataset._label || 'Submit & See My Options';
      }
    }
  });
})();
