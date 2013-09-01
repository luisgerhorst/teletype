<article>
	
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	
	<aside class="entry-thumbnail">
		<?php if (has_post_thumbnail()) the_post_thumbnail(); ?>
	</aside>
	
</article>
