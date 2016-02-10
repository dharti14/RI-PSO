<?php 

remove_theme_support( 'genesis-responsive-viewport' );

add_action( 'genesis_meta', 'viewport_meta_tag' );

function viewport_meta_tag() {
	
	echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>'; ?>
	
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no" />

  <link rel="icon" href="favicon.png">
<?php 	  
}
  
 add_action( 'genesis_meta', 'dki_scripts_meta_tag' );
 
 function dki_scripts_meta_tag() {

		//For HLN Parameter
		$dki_hln = dki_get_hln();
		
		//For Meta Keywords
		$dki_meta_keywords_string = dki_get_metakeywords();
	?>
	
	<!--  DKI Scripts in meta tags -->  
	
	<meta name="description" content="<?php 
	if($dki_hln == 'Trusted Local Removal Companies'){
		echo 'Get up to 6 quotes from trusted removal companies in your area';
	}else{
		echo $dki_hln.'. Get up to 6 quotes from trusted removal companies in your area';
	}
	?>">
	
	<meta name="keywords" content="<?php
	echo $dki_meta_keywords_string .'removal companies,removals,house removal companies,removal firms,removal quotes,compare removals';
	?>">
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.min.js"></script>
	  <script src="js/respond.min.js"></script>
	<![endif]-->
	
	<!--   DKI Scripts over -->
	  
  
  
  <?php 
}

add_filter( 'wp_title', 'set_custom_page_title', 150, 1 );

function set_custom_page_title($title){

	//For HLN Parameter
	$dki_hln = dki_get_hln();

	if($dki_hln == 'Trusted Local Removal Companies'){
		return $title;
	}else{
		return $dki_hln.' | '.$title;
	}

}

add_action('genesis_header', 'lp1_header');

function lp1_header(){
	
	$dki_hln = dki_get_hln();
?>

  <header class="header">

      <div class="container">
        <div class="row">
        
        <div class="col-sm-6">
		     <div class="logo">
		     	<a href="<?php bloginfo('url');?>" title="<?php bloginfo( 'name' );?>">
		     		<img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/logo.svg" alt="<?php echo $dki_hln;?>">
		     	</a>
		     </div>
		     
		     <div class="mobile-logo">
			     <a href="<?php bloginfo('url');?>" title="<?php bloginfo( 'name' );?>">
			     	<img src="<?php echo THEME_PATH_URI;?>/lp1/lib/assets/images/logo.svg" alt="<?php echo $dki_hln;?>">
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
