<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'content-wrapper', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="content-column content-description summary entry-summary">
		<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<div class="product-tabs">
		<ul class="nav nav-tabs" id="nav_tabs" role="tablist">
			<li class="nav-item" role="presentation">
				<button class="nav-link active" id="tab-description" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="tab-nutrition" data-bs-toggle="tab" data-bs-target="#nutrition" type="button" role="tab" aria-controls="nutrition" aria-selected="true">Nutrition</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="tab-ingredients" data-bs-toggle="tab" data-bs-target="#ingredients" type="button" role="tab" aria-controls="ingredients" aria-selected="true">Ingredients</button>
			</li>
			<li class="nav-item" role="presentation">
				<button class="nav-link" id="tab-feeding-guide" data-bs-toggle="tab" data-bs-target="#feeding-guide" type="button" role="tab" aria-controls="feeding-guide" aria-selected="true">Feeding Guide</button>
			</li>
		</ul>
		<div class="tab-content" id="tab_content">
			<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="tab-description">
				<div class="title">
					<a href="#" class="tab-title-mobile">Description</a>
				</div>
				<div class="content">
					<?php if( have_rows('product_tabs_content_description') ): ?>
						<?php while( have_rows('product_tabs_content_description') ): the_row(); ?>
							<!-- Text Content -->
							<?php if( get_row_layout() == 'text_content' ): ?>
								<div class="text-content">
									<?php the_sub_field('text_editor'); ?>
								</div>
							
							<!-- Text Image Left -->
							<?php elseif( get_row_layout() == 'text_image_left' ): 
								$image = get_sub_field('image_left');
								$text_editor = get_sub_field('text_editor_right'); ?>
								<div class="text-image inverted">
									<div class="text">
										<?php echo $text_editor; ?>
									</div>
									<div class="image">
										<div class="image-holder">
											<img src="<?php echo $image; ?>" alt="" />
										</div>
									</div>
								</div>
							
							<!-- Text Image Right -->
							<?php elseif( get_row_layout() == 'text_image_right' ): 
								$text_editor = get_sub_field('text_editor_left'); 
								$image = get_sub_field('image_right'); ?>
								<div class="text-image">
									<div class="image">
										<div class="image-holder">
											<img src="<?php echo $image; ?>" alt="" />
										</div>
									</div>
									<div class="text">
										<?php echo $text_editor; ?>
									</div>
								</div>
							
							<!-- Table Content -->
							<?php elseif( get_row_layout() == 'table_content_flexible' ): ?>
								<?php if( have_rows('number_of_columns') ): ?>
									<div class="table-content">
										<?php while( have_rows('number_of_columns') ): the_row(); ?>
											<!-- 2 Columns -->
											<?php if( get_row_layout() == '2_columns' ): ?>
												<?php if( have_rows('2_columns_table') ): ?>
													<table class="center-text table-2">
														<?php while( have_rows('2_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<!-- 3 Columns -->
											<?php elseif( get_row_layout() == '3_columns' ): ?>
												<?php if( have_rows('3_columns_table') ): ?>
													<table class="center-text table-3">
														<?php while( have_rows('3_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); 
																$column_3 = get_sub_field('column_3'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																	<th><?php echo $column_3; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); 
																		$column_3 = get_sub_field('column_3'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																			<td><?php echo $column_3; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<!-- 4 Columns -->
											<?php elseif( get_row_layout() == '4_columns' ): ?>
												<?php if( have_rows('4_columns_table') ): ?>
													<table class="center-text table-4">
														<?php while( have_rows('4_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); 
																$column_3 = get_sub_field('column_3'); 
																$column_4 = get_sub_field('column_4'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																	<th><?php echo $column_3; ?></th>
																	<th><?php echo $column_4; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); 
																		$column_3 = get_sub_field('column_3');
																		$column_4 = get_sub_field('column_4'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																			<td><?php echo $column_3; ?></td>
																			<td><?php echo $column_4; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<!-- 5 Columns -->
											<?php elseif( get_row_layout() == '5_columns' ): ?>
												<?php if( have_rows('5_columns_table') ): ?>
													<table class="center-text table-5">
														<?php while( have_rows('5_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); 
																$column_3 = get_sub_field('column_3'); 
																$column_4 = get_sub_field('column_4'); 
																$column_5 = get_sub_field('column_5'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																	<th><?php echo $column_3; ?></th>
																	<th><?php echo $column_4; ?></th>
																	<th><?php echo $column_5; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); 
																		$column_3 = get_sub_field('column_3');
																		$column_4 = get_sub_field('column_4'); 
																		$column_5 = get_sub_field('column_5'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																			<td><?php echo $column_3; ?></td>
																			<td><?php echo $column_4; ?></td>
																			<td><?php echo $column_5; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<?php endif; ?>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="tab-pane fade" id="nutrition" role="tabpanel" aria-labelledby="tab-nutrition">
				<div class="title">
					<a href="#" class="tab-title-mobile">Nutrition</a>
				</div>
				<div class="content">
					<?php if( have_rows('product_tabs_content_nutrition') ): ?>
						<?php while( have_rows('product_tabs_content_nutrition') ): the_row(); ?>
							<!-- Text Content -->
							<?php if( get_row_layout() == 'text_content' ): ?>
								<div class="text-content">
									<?php the_sub_field('text_editor'); ?>
								</div>
							
							<!-- Text Image Left -->
							<?php elseif( get_row_layout() == 'text_image_left' ): 
								$image = get_sub_field('image_left');
								$text_editor = get_sub_field('text_editor_right'); ?>
								<div class="text-image inverted">
									<div class="text">
										<?php echo $text_editor; ?>
									</div>
									<div class="image">
										<div class="image-holder">
											<img src="<?php echo $image; ?>" alt="" />
										</div>
									</div>
								</div>
							
							<!-- Text Image Right -->
							<?php elseif( get_row_layout() == 'text_image_right' ): 
								$text_editor = get_sub_field('text_editor_left'); 
								$image = get_sub_field('image_right'); ?>
								<div class="text-image">
									<div class="image">
										<div class="image-holder">
											<img src="<?php echo $image; ?>" alt="" />
										</div>
									</div>
									<div class="text">
										<?php echo $text_editor; ?>
									</div>
								</div>
							
							<!-- Table Content -->
							<?php elseif( get_row_layout() == 'table_content_flexible' ): ?>
								<?php if( have_rows('number_of_columns') ): ?>
									<div class="table-content">
										<?php while( have_rows('number_of_columns') ): the_row(); ?>
											<!-- 2 Columns -->
											<?php if( get_row_layout() == '2_columns' ): ?>
												<?php if( have_rows('2_columns_table') ): ?>
													<table class="center-text table-2">
														<?php while( have_rows('2_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<!-- 3 Columns -->
											<?php elseif( get_row_layout() == '3_columns' ): ?>
												<?php if( have_rows('3_columns_table') ): ?>
													<table class="center-text table-3">
														<?php while( have_rows('3_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); 
																$column_3 = get_sub_field('column_3'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																	<th><?php echo $column_3; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); 
																		$column_3 = get_sub_field('column_3'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																			<td><?php echo $column_3; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<!-- 4 Columns -->
											<?php elseif( get_row_layout() == '4_columns' ): ?>
												<?php if( have_rows('4_columns_table') ): ?>
													<table class="center-text table-4">
														<?php while( have_rows('4_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); 
																$column_3 = get_sub_field('column_3'); 
																$column_4 = get_sub_field('column_4'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																	<th><?php echo $column_3; ?></th>
																	<th><?php echo $column_4; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); 
																		$column_3 = get_sub_field('column_3');
																		$column_4 = get_sub_field('column_4'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																			<td><?php echo $column_3; ?></td>
																			<td><?php echo $column_4; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<!-- 5 Columns -->
											<?php elseif( get_row_layout() == '5_columns' ): ?>
												<?php if( have_rows('5_columns_table') ): ?>
													<table class="center-text table-5">
														<?php while( have_rows('5_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); 
																$column_3 = get_sub_field('column_3'); 
																$column_4 = get_sub_field('column_4'); 
																$column_5 = get_sub_field('column_5'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																	<th><?php echo $column_3; ?></th>
																	<th><?php echo $column_4; ?></th>
																	<th><?php echo $column_5; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); 
																		$column_3 = get_sub_field('column_3');
																		$column_4 = get_sub_field('column_4'); 
																		$column_5 = get_sub_field('column_5'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																			<td><?php echo $column_3; ?></td>
																			<td><?php echo $column_4; ?></td>
																			<td><?php echo $column_5; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<?php endif; ?>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="tab-pane fade" id="ingredients" role="tabpanel" aria-labelledby="tab-ingredients">
				<div class="title">
					<a href="#" class="tab-title-mobile">Ingredients</a>
				</div>
				<div class="content">
					<?php if( have_rows('product_tabs_content_ingredients') ): ?>
						<?php while( have_rows('product_tabs_content_ingredients') ): the_row(); ?>
							<!-- Text Content -->
							<?php if( get_row_layout() == 'text_content' ): ?>
								<div class="text-content">
									<?php the_sub_field('text_editor'); ?>
								</div>
							
							<!-- Text Image Left -->
							<?php elseif( get_row_layout() == 'text_image_left' ): 
								$image = get_sub_field('image_left');
								$text_editor = get_sub_field('text_editor_right'); ?>
								<div class="text-image inverted">
									<div class="text">
										<?php echo $text_editor; ?>
									</div>
									<div class="image">
										<div class="image-holder">
											<img src="<?php echo $image; ?>" alt="" />
										</div>
									</div>
								</div>
							
							<!-- Text Image Right -->
							<?php elseif( get_row_layout() == 'text_image_right' ): 
								$text_editor = get_sub_field('text_editor_left'); 
								$image = get_sub_field('image_right'); ?>
								<div class="text-image">
									<div class="image">
										<div class="image-holder">
											<img src="<?php echo $image; ?>" alt="" />
										</div>
									</div>
									<div class="text">
										<?php echo $text_editor; ?>
									</div>
								</div>
							
							<!-- Table Content -->
							<?php elseif( get_row_layout() == 'table_content_flexible' ): ?>
								<?php if( have_rows('number_of_columns') ): ?>
									<div class="table-content">
										<?php while( have_rows('number_of_columns') ): the_row(); ?>
											<!-- 2 Columns -->
											<?php if( get_row_layout() == '2_columns' ): ?>
												<?php if( have_rows('2_columns_table') ): ?>
													<table class="center-text table-2">
														<?php while( have_rows('2_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<!-- 3 Columns -->
											<?php elseif( get_row_layout() == '3_columns' ): ?>
												<?php if( have_rows('3_columns_table') ): ?>
													<table class="center-text table-3">
														<?php while( have_rows('3_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); 
																$column_3 = get_sub_field('column_3'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																	<th><?php echo $column_3; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); 
																		$column_3 = get_sub_field('column_3'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																			<td><?php echo $column_3; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<!-- 4 Columns -->
											<?php elseif( get_row_layout() == '4_columns' ): ?>
												<?php if( have_rows('4_columns_table') ): ?>
													<table class="center-text table-4">
														<?php while( have_rows('4_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); 
																$column_3 = get_sub_field('column_3'); 
																$column_4 = get_sub_field('column_4'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																	<th><?php echo $column_3; ?></th>
																	<th><?php echo $column_4; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); 
																		$column_3 = get_sub_field('column_3');
																		$column_4 = get_sub_field('column_4'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																			<td><?php echo $column_3; ?></td>
																			<td><?php echo $column_4; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<!-- 5 Columns -->
											<?php elseif( get_row_layout() == '5_columns' ): ?>
												<?php if( have_rows('5_columns_table') ): ?>
													<table class="center-text table-5">
														<?php while( have_rows('5_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); 
																$column_3 = get_sub_field('column_3'); 
																$column_4 = get_sub_field('column_4'); 
																$column_5 = get_sub_field('column_5'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																	<th><?php echo $column_3; ?></th>
																	<th><?php echo $column_4; ?></th>
																	<th><?php echo $column_5; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); 
																		$column_3 = get_sub_field('column_3');
																		$column_4 = get_sub_field('column_4'); 
																		$column_5 = get_sub_field('column_5'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																			<td><?php echo $column_3; ?></td>
																			<td><?php echo $column_4; ?></td>
																			<td><?php echo $column_5; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<?php endif; ?>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="tab-pane fade" id="feeding-guide" role="tabpanel" aria-labelledby="tab-feeding-guide">
				<div class="title">
					<a href="#" class="tab-title-mobile">Feeding Guide</a>
				</div>
				<div class="content">
					<?php if( have_rows('product_tabs_content_feeding_guide') ): ?>
						<?php while( have_rows('product_tabs_content_feeding_guide') ): the_row(); ?>
							<!-- Text Content -->
							<?php if( get_row_layout() == 'text_content' ): ?>
								<div class="text-content">
									<?php the_sub_field('text_editor'); ?>
								</div>
							
							<!-- Text Image Left -->
							<?php elseif( get_row_layout() == 'text_image_left' ): 
								$image = get_sub_field('image_left');
								$text_editor = get_sub_field('text_editor_right'); ?>
								<div class="text-image inverted">
									<div class="text">
										<?php echo $text_editor; ?>
									</div>
									<div class="image">
										<div class="image-holder">
											<img src="<?php echo $image; ?>" alt="" />
										</div>
									</div>
								</div>
							
							<!-- Text Image Right -->
							<?php elseif( get_row_layout() == 'text_image_right' ): 
								$text_editor = get_sub_field('text_editor_left'); 
								$image = get_sub_field('image_right'); ?>
								<div class="text-image">
									<div class="image">
										<div class="image-holder">
											<img src="<?php echo $image; ?>" alt="" />
										</div>
									</div>
									<div class="text">
										<?php echo $text_editor; ?>
									</div>
								</div>
							
							<!-- Table Content -->
							<?php elseif( get_row_layout() == 'table_content_flexible' ): ?>
								<?php if( have_rows('number_of_columns') ): ?>
									<div class="table-content">
										<?php while( have_rows('number_of_columns') ): the_row(); ?>
											<!-- 2 Columns -->
											<?php if( get_row_layout() == '2_columns' ): ?>
												<?php if( have_rows('2_columns_table') ): ?>
													<table class="center-text table-2">
														<?php while( have_rows('2_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<!-- 3 Columns -->
											<?php elseif( get_row_layout() == '3_columns' ): ?>
												<?php if( have_rows('3_columns_table') ): ?>
													<table class="center-text table-3">
														<?php while( have_rows('3_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); 
																$column_3 = get_sub_field('column_3'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																	<th><?php echo $column_3; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); 
																		$column_3 = get_sub_field('column_3'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																			<td><?php echo $column_3; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<!-- 4 Columns -->
											<?php elseif( get_row_layout() == '4_columns' ): ?>
												<?php if( have_rows('4_columns_table') ): ?>
													<table class="center-text table-4">
														<?php while( have_rows('4_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); 
																$column_3 = get_sub_field('column_3'); 
																$column_4 = get_sub_field('column_4'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																	<th><?php echo $column_3; ?></th>
																	<th><?php echo $column_4; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); 
																		$column_3 = get_sub_field('column_3');
																		$column_4 = get_sub_field('column_4'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																			<td><?php echo $column_3; ?></td>
																			<td><?php echo $column_4; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<!-- 5 Columns -->
											<?php elseif( get_row_layout() == '5_columns' ): ?>
												<?php if( have_rows('5_columns_table') ): ?>
													<table class="center-text table-5">
														<?php while( have_rows('5_columns_table') ): the_row(); ?>
															<?php if( get_row_layout() == 'table_heading' ): 
																$column_1 = get_sub_field('column_1'); 
																$column_2 = get_sub_field('column_2'); 
																$column_3 = get_sub_field('column_3'); 
																$column_4 = get_sub_field('column_4'); 
																$column_5 = get_sub_field('column_5'); ?>
																<tr>
																	<th><?php echo $column_1; ?></th>
																	<th><?php echo $column_2; ?></th>
																	<th><?php echo $column_3; ?></th>
																	<th><?php echo $column_4; ?></th>
																	<th><?php echo $column_5; ?></th>
																</tr>
															<?php elseif( get_row_layout() == 'table_content' ): ?>
																<?php if( have_rows('row') ): ?>
																	<?php while( have_rows('row') ): the_row(); 
																		$column_1 = get_sub_field('column_1'); 
																		$column_2 = get_sub_field('column_2'); 
																		$column_3 = get_sub_field('column_3');
																		$column_4 = get_sub_field('column_4'); 
																		$column_5 = get_sub_field('column_5'); ?>
																		<tr>
																			<td><?php echo $column_1; ?></td>
																			<td><?php echo $column_2; ?></td>
																			<td><?php echo $column_3; ?></td>
																			<td><?php echo $column_4; ?></td>
																			<td><?php echo $column_5; ?></td>
																		</tr>
																	<?php endwhile; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile; ?>
													</table>
												<?php endif; ?>
											<?php endif; ?>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		// do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
