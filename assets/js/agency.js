(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 54)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 54
  });

  // Collapse the navbar when page is scrolled
  $(window).scroll(function() {
    if ($("#mainNav").offset().top > 50) {
      $("#mainNav").addClass("navbar-shrink");
      $("#mainNav .navbar-brand img").css('height','60px');
    } else {
      $("#mainNav").removeClass("navbar-shrink");
      $("#mainNav .navbar-brand img").css('height','94px');
    }
  });

  $(window).ready(function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
      $("#mainNav .navbar-brand img").css('height','60px');
    } else {
      $("#mainNav").removeClass("navbar-shrink");
      $("#mainNav .navbar-brand img").css('height','94px');
    }
  });

  $(document).ready(function() {
    $("#cf7_controls").on('click', 'li', function() {
      $("#cf7 .row").removeClass("opaque");

      var newImage = $(this).index();

      $("#cf7 .row").eq(newImage).addClass("opaque");

      $("#cf7_controls li").removeClass("selected");
      $(this).addClass("selected");
    });
  });

  $(document).ready(function() {
    $("#cf6_controls").on('click', 'span', function() {
      $("#cf6 .row").removeClass("opaque1");

      var newImage = $(this).index();

      $("#cf6 .row").eq(newImage).addClass("opaque1");

      $("#cf6_controls span").removeClass("selected_match");
      $(this).addClass("selected_match");
    });
  });

  $(document).ready(function() {
    $("#cf5_controls").on('click', 'span', function() {
      $("#cf5 .imagegroup").removeClass("opaque1");

      var newImage = $(this).index();

      $("#cf5 .imagegroup").eq(newImage).addClass("opaque1");

      $("#cf5_controls span").removeClass("selected_match");
      $(this).addClass("selected_match");
    });
  });
})(jQuery); // End of use strict
