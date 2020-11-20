<?php
get_header(); ?>

	<div class="container-fluid header-gap">
		<div class="row">
			<div class="col-md-9">
				<?php if ( have_posts() ) : ?>	
						<div class="row">
							<div class="col-md-12">
								<header class="page-header">
									<?php
										the_archive_title( '<h1 class="page-title">', '</h1>' );
										the_archive_description( '<div class="taxonomy-description">', '</div>' );
									?>
								</header>
							</div>
						</div>
						<div class="row">
							<?php while ( have_posts() ) : the_post();
								//get_template_part( 'template-parts/content', 'loop');
								get_template_part( 'template-parts/content', 'cat-loop');
							endwhile; ?>
						</div>
						<div class="clearfix"></div>
						<div class="row">
							<div class="cat-pagi">
							<?php the_posts_pagination( array(
								'prev_text'          => __( '<< Previous', 'ebw' ),
								'next_text'          => __( 'Next >>', 'impackd' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'ebw' ) . ' </span>',
							) ); ?>
							</div>
						</div>
				<?php else : ?>
					<h1 class="page-title"><?php _e( 'Nothing Found', 'ebw' ); ?></h1>
						<div><?php _e( 'Sorry, but nothing found.', 'ebw' ); ?></div>
					<?php

				endif;
				?>
			</div>
			<div class="col-md-3 sidebar-section">
			    <?php pnf_search_form(); ?>
			    <?php dynamic_sidebar('category_sidebar'); ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>
