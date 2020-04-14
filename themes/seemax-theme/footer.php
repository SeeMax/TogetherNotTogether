<footer class="footer" role="contentinfo">
	<!-- <?php get_template_part( 'partials/_footer-back' );?> -->
	<div class="content">
		<div class="footer-tile logo-tile c-width-33">
			<!-- <img src="<?php echo get_template_directory_uri(); ?>/img/logo-w.svg" > -->
			<?php the_field('footer_copy', 'options');?>
			<img src="<?php echo get_template_directory_uri(); ?>/img/logo-w.svg" >

			</ul>
		</div>
		<!-- <div class="copyright">
			&copy; Copyright <?php echo date("Y"); ?> <?php echo get_bloginfo();?>
		</div> -->
	</div>
</footer>
<?php wp_footer(); ?>
</div><!-- WRAPPER -->
</body>
</html>
