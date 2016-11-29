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
			<h1 class="align_center h1">Get Your <strong class="green">FREE Removal Quotes</strong> Now</h1>
			<p class="align_center tagline">You're Seconds Away From Removing The Stress, Hassle &amp; Headache From Your Move!</p>

			<div class="pad80">
				<div class="row">
					<div class="col-xs-12">
						<div class="quote_box_holder">
							<div class="quote_box">
								<h3 class="title">SAVE Up To 75% On Your Move.</h3>

								<form id="form1">
									<div class="row">
										<div class="form-group col-sm-6 moving-from">
											<label>I'm Moving From:</label>
											<input type="text" id="postcode_from" name="postcode_from" class="form-control" placeholder="Enter Postcode..."/>
										</div>
										<div class="form-group col-sm-6 moving-to">
											<label>I'm Moving To:</label>
											<input type="text" id="postcode_to" name="postcode_to" class="form-control" placeholder="Enter Postcode..."/>
										</div>
									</div>

									<div id="get-my-quote-top" class="btn btn-quote get-my-quote">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds..</span></div>
									<p class="security"><span class="glyphicon glyphicon-lock"></span> Your information is protected by 128-bit SSL encryption</p>

									<figure class="sh1"></figure>
								</form>

							</div>

							<p class="tag2">"We help thousands of people, just like <br>you, move every month.."</p>
							<p class="tag2 mobile-tag">"We help thousands of people,<br> just like you, move every month..."</p>

						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

	<section id="testimonials">
		<div class="container">
		<div class="inner-container testimonial-pad">
		<span class="arrow-post"><img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/arrow.png" alt="<?php echo $dki_hln;?>"></span>
			<div class="row">
				<div class="col-sm-4">
					<div class="wrap">
						<figure class="cell">
							<img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/client-img.png" alt="Tom Deller, London"/>
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
							<img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/client-img2.png" alt="Christine Key, Manchester"/>
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
							<img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/client-img3.png" alt="Adam Kirkpatrick, Brighton"/>
						</figure>
						<div class="cell testimonial">
							<p>"Took a lot of the stress of finding a suitable removal company"</p>
							<p class="name">Adam Kirkpatrick, Brighton</p>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</section>
	<!-- /#testimonials -->
	
	
	<!--form -->
        <?php 
        	$quote_form_template = genesis_get_custom_field('_template');
        	
        	//When the template is not selected
        	if(empty($quote_form_template))   {
        		$quote_form_template = "quote-form-template-02";
        	}

        	do_shortcode('[ri_quote_form template_name="'.$quote_form_template.'"]');
        ?>
    <!--form -->

	<section id="how_will">
		<div class="container">
			
			<h2 class="align_center">Take The Stress Out Of My Move:</h2>

			<aside class="steps">
		      <div class="container">
		      <div class="inner-container">
		        <div class="row">
		          
		          <div class="col-sm-4 col_1">
		            <div class="num_wrap num1">
		              <i class="num"></i>
		            </div>
		            <div class="a">
		              <p class="step">1. Provide Details.</p>
		              <p class="t">Complete our simple form in under 60 seconds.</p>
		            </div>
		          </div>

		          <div class="col-sm-4">
		            <div class="num_wrap num2">
		              <i class="num "></i>
		            </div>
		            <div class="a">
		              <p class="step">2. Get Quotes.</p>
		              <p class="t">Compare multiple removal quotes from trusted removal men in <?php echo $dki_loc;?></p>
		            </div>
		          </div>

		          <div class="col-sm-4 col_3">
		            <div class="num_wrap num3">
		              <i class="num "></i>
		            </div>
		            <div class="a">
		              <p class="step">3. Save Money.</p>
		              <p class="t">Trusted man and van experts compete for your business, saving upto 75%</p>
		            </div>
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
		<div class="inner-container">
			<div class="pad65">
				
				<form>
					<div class="row">
						<div class="col-sm-7">
							<div class="row">
								<div class="form-group col-sm-6">
									<label>I'm Moving From:</label>
									<input type="text" id="postcode_from2" name="postcode_from2" class="form-control" placeholder="Enter Postcode..."/>
								</div>
								<div class="form-group col-sm-6">
									<label>I'm Moving To:</label>
									<input type="text" id="postcode_to2" name="postcode_to2" class="form-control" placeholder="Enter Postcode..."/>
								</div>
							</div>
							<p class="security"><span class="glyphicon glyphicon-lock"></span> Your information is protected by 128-bit SSL encryption</p>
						</div>
						<div class="col-sm-5">
							<div id="get-my-quote-middle" class="btn btn-quote get-my-quote2">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds..</span></div>
						</div>
					</div>
					
						<p class="mobile-security security"><span class="glyphicon glyphicon-lock"></span> Your information is protected by 128-bit SSL encryption</p>
					
					<figure class="sh2"></figure>
				</form>

				</div>	
			</div>
		</div>
	</section>
	<!-- /#get_quotes -->

	<section id="tp">
		<div class="container">
			<div class="inner-container">
				<div class="trustpilot-widget" data-locale="en-US" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="4ed29d5a000064000511a9a9" data-style-height="130" data-style-width="100%" data-stars="5"></div>
			</div>
		</div>
	</section>

	<section class="green_section">
		<div class="container">
		
			<div class="inner-container">
			<h2 class="title">Get Free Access to 100's Of Pre-Screened <br class="show_md">Removal Companies, With No Obligation!</h2>
			<p class="intro">Simplify your home move with Removals Index.</p>
			<div class="row">
				<div class="col-sm-6">
					<ul>
						<li>
							<i class="fa fa-check-circle"></i>
							<strong>Never Haggle On Price Again</strong>
							<p>You'll get a full list of quotes from removal firms in <?php echo $dki_loc;?> that will all be <u>competing for your move.</u></p>
						</li>

						<li>
							<i class="fa fa-check-circle"></i>
							<strong>Find A Trusted Man With A Van</strong>
							<p>Our moving experts are hand-picked and carefully vetted with a rigorous, 6-step process. So you can relax, knowing your valuables are in safe hands.</p>
						</li>

						<li>
							<i class="fa fa-check-circle"></i>
							<strong>Booking Last Minute?</strong>
							<p>Need to move quick? Our extensive network of house removal companies will move mountains to make your move happen.</p>
						</li>
						
					</ul>
				</div>
				<div class="col-sm-6">
					<ul>
						<li>
							<i class="fa fa-check-circle"></i>
							<strong>Small Jobs? No Problem.</strong>
							<p>Need to hire a house moving van man for a small removals job? Experienced piano and furniture removal specialists will make light work of moving your heavy valuables.</p>
						</li>

						<li>
							<i class="fa fa-check-circle"></i>
							<strong>SAVE Up To 75%</strong>
							<p>Save up to 75% on your man and van by comparing no obligation quotes from vetted house moving companies.</p>
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
		</div>
	</section>

	<section id="get_quotes" class="get_quotes2">
		<div class="container">
			<div class="inner-container">
			<div class="pad65">
				
				<form>
					<div class="row">
						<div class="col-sm-7">
							<div class="row">
								<div class="form-group col-sm-6">
									<label>I'm Moving From:</label>
									<input type="text" id="postcode_from3" name="postcode_from3" class="form-control" placeholder="Enter Postcode..."/>
								</div>
								<div class="form-group col-sm-6">
									<label>I'm Moving To:</label>
									<input type="text" id="postcode_to3" name="postcode_to3" class="form-control" placeholder="Enter Postcode..."/>
								</div>
							</div>
							<p class="security"><span class="glyphicon glyphicon-lock"></span> Your information is protected by 128-bit SSL encryption</p>
						</div>
						<div class="col-sm-5">
							<div id="get-my-quote-bottom" class="btn btn-quote get-my-quote3">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds..</span></div>
						</div>
					</div>

						<p class="mobile-security security"><span class="glyphicon glyphicon-lock"></span> Your information is protected by 128-bit SSL encryption</p>
						
					<figure class="sh2"></figure>
				</form>

					
			</div>
			</div>
		</div>
	</section>
	<!-- /#get_quotes -->
	
	
	<section id="article">
		<div class="container">
		
			<div class="inner-container">
				<h2 class="title">Hire A Man With A Van in <?php echo $dki_loc;?> And Cut <br class="show_md">Up To 75% Off Your House Removal Costs.</h2>
				<div class="content">
					<p>Compare prices from over 60,000 verified relocation specialists and save money to spend on more important things – like your new home. Our easy removal costs calculator takes under 60 seconds, and is the quickest way to get instant removal quotes. Just need a man with van for furniture removals? Whether you need to move a 3 bedroom house, or just a sofa, fridge, or piano, removal vans large and small are available, to make your move hassle-free.</p>
					<p>Moving far? We deal with all the major national removal companies for long distance removals. Or for man and van hire, smaller moves or shorter distances, you can quickly compare prices from trusted local removal firms. Need both removals and storage? Most of our expert movers can also arrange to store your furniture securely. When you complete the simple form to compare removal companies, simply select “Yes” for “storage required.</p>
					<p>Looking for prices for moving van hire, but don’t drive? All of our house removals quotes include verified home moving professionals, whether you need a man and a van, or a team from a larger removal company for a bigger move. And all of our moving house quotes also include a detailed breakdown of exactly what’s included, so you can calculate your costs of moving accurately, and ensure you choose the right moving company based on much more than just an approximate removal costs estimate, or a quoted price.</p>
					<p>Find out why we’re top-rated on TrustPilot by people like you: Try our simple removal quote calculator now to compare removal companies in under 60 seconds.</p>
				</div>
				
				<?php $searchQuery = dki_get_keyword(); if(!empty($searchQuery)){?>
					<div id="search_query">
						<h2><b>You searched for : <?php echo $searchQuery;?></b></h2>
					</div>
				<?php }?>
				
			</div>
		</div>
	</section>
	
	

	<section id="find_out_more">
		<div class="container">
		<span class="arrow-post1"><img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/arrow.png" alt="<?php echo $dki_hln;?>"></span>
			<h3 class="i1">To find out more, speak to our removal experts:</h3>
			<p class="call">Call Us <br><?php echo ri_display_phone_number();?></p>

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
					<div class="col-sm-4 footer-images">
						<img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/footer-img1.png" alt="Hacker Safe"/>
					</div>
					<div class="col-sm-4 footer-images">
						<img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/footer-img2.png" alt="SSL"/>
					</div>
					<div class="col-sm-4 footer-images">
						<img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/footer-img3.png" alt="SSL Secure Connection"/>
					</div>
				</div>
			</div>

		</div>
	</section>