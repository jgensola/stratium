<?php

add_action('init','riwa_meta_fields');

function riwa_meta_fields() {
	
	if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_team',
			'title' => esc_html__('Team Options'),
			'fields' => array (
				array (
					'key' => 'field_5763ea5b3faad',
					'label' => esc_html__('Department'),
					'name' => 'department',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
                array (
					'key' => 'field_facebook',
					'label' => esc_html__('Facebook'),
					'name' => 'facebook',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
                array (
					'key' => 'field_twitter',
					'label' => esc_html__('Twitter'),
					'name' => 'twitter',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
                array (
					'key' => 'field_instagram',
					'label' => esc_html__('Instagram'),
					'name' => 'instagram',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
                array (
					'key' => 'field_googleplus',
					'label' => esc_html__('Google Plus'),
					'name' => 'googleplus',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
                array (
					'key' => 'field_linkedin',
					'label' => esc_html__('LinkedIn'),
					'name' => 'linkedin',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => '_team',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'acf_after_title',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_page-options',
			'title' => esc_html__('Page Options'),
			'fields' => array (
				array (
					'key' => 'field_576ae413bb8c1',
					'label' => esc_html__('Choose Header'),
					'name' => 'choose_header',
					'type' => 'select',
					'instructions' => esc_html__('Select page header style'),
					'choices' => array (
						'header_def' => esc_html__('Default ( Theme Options )'),
						'header_rev' => esc_html__('Header with Revolution Slider'),
						'header_sub' => esc_html__('Header Static Image, Title and Breadcrumb'),
						'hide' => esc_html__('Hide'),
					),
					'default_value' => 'header_def',
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_576adef166276',
					'label' => esc_html__('Header Image'),
					'name' => 'header_image',
					'type' => 'image',
					'instructions' => esc_html__('Select your image to replace default image'),
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_576ae413bb8c1',
								'operator' => '==',
								'value' => 'header_sub',
							),
						),
						'allorany' => 'all',
					),
					'save_format' => 'url',
					'preview_size' => 'thumbnail',
					'library' => 'all',
				),
				array (
					'key' => 'field_576adf2566277',
					'label' => esc_html__('Page Title'),
					'name' => 'show_title',
					'type' => 'select',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_576ae413bb8c1',
								'operator' => '==',
								'value' => 'header_sub',
							),
						),
						'allorany' => 'all',
					),
					'choices' => array (
						'show' => 'Show',
						'hide' => 'Hide',
					),
					'default_value' => 'show',
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_576adf8c66278',
					'label' => esc_html__('Breadcrumb'),
					'name' => 'show_breadcrumb',
					'type' => 'select',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_576ae413bb8c1',
								'operator' => '==',
								'value' => 'header_sub',
							),
						),
						'allorany' => 'all',
					),
					'choices' => array (
						'show' => 'Show',
						'hide' => 'Hide',
					),
					'default_value' => 'show',
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_576af716ba17d',
					'label' => esc_html__('Revolution Slider'),
					'name' => 'revolution_slider',
					'type' => 'text',
					'instructions' => esc_attr__('Enter revolution slider shortcode. eg, [rev_slider alias="home-page-slider-2"]'),
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_576ae413bb8c1',
								'operator' => '==',
								'value' => 'header_rev',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),

				array (
					'key' => 'field_576afec6cd493',
					'label' => esc_html__('Button Text'),
					'name' => 'app_button_text',
					'type' => 'text',
					'instructions' => esc_html__('Text to display on button'),
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_576ae413bb8c1',
								'operator' => '==',
								'value' => 'header_rev',
							),
							array (
								'field' => 'field_576af912bc476',
								'operator' => '==',
								'value' => 'show',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => esc_html__('Make an Appointment'),
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_576aff05cd494',
					'label' => esc_html__('Form Code'),
					'name' => 'app_form_code',
					'type' => 'text',
					'instructions' => esc_attr__('For Example: [contact-form-7 id="110" title="Appointment Form"]'),
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_576ae413bb8c1',
								'operator' => '==',
								'value' => 'header_rev',
							),
							array (
								'field' => 'field_576af912bc476',
								'operator' => '==',
								'value' => 'show',
							),
						),
						'allorany' => 'all',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'page',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
						'order_no' => 0,
						'group_no' => 1,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
		register_field_group(array (
			'id' => 'acf_testimonials',
			'title' => esc_html__('Testimonials'),
			'fields' => array (
                array (
					'key' => 'field_reviewer',
					'label' => esc_html__('Reviewer Name'),
					'name' => 'testimonial_reviewer',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_575fc9dcee063',
					'label' => esc_html__('Subtitle'),
					'name' => 'subtitle',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
                array (
					'key' => 'field_rating',
					'label' => esc_html__('Select Rating'),
					'name' => 'rating_stars',
					'type' => 'select',
					'choices' => array (
						'5' => esc_html__('5 Stars'),
						'4' => esc_html__('4 Stars'),
						'3' => esc_html__('3 Stars'),
						'2' => esc_html__('2 Stars'),
						'1' => esc_html__('1 Stars'),
						'0' => esc_html__('0 Stars'),
					),
					'default_value' => '5',
					'allow_null' => 0,
					'multiple' => 0,
				),
                
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => '_testimonials',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'acf_after_title',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
	}
}