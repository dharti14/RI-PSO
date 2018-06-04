<?php
	//Load css and js of the form here

	$lookup_technology = $this->get_lookup_technology();

	$js_filename='';
	$css_filename='';

	//If lookup functionality selected is data8 then load its js and css files else load as usual css and js files
	switch ($lookup_technology){

		case "data8":
			$js_filename = "ri_email_phone_lookup-data8";			
			break;

		case "bvdata8":
			$js_filename = "ri_email_phone_lookup-bvanddata8";			
			break;
			
	}
	
	//Loading js and css file depending upon the lookup functionality selected
	$this->ri_load_js('ri_quote_form_js','ri_quote_form_4');
	$this->ri_load_css('ri_quote_form_css','ri_quote_form_4');
	$this->ri_load_css('ri_quote_form_residential_css','ri_quote_form_4_residential');
	wp_localize_script("ri_quote_form_js", 'post_code_address_object', array('ajaxurl' => admin_url("admin-ajax.php")));
	if(!empty($js_filename))
	{
		$this->ri_load_js('ri_selected_lookup_technology_js',$js_filename);
	}
	
	
	
	$gdprTCPageLink  = '';
	$gdprPPPageLink = '';
	
	$options = get_option('ri_quote_form', array());
	
	if( isset($options['gdpr_tc_link']) ) {
		$gdprTCPageLink = $options['gdpr_tc_link'];
	}
	
	if( isset($options['gdpr_pp_link']) ) {
		$gdprPPPageLink = $options['gdpr_pp_link'];
	}
	
	
	//Loading js and css file depending upon the lookup functionality selected

     $dki_hln = dki_get_hln();
     $ri_page_id = $this->page_id;

?>

