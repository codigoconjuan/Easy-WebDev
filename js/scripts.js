jQuery(function($){

    $("#typed").typed({
        strings: ["Responsive Web Design", "HTML5, CSS and JavaScript", "Twitter Bootstrap", "ZURB Foundation", "WordPress Development"],
        typeSpeed: 40,
        backDelay: 1000,
        loop: true,
        contentType: 'html', // or text
        // defaults to false for infinite loop
        loopCount: false,
    });

     $("#video-promo").fitVids();

      $('div#course-features ul li').matchHeight({
          byRow: true,
          property: 'height',
          remove: false
      });

});
