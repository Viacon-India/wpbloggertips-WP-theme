<?php /* Template Name: Home */
get_header(); ?>

<!--<div class="container-fluid banner-image">-->
<!--    <div class="row">-->
       <!-- <img src="<?php //echo wp_get_attachment_url(get_post_meta(get_the_ID(), 'banner_image', true)); ?>" alt="banner-image"> -->
       
<!--       <img src="<?php //echo get_template_directory_uri(); ?>/images/bg-min.jpg" alt="banner-img">-->
       
<!--       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,128L40,149.3C80,171,160,213,240,229.3C320,245,400,235,480,240C560,245,640,267,720,277.3C800,288,880,288,960,261.3C1040,235,1120,181,1200,181.3C1280,181,1360,235,1400,261.3L1440,288L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>-->
        
<!--       <div class="banner-cont">-->
<!--           <h2><?php //echo get_post_meta(get_the_ID(), 'banner_content', true); ?></h2>-->
<!--           <p><?php //echo get_post_meta(get_the_ID(), 'banner_sub_content', true); ?></p>-->
           
<!--           <div id="subscription-form" class="modal">-->
<!--        		<h4>Subscribe to Our Newsletter</h4>-->
<!--        		<?php //echo do_shortcode('[email-subscribers-form id="1"]'); ?>-->
<!--        		<a href="#" style="float: right;" rel="modal:close">Close</a>-->
<!--        	</div>-->
        	
<!--        </div>     -->
<!--    </div>-->
<!--</div>-->

    <?php $args = array(
    	'numberposts' => 3, 'orderby' => 'meta_value', 'meta_key' => 'post_views_count', 
    	'order' => 'DESC', 'post_type' => 'post', 'post_status' => 'publish'
    );
    $myposts = get_posts($args); ?>

    <section class="banner">
        <h1 style="display:none;">HOME</h1>
	    <div class="slider">
	    <?php foreach ($myposts as $post) : setup_postdata($post); ?>
	      <div class="slide d-flex">
	        <div class="banner-overlay"></div>
	        <?php the_post_thumbnail('full', array( 'class' => 'w-100 card-img-top wp-post-image' )); ?>
	        <div class="content">
	          <h2 class="title">
	            <a href="<?php echo get_the_permalink($post->ID); ?>"><?php the_title(); ?></a>
	          </h2>
	          <div class="actions">
	            <!-- <a href="#" class="read-more">Read more</a> -->
	          </div>
	        </div>
	      </div>
	    <?php endforeach;
	    wp_reset_postdata(); ?>
	    </div>
	</section>
	
	

