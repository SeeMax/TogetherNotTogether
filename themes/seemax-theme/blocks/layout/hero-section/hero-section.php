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
$id = 'hero-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assing defaults.
$image = get_field('image');
$headline = get_field('headline') ?: strtoupper(get_the_title());
$subHeadline = get_field('sub_headline');
$subBody = get_field('sub_body');
$subToggle = get_field('sub_toggle');
$subImageToggle = get_field('sub_image_toggle');
$subImage = get_field('sub_image');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="hero-image-slider-container heroImageSliderContainer">
    <?php if( have_rows('hero_images') ):?>
      <?php while ( have_rows('hero_images') ) : the_row();?>
        <?php $image = get_sub_field('image');?>
        <div class="single-hero-image-slide">
          <img src="<?php echo $image['url'];?>">
        </div>
      <?php endwhile;?>
    <?php endif; ?>
  </div>
  <?php if(get_field('headline')):?>
    <div class="c-block-fill hero-color-overlay"></div>
  <?php endif;?>

  <div class="content">
    <h1><?php echo $headline; ?></h1>
    <?php $pageSlug = esc_html( get_page_template_slug( $post->ID ) ); ?>
  </div>
</section>
