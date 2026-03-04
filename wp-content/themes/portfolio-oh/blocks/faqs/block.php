<?php
/**
 * Block Name: Faq
 *
 * The template for displaying the custom gutenberg block named Faq.
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
		$bst_var_faq_title        = $bst_block_fields['bst_var_faq_title'] ?? null;
		$bst_var_faq_faqs        = $bst_block_fields['bst_var_faq_faqs'] ?? null;

		?>

		<section class=" ctn-white ctn-780">
			<div class="gl-s100"></div>

			<div class="wrapper">
				<div class="faqs-main">
					<div class="section-head">
						<?php if($bst_var_faq_title){ ?>
							<h2 class="heading-2">
								<?php echo html_entity_decode($bst_var_faq_title); ?>
							</h2>
						<?php } ?>
					</div>
					<?php if($bst_var_faq_faqs){ ?>
						<div class="gl-s60"></div>
						<div class="faqs">
							<?php foreach( $bst_var_faq_faqs as $key =>  $faq ){
								$faq_question       = $faq['question'] ?? null;
								$faq_answer       = $faq['answer'] ?? null;
								$active_class = ( $key == 0 ) ? 'active' : '';
								$display_style = ( $key == 0 ) ? 'style="display: block;"' : '';
								?>
									<div class="single-faq <?php echo esc_attr( $active_class ); ?>">
										<div class="single-faq-head <?php echo esc_attr( $active_class ); ?>">
											<div class="faq-title">
												<?php echo html_entity_decode( $faq_question ); ?>
											</div>
											<div class="faq-icon">
												<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
													viewBox="0 0 30 30" fill="none">
													<path d="M15 6.25V23.75" stroke="#FAB800" stroke-width="3"
														stroke-linecap="round" stroke-linejoin="round" />
													<path d="M6.25 15H23.75" stroke="#FAB800" stroke-width="3"
														stroke-linecap="round" stroke-linejoin="round" />
												</svg>
											</div>
										</div>
										<?php if($faq_answer){ ?>
											<div class="faq-content" <?php echo html_entity_decode( $display_style ); ?>>
												<?php echo html_entity_decode( $faq_answer ); ?>
											</div>
										<?php } ?>
									</div>

							<?php } ?>



						</div>
						<div class="gl-s60"></div>
					<?php } ?>
				</div>
			</div>
			<div class="gl-s100"></div>
		</section>

		<?php
	}
);

