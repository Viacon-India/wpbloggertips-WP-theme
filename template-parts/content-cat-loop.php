<?php $attachmentid = get_post_thumbnail_id(get_the_ID());
$featured_image = wp_get_attachment_url( $attachmentid , 'full' );
$image_alt = get_post_meta( $attachmentid, '_wp_attachment_image_alt', true);
$categories = get_the_category();

//$featured_image = get_the_post_thumbnail_url(); ?>
<div data-aos="zoom-in-up" data-aos-duration="700" class="card text-center">
	
	<a href="<?php echo get_the_permalink(); ?>">
    	<div class="card_image">
        	<div class="image-overlay"></div>
    	    <?php if(empty($featured_image)) {
        		$featured_image= get_template_directory_uri().'/images/default-image.jpg'; ?>
        		<img class="w-100 card-img-top" src="<?php echo $featured_image; ?>" alt="<?php echo $image_alt; ?>" />
        	<?php } else { ?>
        	    <?php the_post_thumbnail('homepage-thumb-size', array( 'class' => 'w-100 card-img-top' )); ?>
        	<?php } ?>
    	</div>
	</a>
    		    		    
	<div class="card-content">
		<a href="<?php echo get_the_permalink(); ?>"><h5 class="card-title mt-1"><?php the_title(); ?></h5></a>
		<a href="javascript:void(0)"><?php echo get_the_date(); ?></a>
		<br>
		<span>
			<?php if ( ! empty( $categories ) ) {
			    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
			} ?>					
		</span>
	</div>
</div>