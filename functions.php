<?php


if(!defined('ebw_DIR')) define('ebw_DIR',get_template_directory());
if(!defined('ebw_URI')) define('ebw_URI',get_template_directory_uri());

/* if ( file_exists( ebw_DIR.'/includes/config.php') ) {
	require_once(ebw_DIR.'/includes/config.php');
} */

add_action( 'after_setup_theme', 'ebw_setup' );
if(!function_exists('ebw_setup'))
{
	function ebw_setup()
	{
		load_theme_textdomain( 'ebw' );
		add_theme_support( 'automatic-feed-links' );		
		add_theme_support( 'title-tag' );		
		add_theme_support( 'custom-logo');		
		add_theme_support( 'post-thumbnails' );	
		add_image_size( 'homepage-thumb-size', 280, 200 );
		add_image_size( 'related-thumb-size', 320, 280 );

				
		$GLOBALS['content_width'] = 900;
		
		register_nav_menus( array(
			'top'    => __( 'Primary Menu', 'ebw' ),
			'useful_links' => __( 'Useful Links', 'ebw' ),
			'categories_menu' => __( 'Categories', 'ebw' ),
			//'social_media_links' => __( 'Social Media Links', 'ebw' ),
		) );
		
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
		) );		
				
		//disable admin bar for all user other than administrator
		if (!current_user_can('administrator') && !is_admin()) {
		  show_admin_bar(false);
		}		

	}
}

add_action( 'wp_enqueue_scripts', 'ebw_front_scripts' );
if(!function_exists('ebw_front_scripts')) {
	function ebw_front_scripts(){
		global $ebw;
                
		wp_enqueue_style('bootstrap-css', ebw_URI. '/css/bootstrap.min.css',array(), false,'all');     
		
		wp_enqueue_style( 'slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',array(), false,'all');
		wp_enqueue_style( 'slick-theme', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css',array(), false,'all');
		
		wp_enqueue_style('jquery-modal-css', ebw_URI. '/css/jquery.modal.min.css',array(), false,'all');
		wp_enqueue_style('ebw-default-css',ebw_URI.'/style.css',array(), false,'all' );		
		wp_enqueue_style('ebw-custom-css',ebw_URI.'/css/custom.css',array(), false,'all' );
		if(is_single()) {
			wp_enqueue_style('blog-page-custom-css',ebw_URI.'/css/blog-page.css',array(), false,'all' );
		}
		
		wp_enqueue_style('sidebar-custom-css',ebw_URI.'/css/sidebar.css',array(), false,'all' );
		//wp_enqueue_style('aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css',array(), false,'all' );
		
		//wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css');
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-js','https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js',array('jquery'),false, false );
		wp_enqueue_script('bootstrap-js',ebw_URI.'/js/bootstrap.min.js',array('jquery'),false, false );
		wp_enqueue_script('jquery-modal-min-js',ebw_URI.'/js/jquery.modal.min.js',array('jquery'),false, false );
		//wp_enqueue_script('aos-js','https://unpkg.com/aos@2.3.1/dist/aos.js',array('jquery'),false, false );
		wp_enqueue_script('custom-js',ebw_URI.'/js/custom.js',array('jquery'),false, false );
		wp_enqueue_script( 'banner-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js' ,array('jquery'),$version, true );
								 
		/* wp_localize_script('custom-js', 'Front', array(
				'ajaxurl' =>admin_url('admin-ajax.php'),
		)); */                
    }
}


add_action( 'widgets_init', 'ebw_widgets_init' );
if(!function_exists('ebw_widgets_init'))
{
	function ebw_widgets_init(){
		register_sidebar( array(
			'name'          => __( 'General Sidebar', 'ebw' ),
			'id'            => 'general_sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'ebw' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => __( 'Single page Sidebar', 'ebw' ),
			'id'            => 'single_page_sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'ebw' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => __( 'Footer Social Sidebar', 'ebw' ),
			'id'            => 'social_sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'ebw' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => __( 'Category Sidebar', 'ebw' ),
			'id'            => 'category_sidebar',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'ebw' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		
	}
}
/********************************************************/
function subh_get_post_view( $postID ) {
 $count_key = 'post_views_count';
 $count     = get_post_meta( $postID, $count_key, true );
 if ( $count == '' ) {
 delete_post_meta( $postID, $count_key );
 add_post_meta( $postID, $count_key, '0' );
 
 return '0 View';
 }
 
 return $count . ' Views';
}
function subh_set_post_view( $postID ) {	
 $count_key = 'post_views_count';
 $count     = (int) get_post_meta( $postID, $count_key, true );
 if ( $count < 1 ) {
 delete_post_meta( $postID, $count_key );
 add_post_meta( $postID, $count_key, '1' );
 } else {
 $count++;
 update_post_meta( $postID, $count_key, (string) $count );
 }
}
function subh_posts_column_views( $defaults ) {
 $defaults['post_views'] = __( 'Views' );
 
 return $defaults;
}
function subh_posts_custom_column_views( $column_name, $id ) {
 if ( $column_name === 'post_views' ) {
 echo subh_get_post_view( get_the_ID() );
 }
}
 
add_filter( 'manage_posts_columns', 'subh_posts_column_views' );
add_action( 'manage_posts_custom_column', 'subh_posts_custom_column_views', 5, 2 );


/*********************************************************************************/

add_shortcode('recent_posts', 'recent_posts_func');
if(!function_exists('recent_posts_func')) {
	function recent_posts_func() { ?>
	
		<div class="sidebar-recent-posts">
			<h2>Recent Posts</h2>
			<ul>
			<?php global $post;
			$top_stories = get_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'orderby' => 'DESC' ));
			foreach ($top_stories as $post): setup_postdata($post); ?>
				<?php $featured_image = get_the_post_thumbnail_url(); ?>
				
				<li>
					<?php if(empty($featured_image)) {
						$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
						<img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>" />
					<?php } else { ?>
						<img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>" />
					<?php } ?>
					
					<div class="">
					  <a href="<?php echo get_the_permalink(); ?>">
						<?php $title = strip_tags(get_the_title());
						echo substr($title,0,40 ); ?>...
					  </a>
					</div>
				</li>
			  
			<?php endforeach;
			wp_reset_postdata(); ?>
			</ul>
		</div>
	<?php }
}
/************************ search of 404 *****************************/
if(!function_exists('pnf_search_form')) {
	function pnf_search_form() { ?>
    
        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="search" class="form-control search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'ebw' ); ?>" 
            		value="<?php echo get_search_query(); ?>" name="s" />
        </form>
        
	<?php
	}
}