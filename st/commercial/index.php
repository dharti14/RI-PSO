<?php
include("../inc/common.php");
ob_start('minify_callback');	//minify the output

$nodki = getDKIParam("nodki",false); //rewrite url index-2.php (non-dki page)

$loc = getDKIParam("LOC",'your area');
$typ = getDKIParam("TYP",'');
$hln = getDKIParam("HLN",'Trusted Commercial Removal Companies');
$mv1 = getDKIParam("MV1",'');


if($nodki == true)
{
	$hln = 'Trusted Commercial Removal Companies';
	$loc = 'your area';
}




//meta keywords fix added 25 Feb 2015
$meta_keywords = array();
$meta_keywords_string = '';

if($hln != 'Trusted Commercial Removal Companies') array_push($meta_keywords,$hln);
if($typ != '') array_push($meta_keywords,$typ);
if($loc != 'your area') array_push($meta_keywords,$loc);

if(count($meta_keywords)>0)
{
	$meta_keywords_string = implode(", ", $meta_keywords);

	$meta_keywords_string .= ', ';
}

//end meta keywords fix


	$wordsCount=str_word_count($hln);
	if($wordsCount==4){
	$spacebr=2;
	}else{
	$spacebr=$wordsCount-3;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
<meta name="description" content="<?php 
if($hln == 'Trusted Commercial Removal Companies'){
	echo 'Get quotes from professional business removal companies';
}else{
	echo $hln.'. Get quotes from professional business removal companies';
}
?>">
<meta name="keywords" content="<?php

echo $meta_keywords_string .'moving office, office removal, business removal, commercial removals, business moves, office relocation, moving premises';

?>">
<title><?php 
if($hln == 'Trusted Commercial Removal Companies'){
	echo 'Get Business Removal Quotes | Removals Index';
}else{
	echo $hln.' | Get Business Removal Quotes | Removals Index';
}
?></title>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="js/html5shiv.min.js"></script>
  <script src="js/respond.min.js"></script>
<![endif]-->

<style>
.logo{
	display:none;
}
.mobile-logo
{
display:none;
}
</style>

<?php include("../inc/analytics.php"); ?>

<?php load_css_files('1430466127009'); ?>

</head>

<body>

<header class="header">
<div class="container">

  <div class="row">
    <div class="col-sm-6">
     <div class="logo"><a href="#"><img src="images/logo.png" alt="<?php echo $hln;?>"></a></div>
     <div class="mobile-logo"><a href="/st/commercial/"><img src="images/logo.svg" alt="<?php echo $hln;?>"></a></div>
    </div>
    <div class="col-sm-6">
     <div class="contact-num"><label>Specialist Business Removers:</label>Call <strong>FREE</strong> 24/7 on: <span class="number">0333 444 8710</span></div>
    </div>
  </div>
      
</div>
</header>

<div class="looking-for">
 <div class="container">
  <div class="keyword"><?php echo  exact_string( 'Looking For '.$hln );?><span>?</span></div>
  
  <div class="quotes-top">
   <h1>Get Your <span>FREE <?php if($mv1 != ''){echo $mv1;}else{ echo "Office";}?> Removal Quotes</span> Today!</h1>
   <p>You're Seconds Away From Removing The Stress, Hassle &amp; Headache From Your <?php if($mv1 != ''){echo $mv1;}else{ echo "Commercial";}?> Move!</p>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
        <div class="free-quotes">
          <div class="free-quotes-form">
           <div class="start-here"><img src="images/start-here-img.png" alt="<?php echo $hln;?>" /></div>
           <div class="quotes-form-con">
            <h3>SAVE Up To 40% On Your Move!</h3>
            <form action="" method="post" id="form1">
            
                <div class="moving-from">
                  <label>I'm Moving From:</label>
                  <input type="text" name="postcode_from" id="postcode_from" placeholder="Enter Postcode..." >
                </div>
                <div class="moving-to">
                  <label>Premises Moving To:</label>
                  <input type="text" name="postcode_to" id="postcode_to" placeholder="Enter Postcode...">
                </div>
               
        	</form>
            <div class="get-my"><a class="get-my-quote">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds...</span></a></div>
            
            <p class="protect-text"><span>Your information is protected by 128 bit SSL encryption</span></p>
            
           </div> 
           
          </div>
          
          <div class="quotes-text">“We help hundreds of businesses,<br> just like yours, move every month...”</div>
        </div>
     </div>
  </div>
  
  
 </div>
</div>

<div class="client-box">
  <div class="container">
   <span class="arrow-post"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
   
   <div class="brand-logo">
    <h5>Trusted to help move businesses like:</h5>
    <ul>
     <li><a href="#"><img src="images/brand-logo1.jpg" alt="<?php echo $hln;?>" /></a></li>
     <li><a href="#"><img src="images/brand-logo2.jpg" alt="<?php echo $hln;?>"></a></li>
     <li><a href="#"><img src="images/brand-logo3.jpg" alt="<?php echo $hln;?>"></a></li>
     <li><a href="#"><img src="images/brand-logo4.jpg" alt="<?php echo $hln;?>"></a></li>
     <li><a href="#"><img src="images/brand-logo5.jpg" alt="<?php echo $hln;?>"></a></li>
     <li><a href="#"><img src="images/brand-logo6.jpg" alt="<?php echo $hln;?>"></a></li>
    </ul>
   </div> 
   
  </div>
</div>


<!-- Popup Form start for business-->

<div id="show-after-get-business" class="business" style="display:none;">

<div class="removing-the-stress">
  <div class="container">
   <div class="removing-stress-top">
    <h2>You're Seconds Away From <span>Removing The Stress</span> From Your Move !</h2>
    <p>... And Saving 40% On Your Moving Costs With Vetted, Hand Checked, Commercial Removal Companies</p>
   </div>
   <form action="../send.php" method="post" name="form" id="form-business">
   	<input type="hidden" value="2" name="form-type">
   	<?php echo get_plocal_tags_var(); ?>
   	<div class="row">
     <div class="col-sm-8">
       <div class="removing-stress-frm step2">
         <div class="nearly"><img src="images/nearly-img.png" alt="<?php echo $hln;?>"></div>
         <h4>Step 1 : My businesses move</h4>
         <span class="arrow-post2"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
          <div class="removing-stress-frm-con">
           <div class="leftpart">
            
              <div class="form-group stress-moving-from">
                <label for="exampleInputEmail1">I'm moving from:</label>
                <input type="text" class="form-control" name="postcode" placeholder="Postcode *">
                <input type="text" class="form-control" name="city" placeholder="Town / City *">
                <input type="text" class="form-control" name="address" placeholder="Street Name *">
                <input type="text" class="form-control" name="houseno" placeholder="Enter Property Number...">
                
              </div>
              
              
              <div class="form-group redio-with-text">
               <h5>Access :</h5>
              </div>
              <div id="appartment-floor-from">
              <div class="form-group">
               <select name="floor_from">
               		<option value="">Select Which Floor...</option>
                    <option value="Ground">Ground</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5+">5+</option>
               </select>
              </div>
              
              <div class="form-group redio-with-text2">
               <h5>Lift Available? </h5>
                <label>
                  <input type="radio" name="lift_available_from" value="Yes"> Yes 

                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" name="lift_available_from" value="No"> No 
                </label>
              </div>
              
              <div class="form-group redio-with-text3">
               <h5>Parking Available? </h5>
                <label>
                  <input type="radio" onClick="$('.parking-issues-from').hide();" name="parking_available_from" value="Yes"> Yes 

                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" onClick="$('.parking-issues-from').show();" name="parking_available_from" value="No"> No 
                </label>
              </div>
              
              <div class="form-group parking-issues-from" style="display:none;">
              
                  <h5>Parking issues: </h5>
                  <textarea name="parking_issues_from" id="parking-issues-from"></textarea>
                
              </div>
              
           	</div>
          
           </div>
           
           <div class="rightpart">
            
              <div class="form-group stress-moving-from">
                <label for="exampleInputEmail1">I'm moving to:</label>
                <input type="text" class="form-control" name="postcode_to" placeholder="Postcode">
                <input type="text" class="form-control" name="city_to" placeholder="Town / City *">
                <input type="text" class="form-control" name="address_to" placeholder="Street Name">
                <input type="text" class="form-control" name="houseno_to" placeholder="Enter Property Number...">
                
              </div>
              
              
              <div class="form-group redio-with-text">
               <h5>Access :</h5>
              </div>
              <div id="appartment-floor-to">
              <div class="form-group">
               <select name="floor_to">
               		<option value="">Select Which Floor...</option>
                    <option value="Ground">Ground</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5+">5+</option></select>
              </div>
              
              <div class="form-group redio-with-text2">
               <h5>Lift Available? </h5>
                <label>
                  <input type="radio" name="lift_available_to" id="lift-available-to-n" value="Yes"> Yes 
                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" name="lift_available_to" id="lift-available-to-y" value="No"> No 
                </label>
              </div>
              
              <div class="form-group redio-with-text3">
               <h5>Parking Available? </h5>
                <label for="parking-available-to-n">
                  <input type="radio" onClick="$('.parking-issues-to').hide();" name="parking_available_to" id="parking-available-to-n" value="Yes"> Yes 
                </label>&nbsp; &nbsp;
                <label for="parking-available-to-y">
                  <input type="radio" onClick="$('.parking-issues-to').show();" name="parking_available_to" id="parking-available-to-y" value="No"> No 
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
            <input type="text" class="form-control" name="date" id="date2" placeholder="Date *">
           </div>
           
          </div>
        </div>
        
       <div class="removing-stress-frm step3">
         <h4>Step 2 : Things I would also like help with</h4>
         <span class="arrow-post2"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
          <div class="removing-stress-frm-con">
            
              <div class="form-group">
               <h5>Packing Service Required : </h5>
               <div class="step-3-checkbox packing-service">
                <label>
                  <input type="radio" name="packing_service" id="packing-service-y" value="Yes"> Yes
                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" name="packing_service" id="packing-service-n" value="No"> No 
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
                  <input type="radio" name="dismantle" id="dismantle-y" value="Yes"> Yes
                </label>&nbsp; &nbsp;
                <label>
                  <input type="radio" name="dismantle" id="dismantle-n" value="No"> No 
                </label>
                <label>
                  <input type="radio" value="Not sure" id="dismantle-not-sure" name="dismantle"> Not sure 
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
                  <input type="radio" value="Not sure" id="storage-not-sure" name="storage"> Not sure 
                </label>
                </div>
              </div>
              
        	  <div class="form-group">
               <h5>Out of Business Hours Removal: </h5>
               <div class="step-3-checkbox out_of_business">
                <label for="out-of-business-y">
                  <input type="radio" name="out_of_business" id="out-of-business-y" value="Yes"> Yes
                </label>&nbsp; &nbsp;
                <label for="out-of-business-n">
                  <input type="radio" name="out_of_business" id="out-of-business-n" value="No"> No 
                </label>
                <label>
                  <input type="radio" value="Not sure" id="out-of-business-not-sure" name="out_of_business"> Not sure 
                </label>
                </div>
              </div>
         
          </div>
        </div>
        
       <div class="removing-stress-frm step4">
         <h4>Step 3 : My contact Information</h4>
         <span class="arrow-post2"><img src="images/arrow.png" alt="<?php echo $hln;?>" /></span>
          <div class="removing-stress-frm-con">
       
              <div class="form-group">
              	<input type="text" class="form-control" name="companyname" placeholder="Company Name...">
                <input type="text" class="form-control" name="name" placeholder="Contact Name...">
                <input type="text" class="form-control" name="phone" placeholder="Enter Best Contact Number...">
                 
                <input type="text" class="form-control" name="email" placeholder="Enter Email Address...">
                <div class="form-group">
               <h5 class="additional">Any Additional Information? </h5>
               <span class="additional help">Eg move inventory, best time to call</span>
               <div class="step-4-checkbox ">
                <label>
                  <input onClick="$('#greenwood_drive').hide();$('.help').show();" type="radio" name="any_addition_information" id="any-addition-information-n" checked value="No"> No 
                </label>&nbsp; &nbsp;
                <label for="any-addition-information-y">
                  <input onClick="$('#greenwood_drive').show();$('.help').hide();" type="radio" name="any_addition_information" id="any-addition-information-y" value="Yes"> Yes 
                </label>
                </div>
              </div>
               <textarea style="display:none;" id="greenwood_drive" placeholder="Enter any additional information about your move.." name="greenwood_drive"></textarea>
              </div>
       
          
          </div>
        </div>
        
        <div class="get-my"><a class="get-my-quote-second-business">YES! GET MY FREE QUOTES <span>100% Safe &amp; Secure Quote Delivery Process</span></a></div>
        <p class="protect-text"><span>Your information is protected by 128 bit SSL encryption</span></p>
        
        
         
     </div>
     
     <!--Right sec start -->
     
     <div class="col-sm-4">
     
     <div class="right-slider">
     <!-- <div class="trustpilot-widget" data-locale="en-GB" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="4ed29d5a000064000511a9a9" data-style-height="130" data-style-width="100%" data-stars="4,5"></div>-->
<div class="trustpilot-widget" data-locale="en-GB" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="4ed29d5a000064000511a9a9" data-style-height="130" data-style-width="100%" data-stars="4,5"></div>


     </div>
     
     <h4 class="right-satisfaction-heading">100% Satisfaction Guarantee</h4>
     <div class="right-satisfaction">
     <p>With Removals Index you'll be getting access to:</p>
     <ul>
     	<li>A saving of up to 40% on your moving costs</li>
        <li>Top local rated removal companies all competing for your move</li>
        <li>Bespoke comparison of local firms who will contact you with their best quotes</li>
     </ul>
     </div>
     <?php include('../inc/sidebar.php');?>
     
   </div>
     
     <!--Right sec end -->
     
     
   </div> 
   
   </form>
   </div>
   
  </div>
  
</div>

<!-- Popup Form for business end -->




<div id="hide-after-get">

	<div class="will-removal">
  <div class="container">
   <h2>How Will Removals Index<br> Take The Stress Out Of My <?php if($mv1 != ''){echo $mv1;}else{ echo "Businesses";}?> Move?</h2>
   
   <div class="row">
     <div class="col-sm-4">
       <div class="post-img pad1"><img src="images/post-img1.png" alt="<?php echo $hln;?>"></div>
       <h3>1. Provide a few details</h3>
       <p>Tell us about your move and  the best local removal companies will compete for your business</p>
     </div>
     <div class="col-sm-4">
       <div class="post-img"><img src="images/post-img2.png" alt="<?php echo $hln;?>"></div>
       <h3>2. Compare Prices</h3>
       <p>Get multiple FREE quotes from local removal firms in <?php echo $loc;?>, so you never need to haggle on price</p>
     </div>
     <div class="col-sm-4">
       <div class="post-img pad2"><img src="images/post-img3.png" alt="<?php echo $hln;?>"></div>
       <h3>3. Hire the Best</h3>
       <p>Removals Index's internal review process ensure you hire only the best movers for the job</p>
     </div>
   </div> 
   
  </div>
</div>


	<div class="free-quotes-now">
  <div class="container">
   <div class="row quotes-form-con">
    <div class="start-here-free"><img src="images/start-here-free-img.png" alt="<?php echo $hln;?>"></div>
    <form name="form2" id="form2" action="" method="post">
    <div class="col-sm-3">
     <div class="moving-from">
              <label>I'm Moving From:</label>
              <input type="text" id="postcode_from2" name="postcode_from2" placeholder="Enter Postcode...">
            </div>
    </div>
    <div class="col-sm-3">
     <div class="moving-to">
              <label>Premises Moving To:</label>
              <input type="text" id="postcode_to2" name="postcode_to2" placeholder="Enter Postcode...">
            </div>
    </div>
    </form>
    <div class="col-sm-6">
     <div class="get-my"><a class="get-my-quote2">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds...</span></a></div>
    </div>
   </div> 
    <p class="protect-text"><span>All your business information is protected with out 128 bit SSL encryption</span></p>
  </div>
</div>


	<div class="slide-main">
  <div class="container">
   
   <div class="row">
     <div class="col-sm-12">
       <div class="trustpilot-widget" data-locale="en-US" data-template-id="53aa8912dec7e10d38f59f36" data-businessunit-id="4ed29d5a000064000511a9a9" data-style-height="130" data-style-width="100%" data-stars="1,2,3,4,5"></div>
     </div>
   </div> 
   
  </div>
</div>


	<div class="companies">
  <div class="container">
  <div class="companies-top"> 
   <h2>Get Free Access To 100's Of Pre-Screened Removal Companies, With No Obligation!</h2>
   <p>We can help your <?php if($mv1 != ''){echo $mv1;}else{ echo "business";}?> move premises quickly and affordably, minimising office downtime so your teams can stay productive and you stay profitable!</p>
  </div> 
   <div class="row">
     <div class="col-sm-6">
      <div class="companies-list">
       <ul>
        <li>
         <h4>Never Haggle On Price Again </h4>
         <p>You'll get a full list of quotes from business specialist removal firms in <?php echo $loc;?>, that will all be <u>competing for your office move.</u></p>
        </li>
        <li>
         <h4>Get Done In Seconds Not Hours</h4>
         <p>On top of your work load, researching, and reviewing removal companies is an added hassle you don't need. Removals Index can help you can get the job done in a matter of seconds.</p>
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
         <p>We <u>hand pick and pre-screen</u> all of our commercial removal companies. Each and every one goes through our 6-step SAFE&trade; verification process.</p>
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
   <span class="arrow-post"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
   <div class="row quotes-form-con">
    <div class="start-compare"><img src="images/start-compare-img.png" alt="<?php echo $hln;?>"></div>
    <div class="col-sm-3">
     <div class="moving-from">
              <label>I'm Moving From:</label>
              <input type="text" id="postcode_from3" name="postcode_from3" placeholder="Enter Postcode...">
            </div>
    </div>
    <div class="col-sm-3">
     <div class="moving-to">
              <label>Premises Moving To:</label>
              <input type="text" id="postcode_to3" name="postcode_to3" placeholder="Enter Postcode...">
            </div>
    </div>
    <div class="col-sm-6">
     <div class="get-my"><a class="get-my-quote3">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds..</span></a></div>
    </div>
   </div> 
    <p class="protect-text"><span>All your business information is protected with out 128 bit SSL encryption</span></p>
  </div>
</div>


	<div class="find-experts">
 	<div class="container">
      <div class="row">
        <div class="col-sm-12">
         <h5>To find out more, speak to our commercial removal experts :</h5>
         <div class="call-free"><span>Call Free</span> <div class="number">0333 444 8710</div></div> 
         
         <div class="great-service"><p><span>Moving office was a military operation for our business, but thanks to Removals Index the move couldn't have been easier. From choosing off their list of vetted commercial movers, to the actual move it's self nothing could have been simpler. It saved my team days of work and countless hours of potential losses in revenue! Many thanks</span></p>
          <span class="recommended">Simply a Smooth Business Move!<strong>Rob Jenkins - Manchester</strong></span>
         </div>
         
         <div class="logo-tag">
         <img src="images/footer-img1.png" alt="<?php echo $hln;?>">
         <img src="images/footer-img2.png" alt="<?php echo $hln;?>">
         <img src="images/footer-img3.png" alt="<?php echo $hln;?>">
         </div>
         
        </div>
      </div>
 </div>     
</div>



<?php include('../inc/footer.php')?>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>
<?php load_js_files('1430465742938'); ?>

<script>
$(function() {
	$('#date1').datepicker({
		changeMonth: true,
		changeYear: true
	});
	 
	$('#date2').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy'
	});
	$('#date3').datepicker({
		changeMonth: true,
		changeYear: true
	});
});

</script>



<script async type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js"></script>
<script type="text/javascript">
(function(a,e,c,f,g,b,d){var h={ak:"999191207",cl:"8UxmCKOV4FkQp-W53AM"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[f]||(a[f]=h.ak);b=e.createElement(g);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(g)[0];d.parentNode.insertBefore(b,d);a._googWcmGet=function(b,d,e){a[c](2,b,h,d,null,new Date,e)}})(window,document,"_googWcmImpl","_googWcmAk","script");
</script>
	
<?php include('../inc/footer-code.php');?>
</body>
</html>