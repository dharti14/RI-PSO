<?php
$dki_hln = dki_get_hln();
$dki_loc = dki_get_loc();
?>
<div id="dki">
		<div class="container">
			<h1 class="title blue"><?php echo dki_exact_string( 'Looking For '. $dki_hln ); ?><span>?</span></h1>
		</div>
</div>

	<section id="hero">

		<div class="container">
			<h2 class="align_center h1">Get Your <strong class="green">FREE Removal Quotes</strong> Today!</h2>
			<p class="align_center tagline">You're Seconds Away From Removing The Stress, Hassle &amp; Headache From Your Move</p>

			<div class="pad80">
				<div class="row">
					<div class="col-xs-12">
						<div class="quote_box_holder">
							<div class="quote_box">
								<h3 class="title">SAVE Up To 40% On Your Move</h3>

								<form id="form1">
									<div class="row">
										<div class="form-group col-sm-6 moving-from">
											<label>I'm Moving From:</label>
											<input type="text" id="postcode_from" name="postcode_from" class="form-control" placeholder="Enter Postcode"/>
										</div>
										<div class="form-group col-sm-6 moving-to">
											<label>I'm Moving To:</label>
											<input type="text" id="postcode_to" name="postcode_to" class="form-control" placeholder="Enter Postcode"/>
										</div>
									</div>
									<div class="checkbox align_center">
										<div class="row">
											<label class="col-sm-4 mg-b-10">
												<input type="radio" onclick="jQuery('#form1 .moving-to').show();" checked name="business_type" value="Residential" /> Residential
											</label>
											<label class="col-sm-4 mg-b-10">
												<input type="radio" onclick="jQuery('#form1 .moving-to').show();" name="business_type" value="Business Removal" /> Commercial
											</label>
											<label class="col-sm-4 mg-b-10">
												<input type="radio" onclick="jQuery('#form1 .moving-to').hide(); jQuery('#form1 .moving-to').val('');" name="business_type" value="International" /> International
											</label>
										</div>
									</div>

									<div id="get-my-quote-top" class="btn btn-quote get-my-quote">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds..</span></div>
									<p class="security"><span class="glyphicon glyphicon-lock"></span> Your information is protected by 128-bit SSL encryption</p>

									<figure class="sh1"></figure>
								</form>

							</div>

							<p class="tag2">"We help thousands of people, just like <br>you, move every month.."</p>

						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

	<section id="testimonials">
		<div class="container">
		<span class="arrow-post"><img src="<?php echo THEME_PATH_URI;?>/lp2/lib/assets/images/arrow.png" alt="<?php echo $dki_hln;?>"></span>
			<div class="row">
				<div class="col-sm-4">
					<div class="wrap">
						<figure class="cell">
							<img src="<?php echo THEME_PATH_URI;?>/lp2/lib/assets/images/client-img.png" alt="Tom Deller, London"/>
						</figure>
						<div class="cell testimonial">
							<p>"Superb service, put me in contact with companies I needed!"</p>
							<p class="name">Tom Deller, London</p>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="wrap">
						<figure class="cell">
							<img src="<?php echo THEME_PATH_URI;?>/lp2/lib/assets/images/client-img2.png" alt="Christine Key, Manchester"/>
						</figure>
						<div class="cell testimonial">
							<p>"Great way to get fast quotes without trawling through websites"</p>
							<p class="name">Christine Key, Manchester</p>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="wrap">
						<figure class="cell">
							<img src="<?php echo THEME_PATH_URI;?>/lp2/lib/assets/images/client-img3.png" alt="Adam Kirkpatrick, Brighton"/>
						</figure>
						<div class="cell testimonial">
							<p>"Took a lot of the stress of finding a suitable removal company"</p>
							<p class="name">Adam Kirkpatrick, Brighton</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /#testimonials -->
	
	
	<!--form -->
        <?php do_shortcode('[ri_quote_form template_name="quote-form-template-02"]'); ?>
    <!--form -->

	<section id="how_will">
		<div class="container">

			<h2 class="align_center">How Will Removals Index <br class="show_sm"/>Take The Stress Out Of My Move?</h2>

			<aside class="steps">
		      <div class="container">
		        <div class="row">
		          
		          <div class="col-sm-4 col_1">
		            <div class="num_wrap num1">
		              <i class="num"></i>
		            </div>
		            <div class="a">
		              <p class="step">1. Provide A Few Details</p>
		              <p class="t">Tell us about your move and the best local removal companies will compete for your business</p>
		            </div>
		          </div>

		          <div class="col-sm-4">
		            <div class="num_wrap num2">
		              <i class="num "></i>
		            </div>
		            <div class="a">
		              <p class="step">2. Compare Prices</p>
		              <p class="t">Get multiple FREE quotes from local removal firms in your area, so you never need to haggle on price</p>
		            </div>
		          </div>

		          <div class="col-sm-4 col_3">
		            <div class="num_wrap num3">
		              <i class="num "></i>
		            </div>
		            <div class="a">
		              <p class="step">3. Hire The Best</p>
		              <p class="t">Removals Index's internal review process ensures you hire only the best movers for the job</p>
		            </div>
		          </div>

		        </div>
		      </div>
		    </aside>
		    <!-- /#steps -->
		</div>
	</section>
	<!-- /#how_will -->

	<section id="get_quotes">
		<div class="container">
			<div class="pad65">
				
				<form>
					<div class="row">
						<div class="col-sm-7">
							<div class="row">
								<div class="form-group col-sm-6">
									<label>I'm Moving From:</label>
									<input type="text" id="postcode_from2" name="postcode_from2" class="form-control" placeholder="Enter Postcode"/>
								</div>
								<div class="form-group col-sm-6">
									<label>I'm Moving To:</label>
									<input type="text" id="postcode_to2" name="postcode_to2" class="form-control" placeholder="Enter Postcode"/>
								</div>
							</div>
							<p class="security"><span class="glyphicon glyphicon-lock"></span> Your information is protected by 128-bit SSL encryption</p>
						</div>
						<div class="col-sm-5">
							<div id="get-my-quote-middle" class="btn btn-quote get-my-quote2">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds..</span></div>
						</div>
					</div>

					<figure class="sh2"></figure>
				</form>

					
			</div>
		</div>
	</section>
	<!-- /#get_quotes -->

	<section id="tp">
		<div class="container">
			<div class="trustpilot-widget" data-locale="en-US" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="4ed29d5a000064000511a9a9" data-style-height="130" data-style-width="100%" data-stars="4,5"></div>
		</div>
	</section>

	<section class="green_section">
		<div class="container">
			<h2 class="title">Get Free Access to 100's Of Pre-Screened <br class="show_md">Removal Companies, With No Obligation!</h2>
			<p class="intro">We can help you move house quickly and affordably, even if you're booking last <br class="show_md">minute, only have one or two boxes or simply just hate packing!</p>
			<div class="row">
				<div class="col-sm-6">
					<ul>
						<li>
							<i class="fa fa-check-circle"></i>
							<strong>Never Haggle On Price Again</strong>
							<p>You'll get a full list of quotes from removal firms in your area that will all be <u>competing for your</u> move.</p>
						</li>

						<li>
							<i class="fa fa-check-circle"></i>
							<strong>Get Done In Seconds Not Hours</strong>
							<p>On top of your move, researching, calling and reviewing removal companies is an added hassle you don't need. Removals Index can help you can get the job done in a matter of seconds.</p>
						</li>

						<li>
							<i class="fa fa-check-circle"></i>
							<strong>Need A Quick Turnaround?</strong>
							<p>Our trusted removal firms will always try and accommodate you, even if you're looking to move fast or at very short notice.</p>
						</li>
						
					</ul>
				</div>
				<div class="col-sm-6">
					<ul>
						<li>
							<i class="fa fa-check-circle"></i>
							<strong>6-Step SAFE™ Verification Process</strong>
							<p>We <u>hand pick and pre-screen</u> all of our removal companies. Each and every one goes through our 6-step SAFE™ verification process.</p>
						</li>

						<li>
							<i class="fa fa-check-circle"></i>
							<strong>SAVE Up To 40%</strong>
							<p>You can save up to 40% on your moving costs by comparing several no obligation quotes from reliable removal companies in your area.</p>
						</li>

						<li>
							<i class="fa fa-check-circle"></i>
							<strong>100% No Obligation Guarantee</strong>
							<p>We guarantee that your details are safe and secure and that you'll never be bombarded with calls or spam after comparing quotes.</p>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section id="get_quotes" class="get_quotes2">
		<div class="container">
		
			<div class="pad65">
				
				<form>
					<div class="row">
						<div class="col-sm-7">
							<div class="row">
								<div class="form-group col-sm-6">
									<label>I'm Moving From:</label>
									<input type="text" id="postcode_from3" name="postcode_from3" class="form-control" placeholder="Enter Postcode"/>
								</div>
								<div class="form-group col-sm-6">
									<label>I'm Moving To:</label>
									<input type="text" id="postcode_to3" name="postcode_to3" class="form-control" placeholder="Enter Postcode"/>
								</div>
							</div>
							<p class="security"><span class="glyphicon glyphicon-lock"></span> Your information is protected by 128-bit SSL encryption</p>
						</div>
						<div class="col-sm-5">
							<div id="get-my-quote-bottom" class="btn btn-quote get-my-quote3">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds..</span></div>
						</div>
					</div>

					<figure class="sh2"></figure>
				</form>

					
			</div>
		</div>
	</section>
	<!-- /#get_quotes -->

	<section id="find_out_more">
		<div class="container">
			<h3 class="i1">To find out more, speak to our removal experts:</h3>
			<p class="call">Call Free <br>0333 444 8710</p>

			<blockquote>
				<div class="wrap">
				<i class="fa fa-quote-left"></i>
				<p>Great service - Within an hour I had several quotes and a number of companies prepared to visit my home to prepare a fixed bespoke quotation. When I needed advice I contacted Removals Index on the phone and they were very professional and helpful.</p>
				<p>Highly recommended.</p>
				<i class="fa fa-quote-right"></i>
				</div>
				<p class="name">Rob Hardy - London</p>
				
			</blockquote>

			<div class="foot_imgs">
				<div class="row">
					<div class="col-sm-4">
						<img src="<?php echo THEME_PATH_URI;?>/lp2/lib/assets/images/footer-img1.png" alt="Hacker Safe"/>
					</div>
					<div class="col-sm-4">
						<img src="<?php echo THEME_PATH_URI;?>/lp2/lib/assets/images/footer-img2.png" alt="SSL"/>
					</div>
					<div class="col-sm-4">
						<img src="<?php echo THEME_PATH_URI;?>/lp2/lib/assets/images/footer-img3.png" alt="SSL Secure Connection"/>
					</div>
				</div>
			</div>

			<?php
            $defaults = array(
              'theme_location'  => 'footer',
              'menu'            => '',
              'container'       => false,
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'menu',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => false,
              'before'          => '',
              'link_before'     => '',
              'after'      		=> '<span class="div">|</span>',
              'items_wrap'      => '<ul id="footer" class="nav navbar-nav">%3$s</ul>',
              'depth'           => 1
            );

            genesis_nav_menu( $defaults );
            ?>
		</div>
	</section>
	<script>

jQuery(function() {

	/*google analytics event tracking.*/	
	
	jQuery("#get-my-quote-top").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Top',4);});

	jQuery("#get-my-quote-middle").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Middle',4);});

	jQuery("#get-my-quote-bottom").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Bottom',4); });
	
});

</script>