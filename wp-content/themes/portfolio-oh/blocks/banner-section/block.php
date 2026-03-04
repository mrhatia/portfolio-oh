<?php
/**
 * Block Name: Banner Section
 *
 * The template for displaying the custom gutenberg block named Banner Section.
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
		$bst_var_blk_bans_title        = $bst_block_fields['bst_var_blk_bans_title'] ?? null;
		$bst_var_blk_bans_text        = $bst_block_fields['bst_var_blk_bans_text'] ?? null;
		$bst_var_blk_bans_button        = $bst_block_fields['bst_var_blk_bans_button'] ?? null;
		$bst_var_blk_bans_image        = $bst_block_fields['bst_var_blk_bans_image'] ?? null;
		?>
		<section>
			<div class="wrapper">
				<div class="iat-section two-columns justify-content-between align-items-center" id="<?php echo esc_attr( $bst_block_id ); ?>">

					<div class="iat-text column">
						<?php if ( $bst_var_blk_bans_title ) { ?>
							<h1>
								<?php echo html_entity_decode( $bst_var_blk_bans_title); ?>
							</h1>
						<?php } else { ?>
							<h1>
								<?php echo get_the_title(); ?>
							</h1>
						<?php } ?>
						<?php if ( $bst_var_blk_bans_text ) {  ?>
							<?php echo html_entity_decode( $bst_var_blk_bans_text ); ?>
						<?php } ?>
						<?php if ( $bst_var_blk_bans_button ) { ?>
							<?php echo BaseTheme::button( $bst_var_blk_bans_button, 'button' ); ?>
						<?php } ?>
					</div>
					<div class="iat-image column" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
						<?php if ( $bst_var_blk_bans_image ) { ?>
							<?php BaseTheme::the_attachment_image( $bst_var_blk_bans_image, 1000 ); ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
);

