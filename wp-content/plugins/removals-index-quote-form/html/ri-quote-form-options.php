<?php if($message != "") : ?>
	<div id="message">
		<p>
			<?php echo $message; ?>
		</p>
	</div>
<?php endif; ?>

<div>
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

			</tbody>
		</table>
		<p class="submit">
			<input type="submit" value="Save Changes" class="button button-primary" id="save_ri_quoteForm_settings" name="save_ri_quoteForm_settings">
		</p>
	</form>
</div>