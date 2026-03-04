<?php
/**
 * Block Name: Call to Action (CTA)
 *
 * The template for displaying the custom gutenberg block named Call to Action (CTA).
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package Base Theme Package
 * @since 1.0.0
 */

BaseTheme::block(
	$block,
	function ( $bst_block_id, $bst_block_name, $bst_block_fields, $bst_option_fields ) {

		// Block variables.
		$bst_var_blk_cta_title        = $bst_block_fields['bst_var_blk_cta_title'] ?? null;
		$bst_var_blk_cta_text        = $bst_block_fields['bst_var_blk_cta_text'] ?? null;
		$bst_var_blk_cta_button        = $bst_block_fields['bst_var_blk_cta_button'] ?? null;
		?>
		<section>
			<div class="wrapper">
				<div class="cta-section" id="<?php echo esc_attr( $bst_block_id ); ?>">
					<div class="cta-content">
						<?php if ( $bst_var_blk_cta_title ) { ?>
							<h2 class="section-title">
								<?php echo html_entity_decode( $bst_var_blk_cta_title); ?>
							</h2>
						<?php } ?>
						<?php if ( $bst_var_blk_cta_text ) {  ?>
							<?php echo html_entity_decode( $bst_var_blk_cta_text ); ?>
						<?php } ?>
						<?php if ( $bst_var_blk_cta_button ) { ?>
							<div class="cta-button">
								<?php echo BaseTheme::button( $bst_var_blk_cta_button, 'button small-btn' ); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
);

