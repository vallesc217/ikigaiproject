<?php
if ( ! defined( 'ABSPATH' ) ) :
    exit; // Exit if accessed directly
endif;
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Single blog post navigation
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_post_navigation')) :

    function creptaam_post_navigation() {

        $prev_post = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
        $next_post = get_adjacent_post(false, '', false);

        if (!$next_post && !$prev_post) :
            return;
        endif; ?>
        <?php do_action('creptaam_before_single_post_navigation' );?>
        <nav class="single-post-navigation" role="navigation">
            <div class="row">
                <?php if ($prev_post): ?>
                    <!-- Previous Post -->
                    <div class="col-xs-6">
                        <div class="previous-post-link">
                            <h4><?php esc_html_e('Previous Article', 'creptaam') ?></h4>
                            <?php $previous_post = get_previous_post();
                            if (!empty( $previous_post )): ?>
                              <a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>"><?php echo esc_html($previous_post->post_title); ?></a>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endif ?>
                
                <?php if ($next_post): ?>
                    <!-- Next Post -->
                    <div class="col-xs-6">
                        <div class="next-post-link">
                        <h4><?php esc_html_e('Next Article', 'creptaam') ?></h4>
                        <?php $next_post = get_next_post();
                            if (!empty( $next_post )): ?>
                              <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>"><?php echo esc_html( $next_post->post_title ); ?></a>
                        <?php endif; ?>
                        </div>
                    </div>
                <?php endif ?>
            </div> <!-- .row -->
        </nav> <!-- .single-post-navigation -->
        <?php do_action('creptaam_after_single_post_navigation' );?>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Blog posts navigation
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_posts_navigation')) :

    function creptaam_posts_navigation() { ?>
        <div class="row blog-navigation clearfix">
            <?php if (get_next_posts_link()) : ?>
                <div class="col-sm-6 pull-left">
                    <div class="previous-page">
                        <?php next_posts_link('<i class="fa fa-angle-double-left"></i>' . esc_html__('Older Posts', 'creptaam')); ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (get_previous_posts_link()) : ?>
                <div class="col-sm-6 pull-right">
                    <div class="next-page">
                        <?php previous_posts_link(esc_html__('Newer Posts', 'creptaam') . '<i class="fa fa-angle-double-right"></i>'); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    <?php }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Blog posts pagination for default blog layout
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_posts_pagination')) :
    function creptaam_posts_pagination() {
        global $wp_query;
        if ($wp_query->max_num_pages > 1) {
            $big = 999999999; // need an unlikely integer
            $items = paginate_links(array(
                'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'    => '?paged=%#%',
                'prev_next' => true,
                'current'   => max(1, get_query_var('paged')),
                'total'     => $wp_query->max_num_pages,
                'type'      => 'array',
                'prev_text' => '<i class="fa fa-arrow-left"></i>',
                'next_text' => '<i class="fa fa-arrow-right"></i>'
            ));

            $pagination = "<ul class=\"pagination\">\n\t<li>";
            $pagination .= join("</li>\n\t<li>", $items);
            $pagination .= "</li>\n</ul>\n";

            return $pagination;
        }
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Blog list style posts pagination
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if ( ! function_exists( 'creptaam_list_posts_pagination' ) ):

    function creptaam_list_posts_pagination() {
        global $query;

        $big   = 999999999; // need an unlikely integer
        $items = paginate_links(array(
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',
            'prev_next' => TRUE,
            'current'   => max( 1, get_query_var( 'paged' ) ),
            'total'     => $query->max_num_pages,
            'type'      => 'array',
            'prev_text' => esc_html__( 'Prev.', 'creptaam' ),
            'next_text' => esc_html__( 'Next', 'creptaam' )
        ) );

        $pagination = '<ul class="pagination"><li>';
        $pagination .= join( "</li><li>", (array) $items );
        $pagination .= "</li></ul>";

        return $pagination;
    }
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Custom posts pagination
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if(!function_exists('creptaam_pagination')) {
    function creptaam_pagination($wp_query, $paged, $pages = '', $range = 2) {
         $showitems = ($range * 2)+1;  

         if(empty($paged)) $paged = 1;

         if($pages == '')
         {
             $pages = $wp_query->max_num_pages;
             if(!$pages)
             {
                 $pages = 1;
             }
         }   

         if(1 != $pages)
         {
            echo '<ul class="pagination">';
                 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."' class='prev page-numbers'><i class='fa fa-angle-double-left'></i></a></li>";
        
                 for ($i=1; $i <= $pages; $i++)
                 {
                     if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                     {
                         echo ($paged == $i)? "<li><span class='page-numbers current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
                     }
                 }
        
                 if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."' class='next page-numbers'><i class='fa fa-angle-double-right'></i></a></li>";
            echo '</ul>';
         }
    }
}


//========================================================================================
//  Prints HTML with meta information for the current post-date/time, author & others.
//=======================================================================================


if (!function_exists('creptaam_posted_on')) :
    function creptaam_posted_on() { ?>

        <ul class="entry-meta clearfix">
            
            <?php if ( creptaam_option( 'tt-post-meta', 'post-author', false)) : ?>
                <li>
                    <span class="author vcard">
                        <?php echo esc_html__('BY ', 'creptaam') ?>
                        <?php printf('<a class="url fn n" href="%1$s">%2$s</a>',
                            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                            esc_html(get_the_author())
                        ) ?>
                    </span>
                </li>
            <?php endif; ?>

            <?php if ( creptaam_option( 'tt-post-meta', 'post-date', false)) : ?>
                <li>
                    <span>
                    <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_time( get_option( 'date_format' ) ); ?></a>
                    </span>
                </li>
            <?php endif; ?>

            <?php if ( creptaam_option( 'tt-post-meta', 'post-category', true )) : ?>
                <li>
                    <span class="posted-in">
                        <?php echo get_the_category_list(esc_html_x(', ', 'Used between list items, there is a space after the comma.', 'creptaam')); ?>
                    </span>
                </li>
            <?php endif; ?>

            <?php if ( creptaam_option( 'tt-post-meta', 'post-comment', false )) : ?>
                <li>
                    <span class="post-comments">
                        <?php comments_popup_link(
                            esc_html__('No Comments', 'creptaam'),
                            esc_html__('1 Comment', 'creptaam'),
                            esc_html__('% Comments', 'creptaam'), 
                            '',
                            esc_html__('Comments Off', 'creptaam')
                        ); ?>
                    </span>
                </li>
            <?php endif; ?>

            <?php if (function_exists('creptaam_get_post_views')) :
                $post_views = creptaam_get_post_views(get_the_ID()); ?>
                <?php if ( creptaam_option( 'tt-post-meta', 'post-view', false)) : ?>
                    <li>
                        <span class="post-view">
                            <?php if($post_views <= 1){
                                echo intval($post_views).' '.esc_html__('view', 'creptaam').'';
                            }else{
                                echo intval($post_views).' '.esc_html__('views', 'creptaam').'';
                            } ?>
                        </span>
                    </li>
                <?php endif;
            endif; ?>

            <?php echo edit_post_link(esc_html__('Edit Post', 'creptaam'), '<li class="edit-link">', '</li>') ?>
        </ul>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Post meta for grid style post
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('creptaam_grid_posted_on')) :
    function creptaam_grid_posted_on() { ?>

        <ul class="post-meta">

            <?php if ( creptaam_option( 'tt-post-meta', 'post-author', TRUE ) ) : ?>
                <li>
                    <span class="author vcard">
                        <i class="fa fa-user"></i><?php printf('<a class="url fn n" href="%1$s">%2$s</a>',
                            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                            esc_html(get_the_author())
                        ) ?>
                    </span>
                </li>
            <?php endif; ?>
            
            <?php if ( creptaam_option( 'tt-post-meta', 'post-date', TRUE ) ) : ?>
                <li>
                    <i class="fa fa-calendar"></i><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_time( get_option( 'date_format' ) ); ?></a>
                </li>
            <?php endif; ?>

            <?php echo edit_post_link(esc_html__('Edit Post', 'creptaam'), '<li class="edit-link">', '</li>') ?>
        </ul>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Returns true if a blog has more than 1 category.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_categorized_blog')) :
    
    function creptaam_categorized_blog() {
        if (false === ($all_the_cool_cats = get_transient('creptaam_categories'))) :
            // Create an array of all the categories that are attached to posts.
            $all_the_cool_cats = get_categories(array(
                'fields'     => 'ids',
                'hide_empty' => 1,

                // We only need to know if there is more than one category.
                'number'     => 2,
            ));

            // Count the number of categories that are attached to the posts.
            $all_the_cool_cats = count($all_the_cool_cats);

            set_transient('creptaam_categories', $all_the_cool_cats);
        endif;

        if ($all_the_cool_cats > 1) :
            // This blog has more than 1 category so creptaam_categorized_blog should return true.
            return true;
        else :
            // This blog has only 1 category so creptaam_categorized_blog should return false.
            return false;
        endif;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Flush out the transients used in creptaam_categorized_blog.
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_category_transient_flusher')) :

    function creptaam_category_transient_flusher() {
        // Like, beat it. Dig?
        delete_transient('creptaam_categories');
    }

    add_action('edit_category', 'creptaam_category_transient_flusher');
    add_action('save_post', 'creptaam_category_transient_flusher');

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
//  Post Password form
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_post_password_form')) :

    function creptaam_post_password_form() {
        global $post;
        $creptaam_label_text = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);

        return '
        <div class="row">
            <form class="clearfix" action="' . esc_url(home_url('wp-login.php?action=postpass', 'login_post')) . '" method="post">
                <div class="col-md-12">
                    <label for="' . $creptaam_label_text . '">' . esc_html__("This post is password protected. To view it please enter your password below:", 'creptaam') . '</label>
                    <div class="input-group">
                        <input class="form-control" name="post_password" placeholder="' . esc_attr__("Password:", 'creptaam') . '" id="' . $creptaam_label_text . '" type="password" /><div class="input-group-btn"><button class="btn btn-primary" type="submit" name="Submit">' . esc_html__("Submit", 'creptaam') . '</button></div>
                    </div>
                </div>
            </form>
        </div>';
    }

    add_filter('the_password_form', 'creptaam_post_password_form');
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Breadcrumb
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_breadcrumbs')) :

    function creptaam_breadcrumbs(){ ?>
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'creptaam') ?></a>
            </li>
            <li class="active">
                <?php if( is_tag() ) { ?>
                <?php esc_html_e('Posts Tagged ', 'creptaam') ?><span class="raquo">/</span><?php single_tag_title(); echo('/'); ?>
                <?php } elseif (is_day()) { ?>
                <?php esc_html_e('Posts made in', 'creptaam') ?> <?php echo get_the_time('F jS, Y'); ?>
                <?php } elseif (is_month()) { ?>
                <?php esc_html_e('Posts made in', 'creptaam') ?> <?php echo get_the_time('F, Y'); ?>
                <?php } elseif (is_year()) { ?>
                <?php esc_html_e('Posts made in', 'creptaam') ?> <?php echo get_the_time('Y'); ?>
                <?php } elseif (is_search()) { ?>
                <?php esc_html_e('Search results for', 'creptaam') ?> <?php the_search_query() ?>
                <?php } elseif (is_404()) { ?>
                <?php esc_html_e('404', 'creptaam') ?>
                <?php } elseif (is_single()) { ?>
                <?php $category = get_the_category();
                if ( $category ) {
                    $catlink = get_category_link( $category[0]->cat_ID );
                    echo ('<a href="'.esc_url($catlink).'">'.esc_html($category[0]->cat_name).'</a> '.'<span class="raquo"> /</span> ');
                } echo get_the_title(); ?>
                <?php } elseif (is_category()) { ?>
                <?php single_cat_title(); ?>
                <?php } elseif (is_tax()) { ?>
                <?php $creptaam_taxonomy_links = array();
                $creptaam_term = get_queried_object();
                $creptaam_term_parent_id = $creptaam_term->parent;
                $creptaam_term_taxonomy = $creptaam_term->taxonomy;
                while ( $creptaam_term_parent_id ) {
                    $creptaam_current_term = get_term( $creptaam_term_parent_id, $creptaam_term_taxonomy );
                    $creptaam_taxonomy_links[] = '<a href="' . esc_url( get_term_link( $creptaam_current_term, $creptaam_term_taxonomy ) ) . '" title="' . esc_attr( $creptaam_current_term->name ) . '">' . esc_html( $creptaam_current_term->name ) . '</a>';
                    $creptaam_term_parent_id = $creptaam_current_term->parent;
                }
                if ( !empty( $creptaam_taxonomy_links ) ) echo implode( '<span class="raquo">/</span>', array_reverse( $creptaam_taxonomy_links ) ) . '<span class="raquo">/</span>';
                echo esc_html( $creptaam_term->name ); 
                } elseif (is_author()) { 
                    global $wp_query;
                    $curauth = $wp_query->get_queried_object();
                    esc_html_e('Posts by: ', 'creptaam'); echo ' ',$curauth->nickname; 
                } elseif (is_page()) {
                    echo get_the_title();
                } elseif (is_home()) {
                    esc_html_e('Blog', 'creptaam');
                } elseif (class_exists('WooCommerce') and (is_shop())){
                    esc_html_e('Shop', 'creptaam');
                } elseif(is_post_type_archive()){
                    echo post_type_archive_title( '', FALSE );
                }?>
            </li>
        </ul>
    <?php
    }
endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page header section background title
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_page_header_section_title')) :
    function creptaam_page_header_section_title() {
        $creptaam_query = get_queried_object();

        if (is_archive()) :
            if (is_day()) :
                $archive_title = get_the_time('d F, Y');
                $page_header_title = sprintf(esc_html__('Archive of: %s', 'creptaam'), $archive_title);
            elseif (is_month()) :
                $archive_title = get_the_time('F Y');
                $page_header_title = sprintf(esc_html__('Archive of: %s', 'creptaam'), $archive_title);
            elseif (is_year()) :
                $archive_title = get_the_time('Y');
                $page_header_title = sprintf(esc_html__('Archive of: %s', 'creptaam'), $archive_title);
            endif;
        endif;

        if (is_404()) :
            $page_header_title = esc_html__('404 Not Found', 'creptaam');
        endif;

        if (is_search()) :
            $page_header_title = sprintf(esc_html__('Search result for: "%s"', 'creptaam'), get_search_query());
        endif;

        if (is_category()) :
            $page_header_title = sprintf(esc_html__('Category: %s', 'creptaam'), $creptaam_query->name);
        endif;

        if (is_tag()) :
            $page_header_title = sprintf(esc_html__('Tag: %s', 'creptaam'), $creptaam_query->name);
        endif;

        if (is_author()) :
            $page_header_title = sprintf(esc_html__('Posts of: %s', 'creptaam'), $creptaam_query->display_name);
        endif;

        if (is_tax()) {
            $page_header_title = sprintf(esc_html__('%s', 'creptaam'), $creptaam_query->name);
        }

        if (is_page()) :
            $page_header_title = $creptaam_query->post_title;
        endif;

        if (is_home() or is_single()) :
            $page_header_title = creptaam_option('blog-title');
        endif;

        if (is_single() || is_singular()) :
            $page_header_title = get_the_title();
        endif;

        if ( is_post_type_archive() ) {
            $page_header_title = post_type_archive_title( '', FALSE );
        }

        if (class_exists( 'WooCommerce' ) ) :
            if ( is_post_type_archive( 'product' ) ) {
                $page_header_title = post_type_archive_title( '', FALSE );
            }
            if ( is_product_category() ) {
                $page_header_title = sprintf( __( '%s', 'creptaam' ), $creptaam_query->name );
            }
            if ( is_product_tag() ) {
                $page_header_title = sprintf( __( '%s', 'creptaam' ), $creptaam_query->name );
            }
        endif;

        $page_header_title = apply_filters('creptaam_page_header_section_title', $page_header_title, $page_header_title);

        if (empty($page_header_title)) :
            $page_header_title = get_bloginfo('name').' '.esc_html__('Blog', 'creptaam');
        endif;

        return $page_header_title;
    }
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Page header section background image
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_page_header_background')) :

    function creptaam_page_header_background() {

        $page_header_image = false;

        if (is_archive()) :
            $page_header_image = creptaam_option('archive-header-image', 'url');
        endif;

        if (is_404()) :
            $page_header_image = creptaam_option('header-404-image', 'url');
        endif;

        if (is_search()) :
            $page_header_image = creptaam_option('search-header-image', 'url');
        endif;

        if (is_category()) :
            $page_header_image = creptaam_option('category-header-image', 'url');
        endif;

        if (is_tag()) :
            $page_header_image = creptaam_option('tag-header-image', 'url');
        endif;

        if (is_author()) :
            $page_header_image = creptaam_option('author-header-image', 'url');
        endif;


        if (is_page()) :
            
            $page_header_image = creptaam_option('page-header-image', 'url');
            
            if (function_exists('rwmb_meta')) :
                $single_image = rwmb_meta('creptaam_page_header_image', 'type=image_advanced');
            endif;

            if (!empty($single_image)) {
                foreach ($single_image as $image) {
                    $page_header_image = $image['full_url'];
                }
            }
        endif;


        if (is_single()) :

            $page_header_image = creptaam_option('blog-header-image', 'url');
            
            if (function_exists('rwmb_meta')) :
                $single_image = rwmb_meta('creptaam_page_header_image', 'type=image_advanced');
            endif;

            if (!empty($single_image)) {
                foreach ($single_image as $image) {
                    $page_header_image = $image['full_url'];
                }
            }
        endif;

        if (empty ($single_image)) :
            if (class_exists('WooCommerce')) :
                if (is_singular('product')) :
                    $page_header_image = creptaam_option('product-header-image', 'url');
                endif;
            endif;
        endif;

        if (class_exists( 'WooCommerce' ) ) :
            if ( is_post_type_archive( 'product' ) || is_tax('product_cat') || is_tax('product_tag')) {
                $page_header_image = creptaam_option('product-header-image', 'url');
            }
        endif;

         if (empty ($single_image)) :
            if (is_singular('tt-service')) :
                $page_header_image = creptaam_option('service-header-image', 'url');
            endif;
        endif;

        if (is_home()) :
            $page_header_image = creptaam_option('blog-header-image', 'url');
        endif;

        if (!$page_header_image) :
            $page_header_image = creptaam_option('blog-header-image', 'url');
        endif;

        $image_src = apply_filters('creptaam_page_header_background', $page_header_image, $page_header_image);

        return $image_src;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Comments list
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists("creptaam_comments_list")) :

    function creptaam_comments_list($comment, $args, $depth) {
        $GLOBALS[ 'comment' ] = $comment;
        switch ($comment->comment_type) {
            // Display trackbacks differently than normal comments.
            case 'pingback' :
            case 'trackback' :
                ?>

                <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <p><?php esc_html_e('Pingback:', 'creptaam'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(esc_html__('(Edit)', 'creptaam'), '<span class="edit-link">', '</span>'); ?></p>

                <?php
                break;

            default :
                // Proceed with normal comments.
                global $post;
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <div id="comment-<?php comment_ID(); ?>" class="comment media">
                    <div class="comment-author clearfix">

                        <div class="comment-meta media-heading">

                            <div class="media-left">
                                <?php
                                    $get_avatar = get_avatar($comment, apply_filters('creptaam_post_comment_avatar_size', 60));
                                    $avatar_img = creptaam_get_avatar_url($get_avatar);
                                    //Comment author avatar
                                ?>

                                <img class="avatar" src="<?php echo esc_url($avatar_img); ?>" alt="<?php echo get_comment_author(); ?>">
                            </div>

                            <div class="media-body">
                                <div class="comment-info">
                                    <div class="comment-author">
                                        <h4><?php echo get_comment_author(); ?></h4>
                                    </div>

                                    <time><?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?></time>

                                    <div class="comment-meta-wrapper">
                                        <?php edit_comment_link(esc_html__('Edit', 'creptaam')); //edit link
                                        ?>
                                    </div>
                                </div>

                                <?php if ('0' == $comment->comment_approved) { ?>
                                    <div class="alert alert-info">
                                        <?php esc_html_e('Your comment is awaiting moderation.', 'creptaam'); ?>
                                    </div>
                                <?php } ?>

                                <?php comment_text(); //Comment text ?>

                                <?php comment_reply_link(array_merge($args, array(
                                    'reply_text' => esc_html__('Reply', 'creptaam'),
                                    'depth'      => $depth,
                                    'max_depth'  => $args[ 'max_depth' ]
                                ))); ?>
                            </div> <!-- .media-body -->
                        </div> <!-- .comment-meta -->
                    </div> <!-- .comment-author -->
                </div> <!-- #comment-## -->
                <?php
                break;
        } // end comment_type check
    }
endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Fetching Avatar URL
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_get_avatar_url')) :

    function creptaam_get_avatar_url($get_avatar) {
        preg_match("/src='(.*?)'/i", $get_avatar, $matches);

        return $matches[ 1 ];
    }

endif;



//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Search form
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_blog_search_form')) :

    function creptaam_blog_search_form($form) {
        $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . esc_url(home_url('/')) . '">
        <div class="input-field">
            <input class="form-control" type="text" value="' . get_search_query() . '" placeholder="' . esc_html__('Search', 'creptaam') . '" name="s" id="s"/>
        </div>
        <button type="submit"><i class="fa fa-search"></i></button>
        <input type="hidden" value="post" name="post_type" id="post_type" />
    </form>';

        return $form;
    }

    add_filter('get_search_form', 'creptaam_blog_search_form');

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Associative array to html attribute conversion
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_array2attr')) :
  
    function creptaam_array2attr($attr, $filter = '') {
        $attr = wp_parse_args($attr, array());
        if ($filter) {
            $attr = apply_filters($filter, $attr);
        }
        $html = '';
        foreach ($attr as $name => $value) {
            $html .= " $name=" . '"' . $value . '"';
        }

        return $html;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Hex to RGB color
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

if (!function_exists('creptaam_hex2rgb')) :
    
    function creptaam_hex2rgb($hex) {
       $hex = str_replace("#", "", $hex);

       if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
       } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
       }
       $rgb = array($r, $g, $b);

       return $rgb[0].','.$rgb[1].','.$rgb[2];
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// color modify for darken/lighten
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!function_exists('creptaam_modify_color')) :
    
    function creptaam_modify_color( $hex, $steps ) {
        $steps = max( -255, min( 255, $steps ) );
        // Format the hex color string
        $hex = str_replace( '#', '', $hex );
        if ( strlen( $hex ) == 3 ) {
            $hex = str_repeat( substr( $hex,0,1 ), 2 ).str_repeat( substr( $hex,1,1 ), 2 ).str_repeat( substr( $hex,2,1 ), 2 );
        }
        // Get decimal values
        $r = hexdec( substr( $hex,0,2 ) );
        $g = hexdec( substr( $hex,2,2 ) );
        $b = hexdec( substr( $hex,4,2 ) );
        // Adjust number of steps and keep it inside 0 to 255
        $r = max( 0,min( 255,$r + $steps ) );
        $g = max( 0,min( 255,$g + $steps ) );  
        $b = max( 0,min( 255,$b + $steps ) );
        $r_hex = str_pad( dechex( $r ), 2, '0', STR_PAD_LEFT );
        $g_hex = str_pad( dechex( $g ), 2, '0', STR_PAD_LEFT );
        $b_hex = str_pad( dechex( $b ), 2, '0', STR_PAD_LEFT );
        return '#'.$r_hex.$g_hex.$b_hex;
    }

endif;


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Post thumbnail alt text
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists( 'creptaam_alt_text' )) :
    function creptaam_alt_text(){
        $id = get_the_ID();
        $thumbnail_id = get_post_thumbnail_id($id);

        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

        if ($alt) :
            return $alt;
        else :
            return get_the_title();
        endif;
    }
endif;




//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// is woocommerce page
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('creptaam_is_woocommerce')) {
    function creptaam_is_woocommerce(){
        $has_woo = false;
        if (class_exists('WooCommerce')) {
            $has_woo = is_shop() || is_product_taxonomy() || is_product() || is_cart() || is_checkout();
        }
        return $has_woo;
    }
}


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Shortens a number and attaches K, M, B, etc. accordingly
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('creptaam_number_shorten')) {
    function creptaam_number_shorten($number, $precision = 3, $divisors = null) {
        // Setup default $divisors if not provided
        if (!isset($divisors)) {
            $divisors = array(
                pow(1000, 0) => '', // 1000^0 == 1
                pow(1000, 1) => esc_html__('K', 'creptaam'), // Thousand
                pow(1000, 2) => esc_html__('M', 'creptaam'), // Million
                pow(1000, 3) => esc_html__('B', 'creptaam'), // Billion
                pow(1000, 4) => esc_html__('T', 'creptaam'), // Trillion
                pow(1000, 5) => esc_html__('Qa', 'creptaam'), // Quadrillion
                pow(1000, 6) => esc_html__('Qi', 'creptaam') // Quintillion
            );
        }

        // Loop through each $divisor and find the
        // lowest amount that matches
        foreach ($divisors as $divisor => $shorthand) {
            if (abs($number) < ($divisor * 1000)) {
                // We found a match!
                break;
            }
        }

        // We found our match, or there were no matches.
        // Either way, use the last defined value for $divisor.
        return number_format($number / $divisor, $precision) . $shorthand;
    }
}


//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// work category
//-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (! function_exists('creptaam_work_cat')) :
    function creptaam_work_cat(){
        $work_terms = wp_get_post_terms(get_the_ID(), 'tt-work-cat');

        if ($work_terms) {
            $count = count($work_terms);
            $increament = 0;
            foreach ($work_terms as $term) :
                $increament++; ?>
                <a class="links" href="<?php echo esc_url(get_term_link($term, 'tt-work')) ?>"><?php echo esc_html($term->name);?></a><?php echo esc_html($increament < $count ? ', ' : '');
            endforeach;
        }
    }
endif;