<div class="main container-fluid p-4">
	
	<?php /* ?>
	<!----- Testing top stories----->
	<section class="post-list-group top-posts">
    	<div class="related-entries">
    		<div class="block">
    		    <div class="left-title">
    		        <h3 class="text-center aos-init aos-animate">Top Stories</h3>
    		    </div>
    		    
    			<div class="row">
    				<?php foreach ($myposts as $post) : setup_postdata($post); ?>
    				<?php
    				$attachmentid = get_post_thumbnail_id(get_the_ID());
                    $featured_image = wp_get_attachment_url( $attachmentid , 'full' );
                    $image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
                    //$featured_image = get_the_post_thumbnail_url(); ?>
    					<div class="col-md-4">
    						<div class="card3">
    							<?php if(empty($featured_image)) {
                					$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
                					<img class="w-100 card-img-top" src="<?php echo $featured_image; ?>" alt="<?php echo $image_alt; ?>" />
                				<?php } else { ?>
            					    <?php the_post_thumbnail('thumbnail-size', array( 'class' => 'w-100 card-img-top wp-post-image' )); ?>
            					<?php } ?>
            					<?php $author_id=$post->post_author; ?>
            					<span>
            					    <a class="top-post-title" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
        						</span>
    						</div>
    					</div>
    				<?php endforeach;
                    wp_reset_postdata(); ?>
    			</div>
    		</div>
    	</div>
	</section>
	<?php */ ?>
	
	<!----------- Adventure posts ----------->
	<?php $adventure_cat = 10;
	$adventure_array = get_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'orderby' => 'DESC', 'category' => $adventure_cat));
	if(is_array($adventure_array) && count($adventure_array>0)) { ?>
	<section class="post-list-group">
	    <div class="left-title">
		    <h3 data-aos="fade-in" data-aos-duration="700" class="text-center">SEO</h3>
		</div>
		<div class="card-deck">
			
			<?php foreach ($adventure_array as $post) : setup_postdata($post); ?>
				<?php $attachmentid = get_post_thumbnail_id(get_the_ID());
                    $featured_image = wp_get_attachment_url( $attachmentid , 'full' );
                    $image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
                    //$featured_image = get_the_post_thumbnail_url();
				
				    get_template_part( 'template-parts/content', 'cat-loop');
				    
				endforeach;
		        wp_reset_postdata(); ?>

		</div>
		<div class="more text-center">
			<a href="<?php echo get_category_link($adventure_cat); ?>" class="card-link text-uppercase">View more</a>
		</div>
	</section>
	<?php } ?>

	<!----------- TIPS AND TRICK posts ----------->
	<?php $destination_cat = 9;
	$destination_array = get_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'orderby' => 'DESC', 'category' => $destination_cat));
	    if(is_array($destination_array) && count($destination_array>0)) { ?>
			
		<section class="post-list-group">
		    <div class="left-title">
		        <h3 data-aos="fade-in" data-aos-duration="700" class="text-center">TIPS AND TRICK</h3>
		    </div>
		    <div class="card-deck">
			
    			<?php foreach ($destination_array as $post) : setup_postdata($post); ?>
    				<?php $attachmentid = get_post_thumbnail_id(get_the_ID());
                    $featured_image = wp_get_attachment_url( $attachmentid , 'full' );
                    $image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
                    //$featured_image = get_the_post_thumbnail_url();
                    
                    get_template_part( 'template-parts/content', 'cat-loop');
                    
                endforeach;
		        wp_reset_postdata(); ?>

		</div>
		<div class="more text-center">
			<a href="<?php echo get_category_link($destination_cat); ?>" class="card-link text-uppercase">View more</a>
		</div>
	</section>
	<?php } ?>

	<!----------- ebw Guides posts ----------->
	<?php $ebw_guide_cat = 7;
	$ebw_guide_array = get_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'orderby' => 'DESC', 'category' => $ebw_guide_cat));
	if(is_array($ebw_guide_array) && count($ebw_guide_array>0)) { ?>
	<section class="post-list-group">
	    <div class="left-title">
		    <h3 data-aos="fade-in" data-aos-duration="700" class="text-center">Wordpress</h3>
		</div>
		<div class="card-deck">
			
			<?php foreach ($ebw_guide_array as $post) : setup_postdata($post); ?>
				<?php $attachmentid = get_post_thumbnail_id(get_the_ID());
                $featured_image = wp_get_attachment_url( $attachmentid , 'full' );
                $image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
                //$featured_image = get_the_post_thumbnail_url();
                
                    get_template_part( 'template-parts/content', 'cat-loop');
                    
            endforeach;
		    wp_reset_postdata(); ?>

		</div>

		<div class="more text-center">
			<a href="<?php echo get_category_link($ebw_guide_cat); ?>" class="card-link text-uppercase">View more</a>
		</div>
	</section>
	<?php } ?>

	<!-------------------- Latest Post ----------------->
	<section class="post-list-group">
	    <div class="left-title">
		    <h3 data-aos="fade-in" data-aos-duration="700" class="text-center">Latest Post</h3>
		</div>
		<div class="card-deck">

			<?php $top_stories = get_posts(array('post_type' => 'post', 'posts_per_page' => 4, 'orderby' => 'DESC'));
			foreach ($top_stories as $post) : setup_postdata($post); ?>
				<?php $attachmentid = get_post_thumbnail_id(get_the_ID());
                $featured_image = wp_get_attachment_url( $attachmentid , 'full');
                $image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
                //$featured_image = get_the_post_thumbnail_url();
                
                get_template_part( 'template-parts/content', 'related-loop');
                    
            endforeach;
		    wp_reset_postdata(); ?>

		</div>
		<div class="more text-center">
			<a href="<?php echo home_url('/blog'); ?>" class="card-link text-uppercase">View more</a>
		</div>
	</section>

</div>

<?php get_footer(); ?>

<script>
    jQuery(document).ready(function($) {
	  
        $('.banner .slider').slick({
          dots: true,
          infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear',
          autoplay: true,
          autoplaySpeed: 4000,
        });
	
    });
</script>