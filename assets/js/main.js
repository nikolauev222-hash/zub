(function () {
  'use strict';
  const toggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.site-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      const open = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!open));
      nav.classList.toggle('is-open', !open);
      document.body.classList.toggle('menu-open', !open);
    });
    nav.addEventListener('click', function (event) {
      if (event.target.closest('a')) {
        toggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('is-open');
        document.body.classList.remove('menu-open');
      }
    });
  }
  document.querySelectorAll('[data-service]').forEach(function (link) {
    link.addEventListener('click', function () {
      const field = document.querySelector('textarea[name="message"]');
      if (field && !field.value) field.value = 'Интересует услуга: ' + link.dataset.service + '. ';
    });
  });
}());

