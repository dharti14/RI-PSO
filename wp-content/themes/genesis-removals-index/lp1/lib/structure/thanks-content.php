<?php   ?>
<script type='text/javascript'>//<![CDATA[ 
jQuery(window).load(function(){
	jQuery('dd').hide();

	jQuery('dt').click(
    function() {
        var toggle = jQuery(this).nextUntil('dt');
        toggle.slideToggle();
        jQuery('dd').not(toggle).slideUp();
    });
});//]]>  

</script>
<script async type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js"></script>

<div class="container">

<div class="thank-blog">
  
   <div class="row">
     <div class="col-sm-6">
      <div id="text" class="mL">
       <h1>Thank you <span id="customername"></span></h1>
       <p> We are searching for partner removal companies in your area. To provide accurate quotes and the best prices, they will contact  you shortly by phone and/or email.</p>
          <ul class="ticks">
            <li> Quick quotes, no obligation</li>
            <li>Trusted &amp; vetted removal firms</li>
            <li>We search 100's of companies</li>
            <li>By comparing quotes, you save time & money!</li>
          </ul>
      </div>
     </div>
     
     <div class="col-sm-6">
      <div class="thank-you-top-img"><img src="<?php echo TDU;?>/lp1/lib/assets/images/thanks/people-boxes.jpg" alt=""></div>
     </div>

   </div>
</div>


<div class="what-happens-next">

<div class="mL line">
  <h2>What happens next?</h2>
    <div class="three-boxes">
        <ul>
        <li class="greenbg">
        <div class="numberTickGreen"></div><strong class="numberCircleGreen">1</strong><br />
          We have searched <br>
          removals index to find <br>
          you the best quotes</li>
        <li class="greenbg"><div class="numberTickGreen"></div><strong class="numberCircleGreen">2</strong><br />
        Your quote request has been sent to up to 6 companies in your area</li>
        <li class="bluebg"><strong class="numberCircle">3</strong><br />
          You will be contacted shortly  by phone or email and provided with <br>
          no-obligation quotes</li>
        </ul>
    </div>
</div>

</div>


<div class="thank-midd">

  <div class="row">
     <div class="col-sm-8">
	  
		<div id="textfaq" class="mL">
		<h2>Frequently Asked Questions</h2>
		
			 <dl>
			    <dt>What questions should I ask a removal company?</dt>
			    <dd>Removals Companies come in all shapes and sizes and the questions you ask should be based on what is important to you - we recommend asking about the following:
			</dd>
			    <dd>Professional qualifications, insurance, length of time trading, customer testimonials</dd>
			   
			    <dt>Why isn't there an instant quote online?</dt>
			    <dd>Your removal job will have specific requirements that removals companies need to take into account when providing a quote which can often only be determined by contacting you by phone or email.</dd>
			    <dd>By having a brief conversation with you to gain a more detailed description of your move (including inventory, parking, access etc) you will get the best and most accurate quote.</dd>
			    
			    
			    <dt>Should I just choose the cheapest quote?</dt>
			    <dd>Our partner companies range in size and therefore there you will receive a range of quotes. Price isn't necessarily the only factor to consider when making your decision.</dd>
			    <dd>For example, companies who have invested in professional qualifications and training may quote slightly higher but will have better qualified staff as a result.</dd>
			<dd>Your decision should take into account all factors important to you, including price.</dd>
			    
			    <dt>How far in advance should I book my move?</dt>
			    <dd>Removal companies often get booked up in advance so our advice is to be prepared and book as far in advance as possible.</dd>
			    <dd>Busy periods such as Fridays, Bank Holidays and School Holidays will always require additional notice.</dd>
			     <dd>Our removers work hard to provide the best quotes with no obligations but once you have booked a move with them, it is important to communicate with them as they will block the time out and turn down other work once they have confirmed a booking.</dd>
			    
			    <dt>How should I prepare for moving?</dt>
			    <dd>Being organised is key so the move goes smoothly!<br />
			For example, if you are packing your own boxes up, then correctly labelling them and having them organised for the removers will save time at the other end.</dd>
			  
			</dl>
      
	  </div>
	  
	</div>
	 
     <div class="col-sm-4"> 
        <div id="testimonials">
			<div class="tp_-_box" data-tp-settings="domainId:1157545,fontSize:12,borderRadius:4,borderColor:EEEEEE,width:300,fontFamily:Verdana">
			    <a href="http://www.trustpilot.com/review/www.removals-index.com" rel="nofollow" hidden>Removals Index Reviews</a>
			</div>
			<script type="text/javascript">
			    (function () { var a = "https:" == document.location.protocol ? "https://ssl.trustpilot.com" : "http://s.trustpilot.com", b = document.createElement("script"); b.type = "text/javascript"; b.async = true; b.src = a + "/tpelements/tp_elements_all.js"; var c = document.getElementsByTagName("script")[0]; c.parentNode.insertBefore(b, c) })();
			</script>
		</div>
     </div>
  </div>
  
</div>


</div>

<div class="footer">
 <div class="container">
  <div class="footer-link"> 
  
  <!-- If you don't want hard code menu then please remove this part of code -->
	   <ul>
	    <li><a href="#">Removal Companies Join Us</a>|</li>
	    <li><a href="#">Terms and Conditions</a>|</li>
	    <li><a href="#">Privacy Policy</a>|</li>
	    <li><a href="#">Removals Price Guide</a> </li>
	   </ul>
   <!-- If you don't want hard code menu then please remove this part of code -->
    
    <?php 
    
    // If we Want dynamic menu then uncomment this code. We can set pages from dashboard 
    //which we want to display in menu.
    
    /*
		            $defaults = array(
		              'theme_location'  => 'ppc_footer',
		              'container'       => false,
		              'menu_class'      => 'menu',
		              'echo'            => true,
		              'items_wrap'      => '<ul id="ppc_footer">%3$s</ul>',
		              'depth'           => 1
		            );
		
		            genesis_nav_menu( $defaults );
     */
		?>
   
  </div>
  
  <div class="copyright">
  
   <p>Copyright &copy; 2013 removals-index.com All rights reserved</p>
   <p>Pinlocal Leads, Communications House, 26 York St, London, W1U 6PZ</p>
   
  </div>
 </div>
</div>