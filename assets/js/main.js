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

  const slider = document.querySelector('[data-service-slider]');
  if (slider) {
    const tabs = Array.from(slider.querySelectorAll('[data-service-tab]'));
    const panels = Array.from(slider.querySelectorAll('[role="tabpanel"]'));
    const previous = slider.querySelector('[data-service-prev]');
    const next = slider.querySelector('[data-service-next]');
    const counter = slider.querySelector('[data-service-count]');
    let activeIndex = 0;

    const activate = function (index, moveFocus) {
      if (!tabs.length || index < 0 || index >= tabs.length) return;
      activeIndex = index;
      tabs.forEach(function (tab, tabIndex) {
        const active = tabIndex === activeIndex;
        tab.setAttribute('aria-selected', String(active));
        tab.setAttribute('tabindex', active ? '0' : '-1');
        panels[tabIndex].hidden = !active;
      });
      if (counter) {
        counter.textContent = String(activeIndex + 1).padStart(2, '0') + ' / ' + String(tabs.length).padStart(2, '0');
      }
      if (previous) previous.disabled = activeIndex === 0;
      if (next) next.disabled = activeIndex === tabs.length - 1;
      if (moveFocus) tabs[activeIndex].focus();
    };

    tabs.forEach(function (tab, index) {
      tab.addEventListener('click', function () { activate(index, false); });
      tab.addEventListener('keydown', function (event) {
        let target = null;
        if (event.key === 'ArrowRight' || event.key === 'ArrowDown') target = Math.min(index + 1, tabs.length - 1);
        if (event.key === 'ArrowLeft' || event.key === 'ArrowUp') target = Math.max(index - 1, 0);
        if (event.key === 'Home') target = 0;
        if (event.key === 'End') target = tabs.length - 1;
        if (target !== null) {
          event.preventDefault();
          activate(target, true);
        }
      });
    });

    if (previous) previous.addEventListener('click', function () { activate(activeIndex - 1, false); });
    if (next) next.addEventListener('click', function () { activate(activeIndex + 1, false); });
    activate(0, false);
  }
}());
