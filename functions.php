<?php

if (!function_exists('teletype_setup')):

	function teletype_setup() {
		
		// rss feeds
		add_theme_support('automatic-feed-links');
	
		// menus
		register_nav_menus(array(
			'primary' => __('Primary Menu','teletype'),
		));
	
		// thumbnails
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(450,100000);
		
		// header image
		$defaults = array(
			'flex-height'            => true,
			'header-text'            => true,
			'default-text-color'     => '000000'
		);
		add_theme_support( 'custom-header', $defaults );
		
	}
	
endif;

add_action('after_setup_theme','teletype_setup');

$themecolors = array(
	'bg' => 'ffffff',
	'border' => '000000',
	'text' => '000000',
);

if (!function_exists('teletype_content_nav')):

	function teletype_content_nav($nav_id) {
		
		global $wp_query;
		
		if (get_next_posts_link() || get_previous_posts_link()): ?>
		
			<nav id="<?php echo $nav_id; ?>">
		
			<?php if ($wp_query->max_num_pages > 1 && (is_home() || is_archive() || is_search())): ?>
		
				<?php if (get_next_posts_link()): ?>
					<div class="nav-previous"><?php next_posts_link(__('Ältere', 'teletype')); ?></div>
				<?php endif; ?>
		
				<?php if (get_previous_posts_link()): ?>
					<div class="nav-next"><?php previous_posts_link(__('Neuere', 'teletype')); ?></div>
				<?php endif; ?>
		
			<?php endif; ?>
		
			</nav>
		
		<?php endif;
	}

endif;


if (!function_exists('teletype_year')):

	function teletype_year() {
		printf(__('<time class="entry-date" datetime="%1$s" pubdate><em>\'%2$s</em></time>', 'teletype'), esc_attr(get_the_date('c')), esc_html(get_the_date('y')));
	}
	
endif;

/**
 * This theme was built with PHP, Semantic HTML, CSS, love, and a toolbox.
 */
 