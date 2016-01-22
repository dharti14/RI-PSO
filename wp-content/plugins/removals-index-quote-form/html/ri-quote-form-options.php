<?php if($message != "") : ?>
	<div id="message" class="updated">
		<p>
			<?php echo $message; ?>
		</p>
	</div>
<?php endif; ?>

<div class="wrap">
	<h2>
		<?php echo esc_html( 'Removals Index Quote Form Settings' ); ?>
	</h2>
	
	<form id="ri_quoteForm_settings" class="validate" name="ri_quoteForm_settings" method="post" action="">
		<table class="form-table">	
			<tbody>
				<tr class="form-required">
					<th scope="row">
						<label for="delay">API Url</label>
					</th>
					<td>
						<input type="text" aria-required="true" value="<?php echo $options['apiUrl'] ?>" id="apiUrl" name="apiUrl" class="regular-text">
					</td>
				</tr>
				
				<?php /* 
				<tr class="form-required">
					<th scope="row">
						<label for="delay">API Key</label>
					</th>
					<td>
						<input type="text" aria-required="true" value="<?php echo $options['apiKey'] ?>" id="apiKey" name="apiKey" class="regular-text">
					</td>
				</tr>
<!-- 				<tr class="form-required"> -->
<!-- 					<th scope="row"> -->
<!-- 						<label for="delay">Select Success Page</label> -->
<!-- 					</th> -->
<!-- 					<td> -->
<!-- 						<select name="successPage" id="successPage"> -->
<!-- 							<option value=""> Select Page </option> -->
							<?php 
// 								$pages = get_pages( );
								
// 								foreach ( $pages as $page ) {
// 									if( $page->ID == $options['successPage'] )
// 										echo '<option selected="selected" value="' . $page->ID . '">'.$page->post_title.'</option>';
// 									else
// 										echo '<option value="' . $page->ID . '">'.$page->post_title.'</option>';
// 								}
// 							?>
<!-- 						</select> -->
<!-- 						<p class="description"> -->
<!-- 							Select page which displayed if "Removals Index Quote Form" submit successfully. -->
<!-- 						</p> -->
<!-- 					</td> -->
<!-- 				</tr> -->
				*/
				?>
			</tbody>
		</table>
		<p class="submit">
			<input type="submit" value="Save Changes" class="button button-primary" id="save_ri_quoteForm_settings" name="save_ri_quoteForm_settings">
		</p>
	</form>
</div>