<div id="show-after-get" class="residential" style="display:none;">
<div class="removing-the-stress">
  <div class="container">

			<div class="row">
				<div class="col-xs-12">

					   <div class="removing-stress-top">
						    <h2>You're Seconds Away From <span>Removing The Stress</span> From Your Move!</h2>
						    <p>... And Saving Up To 40% With Vetted, Hand Checked, Removal Companies</p>
					   </div>

				</div>
			</div>

			<form method="post" name="form" id="form" action="<?php  echo $this->request_url; ?>" autocomplete="off">

				<input type="hidden" value="0" name="form-type">
				<input type="hidden" value="<?php echo $ri_page_id;?>" name="ri_page_id">

					 <?php echo $this->get_plocal_tags_var(); ?>

					 <div class="row">					   		
						<div class="col-md-offset-2 col-xs-12 col-sm-8 col-md-6">					   		
					   		<div class="row">
					   		<!-- Step 1 -->
					  		<div class="removing-stress-form step1 col-xs-12 col-sm-12 col-md-12">
					  		<span class="bottom-arrow" style="display:none"></span>
					            <div class="nearly"><img src="<?php echo RI_QUOTE_FORM_URL;?>images/nearly-img-new.png" alt="<?php echo $dki_hln;?>"></div>
					             <h4 class="property">Step 1 of 4 : Size of my current property</h4>
					              <div class="removing-stress-form-con">					              
					               <div rel="bed1" class="bedroom-radios-container">
					                  <div class="bedimgwrapper" rel="bed1">
					                  	<img alt="bed1" src="<?php echo RI_QUOTE_FORM_URL;?>images/1bed.png">
					                  </div>
					                  <div class="bed-radios-input-wrapper">
					                  	<input type="radio" class="bedrooms" id="bed1" value="1" name="bedrooms">
					                  	<label for="bed1">1<br>bed</label>
					                  </div>					                  
					                </div>									
									<div rel="bed2" class="bedroom-radios-container">
					                  <div class="bedimgwrapper" rel="bed2">
					                  	<img alt="bed2" src="<?php echo RI_QUOTE_FORM_URL;?>images/2bed.png">
					                  </div>
					                  <div class="bed-radios-input-wrapper">
					                  	<input type="radio" class="bedrooms" id="bed2" value="2" name="bedrooms">
					                  	<label for="bed2">2<br>bed</label>
					                  </div>					                  
					                </div>					                
					                <div rel="bed3" class="bedroom-radios-container">
					                  <div class="bedimgwrapper" rel="bed3">
					                  	<img alt="bed3" src="<?php echo RI_QUOTE_FORM_URL;?>images/3bed.png">
					                  </div>
					                  <div class="bed-radios-input-wrapper">
					                  	<input type="radio" class="bedrooms" id="bed3" value="3" name="bedrooms">
					                  	<label for="bed3">3<br>bed</label>
					                  </div>					                  
					                </div>					                
					                <div rel="bed4" class="bedroom-radios-container">
					                  <div class="bedimgwrapper" rel="bed4">
					                  	<img alt="bed4" src="<?php echo RI_QUOTE_FORM_URL;?>images/4bed.png">
					                  </div>
					                  <div class="bed-radios-input-wrapper">
					                  	<input type="radio" class="bedrooms" id="bed4" value="4" name="bedrooms">
					                  	<label for="bed4">4<br>bed</label>
					                  </div>					                  
					                </div>					                
					                <div rel="bed5" class="bedroom-radios-container">
					                  <div class="bedimgwrapper" rel="bed5">
					                  	<img alt="bed5" src="<?php echo RI_QUOTE_FORM_URL;?>images/5bed.png">
					                  </div>
					                  <div class="bed-radios-input-wrapper">
					                  	<input type="radio" class="bedrooms" id="bed5" value="5" name="bedrooms">
					                  	<label for="bed5">5<br>bed</label>
					                  </div>					                  
					                </div>					                
					                <div rel="bed0" class="bedroom-radios-container box0_desc">
					                  <div class="bedimgwrapper" rel="bed0">
					                  	<img alt="bed0" src="<?php echo RI_QUOTE_FORM_URL;?>images/desc-img.png">
					                  </div>
					                  <div class="bed-radios-input-wrapper">
					                  	<input type="radio" class="bedrooms" id="bed0" value="in description" name="bedrooms">
					                  	<label for="bed0">Describe the inventory or contents of your move</label>
					                  </div>					                  
					                </div>				  
					              </div>
					            </div>
					            
					            <!-- Step 1 -->

								<!-- Step 2 -->

								
							       <div class="removing-stress-form step2 col-xs-12 col-sm-12 col-md-12" style="display:none">
							         <h4>Step 2 of 4 : My move</h4>
							         <span class="bottom-arrow" style="display:none"></span>
							          <div class="removing-stress-form-con">
							           <div class="section-wrapper">
							           <div class="moving-from-wrapper">
							              <div class="form-group stress-moving-from">
							                <label for="exampleInputEmail1">I'm moving from:</label>
							                <input type="text" class="form-control postcode" name="postcode" placeholder="Postcode *">							                
							                <input type="text" class="form-control" name="city" placeholder="Town / City *">
							                <input type="text" class="form-control" name="address" placeholder="Street Name *">
							                <input type="text" class="form-control" name="houseno" placeholder="Enter House Number...">
							              </div>

							              <div class="form-group radio-with-text">
							               <h5>Property Type:</h5>
							                <label>
							                  <input type="radio" name="property_type_from" class="test" value="House"> House
							                </label>
							                <label>
							                  <input type="radio" name="property_type_from" class="test" value="Bungalow"> Bungalow
							                </label>
							                <label>
							                  <input type="radio" name="property_type_from" class="test" value="Apartment / Flat"> Apartment / Flat
							                </label>
							              </div>
							              <div id="appartment-floor-from" style="display:none;">
							              <div class="form-group">
							               <select name="floor_from" class="drop-down">
							               		<option value="">Select Which Floor...</option>
							                    <option value="Ground">Ground</option>
							                    <option value="1">1</option>
							                    <option value="2">2</option>
							                    <option value="3">3</option>
							                    <option value="4">4</option>
							                    <option value="5+">5+</option>
							               </select>
							              </div>

							              <div class="form-group radio-with-text2">
							               <h5>Lift Available? </h5>
							                <label>
							                  <input type="radio" name="lift_available_from" value="Yes"> Yes

							                </label>&nbsp; &nbsp;
							                <label>
							                  <input type="radio" name="lift_available_from" value="No"> No
							                </label>
							              </div>
							           	</div>
							           </div>
							           <div class="moving-from-to-section-separator"></div>
							           <div class="moving-to-wrapper">
							              <div class="form-group stress-moving-to to-address-wrapper">
							                <label for="exampleInputEmail1">I'm moving to:</label>
							                <input type="text" class="form-control" name="postcode_to" id="postcodeto" placeholder="Postcode">
							                <div class="text-center">
											<a href="javascript:void(0);" class="dont-know-address" id='dontknow'>I don't know the exact address</a>
											</div>
						                	 <input type="hidden" class="form-control" name="city_to" id="cityto" placeholder="Town / City *">
						                	 <input type="hidden" class="form-control" name="address_to" placeholder="Street Name">
						                	 <input type="hidden" class="form-control" name="houseno_to" placeholder="Enter House Number...">	
							              </div>
							              <div class="form-group moving-to-readonly-address-wrapper" style="display:none;">	
							              	<div class="moving-to-address"></div>
							              	<div class="text-center">						              
							              		<a href="javascript:void(0);" id="changeMovingToAddress" class="change-moving-to-address">Change Address</a>
							              	</div>
							              </div>
										  <div class="form-group dontknow-exact-address">
											  <label>Nearest town to property</label>
											  <input type='text' class="form-control nearesttown" placeholder='Nearest town to property' name='nearesttown' id='nearesttown' autocomplete="off" value="">
											   <div class="text-center">
											   	<a href="javascript:void(0);" class="know-address" id='knowexactaddress'>I have the exact address</a>
											  </div>
										  </div>
										   <div class="form-group nearesttown-readonly-address-wrapper" style="display:none;">	
							              	<div class="nearest-address"></div>
							              	<div class="text-center">						              
							              		<a href="javascript:void(0);" id="changeNearestTownAddress" class="change-nearesttown-address">Change Address</a>
							              	</div>
							              </div>
							              <div class="form-group radio-with-text">
							               <h5>Property Type:</h5>
							                <label for="house">
							                  <input type="radio" name="property_type_to" id="house" value="House"> House
							                </label>
							                <label for="bungalow">
							                  <input type="radio" name="property_type_to" id="bungalow" value="Bungalow"> Bungalow
							                </label>
							                <label for="appartment">
							                  <input type="radio" name="property_type_to" id="appartment" value="Apartment / Flat"> Apartment / Flat
							                </label>
							              </div>
							              <div id="appartment-floor-to" style="display:none;">
							              <div class="form-group">
							               <select name="floor_to" class="drop-down">
							               		<option value="">Select Which Floor...</option>
							                    <option value="Ground">Ground</option>
							                    <option value="1">1</option>
							                    <option value="2">2</option>
							                    <option value="3">3</option>
							                    <option value="4">4</option>
							                    <option value="5+">5+</option>
							               </select>
							              </div>

							              <div class="form-group radio-with-text2">
							               <h5>Lift Available? </h5>
							                <label for="lift-available-to-n">
							                  <input type="radio" name="lift_available_to" id="lift-available-to-n" value="Yes"> Yes
							                </label>&nbsp; &nbsp;
							                <label for="lift-available-to-y">
							                  <input type="radio" name="lift_available_to" id="lift-available-to-y" value="No"> No
							                </label>
							              </div>
							          	</div>
							          </div>
							          
							           <div class="form-group stress-moving-from">
							            <label for="date">My approximate moving date is:</label>
							            <input type="text" class="form-control date_picker" name="date" id="date1" placeholder="Date *" onfocus="blur();" >
							           </div>
							          </div>
							         </div> 
							        </div>

					            <!-- Step 2 -->

					            <!-- Step 3 -->

					            <div class="removing-stress-form step3 col-xs-12 col-sm-12 col-md-12" style="display:none">
							         <h4>Step 3 of 4 : Things I would also like help with</h4>
							         <span class="bottom-arrow"></span>
							          <div class="removing-stress-form-con"> 										
							              <div class="form-group">
							               <div class="input-label-wrapper">
							               		<h5>Packing Service Required : </h5>
							               </div> 							               
							               <div class="step-3-checkbox packing-service">
							                  <div class="input-label-wrapper">
								                <label id="packing-service-y">
								                  <input type="radio" name="packing_service" id="packing-service-y" value="Yes"> Yes
								                </label>&nbsp; &nbsp;
								                <label for="packing-service-n">
								                  <input type="radio" name="packing_service" id="packing-service-n" value="No"> No
								                </label>
								                <label>
								                  <input type="radio" name="packing_service" id="packing-service-not-sure" value="Not sure"> Not sure
								                </label>
							                  </div>
							                </div>
							              </div>
							              <div class="form-group">
							                 <div class="input-label-wrapper">
							               		<h5>Dismantle / Reassemble Needed : </h5>
							               	</div>	
							               <div class="step-3-checkbox dismantle">
							                <div class="input-label-wrapper">
								                <label>
								                  <input type="radio" name="dismantle" id="dismantle-y" value="Yes"> Yes
								                </label>&nbsp; &nbsp;
								                <label>
								                  <input type="radio" name="dismantle" id="dismantle-n" value="No"> No
								                </label>
								                <label>
								                  <input type="radio" name="dismantle" id="dismantle-not-sure" value="Not sure"> Not sure
								                </label>
							                </div>
							                </div>
							              </div>
							              <div class="form-group">
							               <div class="input-label-wrapper">
							               	<h5>Storage Required: </h5>
							               </div>
							               <div class="step-3-checkbox storage">
							                <div class="input-label-wrapper">
								                <label for="storage-y">
								                  <input type="radio" name="storage" id="storage-y" value="Yes"> Yes
								                </label>&nbsp; &nbsp;
								                <label for="storage-n">
								                  <input type="radio" name="storage" id="storage-n" value="No"> No
								                </label>
								                <label>
								                  <input type="radio" name="storage" id="storage-not-sure" value="Not sure"> Not sure
								                </label>
							                 </div>
							                </div>
							              </div>										
							        </div>
							     </div>

							      <!-- Step 3 -->
							       <!-- Step 4 -->

							       <div class="removing-stress-form step4 col-xs-12 col-sm-12 col-md-12" style="display:none">
							         <h4>Step 4 of 4 : My contact Information</h4>
							         <span class="bottom-arrow"></span>
							          <div class="removing-stress-form-con">
										 <div class="section-wrapper">
							              <div class="form-group">

							                <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name...*">
							                <input type="tel" class="form-control phone" name="phone" placeholder="Enter Best Contact Number...*">

							                <input type="text" class="form-control email" name="email"  placeholder="Enter Email Address...*"  value="">
							                <div class="form-group">
							               <h5 class="additional">Any Additional Information? </h5>
							               <span class="additional">Eg Parking issues, contents</span>
							               <div class="step-4-checkbox ">
							                <label>
							                  <input onClick="jQuery('#greenwood_drive').hide();" type="radio" name="any_addition_information" id="any-addition-information-n" checked value="No"> No
							                </label>&nbsp; &nbsp;
							                <label>
							                  <input onClick="jQuery('#greenwood_drive').show();" type="radio" name="any_addition_information" id="any-addition-information-y" value="Yes"> Yes
							                </label>
							                </div>
							              </div>
							               <textarea id="greenwood_drive" style="display:none" placeholder="Enter any additional information about your move ..." name="additional_info"></textarea>
							              </div>
										</div>

							          </div>
							        </div>

						        	 <!-- Step 4 -->
						        	<div class="col-xs-12 col-sm-12 col-md-12 domestic-submit-btn" style="display:none"> 
										<button type="submit" id="get-my-quote-top-domestic" class="btn btn-quote get-my-quote-second">YES! GET MY FREE QUOTES <span>100% Safe &amp; Secure Quote Delivery Process</span></button>											

										<div class="danger" id="danger-get-my-quote-second"><span></span></div>
										<div class="pp-info-wraper"> 	
											<div class="form-group gdpr-info-wrapper">
											   <div class="gdpr-opt-in-chk-wrapper"><input type="checkbox" class="from-control gdpr-opt-in" name="gdprOptIn" id = "GDPR_opt_in_domestic"></div>
											   <div class="gdpr-opt-in-label"><label for="GDPR_opt_in_domestic">By clicking 'Yes, Get My Free Quotes' I agree to the <a href="<?php echo $gdprTCPageLink ?>" target="_blank"> terms and conditions </a> and <a href="<?php echo $gdprPPPageLink ?>" target="_blank">privacy policy</a>.</label></div>	
											</div>									 
										 	<div class="form-group">
											 	<p class="security">Your details are not shared with anyone other than the firms who are providing the quotes and we operate a strict no spam policy.</p>
											</div>
											<p class="security"><span class="glyphicon glyphicon-lock"></span> Your information is protected by 128-bit SSL encryption</p>
							 		   </div>								   
								   </div>	 
							</div>
						</div>

						     <!--Right sec start -->

							     <div id="sidebar" class="col-xs-12 col-sm-4 col-md-4">

							     <div class="right-slider">
							      <div class="trustpilot-widget" data-locale="en-GB" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="4ed29d5a000064000511a9a9" data-style-height="130" data-style-width="100%" data-stars="4,5"></div>

							     </div>

							     <h4 class="right-satisfaction-heading">100% Satisfaction Guarantee</h4>
							     <div class="right-satisfaction">
							     <p>With Removals Index you'll be getting access to:</p>
							     <ul>
							     	<li>A saving of up to 40% on your moving costs</li>
							        <li>Top local rated removal companies all competing for your move</li>
							        <li>Bespoke comparison of local firms without ever having to pick up the phone</li>
							     </ul>
							     </div>

							    <?php include(RI_QUOTE_FORM_PATH.'inc/sidebar.php'); ?>

							   </div>

						   <!--Right sec end -->

					            </div>


					   		</form>
					   		</div>
				  </div>
			</div>

