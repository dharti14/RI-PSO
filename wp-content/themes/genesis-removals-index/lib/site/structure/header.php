<?php 

add_action('genesis_before_header', 'site_before_header');

function site_before_header(){
?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="format-detection" content="telephone=no" />

  <link rel="icon" href="<?php echo THEME_PATH_URI; ?>/images/favicon.png" type="image/x-icon" />

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

 <header class="main">
 <?php 
  }
  
  
add_action('genesis_header', 'site_header');
function site_header(){
	?>
  
    <section id="logo_call">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <a id="logo" href="<?php bloginfo('url');?>" title="<?php bloginfo( 'name' );?>">
              <img width="180" src="<?php echo THEME_PATH_URI;?>/lib/site/assets/images/removals-index_logo.svg" alt="<?php bloginfo( 'name' );?>"/>
            </a>
          </div>
          <div class="col-sm-4">
          	<div class="trustpilot-logos">
          		<img src="<?php echo THEME_PATH_URI;?>/lib/site/assets/images/Trustpilot.svg" alt="<?php bloginfo( 'name' );?>"/>
          	</div>
          </div>
          <div class="col-sm-4 call">
            <span class="glyphicon glyphicon-earphone"></span>
            Call <strong>FREE</strong> 24/7 on: <span class="green"><a href="tel:<?php echo trim(ri_display_phone_number());?>"><?php echo ri_display_phone_number();?></a></span>
          </div>
        </div>
      </div>
    </section>
    <!-- /#logo_call -->
<?php 
  }
  add_action('genesis_after_header', 'site_after_header');

  function site_after_header(){
  	
  	$menu_to_count = wp_nav_menu(array(
  			'echo' => false,
  			'theme_location' => 'primary'
  	));
  	
  	//Checking for the menu items if there is no menu items in menu then hide the navigation menu
  	$menu_items = substr_count($menu_to_count,'class="menu-item');
  	
  	if($menu_items>0){  
  		
  	?>
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
            $defaults = array(
              'theme_location'  => 'primary',
              'menu'            => '',
              'container'       => false,
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'menu',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => false,
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul id="%1$s" class="nav navbar-nav">%3$s</ul>',
              'depth'           => 0,
              'walker'          => new wp_bootstrap_navwalker()
            );

            wp_nav_menu( $defaults );
            
            ?>
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
<?php 
  	} // if ($menu_items > 0) ends
?>
  </header>
  <?php 
  } ?>