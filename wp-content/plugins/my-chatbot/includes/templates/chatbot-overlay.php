<div class="myc-content-overlay <?php if ( isset( $toggle_class ) ) { echo $toggle_class; } ?>">
	<div class="myc-content-overlay-header" title="Minimize Chat">
	<span class="myc-content-overlay-header-text"><?php echo $overlay_header_text; ?></span>
	<span class="myc-icon-toggle-up"></span>
	<span class="myc-icon-toggle-down"></span>
	</div>
	<?php if ( strlen( $overlay_powered_by_text ) > 0 ) {
		?>
		<div class="myc-content-overlay-powered-by"><?php echo $overlay_powered_by_text; ?></div>
		<?php
	} ?>
	<div class="myc-content-overlay-container"><?php echo do_shortcode( '[my_chatbot]' ); ?></div>
</div>
<span class="chat-toggle" title="Chat with Stratium"></span>