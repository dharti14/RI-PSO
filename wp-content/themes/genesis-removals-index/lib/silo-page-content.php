<?php
$dki_hln = dki_get_hln();
$dki_loc = dki_get_loc();

$schema_header_text = genesis_get_custom_field('_schema_header_text');
$header_text = genesis_get_custom_field('_header_text');

?>
<div id="ri_silo_page">
<div id="dki">
		<div class="container">
			<h1 class="title blue"><?php echo dki_exact_string( 'Looking For '. $dki_hln ); ?><span>?</span></h1>
		</div>
</div>

	<section id="hero">

		<div class="container">
			<?php if(!empty($schema_header_text) && (!empty($header_text))){ ?>
				  <h1 class="silo-title" itemscope itemtype="http://schema.org/Article"><span itemprop="articleSection"><?php echo $schema_header_text;?></span> <?php echo $header_text; ?></h1>
			<?php } else { ?>
				     <h1 class="silo-title"><?php the_title(); ?></h1>
			<?php } ?>
			

			<div class="pad80">
				<div class="row">
					<div class="col-xs-12">
						<div class="quote_box_holder">
						<p class="align_center tagline silo-tagline">You're Seconds Away From Removing The Stress, Hassle &amp; Headache From Your Move!</p>
							<div class="quote_box">
								<h3 class="title">SAVE Up To 40% On Your Move!</h3>

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
	<section id="silo-separator"></section>
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

	<section id="how_will" class="silo-how-will">
		<div class="container">
			<div id="ri_silo_page_content">
				   <?php
				   
	       			if (have_posts()) : 
	            	 	 while (have_posts()) : the_post(); ?>
	            
	            	<article class="post-<?php echo get_the_ID();?> entry">
	            		<div class="entry-content content-page-content">
	            			<?php the_content(); ?>
	            		</div>
	            	</article>
	
	            <?php 
	            		endwhile; //* end of one post
	            		
		            endif;
		        ?>
	
	      </div>
			 
		</div>
	</section>
</div>		
		
	
	