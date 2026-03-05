<?php
/**
 * Block Name: Tabbed Content
 *
 * The template for displaying the custom gutenberg block named Tabbed Content.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package Base Theme Package
 * @since 1.0.0
 */

BaseTheme::block(
	$block,
	function ( $bst_block_id, $bst_block_name, $bst_block_fields, $bst_option_fields ) {

		$bst_var_blk_tabs_title = $bst_block_fields['bst_var_blk_tabs_title'] ?? null;
		$bst_var_blk_tabs_text = $bst_block_fields['bst_var_blk_tabs_text'] ?? null;
		$bst_var_blk_tabs_button = $bst_block_fields['bst_var_blk_tabs_button'] ?? null;
		$bst_var_blk_tabs_tabs  = $bst_block_fields['bst_var_blk_tabs_tabs'] ?? [];

		if ( empty( $bst_var_blk_tabs_tabs ) ) {
			return;
		}
		?>

		<section class="ctn-1300">
			<div class="wrapper">
				<div class="process-tabs">
					<div class="process-tabs-inner">
						<div class="process-tabs-row">

							<!-- CONTENT -->
							<div class="process-steps">
									<div class="section-head">

										<?php if ( $bst_var_blk_tabs_title ){ ?>
											<h2 class="heading-1">
												<?php echo esc_html( $bst_var_blk_tabs_title ); ?>
											</h2>
										<?php } ?>
										<?php if($bst_var_blk_tabs_text){ ?>
											<?php echo html_entity_decode( $bst_var_blk_tabs_text ); ?>
										<?php } ?>
									</div>



								<?php foreach ( $bst_var_blk_tabs_tabs as $index => $tab ) :
									$label     = $tab['label'] ?? '';
									$tab_class = 'tab-' . sanitize_title( $label );
									?>
									<div class="process-step" data-tab-target=".<?php echo esc_attr( $tab_class ); ?>">
										<div class="process-step-head">
											<h3 class="process-step-title" role="button" tabindex="0">
												<?php echo esc_html( $label ); ?>
											</h3>
										</div>
									</div>
								<?php endforeach; ?>

								<?php if ( $bst_var_blk_tabs_button ) { ?>
									<div class="process-step-button">
										<?php BaseTheme::button( $bst_var_blk_tabs_button, 'button' ); ?>
									</div>
								<?php } ?>

							</div>

								<!-- IMAGES -->
							<div class="process-images">
								<?php foreach ( $bst_var_blk_tabs_tabs as $index => $tab ) :
									$label        = $tab['label'] ?? '';
									$main_image   = $tab['image'] ?? null;
									$tab_class    = 'tab-' . sanitize_title( $label );
									?>

									<div class="process-image image-cover <?php echo esc_attr( $tab_class ); ?> <?php echo $index === 0 ? '' : 'current'; ?>" >
										<?php
											if ( $main_image ) {
												BaseTheme::the_attachment_image( $main_image, 500 );
											}
										?>
									</div>

								<?php endforeach; ?>
							</div>

						</div>
					</div>
				</div>
		</section>

		<?php
	}
);

