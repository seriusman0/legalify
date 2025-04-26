(function($) {
    "use strict";
    
    // Update year in footer
    $('.update-year').text(new Date().getFullYear());

    // Initialize masonry layout for blog posts
    if($('.masonry__container').length){
        $('.masonry__container').isotope({
            itemSelector: '.masonry__item',
            masonry: {
                columnWidth: '.masonry__item'
            }
        });
    }

    // Initialize masonry filters
    if($('.masonry-filter-holder').length){
        $('.masonry-filter-holder').each(function(){
            var $holder = $(this);
            var $filters = $holder.find('.masonry__filters li');
            var $container = $holder.closest('.masonry').find('.masonry__container');
            
            $filters.on('click', function(){
                var $filter = $(this);
                var filterValue = $filter.attr('data-filter');
                $container.isotope({ filter: filterValue });
                $filters.removeClass('active');
                $filter.addClass('active');
            });
        });
    }

    // Back to top button
    if($('.back-to-top').length){
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });

        $('.back-to-top').click(function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    }

    // Mobile menu toggle
    $('.hamburger-toggle').on('click', function(){
        var $target = $($(this).attr('data-toggle-class'));
        $target.toggleClass('hidden-xs');
    });

    // Initialize radial progress bars
    $('.radial').each(function(){
        var $this = $(this);
        var value = $this.attr('data-value');
        var size = $this.attr('data-size');
        var thickness = $this.attr('data-bar-width');
        var color = $this.attr('data-color');
        
        $this.easyPieChart({
            barColor: color,
            trackColor: '#f8f9fa',
            scaleColor: false,
            lineCap: 'round',
            lineWidth: thickness,
            size: size,
            animate: 1000,
            onStep: function(from, to, percent) {
                $(this.el).find('.radial__label').text(Math.round(percent));
            }
        });
    });
})(jQuery);
