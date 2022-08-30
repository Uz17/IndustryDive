<?php
// Function of Theme



// Theme Title
add_theme_support('title-tag' );

// Theme SCSS File

function scss_file_calling(){
    wp_enqueue_style('uz-style', get_stylesheet_uri( ));
    wp_register_style('custom', get_template_directory_uri( ).'/css/custom.css', array(),'1.0.0', 'all');
    wp_enqueue_style('custom');

    wp_enqueue_script('jquery');
    wp_register_style('main', get_template_directory_uri( ).'/js/main.js', array(),'1.0.0', 'true');

}

add_action('wp_enqueue_scripts','scss_file_calling');

register_nav_menus(
    array(
    'my_main_menu' => 'Main Menu',
    'second_menu' => 'Footer Menu',
)
    );
function my_my_load_more_scripts() {
 
	global $wp_query; 
 
	wp_enqueue_script('jquery');
 
	
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/myloadmore.js', array('jquery') );
 
	
	wp_localize_script( 'my_loadmore', 'my_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'my_my_load_more_scripts' );



 function my_loadmore_ajax_handler(){
 
	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
	$args['post_status'] = 'publish';
    $args['post_category']= 'latest';
 
	// it is always better to use WP_Query but not here
	query_posts( $args );
 
	if( have_posts() ) :
 
		// run the loop
		while( have_posts() ): the_post();
 ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php
                            if ( has_post_thumbnail() ) :
                                the_post_thumbnail();
                            endif;
                            ?>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header>            <div class="entry-content">
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>">Read More</a>
                            </div>
                        </article>
 
 <?php
		endwhile;
 
	endif;
	die; // here we exit the script and even no wp_reset_query() required!
}
 
 
 
add_action('wp_ajax_loadmore', 'my_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'my_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}