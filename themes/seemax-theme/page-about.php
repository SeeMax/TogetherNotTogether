<?php /* Template Name: About */ get_header(); ?>
<main class="about-page">
  <?php while (have_posts()) : the_post(); ?>
    <section class="single-post-section no-flex">
      <div class="content">
        <?php the_content(); ?>
  	  </div>
    </section>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
