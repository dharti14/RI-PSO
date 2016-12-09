<?php
	//Load css and js of the form here
	
	$lookup_functionality = genesis_get_custom_field('_lookup_functionality');
	
	$js_filename='';
	$css_filename='';

	//If lookup functionality selected is data8 then load its js and css files else load as usual css and js files
	switch ($lookup_functionality){
		
		case "data8":
			$js_filename = "ri_email_phone_lookup-data8";
			$css_filename = "ri_quote_form_2-data8";
			break;
			
		case "bvdata8":
			$js_filename = "ri_email_phone_lookup-bvanddata8";
			$css_filename = "ri_quote_form_2-briteverifyanddata8";
			break;
			
		default:
			$css_filename = "ri_quote_form_2";
	}
	
	
	if(empty($js_filename)){ //No lookup selected so default js will be ri_quote_form_anyvan
		$js_filename = "ri_quote_form_anyvan";
	}else{
		$this->ri_load_form_validation_js('ri_quote_form_anyvan');
	}
	
	
	//Loading js and css file depending upon the lookup functionality selected
		$this->ri_load_css($css_filename);
		$this->ri_load_js($js_filename);
	//Loading js and css file depending upon the lookup functionality selected

     $dki_hln = dki_get_hln();
     $ri_page_id = ri_get_page_id();
     
     
?>

<div id="show-after-get" class="residential" style="display:none;">
<div class="removing-the-stress">
  <div class="container">
		
			<div class="row">
				<div class="col-xs-12">
					
					   <div class="removing-stress-top">
						    <h2>You're Seconds Away From <span>Removing The Stress</span> From Your Move!</h2>
						    <p>... And Saving Up To 75% With Vetted, Hand Checked, Removal Companies</p>
					   </div>

				</div>
			</div>
					   
					   <form method="post" name="form" id="form">
					   
					   		<input type="hidden" value="4" name="form-type">
					   		<input type="hidden" value="<?php echo $ri_page_id;?>" name="ri_page_id">
					   		
					   		<?php echo $this->get_plocal_tags_var(); ?> 
					   		
					   		<div class="row">
							<div class="col-md-12">
					   		<!-- Step 1 -->
					  		<div class="removing-stress-frm step1">
					  		<span class="arrow-post2"><img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/arrow.png" alt="<?php echo $dki_hln;?>"></span>
					            <div class="nearly"><img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/nearly-img-new.png" alt="<?php echo $dki_hln;?>"></div>
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
							         <span class="arrow-post2"><img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/arrow.png" alt="<?php echo $dki_hln;?>"></span>
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
							           <div class="rightpart">
							            
							              <div class="form-group stress-moving-from">
							                <label for="exampleInputEmail1">I'm moving to:</label>
							                <input type="text" class="form-control" name="postcode_to" placeholder="Postcode">
							                <input type="text" class="form-control" name="city_to" placeholder="Town / City *">
							                <input type="text" class="form-control" name="address_to" placeholder="Street Name">
							                <input type="text" class="form-control" name="houseno_to" placeholder="Enter House Number...">
							                
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
							            <input type="text" class="form-control date_picker" name="date" id="date1" placeholder="Date *">
							           </div>
							          </div>
							        </div>
							        
					            <!-- Step 2 -->
					            
					            <!-- Step 3 -->
					          
					            <div class="removing-stress-frm step3">
							         <h4>Step 3 : Things I would also like help with</h4>
							         <span class="arrow-post2"><img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/arrow.png" alt="<?php echo $dki_hln;?>"></span>
							          <div class="removing-stress-frm-con">
							            
							              <div class="form-group">
							               <h5>Packing Service Required : </h5>
							               <div class="step-3-checkbox packing-service">
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
							              <div class="form-group">
							               <h5>Dismantle / Reassemble Needed : </h5>
							               <div class="step-3-checkbox dismantle">
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
							              <div class="form-group">
							               <h5>Storage Required: </h5>
							               <div class="step-3-checkbox storage">
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
							      
							      <!-- Step 3 -->
							       <!-- Step 4 -->

								       <div class="removing-stress-frm step4">
								         <h4>Step 4 : My contact Information</h4>
								         <span class="arrow-post2"><img src="<?php echo THEME_PATH_URI;?>/anyvan/lib/assets/images/arrow.png" alt="<?php echo $dki_hln;?>"></span>
								          <div class="removing-stress-frm-con">
								       
								              <div class="form-group">
								              
								                <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name...*">
								                <input type="text" class="form-control phone" name="phone" placeholder="Enter Best Contact Number...*">
								                 
								                <input type="text" class="form-control email" name="email"  placeholder="Enter Email Address...*"  value="">
								                <div class="form-group">
								               <h5 class="additional">Brief Description Of Your Items </h5>
								              </div>
								               <textarea id="greenwood_drive" class="form-control addditional_info" placeholder="Eg 2 sofas, 3 Beds, Fridge, 25 boxes ...*" name="additional_info"></textarea>
								              </div>
								       
								          
								          </div>
								        </div>

						        	 <!-- Step 4 -->

						        	 <div id="get-my-quote-top" class="btn btn-quote get-my-quote-second">YES! GET MY FREE QUOTES <span>100% Safe &amp; Secure Quote Delivery Process</span></div>

								     <div class="danger" id="danger-get-my-quote-second"><span></span></div>      
										<p class="security"><span class="glyphicon glyphicon-lock"></span> Your information is protected by 128-bit SSL encryption</p>
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
									     	<li>A saving of up to 75% on your moving costs</li>
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