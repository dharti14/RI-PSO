<?php

remove_action('genesis_loop','loop_for_internal_page_content');

add_action('genesis_loop','loop_for_tag_page_content');

function loop_for_tag_page_content() {
?>
<section class="blog">
 <?php get_template_part('lib/site/structure/header_quotes_banner_template'); ?>
      <div class="container">
        <div class="row">
          
          <div class="col-sm-7 col-md-8 col-lg-9">
          
          <!--Tag -->
			
	<div id="tag-info">
		
		<?php $tag_title = single_tag_title('',false);
		?>
		<h3>Search Results for: <I><?php echo $tag_title; ?></I></h3>
		
		
	</div>
	<!-- ! Tag -->
	<div id="blog-grid">
           
           <?php get_template_part('lib/site/structure/blog_post_grid_template'); ?>
        
        </div>
	</div>
        </div>
      </div>
    </section>
    
<?php
} 

genesis();