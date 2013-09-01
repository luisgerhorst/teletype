<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php
			/* Include the Post-Format-specific template for the content.
			 * If you want to overload this in a child theme then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );
		?>

	<?php endwhile; ?>

	<?php toolbox_content_nav('nav-below'); ?>

<?php else : ?>

	<article id="post-0" class="post no-results not-found">
		
		<header class="entry-header">
			<h1 class="entry-title"><?php _e('Nichts gefunden','toolbox'); ?></h1>
		</header>

		<div class="entry-content">
			<p><?php _e('Es wurden keine Einträge gefunden.','toolbox'); ?></p>
		</div>
		
	</article>

<?php endif; ?>

<?php get_footer(); ?>