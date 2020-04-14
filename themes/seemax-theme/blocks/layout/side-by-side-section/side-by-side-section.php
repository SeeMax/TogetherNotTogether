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
$id = 'side-by-side-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'side-by-side-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$headline = get_field('headline');
$body = get_field('body');
$ctaText = get_field('button_text');
$ctaDest = get_field('button_destination');
$image = get_field('image');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="colored-back c-block-fill coloredBack"></div>
  <div class="content">
    <div class="side-by-side-text c-width-50">
      <?php if($headline):?>
        <h2><?php echo $headline; ?></h2>
      <?php endif;?>
      <?php if($body):?>
        <?php echo $body; ?>
      <?php endif;?>
      <?php if($ctaDest):?>
        <div class="seemax-button">
          <span><?php echo $ctaText; ?></span>
          <a href="<?php echo $ctaDest; ?>" class="c-block-fill"></a>
        </div>
      <?php endif;?>
    </div>
    <div class="side-by-side-image c-width-50">
      <div class="slick-prev-arrow <?php echo $id;?>-slick-prev-arrow">
        <svg version="1.1" viewBox="0 0 36.1 70.8">
          <polyline class="st0" points="35.7,0.4 0.7,35.4 35.7,70.4 "/>
        </svg>
      </div>
      <div class="slick-next-arrow <?php echo $id;?>-slick-next-arrow">
        <svg version="1.1" viewBox="0 0 36.1 70.8">
          <polyline class="st0" points="0.4,70.4 35.4,35.4 0.4,0.4 "/>
        </svg>
      </div>
      <div class="side-x-side-carousel <?php echo $id;?>-sideXSideCarousel">
        <?php while( have_rows('images') ): the_row();?>
          <?php $singleImage = get_sub_field('single_image');?>
          <img src='<?php echo $singleImage['url'];?>'>
        <?php endwhile;?>
      </div>
    </div>
  </div>
</section>
