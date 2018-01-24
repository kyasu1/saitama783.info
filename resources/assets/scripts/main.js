// import external dependencies
import 'jquery';
import Lightbox from 'lightbox2';

Lightbox.option({
//  'disableScrolling': true,
});

// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());

/*
$(window).on('scroll', function() {
  $('#header-menu').toggleClass('fixed', $(this).scrollTop() > 100);
});
*/
/*
(function() {
  var toggletips = document.querySelectorAll('.toggletip');

  Array.prototype.forEach.call(toggletips, function(toggletip) {

    var message = toggletip.getAttribute('data-toggletip-content');
    var liveRegion = toggletip.nextElementSibling;
    toggletip.addEventListener('click', function() {
      liveRegion.innerHTML = '';
      window.setTimeout(function() {
        liveRegion.innerHTML = '<span class="toggletiptext">' + message + '</span>';
      }, 100);
    });

    document.addEventListener('click', function(e) {
      console.log(e.target);
      if (toggletip !== e.target) {
        liveRegion.innerHtml = '';
      }
    });

    toggletip.addEventListener('keydown', function(e) {
      if ((e.keyCode || e.which) === 27) 
        liveRegion.innerHTML = '';
    });
  });
}());
*/
