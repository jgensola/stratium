<?php
/**
 * The template for displaying the footer
 */
global $redux_ti; // Get theme options
?>

</div><!-- Conteiner End -->

<?php
	$riwa_footer_layout = '01';
	do_action( 'riwa_footer_layout', $riwa_footer_layout);
?>

<a href="#" id="back-top" class="show"><i class="fa fa-angle-up fa-2x"></i></a>
  
</div>

<?php wp_footer(); ?>
</body>
</html>
