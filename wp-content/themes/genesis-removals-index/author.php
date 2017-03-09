<?php

remove_action('genesis_loop','loop_for_internal_page_content');

add_action('genesis_loop','loop_for_author_page_content');

function loop_for_author_page_content() {
?>
<section class="blog">

	 <?php get_template_part('lib/site/structure/header_quotes_banner_template'); ?>
	 
	  <div class="container">
	  <div class="author-page">
        <div class="row">
          
          <div class="col-sm-7 col-md-8 col-lg-9">
          
          <!-- Author Info -->
			
			<div id="author-page-details">
				
				


				
				<div class="author-details">
					
					<div class="row">
					
						<div class="col-xs-12 col-md-3">
							<div class="author-img-div">
								<?php echo get_avatar( get_the_author_meta('email') , 90 );?>
							</div>
						</div>
						
						
						<div class="col-xs-12 col-md-9">
							<div class="author-info blog-sub-title author-name">
				
					<h3><?php the_author_posts_link(); ?></h3>
					
				</div>
							<div class="author-text">
								<?php echo get_the_author_meta( 'description' );?>
							</div>
						</div>
						
					
					</div>
					
				</div>
				
			</div>
	<!-- ! Author Info -->
	<div id="blog-grid">
           
           <?php get_template_part('lib/site/structure/blog_post_grid_template'); ?>
        
        </div>
	</div>
        </div>
		</div>
      </div>
    </section>
    
<?php
} 

genesis();