export default {
  init() {
    // JavaScript to be fired on all pages
    var toggletips = document.querySelectorAll('.toggletip');
  
    Array.prototype.forEach.call(toggletips, function(toggletip) {
  
      var message = toggletip.getAttribute('data-toggletip-content');
      var liveRegion = toggletip.nextElementSibling;
      toggletip.addEventListener('click', function() {
        liveRegion.innerHTML = '';
        window.setTimeout(function() {
          liveRegion.innerHTML = '<span class="toggletiptext f6 f5-ns lh-copy-ns">' + message + '</span>';
        }, 100);
      });
  
      document.addEventListener('click', function(e) {
        if (toggletip !== e.target) {
          liveRegion.innerHTML = '';
        }
      });
  
      document.addEventListener('touchstart', function(e) {
        if (toggletip !== e.target) {
          liveRegion.innerHTML = '';
        }
      });

      document.addEventListener('keydown', function(e) {
        if ((e.keyCode || e.which) === 27) 
          liveRegion.innerHTML = '';
      });
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
