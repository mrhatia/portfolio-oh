<?php
/**
 * Block Name: Talent Monitering
 *
 * The template for displaying the custom gutenberg block named talent Monitering.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package Base Theme Package
 * @since 1.0.0
 */

BaseTheme::block(
	$block,
	function ( $bst_block_id, $bst_block_name, $bst_block_fields, $bst_option_fields ) {

		$bst_var_blk_tmg_title = $bst_block_fields['bst_var_blk_tmg_title'] ?? null;
		$bst_var_blk_tabs_text = $bst_block_fields['bst_var_blk_tabs_text'] ?? null;
		$bst_var_blk_tabs_button = $bst_block_fields['bst_var_blk_tabs_button'] ?? null;
		$bst_var_blk_tmg_tabs  = $bst_block_fields['bst_var_blk_tmg_tabs'] ?? [];

		if ( empty( $bst_var_blk_tmg_tabs ) ) {
			return;
		}
		?>

			<section class="ctn-1300">
				<div class="wrapper">
					<div class="tabs-ctn">
						<?php if ( $bst_var_blk_tmg_title ){ ?>
							<div class="section-head">
								<h2 class="heading-1">
									<?php echo esc_html( $bst_var_blk_tmg_title ); ?>
								</h2>
							</div>
						<?php } ?>
						<div class="tabs-ctn-inner">
							<div class="tabs-iat-row">
								<?php if($bst_var_blk_tmg_tabs) {?>
									<div class="tabs-content">
										<?php foreach ( $bst_var_blk_tmg_tabs as $index => $tab ) {
											$label     = $tab['label'] ?? '';
											$tab_class = 'tab-' . sanitize_title( $label );
											?>
											<div class="tab-item" data-tab-target=".<?php echo esc_attr( $tab_class ); ?>">
												<div class="dot"></div>
												<div class="tab-item-head">
													<h3 class="tab-item-title text-20" role="button" tabindex="0">
														<?php echo esc_html( $label ); ?>
													</h3>
												</div>

											</div>
										<?php } ?>
									</div>
									<div class="tabs-image">

										<?php foreach ( $bst_var_blk_tmg_tabs as $index => $tab ){
											$label        = $tab['label'] ?? '';
											$main_image   = $tab['image'] ?? null;
											$tab_class    = 'tab-' . sanitize_title( $label );
											?>
												<div class="tab-image image-cover <?php echo esc_attr( $tab_class ); ?> <?php echo $index === 0 ? '' : ''; ?>" style="">
													<?php if ( $main_image ) { ?>
														<?php BaseTheme::the_attachment_image( $main_image, 500 ); ?>
													<?php } ?>
												</div>
										<?php } ?>
									</div>
								<?php } ?>

								<div class="tabs-right-text">

									<?php if($bst_var_blk_tabs_text){ ?>
										<?php echo html_entity_decode( $bst_var_blk_tabs_text ); ?>
									<?php } ?>
									<?php if ( $bst_var_blk_tabs_button ) { ?>
										<div class="tabs-right-text-button">
											<?php echo BaseTheme::button( $bst_var_blk_tabs_button, 'button' ); ?>
										</div>
									<?php } ?>
								</div>

							</div>
						</div>

					</div>

			</section>

		<?php
	}
);

