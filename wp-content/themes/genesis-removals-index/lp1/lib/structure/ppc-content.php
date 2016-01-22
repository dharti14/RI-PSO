<?php
require(THEME_PATH_DIR.'/lp1/lib/inc/DKIScripts.php');
?>

<div class="looking-for">
<div class="container">
<div class="keyword"><?php echo exact_string( 'Looking For '. $hln ); ?><span>?</span></div>
 
  <div class="quotes-top">
   <h1>Get Your <span>FREE Removal Quotes</span> Today!</h1>
   <p>You're Seconds Away From Removing The Stress, Hassle &amp; Headache From Your Move!</p>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
        <div class="free-quotes">
          <div class="free-quotes-form">
           <div class="start-here"><img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/start-here-img.png" alt="<?php echo $hln;?>"></div>
           <div class="quotes-form-con">
            <h3>SAVE Up To 40% On Your Move!</h3>
            
            <form action="" method="post" id="form1">
                <div class="moving-from">
                  <label>I'm Moving From:</label>
                  <input type="text" name="postcode_from" id="postcode_from" placeholder="Enter Postcode..." >
                </div>
                <div class="moving-to">
                  <label>I'm Moving To:</label>
                  <input type="text" name="postcode_to" id="postcode_to" placeholder="Enter Postcode...">
                </div>
                
                <div class="select-save">
                 <ul>
                  <li><input type="radio" onClick="jQuery('#form1 .moving-to').show();" name="buseness_type" checked value="Residential" id="residential"><label for="residential">Residential</label></li>
                  <li><input type="radio" onClick="jQuery('#form1 .moving-to').show();" name="buseness_type" value="Business Removal" id="business-removal"><label for="business-removal">Commercial</label></li>
                  <li><input type="radio" onClick="jQuery('#form1 .moving-to').hide(); jQuery('#form1 .moving-to').val('');" name="buseness_type" value="International" id="international"><label for="international">International</label></li>
                 </ul>
                </div>
               
        	</form>
            <div class="get-my"><a id="get-my-quote-top" href="javascript:void(0);" class="get-my-quote">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds..</span></a></div>
            
            <p class="protect-text"><span>Your information is protected by 128 bit SSL encryption</span></p>
            
           </div> 
           
          </div>        
          <div class="quotes-text">"We help thousands of people,<br> just like you move every month..."</div>
        </div>
     </div>
  </div>  
 </div>
</div>

<div class="client-box">
  <div class="container">
   <span class="arrow-post"><img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/arrow.png" alt="<?php echo $hln;?>"></span>
   <div class="row">
     <div class="col-sm-4">
      <div class="client-img"><img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/client-img.png" alt="<?php echo $hln;?>"></div>
      <div class="client-detail">
       <p>"Superb Service, put me in contact with the companies I needed!"</p>
       <span><strong>Tom Deller</strong> London</span>
      </div>
     </div>
     <div class="col-sm-4">
      <div class="client-img"><img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/client-img2.png" alt="<?php echo $hln;?>"></div>
      <div class="client-detail">
       <p>"Great way to get fast quotes without trawling through websites"</p>
       <span><strong>Christine Key</strong> Manchester</span>
      </div>
     </div>
     <div class="col-sm-4">
      <div class="client-img"><img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/client-img3.png" alt="<?php echo $hln;?>"></div>
      <div class="client-detail">
       <p>"Took a lot of the stress of finding a suitable removal company"</p>
       <span><strong>Adam Kirkpatrick</strong> Brighton</span>
      </div>
     </div>
   </div> 
   
  </div>
</div>


<div id="hide-after-get">

<div class="will-removal">
  <div class="container">
   <h2>How Will Removals Index<br> Take The Stress Out Of My Move?</h2>
   
   <div class="row">
     <div class="col-sm-4">
       <div class="post-img pad1"><img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/post-img1.png" alt="<?php echo $hln;?>"></div>
       <h3>1. Provide a few details</h3>
       <p>Tell us about your move and  the best local removal companies will compete for your business</p>
     </div>
     <div class="col-sm-4">
       <div class="post-img"><img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/post-img2.png" alt="<?php echo $hln;?>"></div>
       <h3>2. Compare Prices</h3>
       <p>Get multiple FREE quotes from local removal firms in <?php echo $loc;?>, so you never need to haggle on price</p>
     </div>
     <div class="col-sm-4">
       <div class="post-img pad2"><img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/post-img3.png" alt="<?php echo $hln;?>"></div>
       <h3>3. Hire the Best</h3>
       <p>Removals Index's internal review process ensure you hire only the best movers for the job</p>
     </div>
   </div> 
   
  </div>
</div>


<div class="free-quotes-now">
  <div class="container">
   <div class="row quotes-form-con">
    <div class="start-here-free"><img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/start-here-free-img.png" alt="<?php echo $hln;?>"></div>
    <form name="form2" id="form2" action="" method="post">
    <div class="col-sm-3">
     <div class="moving-from">
              <label>I'm Moving From:</label>
              <input type="text" id="postcode_from2" name="postcode_from2" placeholder="Enter Postcode...">
            </div>
    </div>
    <div class="col-sm-3">
     <div class="moving-to">
              <label>I'm Moving To:</label>
              <input type="text" id="postcode_to2" name="postcode_to2" placeholder="Enter Postcode...">
            </div>
    </div>
    </form>
    <div class="col-sm-6">
     <div class="get-my"><a  id="get-my-quote-middle" class="get-my-quote2" href="javascript:void(0);">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds..</span></a></div>
    </div>
   </div> 
    <p class="protect-text"><span>Your information is protected by 128 bit SSL encryption</span></p>
  </div>
