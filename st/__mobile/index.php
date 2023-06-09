<?php
include("../inc/common.php");
ob_start('minify_callback');	//minify the output

$nodki = getDKIParam("nodki",false); //rewrite url index-2.php (non-dki page)

$loc = getDKIParam("LOC",'your area');
$typ = getDKIParam("TYP",'');
$hln = getDKIParam("HLN",'Trusted Local Removal Companies');


if($nodki == true)
{
	$hln = 'Trusted Local Removal Companies';
	$loc = 'your area';	
}




//meta keywords fix added 25 Feb 2015
$meta_keywords = array();
$meta_keywords_string = '';

if($hln != 'Trusted Local Removal Companies') array_push($meta_keywords,$hln);
if($typ != '') array_push($meta_keywords,$typ);
if($loc != 'your area') array_push($meta_keywords,$loc);

if(count($meta_keywords)>0)
{
	$meta_keywords_string = implode(",", $meta_keywords);

	$meta_keywords_string .= ',';
}

//end meta keywords fix




	$wordsCount=str_word_count($hln);
	$wordsCount;
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
if($hln == 'Trusted Local Removal Companies'){
	echo 'Get up to 6 quotes from trusted removal companies in your area';
}else{
	echo $hln.'. Get up to 6 quotes from trusted removal companies in your area';
}
?>">
<meta name="keywords" content="<?php
echo $meta_keywords_string. 'removal companies,removals,house removal companies,removal firms,removal quotes,compare removals';
?>">
<title><?php 
if($hln == 'Trusted Local Removal Companies'){
	echo 'Get Removal Quotes | Removals Index';
}else{
	echo $hln.' | Get Removal Quotes | Removals Index';
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
<?php load_css_files('1430158134476'); ?>
	
</head>

<body>

<header class="header">
<div class="container">

  <div class="row">
    <div class="col-sm-6">
     <div class="logo"><a href="/ri/main"><img src="images/logo.png" alt="<?php echo $hln;?>"></a></div>
     <div class="mobile-logo"><a href="/ri/main/"><img src="images/logo.svg" alt="<?php echo $hln;?>"></a></div>
    </div>
    <div class="col-sm-6">
     <div class="contact-num">Call <strong>FREE</strong> on: <span class="number">0333 444 8710</span></div>
    </div>
  </div>
      
</div>
</header>

<div class="looking-for">
 <div class="container">
  <div class="keyword"><?php echo exact_string( 'Looking For '.$hln ); ?><span>?</span></div>
  
  <div class="quotes-top">
   <h1>Get Your <span>FREE Removal Quotes</span> Today!</h1>
   <p>You're Seconds Away From Removing The Stress, Hassle &amp; Headache From Your Move!</p>
  </div>
  
  <div class="row">
    <div class="col-sm-12">
        <div class="free-quotes">
          <div class="free-quotes-form">
           <div class="start-here"><img src="images/start-here-img.png" alt="<?php echo $hln;?>"></div>
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
                  <li><input type="radio" onClick="$('#form1 .moving-to').show();" name="buseness_type" checked value="Residential" id="residential"><label for="residential">Residential</label></li>
                  <li><input type="radio" onClick="$('#form1 .moving-to').show();" name="buseness_type" value="Business Removal" id="business-removal"><label for="business-removal">Commercial</label></li>
                  <li><input type="radio" onClick="$('#form1 .moving-to').hide(); $('#form1 .moving-to').val('');" name="buseness_type" value="International" id="international"><label for="international">International</label></li>
                 </ul>
                </div>
               
        	</form>
            <div class="get-my"><a id="get-my-quote-top" href="javascript:void(0);" class="get-my-quote">GET MY FREE QUOTES <span>You'll be done in less than 60 seconds..</span></a></div>
            
            <p class="protect-text"><span>Your information is protected by 128 bit SSL encryption</span></p>
            
           </div> 
           
          </div>
          
          <div class="quotes-text">“We help thousands of people,<br> just like you move every month...”</div>
        </div>
     </div>
  </div>
  
  
 </div>
</div>

<div class="client-box">
  <div class="container">
   <span class="arrow-post"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
   <div class="row">
     <div class="col-sm-4">
      <div class="client-img"><img src="images/client-img.png" alt="<?php echo $hln;?>"></div>
      <div class="client-detail">
       <p>"Superb Service, put me in contact with the companies I needed!"</p>
       <span><strong>Tom Deller</strong> London</span>
      </div>
     </div>
     <div class="col-sm-4">
      <div class="client-img"><img src="images/client-img2.png" alt="<?php echo $hln;?>"></div>
      <div class="client-detail">
       <p>"Great way to get fast quotes without trawling through websites"</p>
       <span><strong>Christine Key</strong> Manchester</span>
      </div>
     </div>
     <div class="col-sm-4">
      <div class="client-img"><img src="images/client-img3.png" alt="<?php echo $hln;?>"></div>
      <div class="client-detail">
       <p>"Took a lot of the stress of finding a suitable removal company"</p>
       <span><strong>Adam Kirkpatrick</strong> Brighton</span>
      </div>
     </div>
   </div> 
   
  </div>
</div>

<!-- Popup Form start for residential-->

<div id="show-after-get" class="residential" style="display:none;">

<div class="removing-the-stress">
  <div class="container">
   <div class="removing-stress-top">
    <h2>You're Seconds Away From <span>Removing The Stress</span> From Your Move!</h2>
    <p>... And Saving Up To 40% With Vetted, Hand Checked, Removal Companies</p>
   </div>
   <form action="../send.php?ver=mobile" method="post" name="form" id="form">
   		<input type="hidden" value="0" name="form-type">
  		<div class="removing-stress-frm step1">
            <div class="nearly"><img src="images/nearly-img.png" alt="<?php echo $hln;?>"></div>
             <h4 class="property">Step 1 : Size of my current property</h4>
             <span class="arrow-post2"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
              <div class="removing-stress-frm-con">
                <div rel="bed1" class="bed-radios-container">
                  <div class="img1bed" rel="bed1">&nbsp;</div>
                  <input type="radio" class="rad" id="bed1" value="1" name="bedrooms">
                  <label for="bed1">1<br>bed</label>
                </div>
                <div rel="bed2" class="bed-radios-container">
                  <div class="img2bed">&nbsp;</div>
                  <input type="radio" class="rad" id="bed2" value="2" name="bedrooms">
                  <label for="bed2">2<br>bed</label>
                </div>
                <div rel="bed3" class="bed-radios-container">
                  <div class="img3bed">&nbsp;</div>
                  <input type="radio" class="rad" id="bed3" value="3" name="bedrooms">
                  <label for="bed3">3<br>bed</label>
                </div>
                <div rel="bed4" class="bed-radios-container">
                  <div class="img4bed">&nbsp;</div>
                  <input type="radio" class="rad" id="bed4" value="4" name="bedrooms">
                  <label for="bed4">4<br>bed</label>
                </div>
                <div rel="bed5" class="bed-radios-container">
                  <div class="img5bed">&nbsp;</div>
                  <input type="radio" class="rad" id="bed5" value="5" name="bedrooms">
                  <label for="bed5">5<br>bed</label>
                </div>
                <div rel="bed0" class="bed-radios-container box_desc">
                  <div class="imgdesc">&nbsp;</div>
                  <input type="radio" id="bed0" value="in description" name="bedrooms">
                  <label for="bed0">Describe the<br>inventory or<br>contents of<br>your move</label>
                </div>
    
              </div>
            </div>
   
   		<div class="row">
     <div class="col-sm-8">
       <div class="removing-stress-frm step2">
         <h4>Step 2 : My move</h4>
         <span class="arrow-post2"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
          <div class="removing-stress-frm-con">
           <div class="leftpart">
            
              <div class="form-group stress-moving-from">
                <label for="exampleInputEmail1">I'm moving from:</label>
                <input type="text" class="form-control" name="postcode" placeholder="Postcode *">
                <input type="text" class="form-control" name="city" placeholder="Town / City *">
                <input type="text" class="form-control" name="address" placeholder="Street Name *">
                <input type="text" class="form-control" name="houseno" placeholder="Enter House Number...">
                
              </div>
              
              
              <div class="form-group redio-with-text">
               <h5>Property Type :</h5>
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
              
              
              <div class="form-group redio-with-text">
               <h5>Property Type :</h5>
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
            <input type="text" class="form-control" name="date" id="date1" placeholder="Date *">
           </div>
          </div>
        </div>
        
       <div class="removing-stress-frm step3">
         <h4>Step 3 : Things I would also like help with</h4>
         <span class="arrow-post2"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
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
        
       <div class="removing-stress-frm step4">
         <h4>Step 4 : My contact Information</h4>
         <span class="arrow-post2"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
          <div class="removing-stress-frm-con">
       
              <div class="form-group">
              
                <input type="text" class="form-control" name="name" placeholder="Enter Full Name...*">
                <input type="text" class="form-control" name="phone" placeholder="Enter Best Contact Number...*">
                 
                <input type="text" class="form-control" name="email" placeholder="Enter Email Address...*">
                <div class="form-group">
               <h5 class="additional">Any Additional Information? </h5>
               <span class="additional">Eg Parking issues, contents</span>
               <div class="step-4-checkbox ">
                <label>
                  <input onClick="$('#greenwood_drive').hide();" type="radio" name="any_addition_information" id="any-addition-information-n" checked value="No"> No 
                </label>&nbsp; &nbsp;
                <label>
                  <input onClick="$('#greenwood_drive').show();" type="radio" name="any_addition_information" id="any-addition-information-y" value="Yes"> Yes 
                </label>
                </div>
              </div>
               <textarea id="greenwood_drive" style="display:none" placeholder="Enter any additional information about your move ..." name="greenwood_drive"></textarea>
              </div>
       
          
          </div>
        </div>
        
        <div class="get-my"><a class="get-my-quote-second">YES! GET MY FREE QUOTES <span>100% Safe &amp; Secure Quote Delivery Process</span></a></div>
        <p class="protect-text"><span>Your information is protected by 128 bit SSL encryption</span></p>
        
        
         
     </div>
     
     <!--Right sec start -->
     
     <div class="col-sm-4">
     
     <div class="right-slider">
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

<!-- Popup Form for residential end -->


<!-- Popup Form start for business-->

<div id="show-after-get-business" class="business" style="display:none;">

<div class="removing-the-stress">
  <div class="container">
   <div class="removing-stress-top">
    <h2>You're Seconds Away From <span>Removing The Stress</span> From Your Move!</h2>
    <p>... And Saving 40% On Your Moving Costs With Vetted, Hand Checked, Commercial Removal Companies</p>
   </div>
   <form action="../send.php?ver=mobile" method="post" name="form" id="form-business">
   	<input type="hidden" name="form-type" value="2">
   	<div class="row">
     <div class="col-sm-8">
       <div class="removing-stress-frm step2">
       	<div class="nearly"><img src="images/nearly-img.png" alt="<?php echo $hln;?>"></div>
         <h4>Step 1 : My move</h4>
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
         <span class="arrow-post2"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
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
                  <input onClick="$('#greenwood_drive1').hide();$('.help').show();" type="radio" name="any_addition_information" id="any-addition-information-n" checked value="No"> No 
                </label>&nbsp; &nbsp;
                <label for="any-addition-information-y">
                  <input onClick="$('#greenwood_drive1').show();$('.help').hide();" type="radio" name="any_addition_information" id="any-addition-information-y" value="Yes"> Yes 
                </label>
                </div>
              </div>
               <textarea style="display:none;" id="greenwood_drive1" placeholder="Enter any additional information about your move.." name="greenwood_drive"></textarea>
              </div>
       
          
          </div>
        </div>
        
        <div class="get-my"><a class="get-my-quote-second-business">YES! GET MY FREE QUOTES <span>100% Safe &amp; Secure Quote Delivery Process</span></a></div>
        <p class="protect-text"><span>Your information is protected by 128 bit SSL encryption</span></p>
        
        
         
     </div>
     
     <!--Right sec start -->
     
     <div class="col-sm-4">
     
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
     
     <?php include('../inc/sidebar.php');?>  
     
     
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
   <div class="removing-stress-top">
    <h2>You're Seconds Away From <span>Removing The Stress</span> From Your Move!</h2>
    <p>... And Saving 40% On Your Moving Costs With Vetted, Hand Checked, International Removal Companies</p>
   </div>
   <form action="../send.php?ver=mobile" method="post" name="form" id="form-international">
   		<input type="hidden" name="form-type" value="1">
  		<div class="removing-stress-frm step1">
            <div class="nearly"><img src="images/nearly-img.png" alt="<?php echo $hln;?>"></div>
             <h4 class="property">Step 1 : Size of my current property</h4>
             <span class="arrow-post2"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
              <div class="removing-stress-frm-con">
                <div rel="bed1" class="bed-radios-container">
                  <div class="img1bed" rel="bed1">&nbsp;</div>
                  <input type="radio" class="rad" id="bed1" value="1" name="bedrooms">
                  <label for="bed1">1<br>bed</label>
                </div>
                <div rel="bed2" class="bed-radios-container">
                  <div class="img2bed">&nbsp;</div>
                  <input type="radio" class="rad" id="bed2" value="2" name="bedrooms">
                  <label for="bed2">2<br>bed</label>
                </div>
                <div rel="bed3" class="bed-radios-container">
                  <div class="img3bed">&nbsp;</div>
                  <input type="radio" class="rad" id="bed3" value="3" name="bedrooms">
                  <label for="bed3">3<br>bed</label>
                </div>
                <div rel="bed4" class="bed-radios-container">
                  <div class="img4bed">&nbsp;</div>
                  <input type="radio" class="rad" id="bed4" value="4" name="bedrooms">
                  <label for="bed4">4<br>bed</label>
                </div>
                <div rel="bed5" class="bed-radios-container">
                  <div class="img5bed">&nbsp;</div>
                  <input type="radio" class="rad" id="bed5" value="5" name="bedrooms">
                  <label for="bed5">5<br>bed</label>
                </div>
                <div rel="bed0" class="bed-radios-container box_desc">
                  <div class="imgdesc">&nbsp;</div>
                  <input type="radio" id="bed0" value="in description" name="bedrooms">
                  <label for="bed0">Describe the<br>inventory or<br>contents of<br>your move</label>
                </div>
    
              </div>
            </div>
   
   	    <div class="row">
     <div class="col-sm-8">
       <div class="removing-stress-frm step2">
         <h4>Step 2 : My move</h4>
         <span class="arrow-post2"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
          <div class="removing-stress-frm-con">
           <div class="leftpart">
            
              <div class="form-group stress-moving-from">
                <label for="exampleInputEmail1">I'm moving from:</label>
                <input type="text" class="form-control" name="postcode" placeholder="Postcode *">
                <input type="text" class="form-control" name="city" placeholder="Town / City *">
                <input type="text" class="form-control" name="address" placeholder="Street Name *">
                <input type="text" class="form-control" name="houseno" placeholder="Enter House Number...">
                
              </div>
              
              
              <div class="form-group redio-with-text">
               <h5>Property Type :</h5>
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
           	</div>
          
           </div>
           <div class="rightpart">
            
              <div class="form-group stress-moving-from">
                <label for="exampleInputEmail1">I'm moving to:</label>
                <div class="select-item"><select name="countryTo" id="countryTo">
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
              
              
              <div class="form-group redio-with-text">
               <h5>Property Type :</h5>
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
          	</div> 
          
          </div>
           <div class="form-group stress-moving-from">
            <label for="date3">My approximate moving date is:</label>
            <input type="text" class="form-control" name="date" id="date3" placeholder="Date *">
           </div>
          </div>
        </div>
        
       <div class="removing-stress-frm step3">
         <h4>Step 3 : Things I would also like help with</h4>
         <span class="arrow-post2"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
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
         <span class="arrow-post2"><img src="images/arrow.png" alt="<?php echo $hln;?>"></span>
          <div class="removing-stress-frm-con">
       
              <div class="form-group">
              	
                <input type="text" class="form-control" name="name" placeholder="Enter Full Name...*">
                <input type="text" class="form-control" name="phone" placeholder="Enter Best Contact Number...*">
                 
                <input type="text" class="form-control" name="email" placeholder="Enter Email Address...*">
                <div class="form-group">
               		<h5 class="additional">Any Additional Information? </h5>
               		<span class="additional">eg parking issues, contents</span>
               		<div class="step-4-checkbox ">
                		<label>
                  			<input onClick="$('#greenwood_drive2').hide();" type="radio" name="any_addition_information" id="any-addition-information-n" checked value="No"> No 
                		</label>&nbsp; &nbsp;
                		<label for="any-addition-information-y">
                  			<input onClick="$('#greenwood_drive2').show();" type="radio" name="any_addition_information" id="any-addition-information-y" value="Yes"> Yes 
                		</label>
                	</div>
              	</div>
               <textarea id="greenwood_drive2" style="display:none;" placeholder="Enter any additional information about your move ..." name="greenwood_drive"></textarea>
              </div>
       
          
          </div>
        </div>
        
        <div class="get-my"><a class="get-my-quote-second-international">YES! GET MY FREE QUOTES <span>100% Safe &amp; Secure Quote Delivery Process</span></a></div>
        <p class="protect-text"><span>Your information is protected by 128 bit SSL encryption</span></p>
        
        
         
     </div>
     
     <!--Right sec start -->
     
     <div class="col-sm-4">
     
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
     
     <?php include('../inc/sidebar.php');?>
     
   </div>
     
     <!--Right sec end -->
     
     
   </div> 
   
   </form>
   </div>
   
  </div>
  
</div>

<!-- Popup Form for international end -->


<div id="hide-after-get">

<div class="will-removal">
  <div class="container">
   <h2>How Will Removals Index<br> Take The Stess Out Of My Move?</h2>
   
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
         <p>You'll get a full list of quotes from removal firms in <?php echo $loc;?> that will all be <u>competing for you move.</u></p>
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
          <img src="images/footer-img1.png" alt="">
          <img src="images/footer-img2.png" alt="">
          <img src="images/footer-img3.png" alt="">
         </div>
         
        </div>
      </div>
 </div>     
</div>


<?php include('../inc/footer.php');?>

<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'>

<?php load_js_files('1430150127389'); ?>


<script>
$(function() {
	
	$('#date1').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy'
	});
	 
	$('#date2').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy'
	});
	$('#date3').datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: 'dd/mm/yy'
	});


	/*google analytics event tracking.*/	
	
	$("#get-my-quote-top").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Top',4);});

	$("#get-my-quote-middle").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Middle',4);});

	$("#get-my-quote-bottom").on('click', function(){ ga('send', 'event', 'Landing Page CTA Click', 'Click', 'Click through to form Bottom',4); });
	

	/* virtual page view implementation.
	$("#get-my-quote-top").on('click', function(){
		ga('send', { 'hitType': 'pageview', 'page': '/contact-us/submitted/', 'title': 'Contact Us Submitted' });
	});
	*/
});

</script>

<script async type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js"></script>
<script type="text/javascript">
(function(a,e,c,f,g,b,d){var h={ak:"999191207",cl:"8UxmCKOV4FkQp-W53AM"};a[c]=a[c]||function(){(a[c].q=a[c].q||[]).push(arguments)};a[f]||(a[f]=h.ak);b=e.createElement(g);b.async=1;b.src="//www.gstatic.com/wcm/loader.js";d=e.getElementsByTagName(g)[0];d.parentNode.insertBefore(b,d);a._googWcmGet=function(b,d,e){a[c](2,b,h,d,null,new Date,e)}})(window,document,"_googWcmImpl","_googWcmAk","script");
</script>
	
<?php include('../inc/footer-code.php');?>

</body>
</html>