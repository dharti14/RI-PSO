<?php 

add_action('genesis_footer', 'footer');

function footer(){
?>	
	<footer class="main">
		<div class="container">
			<p><strong>Removals-Index by <a href="https://www.pinlocal.com/" target="_blank">Pinlocal</a></strong> | &copy; PinLocal Leads Ltd 2012-<?php echo date('Y');?>. All rights reservered.</p>
		</div>
	</footer>
	
<?php  } 
/*
<div class="footer">
<div class="container">
<div class="footer-link">
<ul>
<li><a href="http://www.pinlocal.com/removals.html" target="_blank">Removal Companies Join Us</a></li>
<li><a href="/TermsAndConditions.html"  target="_blank">Terms and Conditions</a></li>
<li><a href="/PrivacyPolicy.html"  target="_blank">Privacy Policy</a></li>
<li><a href="/removals-tips-price-guide.html"  target="_blank">Removals Price Guide</a></li>
</ul>
</div>
<div class="copyright">
<p>Copyright &copy; <?php echo date('Y');?> removals-index.com All rights reserved</p>
   <p>Pinlocal Leads, Communications House, 26 York St, London, W1U 6PZ</p>
  </div>
 </div>
</div>

*/
?>