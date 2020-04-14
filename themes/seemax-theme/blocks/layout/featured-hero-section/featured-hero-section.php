<?php

/**
 * Three-Column Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-custom-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero-custom-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
;?>

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
    <div class="featured-hero-slider-container featuredHeroSliderContainer">
      <?php if( have_rows('featured_hero') ):?><?php while ( have_rows('featured_hero') ) : the_row();?>
        <?php if( get_sub_field('featured_hero_type') == 'blog' ): ?>
          <?php $post1 = get_sub_field('featured_hero_type_blog');?>
          <?php if( $post1 ): ?>
            <?php foreach( $post1 as $p ):?>
              <?php $category = get_the_category($p->ID);$firstCategory = $category[0]->slug;?>
                <div class="single-featured-hero-slide" data-postid="<?php echo $p->ID;?>">
                  <div class="featured-hero-image-half c-width-40">
                    <?php if ( has_post_thumbnail( $p->ID ) ) {
                      echo get_the_post_thumbnail( $p->ID );
                    } else { ?>
                      <img src="<?php bloginfo('template_directory'); ?>/img/default-image.jpg" alt="<?php the_title(); ?>" />
                    <?php } ?>
                  </div>
                  <div class="featured-hero-text featured-hero-text-half c-width-60">
                    <h2><?php echo get_the_title( $p->ID ); ?></h2>
                    <p><?php echo wp_trim_words(get_the_excerpt($p->ID),25);?></p>
                    <div class="seemax-button">
                      <span>Read Post</span>
                      <a class="c-block-fill" href="<?php echo get_permalink( $p->ID ); ?>"></a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          <?php elseif( get_sub_field('featured_hero_type') == 'custom' ): ?>
            <?php if( have_rows('featured_hero_custom') ): while( have_rows('featured_hero_custom') ): the_row();
              $image = get_sub_field('field_hero_custom_image');
              $title = get_sub_field('field_hero_custom_title');
              $subhead = get_sub_field('field_hero_custom_subhead');
              $body = get_sub_field('field_hero_custom_body');
              $textLink = get_sub_field('field_hero_custom_text_link');
              $textLinkDest = get_sub_field('field_hero_custom_link_dest');
              $customVid = get_sub_field('field_custom_hero_custom_video');
            ?>
              <div class="single-featured-hero-slide">
                <?php if( get_sub_field('custom_hero_custom_content_type') == 'video' ): ?>
                  <div class="featured-hero-vid-container">
                    <?php echo $customVid;?>
                  </div>
                <?php else:?>
                  <div class="featured-hero-image-half c-width-40">
                    <?php if ($image):?>
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <?php endif;?>
                  </div>
                  <div class="featured-hero-text featured-hero-text-half c-width-60">
                    <?php if ($title):?>
                      <h2><?php echo $title;?></h2>
                    <?php endif;?>
                    <?php if ($subhead):?>
                      <h3><?php echo $subhead;?></h3>
                    <?php endif;?>
                    <?php if ($body):?>
                      <p><?php echo $body;?></p>
                    <?php endif;?>
                    <?php if ($textLink):?>
                      <div class="seemax-button">
                        <span><?php echo $textLink;?></span>
                        <a class="c-block-fill" href="<?php echo $textLinkDest;?>"></a>
                      </div>
                    <?php endif;?>
                  </div>
                <?php endif;?>
              </div>
            <?php endwhile;endif; ?>
        <?php endif;?><!-- End Custom If -->

      <?php endwhile;?><?php endif; ?>
    </div>
  </div>
</section>
