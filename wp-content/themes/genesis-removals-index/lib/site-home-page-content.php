<?php
$dki_hln = dki_get_hln();
$dki_loc = dki_get_loc();
?>
<section id="hero" class="home_page_content">

		<div class="container">
			<h1 class="align_center">Get Your <strong class="green">FREE Removal Quotes</strong> Today!</h1>
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
							<p class="tag2 mobile-tag">"We help thousands of people,<br> just like you, move every month..."</p>

						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

	<section id="tp">
		<div class="container">
			<div class="trustpilot-widget" data-locale="en-US" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="4ed29d5a000064000511a9a9" data-style-height="130" data-style-width="100%" data-stars="5"></div>
		</div>
	</section>

	<section  class="green_section">

		<div class="container">

			<div class="inner-container">
				<h2 class="home title">Removal Companies</h2>

				<div class="intro heading">Get Free Access to 100's Of Pre-Screened <br class="show_md">Removal Companies, With No Obligation ...</div>

					<ul class="bullet-points">
						<li>Why not have removal companies compete for your business instead of trawling the web yourself to find them?</li>
						<li>Make your house move stress-free with Removals Index: Just give us a few details about your move to quickly compare free, no-obligation house removal quotes from trusted removal companies.</li>
						<li>With our easy-to-complete form, you’ll be done in 60 seconds. Pre-screened removal companies will compete for your business – so you won’t have to lift a finger.</li>
						<li>Your home removals quotes are 100% obligation-free, and all of our removal companies are hand-picked, and thoroughly vetted with a 6-step verification process.</li>
						<li>Compare removal quotes with Removals Index now, and save up to 40% off your house removal costs.</li>
					</ul>

				<hr class="bullet-point-seperator">

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


		</div>
	</section>

	<!--form -->
        
        
        <?php
        	$quote_form_template = genesis_get_custom_field('_template');
        	//When the template is not selected
        	if(!empty($quote_form_template))   {        		
        		do_shortcode('[ri_quote_form template_name="'.$quote_form_template.'"]');
        	}
        	else
        	{
        		echo "Please select the Form Template";
        	}       	
        ?>
        
        
        
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
		              <p class="t">Get multiple FREE quotes from local removal firms in <?php echo $dki_loc;?>, so you never need to haggle on price</p>
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

	<section class="boxes">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="cta_box">
						<h4>Why Use Removals Index?</h4>
						<p>Remove the hassle from your house move: Compare removal quotes from top-rated removal companies in seconds – not hours – and save up to 40% on your moving costs. Find out why hundreds like you have awarded us 5 stars on Trustpilot.</p>
						<a href="/about-us" title="About Us" class="btn btn-primary">About Us</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="cta_box">
						<h4>Only The Best Movers</h4>
						<p>All of our removals partners are hand-picked, and carefully vetted with a 6 step process – and you’ll only choose from trusted, reliable moving experts. So you can relax, knowing that your most valuable possessions are in safe hands.</p>
						<a title="Get a Removal Quote" class="btn btn-primary get-my-quote">Get a Removal Quote</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="cta_box">
						<h4>Compare &amp; Save</h4>
						<p>Why waste hours trawling through websites? Compare removal quotes from trusted removals experts in under 60 seconds, and save up to 40% on your home removal costs. So you’ll have more to spend on the things you really need for your new home.</p>
						<a href="/compare-removal-quotes" title="Find out more" class="btn btn-primary">Find Out More</a>
					</div>
				</div>
			</div>
		</div>
	</section>

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

	<section class="boxes">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="cta_box">
						<h4>Removal Quotes</h4>
						<p>Let removal firms do the heavy lifting: With our simple removals costs calculator, you'll quickly receive multiple online removal quotes from moving experts, all competing for your move. You’ll never be hassled, and all your quotes are 100% obligation-free.</p>
						<a href="/removal-quotes" title="About Us" class="btn btn-primary less-block-text">Find Out More</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="cta_box">
						<h4>House Removal Costs</h4>
						<p>All removal companies’ prices will vary. But a reliable removal company will provide a full breakdown of your house removal costs at the outset. Hire a trusted professional to avoid the unexpected costs – and stress – of relying on inexperienced moving companies.</p>
						<a href="/house-removal-costs" title="Get a Removal Quote" class="btn btn-primary">Find Out More</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="cta_box">
						<h4>Removal Companies UK</h4>
						<p>There are thousands of national and local removal companies throughout the UK – But every removal company is different. It’s vital to choose an experienced, reliable moving firm to entrust your valuables to, to ensure your home move is a success.</p>
						<a href="/removal-companies-uk" title="Find out more" class="btn btn-primary less-block-text">Find Out More</a>
					</div>
				</div>
			</div>
		</div>
	</section>
