<?php
function riwa_social_sharing_buttons($social_content = '') {
    
	global $post;
        //$social_content = '';
        
		// Get current page URL 
		$riwaURL = urlencode(get_permalink());
 
		// Get current page title
		$riwaTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$riwaThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$riwaTitle.'&amp;url='.$riwaURL.'';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$riwaURL;
		$googleURL = 'https://plus.google.com/share?url='.$riwaURL;
		$bufferURL = 'https://bufferapp.com/add?url='.$riwaURL.'&amp;text='.$riwaTitle;
		$whatsappURL = 'whatsapp://send?text='.$riwaTitle . ' ' . $riwaURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$riwaURL.'&amp;title='.$riwaTitle;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$riwaURL.'&amp;media='.$riwaThumbnail[0].'&amp;description='.$riwaTitle;
 
		// Add sharing button at the end of page/page content
		$social_content .= '<ul class="riwa-social social_simple">';
		$social_content .= '<li><a class="riwa-link riwa-twitter" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
		$social_content .= '<li><a class="riwa-link riwa-facebook" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
		//$social_content .= '<li><a class="riwa-link riwa-whatsapp" href="'.$whatsappURL.'" target="_blank"><i class="fa fa-whatsapp"></i></a></li>';
		$social_content .= '<li><a class="riwa-link riwa-googleplus" href="'.$googleURL.'" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
		$social_content .= '<li><a class="riwa-link riwa-linkedin" href="'.$linkedInURL.'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
		$social_content .= '<li><a class="riwa-link riwa-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>';
        //$social_content .= '<a class="riwa-link riwa-buffer" href="'.$bufferURL.'" target="_blank">Buffer</a>';
		$social_content .= '</ul>';
		
		return $social_content;

};
//add_action( 'social_content', 'riwa_social_sharing_buttons');