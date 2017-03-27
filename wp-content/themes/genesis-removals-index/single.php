<?php

remove_action('genesis_loop','loop_for_internal_page_content');


add_action('genesis_loop','loop_for_single_blog_content');

function loop_for_single_blog_content() {		
	

?>

<section class="blog">

	 <?php get_template_part('lib/site/structure/header_quotes_banner_template'); ?>
	
      <div class="container">
	  <div class="blog-single-post">
        <div class="row">
          
          <div class="col-sm-7 col-md-8 col-lg-9">
          
            <?php if (have_posts()) : 
            
            	 	 while (have_posts()) : the_post(); ?>
          
          	<article class="single-post-<?php echo $post->ID; ?> entry">
            		
					<div class="post-thumbnail-container">
            		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
	            		<div class="post-thumbnail featured-image">
							<?php the_post_thumbnail('large'); ?>
						</div>
					</a>
					<div class="post-details">
						<span class="entry-date"><?php echo get_the_date(); ?></span>
						<h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
					</div>
					</div>
					<div class="post-entry-meta">
						<div class="author-info">
							<img class="author-icon" src="<?php echo THEME_PATH_URI;?>/lib/site/assets/images/author_icon.png"/><span class="author vcard"><?php the_author_posts_link(); ?></span>
						</div>
						
						<div class="post_tags">
						<?php
						if(get_the_tag_list())
							echo get_the_tag_list('<img class="tag-icon" src="'.THEME_PATH_URI.'/lib/site/assets/images/post_tag_icon.png"/><span class="tag_list">',', ','</span>')
						?>
						</div>
					</div>
					
            		
            		<div class="entry-summary">
	            		
		            		<?php  echo the_content(); ?>
		            	
		            			            	
            		</div>
            		
            		
            		<div class="navigation">
		            	<span class="newer"><?php next_post_link('%link','<img class="nav-left-icon" src="'.THEME_PATH_URI.'/lib/site/assets/images/left_nav_arrow.png"/>&nbsp;&nbsp;NEWER');?></span>
		            	<span class="older"><?php previous_post_link('%link','OLDER&nbsp;&nbsp;<img class="nav-right-icon" src="'.THEME_PATH_URI.'/lib/site/assets/images/right_nav_arrow.png"/>');?></span>
			</div><!-- /.navigation -->
            		
					
				
            		            		
            	</article>


            	<?php 
            		endwhile; //* end of one post
				
	            endif;
	        ?>
            	
            	
          
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