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

	<body <?php body_class();?>>

  <header class="main">
 <?php 
  }

add_action('genesis_header', 'main_header');
function main_header(){
	?>
  
    <section id="logo_call">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <a id="logo" href="<?php bloginfo('url');?>" title="<?php bloginfo( 'name' );?>">
              <img width="180" src="<?php echo TDU;?>/lib/site/assets/images/removals-index_logo.svg" alt="<?php bloginfo( 'name' );?>"/>
            </a>
          </div>
          <div class="col-sm-9 call">
            <span class="glyphicon glyphicon-earphone"></span>
            Call <strong>FREE</strong> 24/7 on: <span class="green">0333 444 8710</span>
          </div>
        </div>
      </div>
    </section>
    <!-- /#logo_call -->
<?php 
  }
  add_action('genesis_after_header', 'after_header');

  function after_header(){
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

  </header>
  <?php 
  } ?>