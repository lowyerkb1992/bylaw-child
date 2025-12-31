/* Mobile navigation toggle and outside click handler */
(function(){
  'use strict';

  var breakpoint = (typeof BylawChildNav !== 'undefined' && BylawChildNav.breakpoint) ? parseInt(BylawChildNav.breakpoint,10) : 992;
  var menuToggle = document.querySelector('.menu-toggle');
  // Try common nav selectors
  var nav = document.querySelector('.main-navigation') || document.querySelector('.site-navigation') || document.querySelector('nav[role="navigation"]');

  if(!menuToggle){
    // If theme doesn't output a menu-toggle, try to create one inside header
    var header = document.querySelector('.site-header') || document.querySelector('header');
    if(header && !document.querySelector('.menu-toggle')){
      menuToggle = document.createElement('button');
      menuToggle.className = 'menu-toggle';
      menuToggle.setAttribute('aria-expanded','false');
      menuToggle.setAttribute('aria-label','Toggle navigation');
      var span = document.createElement('span'); span.className='hamburger';
      menuToggle.appendChild(span);
      header.appendChild(menuToggle);
    }
  }

  function closeNav(){
    if(nav){
      nav.classList.remove('open');
    }
    if(menuToggle){
      menuToggle.classList.remove('open');
      menuToggle.setAttribute('aria-expanded','false');
    }
    document.body.classList.remove('bylaw-nav-open');
  }
  function openNav(){
    if(nav){
      nav.classList.add('open');
    }
    if(menuToggle){
      menuToggle.classList.add('open');
      menuToggle.setAttribute('aria-expanded','true');
    }
    document.body.classList.add('bylaw-nav-open');
  }

  function toggleNav(e){
    e.preventDefault();
    if(!nav) return;
    if(nav.classList.contains('open')){
      closeNav();
    }else{
      openNav();
    }
  }

  if(menuToggle && nav){
    menuToggle.addEventListener('click', toggleNav);

    // Close on outside click or on pressing Escape
    document.addEventListener('click', function(e){
      if(window.innerWidth >= breakpoint) return;
      if(!nav.classList.contains('open')) return;
      var insideNav = nav.contains(e.target);
      var insideToggle = menuToggle.contains(e.target);
      if(!insideNav && !insideToggle){
        closeNav();
      }
    }, {passive:true});

    document.addEventListener('keydown', function(e){
      if(e.key === 'Escape' && nav.classList.contains('open')){
        closeNav();
      }
    });

    // Prevent body scroll when nav open on mobile
    var observer = new MutationObserver(function(){
      if(nav.classList.contains('open')){
        document.body.style.overflow = 'hidden';
      } else {
        document.body.style.overflow = '';
      }
    });
    observer.observe(nav, { attributes: true, attributeFilter: ['class'] });
  }

})();
