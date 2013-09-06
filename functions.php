<?php

if (!function_exists('teletype_setup')):

	function teletype_setup() {
		
		// rss feeds
		add_theme_support('automatic-feed-links');
	
		// menus
		register_nav_menus(array(
			'header' => __('Header Navigation','teletype'),
			'footer' => __('Footer Links','teletype'),
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

/* via Theme Options Page für WordPress erstellen http://blog.kulturbanause.de/2011/11/theme-options-page-fur-wordpress-erstellen/ */

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

// Einstellungen registrieren (http://codex.wordpress.org/Function_Reference/register_setting)
function theme_options_init(){
	register_setting( 'kb_options', 'kb_theme_options', 'kb_validate_options' );
}

// Seite in der Dashboard-Navigation erstellen
function theme_options_add_page() {
	add_theme_page('Theme-Options', 'Theme-Options', 'edit_theme_options', 'theme-options', 'kb_theme_options_page' ); // Seitentitel, Titel in der Navi, Berechtigung zum Editieren (http://codex.wordpress.org/Roles_and_Capabilities) , Slug, Funktion 
}

// Optionen-Seite erstellen
function kb_theme_options_page() {
	
	global $select_options, $radio_options;
	if ( ! isset( $_REQUEST['settings-updated'] ) )
	$_REQUEST['settings-updated'] = false; ?>

	<div class="wrap"> 
	
		<?php screen_icon(); ?><h2>Theme-Options</h2>
	
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?> 
			<div class="updated fade">
				<p><strong>Options saved!</strong></p>
			</div>
		<?php endif; ?>
	
		<form method="post" action="options.php">
			
			<?php settings_fields('kb_options'); ?>
			<?php $options = get_option( 'kb_theme_options' ); ?>
			
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Copyright</th>
					<td><input id="kb_theme_options[copyright]" class="regular-text" type="text" name="kb_theme_options[copyright]" value="<?php esc_attr_e( $options['copyright'] ); ?>" /></td>
				</tr>
				<tr valign="top">
					<th scope="row">Google Analytics</th>
					<td><textarea id="kb_theme_options[analytics]" class="large-text" cols="50" rows="10" name="kb_theme_options[analytics]"><?php echo esc_textarea( $options['analytics'] ); ?></textarea></td>
				</tr>
			</table>
			
			<!-- submit -->
			<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>
			
		</form>
		
	</div>
	
<?php }

// Strip HTML-Code:
// Hier kann definiert werden, ob HTML-Code in einem Eingabefeld 
// automatisch entfernt werden soll. Soll beispielsweise im 
// Copyright-Feld KEIN HTML-Code erlaubt werden, kommentiert die Zeile 
// unten wieder ein. http://codex.wordpress.org/Function_Reference/wp_filter_nohtml_kses
function kb_validate_options( $input ) {
	// $input['copyright'] = wp_filter_nohtml_kses( $input['copyright'] );
	return $input;
}

 