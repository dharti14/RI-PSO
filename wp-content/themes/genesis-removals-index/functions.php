<?php
/** Start the engine */
require_once( TEMPLATEPATH . '/lib/init.php' );

//* We tell the name of our child theme
define( 'Child_Theme_Name', __( 'Genesis Child', 'genesis-removals-index' ) );
//* We tell the web address of our child theme (More info & demo)
define( 'Child_Theme_Url', 'http://my.studiopress.com/themes/genesis/' );
//* We tell the version of our child theme
define( 'Child_Theme_Version', '2.1.2' );

// DEFINE CHILD THEME DIRS
define('THEME_PATH_DIR', get_stylesheet_directory()); 
define('THEME_PATH_URI', get_stylesheet_directory_uri()); 


//* Add HTML5 markup structure from Genesis
add_theme_support( 'html5' );

//* Add HTML5 responsive recognition
add_theme_support( 'genesis-responsive-viewport' );


// remove default genesis action.....................................

remove_action( 'genesis_meta', 'genesis_load_stylesheet' );

//remove_action( 'genesis_title', 'genesis_do_title' );

remove_action('genesis_header', 'genesis_header_markup_open', 5);
remove_action('genesis_header', 'genesis_do_header');
remove_action('genesis_header', 'genesis_header_markup_close', 15);

//remove_action( 'after_setup_theme', 'genesis_register_nav_menus' );

remove_action('genesis_loop', 'genesis_do_loop');
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );

remove_action('genesis_footer', 'genesis_footer_markup_open',5);
remove_action('genesis_footer', 'genesis_do_footer');
remove_action('genesis_footer', 'genesis_footer_markup_close',15);

// remove default genesis action.....................................



// ******************Creating Custom Meta Box for Page Settings********************************** //


//Creating Meta Box For Differentiating between DKI and NonDKI Scripts, also used for detecting conversion page and its scripts
function create_metabox_for_page_settings() {

	add_meta_box( 'page_settings_meta_box', 'Page Settings', 'create_html_for_page_settings_metabox', 'page', 'normal', 'high' );
}

add_action( 'add_meta_boxes', 'create_metabox_for_page_settings' );


//Creating HTML Structure for Page Setings Meta Box 
function create_html_for_page_settings_metabox() {
	        
    //wp_nonce_field( $action, $name, $referer, $echo ) 
    //All are optional parameters
    //Action name==>give the context to what is taking place
    //Nonce name==>access nonce via  $_POST[$name].
    
	// We'll use this nonce field later on when saving.
	wp_nonce_field( 'creating_nonce_for_custom_page_settings', 'custom_page_settings_nonce' );
	   
	?>

	<table>
	<tr>
		<td>
			<label for="is_page_dki">Enable DKI</label>
		</td>
		<td>
			<select name="page_settings[_is_page_dki]" id="_is_page_dki">
            
            <option value="no" <?php selected ( genesis_get_custom_field( '_is_page_dki' ), 'no' ); ?>>No</option>
            <option value="yes" <?php selected ( genesis_get_custom_field( '_is_page_dki' ), 'yes' ); ?>>Yes</option>
            
        	</select>
        </td>
	</tr>
	
	<tr>
		<td>
			<label for="is_conversion_page">Is Conversion Page ?</label>
		</td>
		<td>
			<select name="page_settings[_is_conversion_page]" id="_is_conversion_page">
            
            <option value="no" <?php selected ( genesis_get_custom_field( '_is_conversion_page' ), 'no' ); ?>>No</option>
            <option value="yes" <?php selected ( genesis_get_custom_field( '_is_conversion_page' ), 'yes' ); ?>>Yes</option>
            
        </select>
        </td>
	</tr>
	    
    <tr>
	    <td>
	    	<label for="tracking_code">Conversion Code</label>
	    </td>
	    <td>   	
	    	<textarea placeholder="Please provide conversion code here" name="page_settings[_tracking_code]" id="_tracking_code" rows="5" cols="60"><?php echo esc_textarea( genesis_get_custom_field( '_tracking_code' ) );  ?></textarea>
	    </td>
    </tr>
    
    </table>
    <?php   
}