</div>


<div class="slide-main">
  <div class="container">
   
   <div class="row">
     <div class="col-sm-12">
       <div class="trustpilot-widget" data-locale="en-US" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="4ed29d5a000064000511a9a9" data-style-height="130" data-style-width="100%" data-stars="4,5"></div>
     </div>
   </div> 
   
  </div>
</div>


<div class="companies">
  <div class="container">
  <div class="companies-top"> 
   <h2>Get Free Access To 100's Of Pre-Screened Removal Companies, With No Obligation!</h2>
   <p>We can help you move house quickly and affordably, even if you're booking last minute, only have one or two boxes or simply just hate packing!</p>
  </div> 
   <div class="row">
     <div class="col-sm-6">
      <div class="companies-list">
       <ul>
        <li>
         <h4>Never Haggle On Price Again </h4>
         <p>You'll get a full list of quotes from removal firms in <?php echo $loc;?> that will all be <u>competing for your move.</u></p>
        </li>
        <li>
         <h4>Get Done In Seconds Not Hours</h4>
         <p>On top of your move, researching, calling and reviewing removal companies is an added hassle you don't need. Removals Index can help you can get the job done in a matter of seconds.</p>
        </li>
        <li>
         <h4>Need A Quick Turnaround?</h4>
         <p>Our trusted removal firms will always try and accommodate you, even if you're looking to move fast or at very short notice.</p>
        </li>
       </ul>
      </div>
     </div>
     <div class="col-sm-6">
      <div class="companies-list">
       <ul>
        <li>
         <h4>6-Step SAFE&trade; Verification Process</h4>
         <p>We <u>hand pick and pre-screen</u> all of our removal companies. Each and every one goes through our 6-step SAFE&trade; verification process.</p>
        </li>
        <li>
         <h4>SAVE Up To 40%</h4>
         <p>You can save up to 40% on your moving costs by comparing several no obligation quotes from reliable removal companies in your area.</p>
        </li>
        <li>
         <h4>100% No Obligation Guarantee</h4>
         <p>We guarantee that your details are safe and secure and that you'll never be bombarded with calls or spam after comparing quotes.</p>
        </li>
       </ul>
      </div>
     </div>
     
   </div> 
   
  </div>
</div>


<div class="free-quotes-now">
  <div class="container">
   <span class="arrow-post"><img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/arrow.png" alt="<?php echo $hln;?>"></span>
   <div class="row quotes-form-con">
    <div class="start-compare"><img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/start-compare-img.png" alt="<?php echo $hln;?>"></div>
    <div class="col-sm-3">
     <div class="moving-from">
              <label>I'm Moving From:</label>
              <input type="text" id="postcode_from3" name="postcode_from3" placeholder="Enter Postcode...">
            </div>
    </div>
    <div class="col-sm-3">
     <div class="moving-to">
              <label>I'm Moving To:</label>
              <input type="text" id="postcode_to3" name="postcode_to3" placeholder="Enter Postcode...">
            </div>
    </div>
    <div class="col-sm-6">
     <div class="get-my"><a id="get-my-quote-bottom" class="get-my-quote3" href="javascript:void(0);">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds..</span></a></div>
    </div>
   </div> 
    <p class="protect-text"><span>Your information is protected by 128 bit SSL encryption</span></p>
  </div>
</div>


	<!--form -->
        <?php do_shortcode('[ri_quote_form template_name="quote-form-template-01"]'); ?>
    <!--form -->


<div class="find-experts">
 <div class="container">
<div class="row">
	<div class="col-sm-12">
         <h5>To find out more, speak to our removal experts :</h5>
         <div class="call-free"><span>Call Free</span> <div class="number">0333 444 8710</div></div> 
         
         <div class="great-service"><p><span>Great service - Within an hour I had several quotes and a number of companies prepared to visit my home to prepare a fixed bespoke quotation. When I needed advice I contacted Removals Index on the phone and they were very professional and helpful.</span></p>
          <span class="recommended">Highly recommended.<strong>Rob Hardy - London</strong></span>
         </div>
         
       <div class="logo-tag">
       
       	  <img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/footer-img1.png" alt="">
          <img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/footer-img2.png" alt="">
          <img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/footer-img3.png" alt="">
       

	    </div>
	  </div>
	   
    </div>   
 </div>
</div>
<script>

jQuery(function() {

	jQuery('#date1').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy',
		onSelect: function(dateText,inst){
			jQuery(this).trigger('blur');
			
		}
	});
	 
	jQuery('#date2').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy',
		onSelect: function(dateText,inst){
			jQuery(this).trigger('blur');
			
		}
	});
	
	jQuery('#date3').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy',
		onSelect: function(dateText,inst){
			jQuery(this).trigger('blur');
			
		}
	});

	/*google analytics event tracking.*/	
	
	jQuery("#get-my-quote-top").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Top',4);});

	jQuery("#get-my-quote-middle").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Middle',4);});

	jQuery("#get-my-quote-bottom").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Bottom',4); });
	
});

</script>
<?php require(THEME_PATH_DIR.'/lp1/lib/inc/footer-code.php'); ?>