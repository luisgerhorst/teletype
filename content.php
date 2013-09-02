<article>

	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'toolbox' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<div class="entry-meta"><?php klausgerhorst_year(); ?></div>
	</header>

	<div class="entry-content"><?php the_content(); ?></div>

	<aside class="entry-thumbnail"><?php if (has_post_thumbnail()) the_post_thumbnail(); ?></aside>

</article>