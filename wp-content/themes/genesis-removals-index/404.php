<?php

//* Remove default loop
remove_action( 'genesis_loop', 'loop_for_internal_page_content' );

add_action( 'genesis_loop', 'genesis_404' );

function genesis_404() {

	echo genesis_html5() ? '<article id="main_article">' : '<div class="post hentry">';

		echo '<div class="container">';
		
		printf( '<h1 class="entry-title">%s</h1>', __( 'Not found, error 404', 'genesis' ) );
		echo '<div class="entry-content">';

			if ( genesis_html5() ) :

				echo '<p>' . sprintf( __( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it by using the search form below.', 'genesis' ), home_url() ) . '</p>';

				echo '<p>' . get_search_form() . '</p>';

			else :
		?>

			<p><?php printf( __( 'The page you are looking for no longer exists. Perhaps you can return back to the site\'s <a href="%s">homepage</a> and see if you can find what you are looking for. Or, you can try finding it with the information below.', 'genesis' ), home_url() ); ?></p>

<?php
			endif;

			echo '</div></div>';

		echo genesis_html5() ? '</article>' : '</div>';

}

genesis();
