<?php

require('lib/site/common.php');
require('lib/site/header.php');

add_action('genesis_loop','ri_genesis_loop');

function ri_genesis_loop()
{
?>

<article id="main_article">
	<div class="container">
		<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post();?>
				<h1 class="title"><?php the_title();?></h1>
				<?php the_content();?>
			<?php endwhile;?>
		<?php endif;?>
		
	</div>
</article>
<!-- /#main_article -->	

<?php
}

require('lib/site/footer.php');
//Initialize the genesis framework
genesis();
?>