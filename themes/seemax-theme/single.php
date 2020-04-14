<?php get_header(); ?>
	<main class="single-post-page default-page">
		<?php while (have_posts()) : the_post(); ?>
	    <section class="single-post-section no-flex">
				<div class="content">
					<h4><?php the_date();?> <span>by <?php the_author();?></span></h4>
					<h1><?php the_title();?></h1>
					<?php the_content(); ?>
        </div>
	    </section>
		<?php endwhile; ?>
	</main>
<?php get_footer(); ?>
