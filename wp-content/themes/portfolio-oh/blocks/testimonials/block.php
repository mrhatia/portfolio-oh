<?php
/**
 * Block Name: Testimonials
 *
 * The template for displaying the custom gutenberg block named Testimonials.
 *
 * @link https://www.advancedcustomfields.com/resources/blocks/
 *
 * @package Base Theme Package
 * @since 1.0.0
 */

BaseTheme::block(
	$block,
	function ( $bst_block_id, $bst_block_name, $bst_block_fields, $bst_option_fields ) {

		// Block fields
		$bst_var_blk_tst_title      = $bst_block_fields['bst_var_blk_tst_title'] ?? null;
		$bst_var_blk_tst_variation = $bst_block_fields['bst_var_blk_tst_variation'] ?? null;
		$bst_var_blk_tst_testimonials     = $bst_block_fields['bst_var_blk_tst_testimonials'] ?? [];

		?>


	<section>
		<div class="wrapper">
			<div class="testimonial-section">
				<?php if ( $bst_var_blk_tst_title ){ ?>
					<div class="section-head">
						<h2 class="heading-1">
							<?php echo html_entity_decode( $bst_var_blk_tst_title ); ?>
						</h2>
					</div>
				<?php } ?>

				<?php if ( $bst_var_blk_tst_variation === 'manual' && ! empty( $bst_var_blk_tst_testimonials ) ){
					$review_count = count( $bst_var_blk_tst_testimonials );
					?>
					<div class="our-reviews <?php echo ( $review_count <= 3 ) ? 'our-reviews-simple' : 'owl-carousel';  ?>">

						<?php foreach ( $bst_var_blk_tst_testimonials as $review_id ){
							list( $post_id, $fields, $options ) = BaseTheme::defaults( $review_id );

							$bst_var_cpt_tst_message        = $fields['bst_var_cpt_tst_message'] ?? null;
							$bst_var_cpt_tst_author_name        = $fields['bst_var_cpt_tst_author_name'] ?? null;
							$bst_var_cpt_tst_designation        = $fields['bst_var_cpt_tst_designation'] ?? null;
							$bst_var_cpt_tst_rating        = $fields['bst_var_cpt_tst_rating'] ?? null;
							?>

							<div class="testimonial-single d-flex">
								<div class="testimonial-content">
									<div class="our-review-rating">
										<?php for ( $i = 1; $i <= 5; $i++ ){ ?>
											<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
												<path d="M14.9609 5.43208C14.8627 5.12834 14.5933 4.91262 14.2746 4.88389L9.94517 4.49078L8.2332 0.483754C8.10697 0.190091 7.81949 0 7.50008 0C7.18066 0 6.89318 0.190091 6.76695 0.484441L5.05498 4.49078L0.724885 4.88389C0.406732 4.9133 0.138017 5.12834 0.0392523 5.43208C-0.0595127 5.73581 0.031699 6.06896 0.272374 6.27896L3.5449 9.14899L2.57991 13.3998C2.50929 13.7123 2.6306 14.0354 2.88993 14.2229C3.02933 14.3236 3.19241 14.3748 3.35686 14.3748C3.49866 14.3748 3.63931 14.3366 3.76554 14.2611L7.50008 12.0291L11.2332 14.2611C11.5064 14.4254 11.8508 14.4104 12.1095 14.2229C12.369 14.0348 12.4902 13.7116 12.4196 13.3998L11.4546 9.14899L14.7271 6.27953C14.9678 6.06896 15.0597 5.73638 14.9609 5.43208Z"
													fill="<?php echo ( $i <= $bst_var_cpt_tst_rating ) ? '#FAB800' : '#E0E0E0'; ?>" />
											</svg>
										<?php } ?>
									</div>
									<?php if ( $bst_var_cpt_tst_message ) : ?>
										<?php echo html_entity_decode( $bst_var_cpt_tst_message ); ?>
									<?php endif; ?>
									<div class="author-details d-flex align-items-center">
										<?php if ( $bst_var_cpt_tst_author_name ) : ?>
											<div class="text-20">- <?php echo esc_html( $bst_var_cpt_tst_author_name ); ?></div>
										<?php endif; ?>

										<?php if ( $bst_var_cpt_tst_designation ) : ?>
											<div class="text-20">, <?php echo esc_html( $bst_var_cpt_tst_designation ); ?></div>
										<?php endif; ?>
									</div>
								</div>

								<div class="author-image image-cover">
									<?php
										if ( ! has_post_thumbnail( $post_id ) ) {
											echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp">';
										} else {
											echo get_the_post_thumbnail( $post_id, 'thumb_200' );
										}
									?>
								</div>
							</div>

						<?php } ?>

					</div>

				<?php } else {

					$args = [
						'post_type'      => 'review',
						'posts_per_page' => 6,
						'orderby'        => 'date',
						'order'          => 'DESC',
					];

					$query = new WP_Query( $args );

					if ( $query->have_posts() ){
						$review_count = $query->post_count;
						?>
						<div class="our-reviews <?php echo ( $review_count <= 3 ) ? 'our-reviews-simple' : 'owl-carousel';  ?> ">
							<?php while ( $query->have_posts() ){
								$query->the_post();
								list( $post_id, $fields, $options ) = BaseTheme::defaults( get_the_ID() );

								$bst_var_cpt_tst_message        = $fields['bst_var_cpt_tst_message'] ?? null;
								$bst_var_cpt_tst_author_name        = $fields['bst_var_cpt_tst_author_name'] ?? null;
								$bst_var_cpt_tst_designation        = $fields['bst_var_cpt_tst_designation'] ?? null;
								$bst_var_cpt_tst_rating        = $fields['bst_var_cpt_tst_rating'] ?? null;
								?>

								<div class="testimonial-single d-flex align-items-center">
									<div class="testimonial-content">
										<div class="our-review-rating">
											<?php for ( $i = 1; $i <= 5; $i++ ){ ?>
												<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
													<path d="M14.9609 5.43208C14.8627 5.12834 14.5933 4.91262 14.2746 4.88389L9.94517 4.49078L8.2332 0.483754C8.10697 0.190091 7.81949 0 7.50008 0C7.18066 0 6.89318 0.190091 6.76695 0.484441L5.05498 4.49078L0.724885 4.88389C0.406732 4.9133 0.138017 5.12834 0.0392523 5.43208C-0.0595127 5.73581 0.031699 6.06896 0.272374 6.27896L3.5449 9.14899L2.57991 13.3998C2.50929 13.7123 2.6306 14.0354 2.88993 14.2229C3.02933 14.3236 3.19241 14.3748 3.35686 14.3748C3.49866 14.3748 3.63931 14.3366 3.76554 14.2611L7.50008 12.0291L11.2332 14.2611C11.5064 14.4254 11.8508 14.4104 12.1095 14.2229C12.369 14.0348 12.4902 13.7116 12.4196 13.3998L11.4546 9.14899L14.7271 6.27953C14.9678 6.06896 15.0597 5.73638 14.9609 5.43208Z"
														fill="<?php echo ( $i <= $bst_var_cpt_tst_rating ) ? '#FAB800' : '#E0E0E0'; ?>" />
												</svg>
											<?php } ?>
										</div>
										<?php if ( $bst_var_cpt_tst_message ) : ?>
											<?php echo html_entity_decode( $bst_var_cpt_tst_message ); ?>
										<?php endif; ?>
										<div class="author-details d-flex align-items-center">
											<?php if ( $bst_var_cpt_tst_author_name ) : ?>
												<div class="text-20">- <?php echo esc_html( $bst_var_cpt_tst_author_name ); ?></div>
											<?php endif; ?>

											<?php if ( $bst_var_cpt_tst_designation ) : ?>
												<div class="text-20">, <?php echo esc_html( $bst_var_cpt_tst_designation ); ?></div>
											<?php endif; ?>
										</div>
									</div>

									<div class="author-image image-cover">
										<?php
											if ( ! has_post_thumbnail( $post_id ) ) {
												echo '<img src="' . esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp">';
											} else {
												echo get_the_post_thumbnail( $post_id, 'thumb_200' );
											}
										?>
									</div>
								</div>

							<?php } wp_reset_postdata(); ?>
						</div>
					<?php }
				} ?>

			</div>

		</div>
	</section>

		<?php
	}
);

