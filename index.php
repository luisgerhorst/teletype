<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	
	<div id="entries">

		<?php while (have_posts()): the_post(); ?>
	
			<?php get_template_part( 'content', get_post_format() ); ?>
	
		<?php endwhile; ?>
	
	</div>

	<?php teletype_content_nav('nav-below'); ?>

<?php else : ?>
	
	<div id="entries">

		<article>
			
			<header class="entry-header">
				<h1 class="entry-title"><?php _e('Nichts gefunden','teletype'); ?></h1>
			</header>
	
			<div class="entry-content">
				<p><?php _e('Es wurden leider keine Einträge gefunden.','teletype'); ?></p>
			</div>
			
		</article>
	
	</div>

<?php endif; ?>

<?php get_footer(); ?>