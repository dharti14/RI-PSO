<?php 

add_action('genesis_before_header', 'lp2_before_header');

function lp2_before_header(){
?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no" />

  <link rel="icon" href="favicon.png">

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<body <?php body_class();?>>

  <header class="main">
 <?php 
  }

add_action('genesis_header', 'lp2_header');
function lp2_header(){
	?>
  
    <section id="logo_call">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <a id="logo" href="<?php bloginfo('url');?>" title="<?php bloginfo( 'name' );?>">
              <img width="180" src="<?php echo THEME_PATH_URI;?>/lp2/lib/assets/images/removals-index_logo.svg" alt="<?php bloginfo( 'name' );?>"/>
            </a>
          </div>
          <div class="col-sm-4">
          	<div class="trustpilot-logos">
          		<img src="<?php echo THEME_PATH_URI;?>/lp2/lib/assets/images/Trustpilot.svg" alt="<?php bloginfo( 'name' );?>"/>
          	</div>
          </div>
          <div class="col-sm-4 call">
            <span class="glyphicon glyphicon-earphone"></span>
            Call <strong>FREE</strong> 24/7 on: <span class="green">0333 444 8710</span>
          </div>
        </div>
      </div>
    </section>
    <!-- /#logo_call -->
    </header>
<?php 
  }
 ?>