<!-- Popup Form for residential end -->

<!-- Popup Form start for business-->

<div id="show-after-get-business" class="business" style="display:none;">
<div class="removing-the-stress">
 <div class="container">
	<div class="row">
		<div class="col-xs-12">

			   <div class="removing-stress-top">
				    <h2>You're Seconds Away From <span>Removing The Stress</span> From Your Move!</h2>
				    <p>... And Saving 40% On Your Moving Costs With Vetted, Hand Checked, Commercial Removal Companies</p>
			   </div>

		</div>
	</div>

   <form method="post" name="form" id="form-business" action="<?php echo $this->request_url; ?>">

   	<input type="hidden" name="form-type" value="2">
   	<input type="hidden" value="<?php echo $ri_page_id;?>" name="ri_page_id">

   	<?php echo $this->get_plocal_tags_var(); ?>

   	<div class="row">
     <div class="col-sm-8">
       <div class="removing-stress-frm step2 ">
       	<div class="nearly"><img src="<?php echo RI_QUOTE_FORM_URL;?>/images/nearly-img.png" alt="<?php echo $dki_hln;?>"></div>
         <h4>Step 1 : My move</h4>

          <div class="removing-stress-frm-con">
           <div class="leftpart">

              <div class="form-group stress-moving-from">
                <label for="exampleInputEmail1">I'm moving from:</label>
                <input type="text" class="form-control postcode" name="postcode" placeholder="Postcode *">
                <input type="text" class="form-control" name="city" placeholder="Town / City *">
                <input type="text" class="form-control" name="address" placeholder="Street Name *">
                <input type="text" class="form-control" name="houseno" placeholder="Enter Property Number...">

              </div>


              <div class="form-group radio-with-text">
               <h5>Access :</h5>
              </div>
              <div id="appartment-floor-from">
              <div class="form-group">
               <select name="floor_from" class="drop-down">
               		<option value="">Select Which Floor...</option>
                    <option value="Ground">Ground</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5+">5+</option>
               </select>
              </div>

              <div class="form-group radio-with-text2">
               <h5>Lift Available? </h5>
                <label>
                  <input type="radio" name="lift_available_from" value="Yes"> Yes

                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" name="lift_available_from" value="No"> No
                </label>
              </div>

              <div class="form-group radio-with-text3">
               <h5>Parking Available? </h5>
                <label>
                  <input type="radio" onClick="jQuery('.parking-issues-from').hide();" name="parking_available_from" value="Yes"> Yes

                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" onClick="jQuery('.parking-issues-from').show();" name="parking_available_from" value="No"> No
                </label>
              </div>

              <div class="form-group parking-issues-from" style="display:none;">

                  <h5>Parking issues: </h5>
                  <textarea name="parking_issues_from" id="parking-issues-from"></textarea>

              </div>

           	</div>

           </div>

           <div class="rightpart">
              <div class="form-group stress-moving-from to-address-wrapper">
                <label for="exampleInputEmail1">I'm moving to:</label>
				<input type="text" class="form-control"  name="postcode_to" id="postcodeto" placeholder="Postcode">
				<a href="javascript:void(0);" class="dont-know-address" id='dontknowcommercialaddress'>I don't know the exact address</a>
                <input type="text" class="form-control" name="city_to" id="cityto" placeholder="Town / City *">
                <input type="text" class="form-control" name="address_to" id="addressto" placeholder="Street Name">
                <input type="text" class="form-control" name="houseno_to" placeholder="Enter Property Number...">
              </div>
			  <div class="form-group dontknow-exact-address">
				<label>Nearest town to property</label>
				<input type='text' class="form-control nearesttown" placeholder='Nearest town to property' name='nearesttowncom' id='nearesttowncom'>
				<a href="javascript:void(0);" class="know-address" id='knowexactcommercialaddress'>I have the exact address</a>
			  </div>

              <div class="form-group radio-with-text">
               <h5>Access :</h5>
              </div>
              <div id="appartment-floor-to">
              <div class="form-group">
               <select name="floor_to" class="drop-down">
               		<option value="">Select Which Floor...</option>
                    <option value="Ground">Ground</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5+">5+</option></select>
              </div>

              <div class="form-group radio-with-text2">
               <h5>Lift Available? </h5>
                <label>
                  <input type="radio" name="lift_available_to" id="lift-available-to-n" value="Yes"> Yes
                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" name="lift_available_to" id="lift-available-to-y" value="No"> No
                </label>
              </div>

              <div class="form-group radio-with-text3">
               <h5>Parking Available? </h5>
                <label for="parking-available-to-n">
                  <input type="radio" onClick="jQuery('.parking-issues-to').hide();" name="parking_available_to" id="parking-available-to-n" value="Yes"> Yes
                </label>&nbsp; &nbsp;
                <label for="parking-available-to-y">
                  <input type="radio" onClick="jQuery('.parking-issues-to').show();" name="parking_available_to" id="parking-available-to-y" value="No"> No
                </label>
              </div>

              <div class="form-group parking-issues-to" style="display:none;">

                  <h5>Parking issues: </h5>
                  <textarea name="parking_issues_to" id="parking-issues-to"></textarea>

              </div>

          	</div>

          </div>

           <div class="form-group stress-moving-from">
            <label for="number-personnel">Number of personnel being moved:</label>
            <input type="text" class="form-control" name="number_personnel" id="number-personnel" placeholder="Enter Number...">
           </div>

           <div class="form-group stress-moving-from">
            <label for="approx-floor-area">Approx floor area :</label>
            <input type="text" class="form-control" name="approx_floor_area" id="approx-floor-area" placeholder="Enter In Square Feet... (optional)">
           </div>

           <div class="form-group stress-moving-from">
            <label for="date2">My approximate moving date is:</label>
            <input type="text" class="form-control date_picker" name="date" id="date2" placeholder="Date *">
           </div>

          </div>
        </div>

       <div class="removing-stress-frm step3">
         <h4>Step 2 : Things I would also like help with</h4>

          <div class="removing-stress-frm-con">

              <div class="form-group">
               <h5>Packing Service Required : </h5>
               <div class="step-3-checkbox packing-service">
                <label>
                  <input type="radio" value="Yes" id="packing-service-y" name="packing_service"> Yes
                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" value="No" id="packing-service-n" name="packing_service"> No
                </label>
                <label>
                  <input type="radio" name="packing_service" id="packing-service-not-sure" value="Not sure"> Not sure
                </label>
                </div>
              </div>
              <div class="form-group">
               <h5>Dismantle / Reassemble Needed : </h5>
               <div class="step-3-checkbox dismantle">
                <label>
                  <input type="radio" value="Yes" id="dismantle-y" name="dismantle"> Yes
                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" value="No" id="dismantle-n" name="dismantle"> No
                </label>
                <label>
                  <input type="radio" name="dismantle" id="dismantle-not-sure" value="Not sure"> Not sure
                </label>
                </div>
              </div>
              <div class="form-group">
               <h5>Storage Required: </h5>
               <div class="step-3-checkbox storage">
                <label for="storage-y">
                  <input type="radio" value="Yes" id="storage-y" name="storage"> Yes
                </label>&nbsp; &nbsp;
                <label for="storage-n">
                  <input type="radio" value="No" id="storage-n" name="storage"> No
                </label>
                <label>
                  <input type="radio" name="storage" id="storage-not-sure" value="Not sure"> Not sure
                </label>
                </div>
              </div>

        	  <div class="form-group">
               <h5>Out of Business Hours Removal: </h5>
               <div class="step-3-checkbox out_of_business">
                <label for="out-of-business-y">
                  <input type="radio" value="Yes" id="out-of-business-y" name="out_of_business"> Yes
                </label>&nbsp; &nbsp;
                <label for="out-of-business-n">
                  <input type="radio" value="No" id="out-of-business-n" name="out_of_business"> No
                </label>
                <label>
                  <input type="radio" name="out_of_business" id="out-of-business-not-sure" value="Not sure"> Not sure
                </label>
                </div>
              </div>

          </div>
        </div>

       <div class="removing-stress-frm step4">
         <h4>Step 3 : My contact Information</h4>

          <div class="removing-stress-frm-con">

              <div class="form-group">
              	<input type="text" class="form-control" name="companyname" placeholder="Company Name...">
                <input type="text" class="form-control" name="fullname" placeholder="Contact Name...">
                <input type="tel" class="form-control phone" name="phone" placeholder="Enter Best Contact Number...">

                <input type="text" class="form-control email"  name="email" placeholder="Enter Email Address..." value="">
                 <div class="form-group">
               <h5 class="additional">Any Additional Information? </h5>
               <span class="additional help">Eg move inventory, best time to call</span>
               <div class="step-4-checkbox ">
                <label>
                  <input onClick="jQuery('#greenwood_drive1').hide();jQuery('.help').show();" type="radio" name="any_addition_information" id="any-addition-information-n" checked value="No"> No
                </label>&nbsp; &nbsp;
                <label for="any-addition-information-y">
                  <input onClick="jQuery('#greenwood_drive1').show();jQuery('.help').hide();" type="radio" name="any_addition_information" id="any-addition-information-y" value="Yes"> Yes
                </label>
                </div>
              </div>
               <textarea style="display:none;" id="greenwood_drive1" placeholder="Enter any additional information about your move.." name="additional_info"></textarea>
              </div>
            </div>
          </div>

			<button type="submit" id="get-my-quote-top-commercial" class="btn btn-quote get-my-quote-second">YES! GET MY FREE QUOTES <span>100% Safe &amp; Secure Quote Delivery Process</span></button>																									 

				
			<div class="danger" id="danger-get-my-quote-second-business"><span></span></div>
			
			<div class="pp-info-wraper"> 	
				<div class="form-group gdpr-info-wrapper">
				   <div class="gdpr-opt-in-chk-wrapper"><input type="checkbox" class="from-control gdpr-opt-in" name="gdprOptIn" id = "GDPR_opt_in_commercial"></div>
				   <div class="gdpr-opt-in-label"><label for="GDPR_opt_in_commercial">By clicking 'Yes, Get My Free Quotes' I agree to the <a href="<?php echo $gdprTCPageLink ?>" target="_blank"> terms and conditions </a> and <a href="<?php echo $gdprPPPageLink ?>" target="_blank">privacy policy</a>.</label></div>	
				</div>									 
			 	<div class="form-group">
				 	<p class="security">Your details are not shared with anyone other than the firms who are providing the quotes and we operate a strict no spam policy.</p>
				</div>
				<p class="security"><span class="glyphicon glyphicon-lock"></span> Your information is protected by 128-bit SSL encryption</p>
 		   </div>
			
		</div>



     <!--Right sec start -->

     <div id="sidebar" class="col-sm-4">

     <div class="right-slider">
      <div class="trustpilot-widget" data-locale="en-GB" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="4ed29d5a000064000511a9a9" data-style-height="130" data-style-width="100%" data-stars="4,5"></div>

     </div>

     <h4 class="right-satisfaction-heading">100% Satisfaction Guarantee</h4>
     <div class="right-satisfaction">
     <p>With Removals Index you'll be getting access to:</p>
     <ul>
     	<li>A saving of up to 40% on your moving costs</li>
        <li>Top local rated removal companies all competing for your move</li>
        <li>Bespoke comparison of local firms without ever having to pick up the phone</li>
     </ul>
     </div>

     <?php include(RI_QUOTE_FORM_PATH.'inc/sidebar.php'); ?>


   </div>

     <!--Right sec end -->


 </div>

   </form>
     </div>
   </div>

  </div>

