<?php 

add_action( 'genesis_meta', 'silo_pages_meta_tag' );

function silo_pages_meta_tag(){?>
	
	<meta name="geo.region" content="GB" />
	<meta name="geo.placename" content="London" />
	<meta name="geo.position" content="51.520783;-0.158611" />
	<meta name="ICBM" content="51.520783, -0.158611" />
	
	
<?php }

add_action('genesis_before_header', 'silo_before_header');

function silo_before_header(){
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
  
  
add_action('genesis_header', 'silo_header');
function silo_header(){
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
            Call <strong>FREE</strong> on: <span class="green"><a href="tel:<?php echo trim(ri_display_phone_number());?>"><?php echo ri_display_phone_number();?></a></span>
          </div>
        </div>
      </div>
    </section>
    <!-- /#logo_call -->
<?php 
   }
  add_action('genesis_after_header', 'silo_after_header');

  function silo_after_header(){
  	
  	$menu_to_count = wp_nav_menu(array(
  			'echo' => false,
  			'theme_location' => 'silo'
  	));
  	
  	//Checking for the menu items if there is no menu items in menu then hide the navigation menu
  	$menu_items = substr_count($menu_to_count,'class="menu-item');
  	
  	if($menu_items>0){  
  		
  	?>
    <nav class="navbar navbar-default" id="primary">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header desktop">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#silo_nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="silo_nav">
            <?php
            $defaults = array(
              'theme_location'  => 'silo',
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
              'walker'          => ''
            );

            wp_nav_menu( $defaults );
            
            ?>
          
        </div><!-- /.navbar-collapse -->
        
        
                <div id="mobile-menu" class="mobile-header">
						<div class="row mobile-menu-wrapper">
							<div class="mobile-menu">
								<nav class="navbar navbar-default">
									<div class="container">
										<div class="navbar-header">
											<button type="button" class="navbar-toggle collapsed" id="navbar-toggle-btn">
												  <span class="sr-only">Toggle navigation</span>
									            <span class="icon-bar"></span>
									            <span class="icon-bar"></span>
									            <span class="icon-bar"></span>
											</button> 
										</div>
									</div>
								</nav>
								<div class="mobile-menu-container" id="mobile-header-navbar-collapse">
									<div class="mobile-header-menu-close" id="mobile-header-menu-close-btn">
										<span aria-hidden="true">x</span>
									</div>
									<div id="navbar">
									<?php
									$defaults = array(
									'theme_location'  => 'silo',
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
									'items_wrap'      => '<ul id="silo_nav" class="nav navbar-nav mobile-header-menu">%3$s</ul>',
									'depth'           => 0,
									'walker'          => ''
									);				
									wp_nav_menu( $defaults ); ?>
									<hr class="menu-bottom mobile-menu-bottom visible-xs">
									</div>
								</div>
							</div>
						</div>
					</div>
        
        
      </div><!-- /.container-fluid -->
    </nav>
    
<?php 
  	} // if ($menu_items > 0) ends
?>
  </header>
  <?php 
  } ?>