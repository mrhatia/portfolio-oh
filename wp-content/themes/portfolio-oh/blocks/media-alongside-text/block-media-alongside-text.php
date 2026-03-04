<?php
/**
 * Block Name: Image Alongside Text
 *
 * The template for displaying the custom gutenberg block named Image Alongside Text.
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
		$bst_var_blk_mat_title        = $bst_block_fields['bst_var_blk_mat_title'] ?? null;
		$bst_var_blk_mat_text        = $bst_block_fields['bst_var_blk_mat_text'] ?? null;
		$bst_var_blk_mat_button        = $bst_block_fields['bst_var_blk_mat_button'] ?? null;
		$bst_var_blk_mat_image        = $bst_block_fields['bst_var_blk_mat_image'] ?? null;
		$bst_var_blk_mat_design_variation        = $bst_block_fields['bst_var_blk_mat_design_variation'] ?? null;
		$bst_var_blk_mat_img_location        = ("left" === $bst_block_fields['bst_var_blk_mat_img_location']) ? "image-at-left" : "image-at-right";
		?>
		<?php if($bst_var_blk_mat_design_variation === "blue-bg"){ ?>
			<section class="blue-bg-variation">
				<div class="wrapper">
					<div class="iat-section two-columns justify-content-between align-items-center <?php echo $bst_var_blk_mat_img_location; ?>">
						<div class="iat-image column" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
							<?php if ( $bst_var_blk_mat_image ) { ?>
								<?php BaseTheme::the_attachment_image( $bst_var_blk_mat_image, 1000 ); ?>
							<?php } ?>
						</div>
						<div class="iat-text column">
							<?php if ( $bst_var_blk_mat_title ) { ?>
								<h2>
									<?php echo html_entity_decode( $bst_var_blk_mat_title ); ?>
								</h2>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_text ) {  ?>
								<?php echo html_entity_decode( $bst_var_blk_mat_text ); ?>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_button ) { ?>
								<?php echo BaseTheme::button( $bst_var_blk_mat_button, 'button' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
		<?php } else if($bst_var_blk_mat_design_variation === "big-image"){ ?>
			<section class="big-image-variation">
				<div class="wrapper">
					<div class="iat-section two-columns justify-content-between align-items-center <?php echo $bst_var_blk_mat_img_location; ?>">
						<div class="iat-image column" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
							<?php if ( $bst_var_blk_mat_image ) { ?>
								<?php BaseTheme::the_attachment_image( $bst_var_blk_mat_image, 1000 ); ?>
							<?php } ?>
						</div>
						<div class="iat-text column">
							<?php if ( $bst_var_blk_mat_title ) { ?>
								<h2>
									<?php echo html_entity_decode( $bst_var_blk_mat_title ); ?>
								</h2>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_text ) {  ?>
								<?php echo html_entity_decode( $bst_var_blk_mat_text ); ?>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_button ) { ?>
								<?php echo BaseTheme::button( $bst_var_blk_mat_button, 'button' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
		<?php } else{ ?>
			<section class="default-variation">
				<div class="wrapper">
					<div class="iat-section d-flex justify-content-between align-items-center flex-wrap <?php echo $bst_var_blk_mat_img_location; ?>">
						<div class="iat-image column" tabindex="0" role="img" aria-label="Image illustrating the content of this block">
							<?php if ( $bst_var_blk_mat_image ) { ?>
								<?php BaseTheme::the_attachment_image( $bst_var_blk_mat_image, 1000 ); ?>
							<?php } ?>
						</div>
						<div class="iat-text column">
							<?php if ( $bst_var_blk_mat_title ) { ?>
								<h2 class="heading-1">
									<?php echo html_entity_decode( $bst_var_blk_mat_title ); ?>
								</h2>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_text ) {  ?>
								<?php echo html_entity_decode( $bst_var_blk_mat_text ); ?>
							<?php } ?>
							<?php if ( $bst_var_blk_mat_button ) { ?>
								<?php echo BaseTheme::button( $bst_var_blk_mat_button, 'button' ); ?>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
		<?php } ?>
<?php });