<!-- Popup Form for business end -->

<!-- Popup Form start for international-->


<div id="show-after-get-international" class="international" style="display:none;">
<div class="removing-the-stress">
  <div class="container">


			<div class="row">
				<div class="col-xs-12">

					   <div class="removing-stress-top">
						    <h2>You're Seconds Away From <span>Removing The Stress</span> From Your Move!</h2>
						    <p>... And Saving Up To 40% With Vetted, Hand Checked, International Removal Companies</p>
					   </div>

				</div>
			</div>

   <form method="post" name="form" id="form-international" action="<?php echo $this->request_url; ?>">

   		<input type="hidden" name="form-type" value="1">
   		<input type="hidden" value="<?php echo $ri_page_id;?>" name="ri_page_id">

   		<?php echo $this->get_plocal_tags_var(); ?>

  		<div class="row">
							<div class="col-md-12">

					   		<!-- Step 1 -->
					  		<div class="removing-stress-frm step1">
					            <div class="nearly"><img src="<?php echo RI_QUOTE_FORM_URL;?>/images/nearly-img.png" alt="<?php echo $dki_hln;?>"></div>
					             <h4 class="property">Step 1 : Size of my current property</h4>


					              <div class="removing-stress-frm-con">

					                <div rel="bed1" class="bed-radios-container">
					                  <div class="img1bed" rel="bed1">&nbsp;</div>
					                  <input type="radio" class="bedrooms" id="bed1" value="1" name="bedrooms">
					                  <label for="bed1">1<br>bed</label>
					                </div>

					                <div rel="bed2" class="bed-radios-container">
					                  <div class="img2bed">&nbsp;</div>
					                  <input type="radio" class="bedrooms" id="bed2" value="2" name="bedrooms">
					                  <label for="bed2">2<br>bed</label>
					                </div>

					                <div rel="bed3" class="bed-radios-container">
					                  <div class="img3bed">&nbsp;</div>
					                  <input type="radio" class="bedrooms" id="bed3" value="3" name="bedrooms">
					                  <label for="bed3">3<br>bed</label>
					                </div>

					                <div rel="bed4" class="bed-radios-container">
					                  <div class="img4bed">&nbsp;</div>
					                  <input type="radio" class="bedrooms" id="bed4" value="4" name="bedrooms">
					                  <label for="bed4">4<br>bed</label>
					                </div>

					                <div rel="bed5" class="bed-radios-container">
					                  <div class="img5bed">&nbsp;</div>
					                  <input type="radio" class="bedrooms" id="bed5" value="5" name="bedrooms">
					                  <label for="bed5">5<br>bed +</label>
					                </div>

					                <div rel="bed0" class="bed-radios-container box_desc">
					                  <div class="imgdesc">&nbsp;</div>
					                  <input type="radio" id="bed0" value="in description" name="bedrooms">
					                  <label for="bed0">Describe the<br>inventory or<br>contents of<br>your move</label>
					                </div>

					              </div>
					            </div>
					            </div>
					            <!-- Step 1 -->

								<!-- Step 2 -->

	<div class="col-sm-8">
       <div class="removing-stress-frm step2">
         <h4>Step 2 : My move</h4>

          <div class="removing-stress-frm-con">
           <div class="leftpart">

              <div class="form-group stress-moving-from">
                <label for="exampleInputEmail1">I'm moving from:</label>
                <input type="text" class="form-control" name="postcode" placeholder="Postcode *">
                <input type="text" class="form-control" name="city" placeholder="Town / City *">
                <input type="text" class="form-control" name="address" placeholder="Street Name *">
                <input type="text" class="form-control" name="houseno" placeholder="Enter House Number...">

              </div>


              <div class="form-group radio-with-text">
               <h5>Property Type:</h5>
                <label>
                  <input type="radio" name="property_type_from" value="House"> House
                </label>
                <label>
                  <input type="radio" name="property_type_from" value="Bungalow"> Bungalow
                </label>
                <label>
                  <input type="radio" name="property_type_from" value="Apartment / Flat"> Apartment / Flat
                </label>
              </div>
              <div id="appartment-floor-from" style="display:none;">
              <div class="form-group">
               <select name="floor_from" class="drop-down">
               		<option value="">Select Which Floor...</option>
                    <option value="Ground">Ground</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5+">5+</option>
               </select>
              </div>

              <div class="form-group radio-with-text2">
               <h5>Lift Available? </h5>
                <label>
                  <input type="radio" name="lift_available_from" value="Yes"> Yes

                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" name="lift_available_from" value="No"> No
                </label>
              </div>
           	</div>

           </div>
           <div class="rightpart">

              <div class="form-group stress-moving-from">
                <label for="exampleInputEmail1">I'm moving to:</label>
                <div class="select-item"><select name="countryTo" id="countryTo" class="drop-down">
            	<optgroup label="Popular"><option selcted="" value="">Please select</option>
            		<option value="Australia">Australia</option><option value="Brazil">Brazil</option><option value="Canada">Canada</option><option value="China">China</option><option value="Denmark">Denmark</option><option value="France">France</option><option value="Germany">Germany</option><option value="India">India</option><option value="Italy">Italy</option><option value="Japan">Japan</option><option value="New Zealand">New Zealand</option><option value="Norway">Norway</option><option value="Russia">Russia</option><option value="ESP">Spain</option><option value="Sweden">Sweden</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option></optgroup>
           	 	<optgroup label="All countries">
            		<option selcted="" value="Please select">Please select</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Ascension">Ascension</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin, Republic of">Benin, Republic of</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="British Virgin Islands">British Virgin Islands</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde Islands">Cape Verde Islands</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Rep">Central African Rep</option><option value="Chad Republic">Chad Republic</option><option value="Chatham Island, NZ">Chatham Island, NZ</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos Islands">Cocos Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Curacao">Curacao</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Diego Garcia">Diego Garcia</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Easter Island">Easter Island</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji Islands">Fiji Islands</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Antilles">French Antilles</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="Fyrom, Macedonia">Fyrom, Macedonia</option><option value="Gabon Republic">Gabon Republic</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada and Carriacuou">Grenada and Carriacuou</option><option value="Grenadin Islands">Grenadin Islands</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guantanamo Bay">Guantanamo Bay</option><option value="Guatemala">Guatemala</option><option value="Guiana">Guiana</option><option value="Guinea, Rep">Guinea, Rep</option><option value="Guinea, Bissau">Guinea, Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Inmarsat">Inmarsat</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Ivory Coast">Ivory Coast</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea, North">Korea, North</option><option value="Korea, South">Korea, South</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macau">Macau</option><option value="Macedonia, FYROM">Macedonia, FYROM</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali Republic">Mali Republic</option><option value="Malta">Malta</option><option value="Mariana Islands">Mariana Islands</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte Island">Mayotte Island</option><option value="Mexico">Mexico</option><option value="Micronesia, Fed States">Micronesia, Fed States</option><option value="Midway Islands">Midway Islands</option><option value="Miquelon">Miquelon</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Neth. Antilles">Neth. Antilles</option><option value="Netherlands">Netherlands</option><option value="Nevis">Nevis</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger Republic">Niger Republic</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Principe">Principe</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Reunion Island">Reunion Island</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saipan">Saipan</option><option value="San Marino">San Marino</option><option value="Sao Tome">Sao Tome</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal Republic">Senegal Republic</option><option value="Serbia, Republic of">Serbia, Republic of</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="St Pierre et Miquelon">St Pierre et Miquelon</option><option value="St. Helena">St. Helena</option><option value="St. Kitts">St. Kitts</option><option value="St. Lucia">St. Lucia</option><option value="St. Vincent">St. Vincent</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="US Virgin Islands">US Virgin Islands</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican city">Vatican city</option><option value="Venezuela">Venezuela</option><option value="Vietnam, Soc Republic of">Vietnam, Soc Republic of</option><option value="Wake Island">Wake Island</option><option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option><option value="Western Samoa">Western Samoa</option><option value="Yemen">Yemen</option><option value="Yugoslavia">Yugoslavia</option><option value="Zaire">Zaire</option><option value="Zambia">Zambia</option><option value="Zanzibar">Zanzibar</option><option value="Zimbabwe">Zimbabwe</option>

            	</optgroup>
            </select></div>

                <input type="text" class="form-control" name="city_to" placeholder="Town / City *">
                <input type="text" class="form-control" name="address_to" placeholder="Street Name... (optional)">
               	<input type="text" class="form-control" name="postcode_to" placeholder="Postal / Zipcode... (optional)">

              </div>


              <div class="form-group radio-with-text">
               <h5>Property Type: </h5>
                <label>
                  <input type="radio" name="property_type_to" id="house" value="House"> House
                </label>
                <label>
                  <input type="radio" name="property_type_to" id="bungalow" value="Bungalow"> Bungalow
                </label>
                <label>
                  <input type="radio" name="property_type_to" id="appartment" value="Apartment / Flat"> Apartment / Flat
                </label>
              </div>
              <div id="appartment-floor-to" style="display:none;">
              <div class="form-group">
               <select name="floor_to" class="drop-down">
               		<option value="">Select Which Floor...</option>
                    <option value="Ground">Ground</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5+">5+</option></select>
              </div>

              <div class="form-group radio-with-text2">
               <h5>Lift Available? </h5>
                <label>
                  <input type="radio" name="lift_available_to" id="lift-available-to-n" value="Yes"> Yes
                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" name="lift_available_to" id="lift-available-to-y" value="No"> No
                </label>
              </div>
          	</div>

          </div>
           <div class="form-group stress-moving-from">
            <label for="date3">My approximate moving date is:</label>
            <input type="text" class="form-control date_picker" name="date" id="date3" placeholder="Date *">
           </div>
          </div>
        </div>

       <div class="removing-stress-frm step3">
         <h4>Step 3 : Things I would also like help with</h4>

          <div class="removing-stress-frm-con">

              <div class="form-group">
               <h5>Packing Service Required : </h5>
               <div class="step-3-checkbox packing-service">
                <label>
                  <input type="radio" value="Yes" id="packing-service-y" name="packing_service"> Yes
                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" value="No" id="packing-service-n" name="packing_service"> No
                </label>
                <label>
                  <input type="radio" value="Not sure" id="packing-service-not-sure" name="packing_service"> Not sure
                </label>
                </div>
              </div>
              <div class="form-group">
               <h5>Dismantle / Reassemble Needed : </h5>
               <div class="step-3-checkbox dismantle">
                <label>
                  <input type="radio" value="Yes" id="dismantle-y" name="dismantle"> Yes
                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" value="No" id="dismantle-n" name="dismantle"> No
                </label>
                <label for="dismantle-not-sure">
                  <input type="radio" value="Not sure" id="dismantle-not-sure" name="dismantle"> Not sure
                </label>
                </div>
              </div>

              <div class="form-group">
               <h5>Storage Required: </h5>
               <div class="step-3-checkbox storage">
                <label for="storage-y">
                  <input type="radio" value="Yes" id="storage-y" name="storage"> Yes
                </label>&nbsp; &nbsp;
                <label for="storage-n">
                  <input type="radio" value="No" id="storage-n" name="storage"> No
                </label>
                <label for="storage-not-sure">
                  <input type="radio" value="Not sure" id="storage-not-sure" name="storage"> Not sure
                </label>
                </div>
              </div>

              <div class="form-group">
               <h5>Preferred Shipping Method: </h5>
               <div class="step-3-checkbox shipping-method">
               <label for="shipping-method-sea">
                  <input type="radio" value="Sea" id="shipping-method-sea" name="shipping_method"> Sea
                </label>&nbsp; &nbsp;
                <label for="shipping-method-land">
                  <input type="radio" value="Land" id="shipping-method-land" name="shipping_method"> Land
                </label>
                <label for="shipping-method-none">
                  <input type="radio" value="None" id="shipping-method-none" name="shipping_method"> None
                </label>

                </div>
              </div>

          </div>
        </div>

       <div class="removing-stress-frm step4">
         <h4>Step 4 : My contact Information</h4>

          <div class="removing-stress-frm-con">

              <div class="form-group">

                <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name...*">
                <input type="tel" class="form-control phone" name="phone" placeholder="Enter Best Contact Number...*">
                <input type="text" class="form-control email" name="email"  value="" placeholder="Enter Email Address...*">

                <div class="form-group">
               		<h5 class="additional">Any Additional Information? </h5>
               		<span class="additional">eg parking issues, contents</span>
               		<div class="step-4-checkbox ">
                		<label>
                  			<input onClick="jQuery('#greenwood_drive2').hide();" type="radio" name="any_addition_information" id="any-addition-information-n" checked value="No"> No
                		</label>&nbsp; &nbsp;
                		<label for="any-addition-information-y">
                  			<input onClick="jQuery('#greenwood_drive2').show();" type="radio" name="any_addition_information" id="any-addition-information-y" value="Yes"> Yes
                		</label>
                	</div>
              	</div>
               <textarea id="greenwood_drive2" style="display:none;" placeholder="Enter any additional information about your move ..." name="additional_info"></textarea>
              </div>


          </div>
        </div>
		<button type="submit" id="get-my-quote-top-international" class="btn btn-quote get-my-quote-second">YES! GET MY FREE QUOTES <span>100% Safe &amp; Secure Quote Delivery Process</span></button>	

				
		<div class="danger" id="danger-get-my-quote-second-international"><span></span></div>
		
		<div class="pp-info-wraper"> 	
			<div class="form-group gdpr-info-wrapper">
			   <div class="gdpr-opt-in-chk-wrapper"><input type="checkbox" class="from-control gdpr-opt-in" name="gdprOptIn" id = "GDPR_opt_in_international"></div>
			   <div class="gdpr-opt-in-label"><label for="GDPR_opt_in_international">By clicking 'Yes, Get My Free Quotes' I agree to the <a href="<?php echo $gdprTCPageLink ?>" target="_blank"> terms and conditions </a> and <a href="<?php echo $gdprPPPageLink ?>" target="_blank">privacy policy</a>.</label></div>	
			</div>									 
		 	<div class="form-group">
			 	<p class="security">Your details are not shared with anyone other than the firms who are providing the quotes and we operate a strict no spam policy.</p>
			</div>
			<p class="security"><span class="glyphicon glyphicon-lock"></span> Your information is protected by 128-bit SSL encryption</p>
 		</div>
		
	 </div>


     <!--Right sec start -->

     <div id="sidebar" class="col-sm-4">

     <div class="right-slider">
      <div class="trustpilot-widget" data-locale="en-GB" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="4ed29d5a000064000511a9a9" data-style-height="130" data-style-width="100%" data-stars="4,5"></div>

     </div>

     <h4 class="right-satisfaction-heading">100% Satisfaction Guarantee</h4>
     <div class="right-satisfaction">
     <p>With Removals Index you'll be getting access to:</p>
     <ul>
     	<li>A saving of up to 40% on your moving costs</li>
        <li>Top local rated removal companies all competing for your move</li>
        <li>Bespoke comparison of local firms without ever having to pick up the phone</li>
     </ul>
     </div>

    <?php include(RI_QUOTE_FORM_PATH.'inc/sidebar.php'); ?>

   </div>

     <!--Right sec end -->


  </div>

   </form>
    </div>
   </div>

  </div>


<!-- Popup Form for international end -->
