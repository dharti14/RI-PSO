<?php

remove_action('genesis_loop','loop_for_internal_page_content');

add_action('genesis_loop','loop_for_blog_page_content');

function loop_for_blog_page_content() {
?>
<section>

	 <?php get_template_part('lib/site/structure/header_quotes_banner_template'); ?>

	

		
      <div class="container">
      	
      	<div id="blog-grid">
        <div class="row">
          
          <div class="col-sm-7 col-md-8 col-lg-9">
	
				<?php get_template_part('lib/site/structure/blog_post_grid_template'); ?>
          
          </div>
          <div class="col-sm-5 col-md-4 col-lg-3">
             <?php get_template_part('lib/site/structure/blog_sidebar_template'); ?>
          </div>
        </div>
        </div>
      </div>
    </section>
    
<?php
} 

genesis();