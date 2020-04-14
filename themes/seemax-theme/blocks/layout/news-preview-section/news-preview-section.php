<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $eost_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'news-preview-section-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'news-preview-section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>

<?php if( get_field('news_sub_toggle') == 'hide' ): ?>
  <section id="<?php echo esc_attr($id); ?>" class="shadow-card-section <?php echo esc_attr($className); ?>">
    <div class="content">
      <h2><?php echo get_field('news_previews_headline');?></h2>
      <?php $args = array(
        'posts_per_page' =>3,
        'post_type' => 'news',
        );
        $the_query = new WP_Query( $args );
      ?>
      <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <?php $thisID = get_the_ID();?>
          <?php $extURL = get_field('external_url', $thisID);?>
          <div class="single-news-preview single-shadow-card c-shadow-box">
            <div class="single-shadow-card-date">
              <?php echo get_the_date('m/d/Y');?>
            </div>
            <?php if ( has_post_thumbnail()) {
             echo get_the_post_thumbnail();
            } else { ?>
              <img src="<?php bloginfo('template_directory'); ?>/img/default-image.jpg" alt="<?php the_title(); ?>" />
            <?php } ?>
            <h3><?php echo get_the_title(); ?></h3>
            <p><?php echo wp_trim_words(get_the_excerpt(),25);?></p>
            <div class="seemax-button secondary-button">
              <?php if ($extURL):?>
                <a class="c-block-fill" href="<?php echo $extURL;?>" target="_blank"></a>
              <?php else:?>
                <a class="c-block-fill" href="<?php echo get_permalink(); ?>"></a>
              <?php endif;?>
              Read Article
            </div>
          </div>
        <?php endwhile; else: ?>
          <p>Sorry, there are no posts to display</p> <?php endif; ?>
        <?php wp_reset_query(); ?>

      <div class="all-news-button-area">
        <div class="seemax-button">
          <span>All News</span>
          <a class="c-block-fill" href="/newsroom/"></a>
        </div>
      </div>
    </div>
  </section>
<?php else: ?>
  <section id="<?php echo esc_attr($id); ?>" class="shadow-card-section <?php echo esc_attr($className); ?>">
    <div class="content">
      <h2><?php echo get_field('news_previews_headline');?></h2>
      <?php $newsroom = get_field('news_previews_1');?>
      <?php if( $newsroom ):?>
        <?php foreach( $newsroom as $n ): // variable must NOT be called $post (IMPORTANT) ?>
          <div class="single-news-preview single-shadow-card c-shadow-box">
            <div class="single-shadow-card-date">
              <?php echo get_the_date('m/d/Y',$n->ID);?>
            </div>
            <?php if ( has_post_thumbnail($n->ID) ) {
             echo get_the_post_thumbnail($n->ID);
            } else { ?>
              <img src="<?php bloginfo('template_directory'); ?>/img/default-image.jpg" alt="<?php the_title(); ?>" />
            <?php } ?>
    				<h3><?php echo get_the_title( $n->ID ); ?></h3>
            <p><?php echo wp_trim_words(get_the_excerpt($n->ID),25);?></p>
            <div class="seemax-button secondary-button">
              <a class="c-block-fill" href="<?php echo get_permalink( $n->ID ); ?>"></a>
              Read Article
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
      <div class="all-news-button-area">
        <div class="seemax-button">
          <span>All News</span>
          <a class="c-block-fill" href="/newsroom/"></a>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
