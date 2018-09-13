<?php

/* Portfolio */
function ti_portfolio( $atts ) {
   extract( shortcode_atts( array(
	  'records' => '',
	  'filtername' => '',
	  'columns' => '',
   ), $atts ) );

   ob_start(); 
   $count=1;
	
	$r = new WP_Query( array( 'posts_per_page' => $records,  'post_status' => 'publish', 'post_type' => '_portfolio','order '=>'ASC','orderby '=>'date') );
   ?>
   
   <?php $column = 'col-1-4'; if(!empty($columns)) :
			
			
	
			switch ($columns) {
				case "four-columns":
					$column = "col-1-4";
					break;
				case "three-columns":
					$column = "col-1-3";
					break;
				case "two-columns":
					$column = "col-1-2";
					break;
				default:
					echo "col-1-4";
			}
			
		  endif; ?>
   
   <div id="gallery">
   
   <div class="work-filter">
		<ul class="text-center">
			<?php 
				$terms = get_terms( array(
					'taxonomy' => '_portfolio_category',
					'hide_empty' => true,
				) );
	
				$count = 0;
				foreach($terms as $term) {
					$count++;
					$active_class = '';
					$all_filter_name = '';
					if(!empty($filtername)) : $all_filter_name = $filtername; else : $all_filter_name = 'ALL'; endif;
					if($count == 1) : echo '<li><h3><a href="javascript:;" data-filter="all" class="active filter">'.$all_filter_name.'</a></h3></li>'; endif;
					//if($count == 1) : $active_class = 'active'; endif;
					echo '<li><h3><a href="javascript:;" data-filter=".'.$term->slug.'" class="filter">'.$term->name.'</a></h3></li>';
				} 
			?>
	     </ul>
     </div>
	<div class="row">
      <div class="zerogrid">
        <div class="wrap-container">
          <div class="wrap-content clearfix home-gallery">
          <?php if ($r->have_posts()) : while ( $r->have_posts() ) : $r->the_post(); ?>
          
          <?php
			global $post;
			$attached_categories = wp_get_post_terms($post->ID, '_portfolio_category', array("fields" => "all"));
   		  ?>
            <div class="<?php echo $column; ?> mix work-item <?php foreach($attached_categories as $category) { echo $category->slug.' '; } ?>">
              <div class="wrap-col">
                <div class="item-container">
                  <div class="image">
					<?php if ( has_post_thumbnail() ) { 
			  			if($column == 'col-1-4') : the_post_thumbnail('riwa-food-gallery-4col'); endif; 
			  			if($column == 'col-1-3') : the_post_thumbnail('riwa-food-gallery-3col'); endif; 
			  			if($column == 'col-1-2') : the_post_thumbnail('large'); endif; 
		  			} ?>
                    <div class="overlay">
                        <a class="fancybox overlay-inner" href="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url('full'); } ?>"><i class="fa fa-search"></i></a>
                    </div>
                  </div> 
                </div>
              </div>
            </div>
            
            <?php  endwhile; endif; ?>
            
          </div>
        </div>
       </div>
      </div>
   			
   	
	</div>
				
	
<?php
	wp_reset_postdata(); 
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('ti_portfolio', 'ti_portfolio');

vc_map( array(
   "name" => esc_html__("Portfolio", 'riwa'),
   "base" => "ti_portfolio",
   "class" => "",
   "icon" => "custom-vc-icons vc-portfolio",
   "category" => 'Custom',
   'admin_enqueue_css' => array(get_template_directory_uri().'/css/vc_extend.css'),
   "params" => array(
		array(
			"type" => "dropdown",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("Columns", 'riwa'),
			"param_name" => "columns",
			"value" => array(
							'4 Columns' => 'four-columns',
							'3 Columns' => 'three-columns',
							'2 Columns' => 'two-columns',
						),
			"description" => esc_html__("Select Number of Columns, Default = 4", 'riwa')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("First Filter Name", 'riwa'),
			"param_name" => "filtername",
			"value" => '',
			"description" => esc_html__("Name the first Item in Filter to show all records, eg, ALL ITEMS", 'riwa')
		),
		array(
			"type" => "textfield",
			"holder" => "div",
			"class" => "",
			"heading" => esc_html__("No.of Posts", 'riwa'),
			"param_name" => "records",
			"value" => '',
			"description" => esc_html__("Number of records, enter -1 for all", 'riwa')
		),
   )
) );