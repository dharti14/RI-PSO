<?php 

remove_theme_support( 'genesis-responsive-viewport' );

add_action( 'genesis_meta', 'viewport_meta_tag' );

function viewport_meta_tag() {
	
	echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>'; ?>
	
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no" />

  <link rel="icon" href="favicon.png">
	  
	  
	<!--  DKI Scripts in meta tags -->
	<?php 
	// Scripts and code  required for dki scripts
	require(THEME_PATH_DIR.'/lp1/lib/inc/common.php');
	
	require(THEME_PATH_DIR.'/lp1/lib/inc/DKIScripts.php');
	
	// Dki scripts over
	?>
	  
	<meta name="description" content="<?php 
	if($hln == 'Trusted Local Removal Companies'){
		echo 'Get up to 6 quotes from trusted removal companies in your area';
	}else{
		echo $hln.'. Get up to 6 quotes from trusted removal companies in your area';
	}
	?>">
	
	<meta name="keywords" content="<?php
	echo $meta_keywords_string .'removal companies,removals,house removal companies,removal firms,removal quotes,compare removals';
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
	
	<?php 
	
		//experiment code need to be added on DKI version since it is the control page
		//we are using this page for NON DKI version too, since the experiment code
		//should not appear when the page is NON DKI
	
		$gexp = (isset($_GET['gexp']))?$_GET['gexp']:0;
		
		if($gexp == 0): //control page	(index.php)	
	
	    elseif($gexp == 5):
		
		endif; ?>
	<!--   DKI Scripts over -->
	  
  
  
  <?php 
}

add_action('genesis_header', 'lp1_header');

function lp1_header(){
	
?>

  <header class="header">

      <div class="container">
        <div class="row">
        
        <div class="col-sm-6">
		     <div class="logo">
		     	<a href="<?php bloginfo('url');?>" title="<?php bloginfo( 'name' );?>">
		     		<img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/logo.svg">
		     	</a>
		     </div>
		     
		     <div class="mobile-logo">
			     <a href="<?php bloginfo('url');?>" title="<?php bloginfo( 'name' );?>">
			     	<img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/logo.svg">
			     </a>
		     </div>
	    </div>
	    	<div class="col-sm-6">
	     	<div class="contact-num">Call <strong>FREE</strong> 24/7 on: <span class="number">0333 444 8710</span></div>
	    </div>
	    
        </div>
      </div>
    </header>
<?php 
  }
 ?>
