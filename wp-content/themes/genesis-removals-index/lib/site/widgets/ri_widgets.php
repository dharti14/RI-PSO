<?php

//* Add support for 3-column footer widgets
add_theme_support('genesis-footer-widgets', 3);

//* Add support for after entry widget
add_theme_support('genesis-after-entry-widget-area');

//* Relocate after entry widget
remove_action('genesis_after_entry', 'genesis_after_entry_widget_area');
add_action('genesis_after_entry', 'genesis_after_entry_widget_area', 5);

/* Sidebar widgets */

/* add custom widgets */

class widget_trustpilot extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'widget_trustpilot', 

		// Widget name will appear in UI
		__('RI - Trustpilot', 'widget_trustpilot_domain'), 

		// Widget description
		array( 'description' => __( 'Outputs Trust Pilot Widget', 'widget_trustpilot_domain' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		
		// This is where you run the code and display the output
		?>
		<div id="widget_trustpilot" class="widget">
			<div class="tbl">
				<div class="vert">
					<img src="<?php echo THEME_PATH_URI;?>/lib/site/assets/images/Trustpilot.png" width="170"/>
				</div>
			</div>
        </div>
		<?php
	}
		
	// Widget Backend 
	public function form( $instance ) {
		
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		
	}
} 

class widget_savings extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'widget_savings', 

		// Widget name will appear in UI
		__('RI - Average Savings', 'widget_savings_domain'), 

		// Widget description
		array( 'description' => __( 'Outputs Average Savings Widget', 'widget_savings_domain' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		
		// This is where you run the code and display the output
		?>
		<div id="widget_savings" class="widget">
			<h3>Average Customer Savings</h3>
			<p class="price">£287* <span>per instruction</span></p>
			<p><strong>*Over 21,000 quotes generated</strong> every month.  Average savings based on full house removals over the last 12 months.</p>
        </div>
		<?php
	}
		
	// Widget Backend 
	public function form( $instance ) {
		
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		
	}
}

class widget_guarantee extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'widget_guarantee', 

		// Widget name will appear in UI
		__('RI - Our Guarantee', 'widget_guarantee_domain'), 

		// Widget description
		array( 'description' => __( 'Outputs Our Guarantee Widget', 'widget_guarantee_domain' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		
		// This is where you run the code and display the output
		?>
		<div id="widget_guarantee" class="widget">
			<h3>With Removals Index <br> you'll be getting access to:</h3>
			<ul>
				<li><i class="check"></i>A saving of up to 40% on your moving costs</li>
				<li><i class="check"></i>Top local removal companies all competing for your move</li>
				<li><i class="check"></i>Bespoke comparison of local firms without the hassle of calling multiple companies</li>
			</ul>
        </div>
		<?php
	}
		
	// Widget Backend 
	public function form( $instance ) {
		
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		
	}
} 

class widget_comodo extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'widget_comodo', 

		// Widget name will appear in UI
		__('RI - Comodo Widget', 'widget_comodo_domain'), 

		// Widget description
		array( 'description' => __( 'Outputs Comodo Widget', 'widget_comodo_domain' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		
		// This is where you run the code and display the output
		?>
		<div id="widget_comodo" class="widget">
			<h3>We keep your information safe</h3>
			<p class="img"><img src="<?php echo THEME_PATH_URI;?>/lib/site/assets/images/comdo_ssl_cert.png" alt="Comodo"/></p>
        </div>
		<?php
	}
		
	// Widget Backend 
	public function form( $instance ) {
		
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		
	}
} 

// Register and load the widget
function wpb_load_widget() {

	register_widget( 'widget_trustpilot' );
	register_widget( 'widget_savings' );
	register_widget( 'widget_guarantee' );
	register_widget( 'widget_comodo' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

