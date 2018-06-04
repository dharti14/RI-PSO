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
	$this->ri_load_js('ri_quote_form_js','ri_quote_form_5');
	$this->ri_load_css('ri_quote_form_css','ri_quote_form_5');
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




