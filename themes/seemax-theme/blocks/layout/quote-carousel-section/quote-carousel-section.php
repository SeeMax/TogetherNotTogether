<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'quote-carousel-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'quote-carousel-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="content">
    <div class="slick-prev-arrow">
      <svg version="1.1" viewBox="0 0 36.1 70.8">
        <polyline class="st0" points="35.7,0.4 0.7,35.4 35.7,70.4 "/>
      </svg>
    </div>
    <div class="slick-next-arrow">
      <svg version="1.1" viewBox="0 0 36.1 70.8">
        <polyline class="st0" points="0.4,70.4 35.4,35.4 0.4,0.4 "/>
      </svg>
    </div>
    <div class="quote-carousel-container quoteCarouselContainer">
      <?php $post1 = get_field('quotes_picked');
      if( $post1 ): ?>
        <?php foreach( $post1 as $p ): // variable must NOT be called $post (IMPORTANT) ?>
          <?php $title = get_field('quote_title',$p->ID );?>
          <?php $name = get_field('quote_name',$p->ID );?>
          <?php $text = get_field('quote_text',$p->ID );?>
          <?php $image = get_field('quote_image',$p->ID );?>
          <div class="single-carousel-quote">
            <div class="quote-image-part c-width-25">
              <img src="<?php echo $image['url'];?>">
            </div>
            <div class="quote-text-part c-width-75">
              <h2>"<?php echo $text;?>"</h2>
              <h4><?php echo $name;?>, <span><?php echo $title;?></span></h4>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
