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
		$bst_var_blk_tabs_tabs  = $bst_block_fields['bst_var_blk_tabs_tabs'] ?? [];

		if ( empty( $bst_var_blk_tabs_tabs ) ) {
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
								<div class="tabs-content">
									<div class="tab-item" data-tab-target=".tab-connect">
										<div class="dot"></div>
										<div class="tab-item-head">
											<h3 class="tab-item-title text-20" role="button" tabindex="0">Building
												Activities
											</h3>
										</div>

									</div>
									<div class="tab-item" data-tab-target=".tab-analyze">
										<div class="dot"></div>

										<div class="tab-item-head">

											<h3 class="tab-item-title text-20" role="button" tabindex="0">
												Selecting the Students</h3>
										</div>

									</div>
									<div class="tab-item" data-tab-target=".tab-control">
										<div class="dot"></div>

										<div class="tab-item-head">

											<h3 class="tab-item-title text-20" role="button" tabindex="0">Sending to
												Students
											</h3>
										</div>

									</div>
									<div class="tab-item" data-tab-target=".tab-Students">
										<div class="dot"></div>

										<div class="tab-item-head">

											<h3 class="tab-item-title text-20" role="button" tabindex="0">Students Applying

											</h3>
										</div>
									</div>
									<div class="tab-item" data-tab-target=".tab-Companies">
										<div class="dot"></div>

										<div class="tab-item-head">
											<h3 class="tab-item-title text-20" role="button" tabindex="0">Companies
												Selecting
											</h3>
										</div>
									</div>


								</div>
								<div class="tabs-image">
									<div class="tab-image image-cover tab-connect" style="">
										<img src="../assets/src/images/uploads/Screenshot 2024-02-23 at 3.52 3.png"
											alt="Tab image">

									</div>
									<div class="tab-image image-cover tab-analyze current">
										<img src="../assets/src/images/uploads/default-image.webp" alt="Tab image">
									</div>
									<div class="tab-image image-cover tab-control current">
										<img src="../assets/src/images/uploads/offer-image-01.webp" alt="Tab image">
									</div>
									<div class="tab-image image-cover tab-Students current">
										<img src="../assets/src/images/uploads/offer-image-02.webp" alt="Tab image">
									</div>
									<div class="tab-image image-cover tab-Companies current">
										<img src="../assets/src/images/uploads/offer-image-03.webp" alt="Tab image">
									</div>
								</div>

								<div class="tabs-right-text">

									<?php if($bst_var_blk_tmg_text){ ?>
										<?php echo html_entity_decode( $bst_var_blk_tmg_text ); ?>
									<?php } ?>
									<?php if ( $bst_var_blk_tmg_button ) { ?>
										<div class="tabs-right-text-button">
											<?php echo BaseTheme::button( $bst_var_blk_tmg_button, 'button' ); ?>
										</div>
									<?php } ?>
								</div>

							</div>
						</div>

					</div>

			</section>

		<section class="ctn-1300">
			<div class="wrapper">
				<div class="tabs-ctn">
					<div class="tabs-iat-row d-flex">

						<!-- CONTENT -->
						<div class="tabs-content">

							<?php if ( $bst_var_blk_tabs_title ){ ?>
								<h2 class="heading-2">
									<?php echo esc_html( $bst_var_blk_tabs_title ); ?>
								</h2>
							<?php } ?>
							<?php if($bst_var_blk_tabs_text){ ?>
								<?php echo html_entity_decode( $bst_var_blk_tabs_text ); ?>
							<?php } ?>

							<?php foreach ( $bst_var_blk_tabs_tabs as $index => $tab ) :
								$label     = $tab['label'] ?? '';
								$tab_class = 'tab-' . sanitize_title( $label );
								?>
								<div class="tab-item" data-tab-target=".<?php echo esc_attr( $tab_class ); ?>">
									<div class="tab-item-head">
										<h3 class="tab-item-title text-20" role="button" tabindex="0">
											<?php echo esc_html( $label ); ?>
										</h3>
									</div>
								</div>
							<?php endforeach; ?>

						</div>

							<!-- IMAGES -->
						<div class="tabs-images">
							<?php foreach ( $bst_var_blk_tabs_tabs as $index => $tab ) :
								$label        = $tab['label'] ?? '';
								$main_image   = $tab['image'] ?? null;
								$tab_class    = 'tab-' . sanitize_title( $label );
								?>

								<div class="tab-image image-cover <?php echo esc_attr( $tab_class ); ?> <?php echo $index === 0 ? 'current' : ''; ?>" style="<?php echo $index === 0 ? '' : 'display:none;'; ?>">
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

