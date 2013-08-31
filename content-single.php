<?php
/**
 * @package Toolbox
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-meta"><?php toolbox_posted_on(); ?></div>
	</header>

	<div class="entry-content"><?php the_content(); ?></div>
	
	<aside class="entry-thumbnail"><?php if (has_post_thumbnail()) the_post_thumbnail(); ?></aside>

</article>
