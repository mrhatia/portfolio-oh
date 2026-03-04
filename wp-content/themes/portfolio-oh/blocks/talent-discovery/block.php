<?php
/**
 * Block Name: Talent Discovery
 *
 * The template for displaying the custom gutenberg block named Talent Discovery.
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
		$bst_var_blk_tdis_title        = $bst_block_fields['bst_var_blk_tdis_title'] ?? null;
		$bst_var_blk_tdis_text        = $bst_block_fields['bst_var_blk_tdis_text'] ?? null;
		$bst_var_blk_tdis_button        = $bst_block_fields['bst_var_blk_tdis_button'] ?? null;
		$bst_var_blk_tdis_sub_title        = $bst_block_fields['bst_var_blk_tdis_sub_title'] ?? null;
		$bst_var_blk_tdis_sub_title        = $bst_block_fields['bst_var_blk_tdis_sub_title'] ?? null;
		$bst_var_blk_tdis_process        = $bst_block_fields['bst_var_blk_tdis_process'] ?? null;
		?>
		<section>
			<div class="wrapper">
				<div class="talent-discovery-section" id="<?php echo esc_attr( $bst_block_id ); ?>">
					<div class="section-head">
						<?php if ( $bst_var_blk_tdis_title ) { ?>
							<h2 class="section-title">
								<?php echo html_entity_decode( $bst_var_blk_tdis_title); ?>
							</h2>
						<?php } ?>
						<?php if ( $bst_var_blk_tdis_text ) {  ?>
							<?php echo html_entity_decode( $bst_var_blk_tdis_text ); ?>
						<?php } ?>
						<?php if ( $bst_var_blk_tdis_button ) { ?>
							<?php echo BaseTheme::button( $bst_var_blk_tdis_button, 'button small-btn' ); ?>
						<?php } ?>
						<div class="gl-s48"></div>
						<!-- Subtitle -->
						<?php if ( $bst_var_blk_tdis_sub_title ) { ?>
							<h3 class="sub-title">
								<?php echo html_entity_decode( $bst_var_blk_tdis_sub_title); ?>
							</h3>
						<?php } ?>
					</div>
					<div class="process-list">
						<?php
						if ( $bst_var_blk_tdis_process ) {
							foreach ( $bst_var_blk_tdis_process as $process ) {
								$bst_var_icon = $process['icon'] ?? null;
								$bst_var_title = $process['title'] ?? null;
								$bst_var_text = $process['text'] ?? null;
								$bst_var_image = $process['image'] ?? null;

								?>
								<div class="perk-item">
									<div class="perk-content">
										<?php if ( $bst_var_icon ) { ?>
											<div class="process-icon">
												<?php BaseTheme::the_attachment_image( $bst_var_icon, 200 ); ?>
											</div>
										<?php } ?>
										<?php if ( $bst_var_title ) { ?>
											<h4 class="perk-title">
												<?php echo html_entity_decode( $bst_var_title ); ?>
											</h4>
										<?php } ?>
										<?php if ( $bst_var_text ) { ?>
											<?php echo html_entity_decode( $bst_var_text ); ?>
										<?php } ?>

									</div>
									<?php if ( $bst_var_image ) { ?>
										<div class="perk-image">
											<?php BaseTheme::the_attachment_image( $bst_var_image, 1000 ); ?>
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

