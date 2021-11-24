<?php
	if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;

    $tt_icon_block_attr = array();

	// VC Custom shortcode dir
	if (! function_exists('creptaam_shortcodes_template_dir')) {
		function creptaam_shortcodes_template_dir(){
			vc_set_shortcodes_templates_dir( get_template_directory() . '/visual-composer/shortcodes' );
		}
		creptaam_shortcodes_template_dir();
	}
	
	// VC Admin element stylesheet
	if ( ! function_exists( 'creptaam_vc_admin_styles' ) ) :
		function creptaam_vc_admin_styles() {
			wp_enqueue_style( 'creptaam_vc_admin_style', get_template_directory_uri() . '/visual-composer/assets/css/vc-element-style.css', array(), time(), 'all' );
		}
		add_action( 'admin_enqueue_scripts', 'creptaam_vc_admin_styles' );
	endif;

	// set default editor post type
	$posttype_list = array(
	    'page',
	    'tt-work',
	    'tt-service',
	);
	vc_set_default_editor_post_types( $posttype_list );


	// include vc extend file
	require get_template_directory() . "/visual-composer/vc_extend/tt-section-title.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-icon-block.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-process.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-pricing.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-team.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-zigzag-separator.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-testimonial.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-testimonial-block.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-blog-embed.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-latest-posts.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-work.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-video-embed.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-newsletter.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-btc-ecosystem.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-market-status.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-service.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-ico-offer.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-ico-offer-two.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-ico-details.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-time-lines.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-upcoming-event.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-sponsors.php";
	require get_template_directory() . "/visual-composer/vc_extend/tt-carousels.php";
	
	
	// include custom param
	require get_template_directory() . "/visual-composer/params/vc_custom_params.php";
	
	// include others file
	require get_template_directory() . "/visual-composer/inc/flaticon-array-list.php";

	// register flat icon type
	if (!function_exists('vc_iconpicker_editor_flaticon_jscss')) :
		function vc_iconpicker_editor_flaticon_jscss() {
	        wp_enqueue_style( 'flaticon' );
	    }
		add_action( 'vc_backend_editor_enqueue_js_css', 'vc_iconpicker_editor_flaticon_jscss' );
	    add_action( 'vc_frontend_editor_enqueue_js_css', 'vc_iconpicker_editor_flaticon_jscss' );
	endif;
    
    // vc_iconpicker_type_flaticon
	if (!function_exists('vc_iconpicker_type_flaticon')) :
		function vc_iconpicker_type_flaticon( $icons ) {
	        
	        $creptaam_flaticon_array = array(
				array('flaticon-001-bitcoin-20'=>'001-bitcoin-20'),
				array('flaticon-002-network'=>'002-network'),
				array('flaticon-003-bitcoin-19'=>'003-bitcoin-19'),
				array('flaticon-004-bitcoin-18'=>'004-bitcoin-18'),
				array('flaticon-005-padlock'=>'005-padlock'),
				array('flaticon-006-bitcoin-17'=>'006-bitcoin-17'),
				array('flaticon-007-bitcoin-16'=>'007-bitcoin-16'),
				array('flaticon-008-bitcoin-15'=>'008-bitcoin-15'),
				array('flaticon-009-gold-ingot'=>'009-gold-ingot'),
				array('flaticon-010-bitcoin-14'=>'010-bitcoin-14'),
				array('flaticon-011-bitcoin-13'=>'011-bitcoin-13'),
				array('flaticon-012-bitcoin-12'=>'012-bitcoin-12'),
				array('flaticon-013-bitcoin-11'=>'013-bitcoin-11'),
				array('flaticon-014-bitcoin-10'=>'014-bitcoin-10'),
				array('flaticon-015-invoice'=>'015-invoice'),
				array('flaticon-016-piggy-bank'=>'016-piggy-bank'),
				array('flaticon-017-placeholder'=>'017-placeholder'),
				array('flaticon-018-bitcoin-9'=>'018-bitcoin-9'),
				array('flaticon-019-bitcoin-8'=>'019-bitcoin-8'),
				array('flaticon-020-bitcoin-7'=>'020-bitcoin-7'),
				array('flaticon-021-bitcoin-6'=>'021-bitcoin-6'),
				array('flaticon-022-safebox'=>'022-safebox'),
				array('flaticon-023-bitcoin-5'=>'023-bitcoin-5'),
				array('flaticon-024-bitcoin-4'=>'024-bitcoin-4'),
				array('flaticon-025-pick'=>'025-pick'),
				array('flaticon-026-bitcoin-3'=>'026-bitcoin-3'),
				array('flaticon-027-bitcoin-2'=>'027-bitcoin-2'),
				array('flaticon-028-bank'=>'028-bank'),
				array('flaticon-029-bitcoin-1'=>'029-bitcoin-1'),
				array('flaticon-030-bitcoin'=>'030-bitcoin')
			);

	        return array_merge( $icons, $creptaam_flaticon_array );
	    }
	    add_filter( 'vc_iconpicker-type-flaticon', 'vc_iconpicker_type_flaticon' );
	endif;
    
    // vc_iconpicker_base_register_flaticon_css
	if (!function_exists('vc_iconpicker_base_register_flaticon_css')) :
		function vc_iconpicker_base_register_flaticon_css(){
	        wp_register_style( 'flaticon', get_template_directory_uri() . '/fonts/flaticon/flaticon.css', false, WPB_VC_VERSION, 'screen' );
	    }
	    add_action( 'vc_base_register_front_css', 'vc_iconpicker_base_register_flaticon_css' );
	    add_action( 'vc_base_register_admin_css', 'vc_iconpicker_base_register_flaticon_css' );
	endif;



	// post lists for narrow data
    function creptaam_post_data(){
	    $posts = get_posts(array(
	        'posts_per_page' => -1,
	        'post_type' => 'post',
	    ));
	    $result = array();
	    foreach ($posts as $post) {
	        $result[] = array(
	            'value' => $post->ID,
	            'label' => $post->post_title,
	        );
	    }
	    return $result;
	}


	// post cateogry lists for narrow data
	function creptaam_category_list(){
		$categories = get_categories(array('hide_empty' => false));
		$lists = array();
		foreach($categories as $category) {
			$lists[] = array(
				'value' => $category->cat_ID,
	            'label' => $category->name,
			);
		}
		return $lists;
	}


    // post cateogry lists for narrow data by slug
	function creptaam_category_slug(){
		$categories = get_categories(array('hide_empty' => false));
		$lists = array();
		foreach($categories as $category) {
			$lists[] = array(
				'value' => $category->slug,
	            'label' => $category->name,
			);
		}
		return $lists;
	}

    // post tags lists for narrow data
	function creptaam_tag_list(){
		$tags = get_tags(array('hide_empty' => false));
		$tag_list = array();
		foreach($tags as $tag) {
			$tag_list[] = array(
				'value' => $tag->slug,
	            'label' => $tag->name,
			);
		}
		return $tag_list;
	}


    // Author lists for narrow data
	function creptaam_autor_list(){

		$args = array(
	        'blog_id'      => $GLOBALS['blog_id'],
	        'orderby'      => 'nicename'
	    );
		$authors = get_users($args);
		$author_list = array();
		foreach($authors as $author) {
			$author_list[] = array(
				'value' => $author->ID,
	            'label' => $author->user_nicename,
			);
		}
		return $author_list;
	}
	

    // Author lists for narrow data
	function creptaam_user_nicename(){

		$args = array(
	        'blog_id'      => $GLOBALS['blog_id'],
	        'orderby'      => 'nicename'
	    );
		$authors = get_users($args);
		$author_list = array();
		foreach($authors as $author) {
			$author_list[] = array(
				'value' => $author->user_nicename,
	            'label' => $author->user_nicename,
			);
		}
		return $author_list;
	}