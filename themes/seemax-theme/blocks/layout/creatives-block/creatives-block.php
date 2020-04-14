<?php
  /* Testimonial Block Template.
   * @param   array $block The block settings and attributes.
   * @param   string $content The block inner HTML (empty).
   * @param   bool $is_preview True during AJAX preview.
   * @param   (int|string) $post_id The post ID this block is saved to.
  */

 // Create id attribute allowing for custom "anchor" value.
  $id = 'creatives-block-' . $block['id'];
  if( !empty($block['anchor']) ) {
      $id = $block['anchor'];
  }

  // Create class attribute allowing for custom "className" and "align" values.
  $className = 'creatives-block';
  if( !empty($block['className']) ) {
      $className .= ' ' . $block['className'];
  }
  if( !empty($block['align']) ) {
      $className .= ' align' . $block['align'];
  }
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="content">

    <?php
      $name = the_title();
      $image = get_field('image');
      $website = get_field('website');
      $email = get_field('email');
      $title = get_field('title');
      $exp = get_field('experience');
      $advice = get_field('advice');
    ?>
    <div class="single-creative">
      <?php echo $name;?>
      <img src="<?php echo $image['url'];?>">
      <?php echo $title;?>
      <?php echo $exp;?>
      <?php echo $advice;?>
    </div>

  </div>
</section>
