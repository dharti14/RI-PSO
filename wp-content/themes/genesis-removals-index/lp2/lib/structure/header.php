<?php 

add_action('genesis_before_header', 'before_header');

function before_header(){
?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no" />

  <link rel="icon" href="favicon.png">

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	

  <header class="header">
 <?php 
  }

add_action('genesis_header', 'main_header');
function main_header(){
	?>
  
      <div class="container">
        <div class="row">
        
        <div class="col-sm-6">
		     <div class="logo">
		     	<a href="<?php bloginfo('url');?>" title="<?php bloginfo( 'name' );?>">
		     		<img src="<?php echo TDU;?>/lp2/lib/assets/images/logo.svg">
		     	</a>
		     </div>
		     
		     <div class="mobile-logo">
			     <a href="<?php bloginfo('url');?>" title="<?php bloginfo( 'name' );?>">
			     	<img src="<?php echo TDU;?>/lp2/lib/assets/images/logo.svg">
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
