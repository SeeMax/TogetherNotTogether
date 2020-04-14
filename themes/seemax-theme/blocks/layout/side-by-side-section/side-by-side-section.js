(function($){
  /**
   * initializeBlock
   *
   * Adds custom JavaScript to the block HTML.
   *
   * @date    15/4/19
   * @since   1.0.0
   *
   * @param   object $block The block jQuery element.
   * @param   object attributes The block attributes (only available when editing).
   * @return  void
   */
  var initializeBlock = function( $block ) {
      // $block.find('h2').css( "color", "blue" );
  };

  // Initialize each block on page load (front end).
  $(document).ready(function(){

    // Make sure it's not the wp-backend
    if (!$('body').hasClass("wp-admin")) {

      $('.side-by-side-section').each(function(){
        initializeBlock( $(this) );

        var $thisID = $(this).attr('id');
        // console.log($thisID);

        $('.'+$thisID+'-sideXSideCarousel').slick({
          autoplay:true,
          autoplaySpeed:5000,
          infinite: true,
          speed: 200,
          fade: true,
          cssEase: 'linear',
          prevArrow: $('.'+$thisID+'-slick-prev-arrow'),
          nextArrow: $('.'+$thisID+'-slick-next-arrow'),
        });

        if ($(this).next().hasClass("side-by-side-section")){
          $(this).next().addClass('side-x-side-in-a-row');
        }
      });
    }
  });

  // Initialize dynamic block preview (editor).
  if( window.acf ) {
      window.acf.addAction( 'render_block_preview/type=side-by-side-section', initializeBlock );
  }

})(jQuery);
