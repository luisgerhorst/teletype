<?php get_header(); ?>

<div id="entries">

	<?php while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'content', 'page' ); ?>
	
	<?php endwhile; ?>

</div>

<?php get_footer(); ?>