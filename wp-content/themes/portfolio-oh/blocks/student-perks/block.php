<?php
/**
 * Block Name: Student Perks
 *
 * The template for displaying the custom gutenberg block named Student Perks.
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
		$bst_var_blk_sperk_title        = $bst_block_fields['bst_var_blk_sperk_title'] ?? null;
		$bst_var_blk_sperk_text        = $bst_block_fields['bst_var_blk_sperk_text'] ?? null;
		$bst_var_blk_sperk_perks        = $bst_block_fields['bst_var_blk_sperk_perks'] ?? null;
		?>
		<section>
			<div class="wrapper">
				<div class="student-perks-section" id="<?php echo esc_attr( $bst_block_id ); ?>">
					<div class="section-head">
						<?php if ( $bst_var_blk_sperk_title ) { ?>
							<h2 class="section-title">
								<?php echo html_entity_decode( $bst_var_blk_sperk_title); ?>
							</h2>
						<?php } ?>
						<?php if ( $bst_var_blk_sperk_text ) {  ?>
							<?php echo html_entity_decode( $bst_var_blk_sperk_text ); ?>
						<?php } ?>
					</div>
					<div class="perks-list">
						<?php
						if ( $bst_var_blk_sperk_perks ) {
							foreach ( $bst_var_blk_sperk_perks as $perk ) {
								$perk_title = $perk['perk_title'] ?? null;
								$perk_description = $perk['perk_description'] ?? null;
								$button = $perk['button'] ?? null;
								$image = $perk['image'] ?? null;
								?>
								<div class="perk-item">

									<div class="perk-content">
										<?php if ( $perk_title ) { ?>
											<h3 class="perk-title">
												<?php echo html_entity_decode( $perk_title ); ?>
											</h3>
										<?php } ?>
										<?php if ( $perk_description ) { ?>
											<?php echo html_entity_decode( $perk_description ); ?>
										<?php } ?>
										<?php if ( $button ) { ?>
											<?php echo BaseTheme::button( $button, 'button small-btn' ); ?>
										<?php } ?>
									</div>
									<?php if ( $image ) { ?>
										<div class="perk-image">
											<?php BaseTheme::the_attachment_image( $image, 1000 ); ?>
										</div>
									<?php } ?>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</section>

		<?php
	}
);

