<?php 

add_action('genesis_footer', 'site_footer');

function site_footer(){
	
	wp_enqueue_style('site_font_opensans', '//fonts.googleapis.com/css?family=Open+Sans:400,800,700');
?>	
	<footer class="main">
		<div class="container">
			<p><strong>Removals-Index by <a href="https://www.pinlocal.com/" target="_blank">Pinlocal</a></strong> | &copy; PinLocal Leads Ltd 2012-<?php echo date('Y');?>. All rights reservered.</p>
		</div>
	</footer>
	
<?php  } ?>