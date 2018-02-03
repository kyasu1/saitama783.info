export default {
  init() {
    // JavaScript to be fired on all pages

    /* Toggle Tips function */
    var toggletips = document.querySelectorAll('.toggletip');

    Array.prototype.forEach.call(toggletips, function(toggletip) {

      var content = toggletip.getAttribute('data-toggletip-content');
      var liveRegion = toggletip.nextElementSibling;
      toggletip.addEventListener('click', function() {
        liveRegion.innerHTML = '';
        window.setTimeout(function() {
          liveRegion.innerHTML = '<span class="toggletiptext f6 f5-ns lh-copy-ns">' + content + '</span>';
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

    /* Scroll to top function */
    $(window).scroll(function() {
      if ($(window).scrollTop() > 100) {
        $('#scroll').fadeIn();
      } else {
        $('#scroll').fadeOut();
      }
    });
    $('#scroll').click(function() {
      $('html,body').animate({ scrollTop: 0}, 600);
      return false;
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
