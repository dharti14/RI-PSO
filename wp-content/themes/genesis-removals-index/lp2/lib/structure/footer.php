<?php 

add_action('genesis_footer', 'lp2_footer');

function lp2_footer(){
	
	wp_register_style('open-sans', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,300,400,600&subset=latin,latin-ext');
	wp_enqueue_style('open-sans');
	
?>	

<!-- W3TC-include-js-head -->


	<footer class="main">
		<div class="container">
			<p><strong>Removals-Index by <a href="https://www.pinlocal.com/" target="_blank">Pinlocal</a></strong> | &copy; PinLocal Leads Ltd 2012-<?php echo date('Y');?>. All rights reservered.</p>
		</div>
	</footer>
	
<?php  } ?>