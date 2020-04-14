<?php /* Template Name: Home */ get_header(); ?>
<main class="home-page">
<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part( 'partials/_hero-section' );?>
	<?php get_template_part( 'partials/_creatives-section' );?>
	<?php get_template_part( 'partials/_menu-section' );?>
<?php endwhile; ?>
</main>
<?php get_footer(); ?>
