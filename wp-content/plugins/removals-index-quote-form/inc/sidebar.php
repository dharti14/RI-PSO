<?php 

//DKI Scripts starts for sidebar.php file

$nodki = false;
if(isset($_GET['nodki']) && $_GET['nodki'] == 'true') $nodki = true;

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

//DKI Scripts over for sidebar.php file 
?>
<h4 class="right-information-heading">YOUR INFORMATION IS SAFE</h4>
     <div class="right-satisfaction">
      <p>We will not sell your personal contact information for any marketing purposes whatsoever.</p>
     </div>
     
     <h4 class="right-help-heading">NEED HELP?</h4>
     <div class="right-satisfaction">
    
     <p>Call Us @ <span class="number">0333 444 8710</span> 24 hours a day 7 days a week</p>
<p class="right-email">Email Us Anytime:<br>
<a href="mailto:info@removals-index.com">info@removals-index.com</a></p>

<p class="right-email"><i>All calls to '03' numbers are included in free mobile minutes or charged at local rate from a landline
</i></p>
    
     
     </div>
     
     
     <div class="right-logo">
     	<img src="<?php echo TDU;?>/lp1/lib/assets/images/footer-img1.png" alt="<?php echo $hln;?>"></a>
      	<img src="<?php echo TDU;?>/lp1/lib/assets/images/privecy-img.png" alt="<?php echo $hln;?>"></a>
     </div>