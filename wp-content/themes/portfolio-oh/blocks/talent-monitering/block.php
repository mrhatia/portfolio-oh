<?php
/**
 * Block Name: Talent Monitering
 */

BaseTheme::block(
	$block,
	function ( $bst_block_id, $bst_block_name, $bst_block_fields, $bst_option_fields ) {

		$bst_var_blk_tmg_title   = $bst_block_fields['bst_var_blk_tmg_title'] ?? null;
		$bst_var_blk_tabs_text   = $bst_block_fields['bst_var_blk_tabs_text'] ?? null;
		$bst_var_blk_tabs_button = $bst_block_fields['bst_var_blk_tabs_button'] ?? null;
		$bst_var_blk_tmg_tabs    = $bst_block_fields['bst_var_blk_tmg_tabs'] ?? [];

		if ( empty( $bst_var_blk_tmg_tabs ) ) {
			return;
		}
		?>

		<section class="ctn-1300">
			<div class="wrapper">
				<div class="tabs-ctn">

					<?php if ( $bst_var_blk_tmg_title ) : ?>
						<div class="section-head">
							<h2 class="heading-1">
								<?php echo esc_html( $bst_var_blk_tmg_title ); ?>
							</h2>
						</div>
					<?php endif; ?>

					<div class="tabs-ctn-inner">
						<div class="tabs-iat-row">

							<div class="tabs-content">
								<?php foreach ( $bst_var_blk_tmg_tabs as $index => $item ) :
									$label     = $item['label'] ?? '';
									$image     = $item['image'] ?? '';
									$tab_class = 'tab-' . sanitize_title( $label );
								?>
									<div class="tab-item<?php echo $index === 0 ? ' current fill' : ''; ?>" data-tab-target=".<?php echo esc_attr( $tab_class ); ?>">
										<div class="dot"></div>
										<div class="tab-item-head">
											<h3 class="tab-item-title text-20" role="button" tabindex="0">
												<?php echo esc_html( $label ); ?>
											</h3>
										</div>
									</div>
								<?php endforeach; ?>
							</div>

							<div class="tabs-image">
								<?php foreach ( $bst_var_blk_tmg_tabs as $index => $item ) :
									$label     = $item['label'] ?? '';
									$image     = $item['image'] ?? '';
									$tab_class = 'tab-' . sanitize_title( $label );
								?>
									<div class="tab-image image-cover <?php echo esc_attr( $tab_class ); ?><?php echo $index === 0 ? ' current' : ''; ?>">
										<?php
											if ( $image ) {
												BaseTheme::the_attachment_image( $image, 800 );
											}
										?>
									</div>
								<?php endforeach; ?>
							</div>
							<div class="tabs-right-text">
								<?php if ( $bst_var_blk_tabs_text ) : ?>
									<div class="tabs-right-text-content">
										<?php echo wp_kses_post( $bst_var_blk_tabs_text ); ?>
									</div>
								<?php endif; ?>

								<?php if ( $bst_var_blk_tabs_button ) : ?>
									<div class="tabs-right-text-button">
										<?php BaseTheme::button( $bst_var_blk_tabs_button, 'button' ); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</section>

		<?php
	}
);
