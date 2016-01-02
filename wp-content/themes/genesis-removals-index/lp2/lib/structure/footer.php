<?php 

add_action('genesis_footer', 'footer');

function footer(){
?>	
	<footer class="main">
		<div class="container">
			<p><strong>Removals-Index by <a href="https://www.pinlocal.com/" target="_blank">Pinlocal</a></strong> | &copy; PinLocal Leads Ltd 2012-<?php echo date('Y');?>. All rights reservered.</p>
		</div>
	</footer>
	
<?php  } ?>