//Saving the value of fields of page settings meta box
add_action( 'save_post', 'save_custom_page_settings_value' );
function save_custom_page_settings_value() {
	
	if ( ! isset( $_POST['page_settings'] ) )
		return;
	
	$field_names = wp_parse_args( $_POST['page_settings'], array(
			
			'_is_page_dki'          => '',
			'_is_conversion_page'   => '',
			'_tracking_code'        => '',
			
	) );
	

	//Please see genesis/lib/functions/options.php for more info. about genesis_save_custom_fields
	genesis_save_custom_fields( $field_names, 'creating_nonce_for_custom_page_settings', 'custom_page_settings_nonce', $post );
	
	 
}

// ******************Creating Custom Meta Box for Page Settings********************************** //




// Setting Site header and footer for all pages
require(THEME_PATH_DIR.'/lib/site/common.php');
require(THEME_PATH_DIR.'/lib/site/header.php');
require(THEME_PATH_DIR.'/lib/site/footer.php');
// Setting Site header and footer for all pages



//Including file for dki and non-dki scripts
require(THEME_PATH_DIR.'/lib/site/inc/DKIScripts.php');
//Including file for dki and non-dki scripts


//Checking for page is conversion? If yes then get the conversion(tracking) scripts
function get_conversion_page_scripts() {

	$is_conversion_page = genesis_get_custom_field('_is_conversion_page');
	
	$conversion_scripts='';
	
	if($is_conversion_page == 'yes'){
		$conversion_scripts = genesis_get_custom_field('_tracking_code');
	}
	
	return $conversion_scripts;
}


//Adding action (genesis_loop) to get the contents of the page (ex. Terms and Conditions, Private Policy, etc.)
add_action('genesis_loop','loop_for_internal_page_content');

//Looping through the content for the site pages (Internal Pages)

function loop_for_internal_page_content() {
	?>

<article id="main_article">
	<div class="container">
		<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post();?>
				<h1 class="title"><?php the_title();?></h1>
				<?php the_content();?>
			<?php endwhile;?>
		<?php endif;?>
		
	</div>
</article>
<!-- /#main_article -->	

<?php
}

//Looping through the content for the site pages (Internal Pages)

// ADD DEFER/ASYNC TAG TO LOADED SCRIPTS

add_filter('script_loader_tag', 'add_async_attribute', 10, 2);
function add_async_attribute($tag, $handle) {
    if ( 'font_opensans' !== $handle && 'bootstrapjs' !== $handle && 'trustpilot' !== $handle)
        return $tag;
    return str_replace( ' src', ' async="async" src', $tag );
}

//Register nav menus by wordpress way
/*
register_nav_menus( array(
	'primary' => __( 'Primary Navigation', 'genesis' ),
	'ppc_footer' => __( 'PPC Footer Navigation', 'genesis' ),
	'secondary' => __('Secondary Navigation', 'genesis')
) );
*/

//If you don't want genesis menus then remove it
//remove_theme_support ( 'genesis-menus' );

//Registering nav menus by Genesis framework way
add_theme_support ( 'genesis-menus' , array (
		'primary' => __( 'Primary Navigation', 'genesis' ),
		'secondary' => __( 'Secondary Navigation', 'genesis' ),
		'footer' => __( 'Footer Navigation', 'genesis' )
) );

/**
 * Class Name: wp_bootstrap_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
class wp_bootstrap_navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			if ( $args->has_children )
				$class_names .= ' dropdown';
			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names .'>';
			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '#';
				$atts['data-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				$atts['aria-haspopup']	= 'true';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $args->before;
			/*
			 * Glyphicons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the glyphicon.
			 */
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';
				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';
			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ( $container )
				$fb_output .= '</' . $container . '>';
			echo $fb_output;
		}
	}
	
}



?>