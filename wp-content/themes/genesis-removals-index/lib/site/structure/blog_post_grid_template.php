  <?php if (have_posts()) : ?>
	<div class="row">
            	<?php
            		
            		while (have_posts()) : the_post(); ?>
<div class="col-xs-12 col-xs-l col-sm-12 col-md-6 col-lg-4">
	<article class="post-<?php echo get_the_ID();?>">
	
		<div class="post-thumbnail-container">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail('ipad'); ?>	
			</a>
			<div class="post-details">
				<span class="entry-date"><?php echo get_the_date(); ?></span>
				<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	            		<a href="<?php the_permalink(); ?>" class="btn btn-primary read-more"><?php _e('More') ?></a>
	            	</div>
		</div>
		<div class="post-extra-meta hidden-xs">
			<div class="author-info">
				<img class="author-icon" src="<?php echo THEME_PATH_URI;?>/lib/site/assets/images/author_icon.png"/><span class="author vcard"><?php the_author_posts_link(); ?></span>
			</div>
		<div class="post_tags">
			<?php
			if(get_the_tag_list()){
				echo '<img class="tag-icon" src="'.THEME_PATH_URI.'/lib/site/assets/images/post_tag_icon.png"/>' . '<span class="tag_list">';
				if(is_tag()){	//For tag page
					$tag_name = single_tag_title('',false);
					$tag = get_term_by('name', $tag_name , 'post_tag');
					echo $tag->name;
				}else{		//For other page
					$tag_list = get_the_tag_list('',', ','');
					$tag_list_array = explode(',', $tag_list);
					$tags = array_slice($tag_list_array,0,5,true);
					echo implode(',', $tags);
				}
				echo "</span>";
			}
			?>
		</div>
		</div>	           		
	</article>
</div>
<?php
endwhile; //* end of one post
            		
				?>
	</div> <!-- End row class -->			
				<div class="navigation">
					<span class="newer"><?php previous_posts_link(__('<img class="nav-left-icon" src="'.THEME_PATH_URI.'/lib/site/assets/images/left_nav_arrow.png"/>&nbsp;&nbsp;NEWER','genesis')) ?></span>
					<span class="older"><?php next_posts_link(__('OLDER&nbsp;&nbsp;<img class="nav-right-icon" src="'.THEME_PATH_URI.'/lib/site/assets/images/right_nav_arrow.png"/>','genesis')) ?></span>
				</div><!-- /.navigation -->
				
				<?php

				
	            endif;
	        ?>