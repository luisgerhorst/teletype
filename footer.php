<?php
	$options = get_option('kb_theme_options');
?>
	
	</div> <!-- #content -->
	
	<footer>
		
		<p><?php printf(
			__('Copyright &copy; %1$s %2$s', 'teletype'),
			date('Y'),
			$options['copyright']
		); ?></p>
		
		<nav>
			<?php wp_nav_menu(array('theme_location' => 'footer')); ?>
		</nav>
		
	</footer>
	
	</div> <!-- #wrapper -->
	
	<?php echo $options['analytics']; ?>
	
	<?php wp_footer(); ?>

</body>
</html>