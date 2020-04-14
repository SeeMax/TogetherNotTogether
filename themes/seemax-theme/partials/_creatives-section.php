<!-- Loop All Creatives - Used in three spots below -->
<?php
  $args = array('post_type' => 'creatives', 'posts_per_page' => -1,'orderby' => 'rand',);
  $loop = new WP_Query( $args );
?>

<!-- A list of the creatives pictures -->
<div class="creative-images-area">
  <?php while ( $loop->have_posts() ) : $loop->the_post();?>
    <?php $image = get_field('image');?>
    <img class="single-creative-image" data-post="<?php echo $post->ID;?>" src="<?php echo $image['url'];?>" />
  <?php endwhile; wp_reset_postdata();?>
</div>

<!-- All The Details About Each Person -->
<div class="creative-details-area">
  <?php while ( $loop->have_posts() ) : $loop->the_post();?>
    <?php
      $name = get_the_title();
      $title = get_field('title');
      $advice = get_field('advice');
      $adviceLead = get_field('advice_lead');
    ?>
    <div class="single-creative-details" data-post="<?php echo $post->ID;?>">
      <div class="featured-creative-text">
        <div class="featured-info">
          <h2 class="featured-name featuredName"><?php echo $name;?></h2>
          <h3 class="featured-title featuredTitle"><?php echo $title;?></h3>
          <div class="featured-advice featuredAdvice">
            <span class="advice-lead"><?php echo $adviceLead;?>:</span>
            <span class="advice-quote">"</span><?php echo $advice;?><span class="advice-quote advice-quote-2">"</span>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; wp_reset_postdata();?>
</div>

<!-- A list of just the names -->
<div class="creative-list-area">
  <div class="creatives-list">
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
      <?php $website = get_field('website');?>
      <div class="single-creative-title singleCreativeTitle" data-post="<?php echo $post->ID;?>">
        <h2 class="plain-name plainName"><?php the_title();?></h2>
        <h2 class="hovered-name hoveredName"><?php the_title();?></h2>
        <div class="website-arrow websiteArrow">
          <?php get_template_part( 'partials/_website-arrow' ); ?>
        </div>
        <a class="c-block-fill" href="<?php echo $website;?>" target="_blank"></a>
      </div>
    <?php endwhile; wp_reset_postdata();?>
    <div class="single-creative-title nominate-link openNominate">

      <h2 class="plain-name plainName">
        <div class="website-plus website-plus-1 pChars">
          <?php get_template_part( 'partials/_website-plus' ); ?>
        </div>
        Nominate
      </h2>
      <h2 class="hovered-name hoveredName">Nominate</h2>
      <div class="website-plus website-plus-2 websiteArrow">
        <?php get_template_part( 'partials/_website-plus' ); ?>
      </div>
    </div>
  </div>
</div>
