<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

	add_shortcode( 'APT', 'pricingtable_shortcode' );
function pricingtable_shortcode( $post_id ) {

	ob_start();

	$pricing_post_settings = get_post_meta( $post_id['id'], 'apt_pricing_table_data_' . $post_id['id'], true );

	$apt_id = $post_id['id'];

	if ( isset( $post_id['template'] ) ) {
		$pricing_table_design = $post_id['template'];   // template set by shortcode
	} else {
		if ( isset( $pricing_post_settings['pricing_table_design'] ) ) {
			$pricing_table_design = $pricing_post_settings['pricing_table_design'];
		} else {
			$pricing_table_design = 'template1';
		}
	}
	if ( isset( $pricing_post_settings['featured_button'] ) ) {
		$featured_button = $pricing_post_settings['featured_button'];
	} else {
		$featured_button = 'false';
	}
	if ( isset( $pricing_post_settings['pricing_name'] ) ) {
		$pricing_name = $pricing_post_settings['pricing_name'];
	} else {
		$pricing_name = '';
	}
	if ( isset( $pricing_post_settings['pricing_price'] ) ) {
		$pricing_price = $pricing_post_settings['pricing_price'];
	} else {
		$pricing_price = '';
	}
	if ( isset( $pricing_post_settings['pricing_plan'] ) ) {
		$pricing_plan = $pricing_post_settings['pricing_plan'];
	} else {
		$pricing_plan = '';
	}
	if ( isset( $pricing_post_settings['pricing_features'] ) ) {
		$pricing_features = $pricing_post_settings['pricing_features'];
	} else {
		$pricing_features = '';
	}
	if ( isset( $pricing_post_settings['pricing_btn_text'] ) ) {
		$pricing_btn_text = $pricing_post_settings['pricing_btn_text'];
	} else {
		$pricing_btn_text = '';
	}
	if ( isset( $pricing_post_settings['pricing_btn_url'] ) ) {
		$pricing_btn_url = $pricing_post_settings['pricing_btn_url'];
	} else {
		$pricing_btn_url = '';
	}
	if ( isset( $pricing_post_settings['heading_text_color'] ) ) {
		$heading_text_color = $pricing_post_settings['heading_text_color'];
	} else {
		$heading_text_color = '#ffffff';
	}
	if ( isset( $pricing_post_settings['heading_background_color'] ) ) {
		$heading_background_color = $pricing_post_settings['heading_background_color'];
	} else {
		$heading_background_color = '#962744';
	}
	if ( isset( $pricing_post_settings['background_hover_color'] ) ) {
		$background_hover_color = $pricing_post_settings['background_hover_color'];
	} else {
		$background_hover_color = '#ff4266';
	}
	if ( isset( $pricing_post_settings['currency_icon'] ) ) {
		$currency_icon = $pricing_post_settings['currency_icon'];
	} else {
		$currency_icon = '&#36';
	}
	if ( isset( $pricing_post_settings['button_color'] ) ) {
		$button_color = $pricing_post_settings['button_color'];
	} else {
		$button_color = '#962744';
	}
	if ( isset( $pricing_post_settings['button_heading_color'] ) ) {
		$button_heading_color = $pricing_post_settings['button_heading_color'];
	} else {
		$button_heading_color = '#ffffff';
	}
	if ( isset( $pricing_post_settings['button_hover_color'] ) ) {
		$button_hover_color = $pricing_post_settings['button_hover_color'];
	} else {
		$button_hover_color = '#ff4266';
	}
	if ( isset( $pricing_post_settings['feature_heading_text_color'] ) ) {
		$feature_heading_text_color = $pricing_post_settings['feature_heading_text_color'];
	} else {
		$feature_heading_text_color = '#ffffff';
	}
	if ( isset( $pricing_post_settings['feature_heading_background_color'] ) ) {
		$feature_heading_background_color = $pricing_post_settings['feature_heading_background_color'];
	} else {
		$feature_heading_background_color = '#b21a1a';
	}
	if ( isset( $pricing_post_settings['feature_background_hover_color'] ) ) {
		$feature_background_hover_color = $pricing_post_settings['feature_background_hover_color'];
	} else {
		$feature_background_hover_color = '#720202';
	}
	if ( isset( $pricing_post_settings['feature_button_color'] ) ) {
		$feature_button_color = $pricing_post_settings['feature_button_color'];
	} else {
		$feature_button_color = '#b21a1a';
	}
	if ( isset( $pricing_post_settings['feature_button_heading_color'] ) ) {
		$feature_button_heading_color = $pricing_post_settings['feature_button_heading_color'];
	} else {
		$feature_button_heading_color = '#ffffff';
	}
	if ( isset( $pricing_post_settings['feature_button_hover_color'] ) ) {
		$feature_button_hover_color = $pricing_post_settings['feature_button_hover_color'];
	} else {
		$feature_button_hover_color = '#720202';
	}
	if ( isset( $pricing_post_settings['apt_custom_css'] ) ) {
		$apt_custom_css = $pricing_post_settings['apt_custom_css'];
	} else {
		$apt_custom_css = '';
	}

	// number of tables
	if ( isset( $pricing_post_settings['total_cols'] ) ) {
		$total_cols = $pricing_post_settings['total_cols'];
	} else {
		$total_cols = 'col-md-4';
	}

	wp_enqueue_script( 'apt-bootstrap-min-js' );
	wp_enqueue_style( 'apt-pricing-frontend-bootstrap-css' );
	wp_enqueue_style( 'apt-all-css' );

	// fetch all pricing table
	$all_pricingtable = array(
		'p'         => $apt_id,
		'post_type' => 'abc-pricing',
		'orderby'   => 'ASC',
	);
	$pricing_loop     = new WP_Query( $all_pricingtable );
	$count            = count( $pricing_name );

	// foreach($pricing_name as $new_name){
	?>

	<div class="row abc-pricing">
	<?php
	for ( $apt_i = 0; $apt_i < $count; $apt_i++ ) {
		?>
	
		<style><?php echo $apt_custom_css; ?></style>
		<div class="<?php echo esc_attr( $total_cols ); ?>">			
			<?php
			if ( $pricing_loop->have_posts() ) {
				while ( $pricing_loop->have_posts() ) :
					$pricing_loop->the_post();

					if ( $pricing_table_design == 'template1' ) {
						$template_number = 'template1';
						include 'assets/css/template1.php'; }
					if ( $pricing_table_design == 'template2' ) {
						$template_number = 'template2';
						include 'assets/css/template2.php'; }
					if ( $pricing_table_design == 'template3' ) {
						$template_number = 'template3';
						include 'assets/css/template3.php'; }
					if ( $pricing_table_design == 'template4' ) {
						$template_number = 'template4';
						include 'assets/css/template4.php'; }

					if ( $pricing_table_design == 'template1' ) {
						?>
			
				<div class="pricingTable_<?php echo esc_attr( $apt_id ); ?> <?php
				if ( isset( $pricing_post_settings['featured_button'][ $apt_i ] ) ) {
					if ( $pricing_post_settings['featured_button'][ $apt_i ] == 'true' ) {
						echo 'active';}
				}
				?>
				">
						<div class="pricingTable-header_<?php echo esc_attr( $apt_id ); ?>">
							<span class="heading_<?php echo esc_attr( $apt_id ); ?>">
								<h3><?php echo esc_html( $pricing_name[ $apt_i ] ); ?></h3>
							</span>
							<span class="price-value_<?php echo esc_attr( $apt_id ); ?>">
								<?php
								if ( $currency_icon == 'nocurrency' ) {
									?>
									<?php
								} else {
									?>
									 <?php echo esc_html( $currency_icon ); ?><?php } ?><?php echo esc_html( $pricing_price[ $apt_i ] ); ?><span class="month_<?php echo esc_attr( $apt_id ); ?>"><?php echo esc_html( $pricing_plan[ $apt_i ] ); ?></span></span> 
						</div>
						<div class="pricingContent_<?php echo esc_attr( $apt_id ); ?>">
							<i class="<?php echo esc_attr( $pricing_post_settings['pricing_icon_pick'][ $apt_i ] ); ?>"></i>
							<ul>
								   <?php
									$icon_cross = '<i class="fas fa-times"></i>';
									$icon_right = '<i class="fas fa-check"></i>';
									if ( is_array( $pricing_features ) ) {
										$bits          = explode( "\n", $pricing_features[ $apt_i ] );
										$feature_count = count( $bits );
										for ( $j = 0; $j < $feature_count; $j++ ) {
											$bit = trim( $bits[ $j ] );
											if ( ! empty( $bit ) ) {
												?>
												<li style="text-align: center">
													<?php
													// change 0 and 1 to cross and right icon
													if ( strchr( 'cross', $bit ) ) {
														echo $icon_cross;
													} elseif ( strchr( 'right', $bit ) ) {
														echo  $icon_right;
													} else {
														echo  $bit; }
													?>
												</li>
												<?php
											}
										}
									}
									?>
							</ul>
						</div><!-- /  CONTENT BOX-->
						<div class="pricingTable-sign-up_<?php echo esc_attr( $apt_id ); ?>">
							<a href="<?php echo esc_url( $pricing_btn_url[ $apt_i ] ); ?>" class="btn btn-block_<?php echo esc_attr( $apt_id ); ?> btn-default"><i style="margin-right: 10px;" class="fas fa-shopping-cart"></i><?php echo esc_html( $pricing_btn_text[ $apt_i ] ); ?></a>
						</div>
					</div>
				
						<?php } elseif ( $pricing_table_design == 'template2' ) { ?>
		   
				<div class="pricingTable_<?php echo esc_attr( $apt_id ); ?> <?php
				if ( isset( $pricing_post_settings['featured_button'][ $apt_i ] ) ) {
					if ( $pricing_post_settings['featured_button'][ $apt_i ] == 'true' ) {
						echo 'active';}
				}
				?>
				">
					<div class="pricingTable-header_<?php echo esc_attr( $apt_id ); ?>">
						<span class="heading heading-background_<?php echo esc_attr( $apt_id ); ?>">
							<h3 class="heading_<?php echo esc_attr( $apt_id ); ?>">
							  <?php
								if ( isset( $pricing_name[ $apt_i ] ) ) {
									echo esc_html( $pricing_name[ $apt_i ] ); }
								?>
							</h3>
						</span>
						<span class="price-value_<?php echo esc_attr( $apt_id ); ?>">
							<?php
							if ( $currency_icon == 'nocurrency' ) {
								?>
								<?php
							} else {
								?>
								 <?php echo esc_html( $currency_icon ); ?><?php } ?>
							<span>
								<?php
								if ( isset( $pricing_price[ $apt_i ] ) ) {
									echo esc_html( $pricing_price[ $apt_i ] ); }
								?>
							</span>
							<span class="mo_<?php echo esc_attr( $apt_id ); ?>"><?php echo esc_html( $pricing_plan[ $apt_i ] ); ?></span>
						</span>
					</div>

					<div class="pricingContent">
						 <ul>
							<?php
								$icon_cross = '<i class="fas fa-times"></i>';
								$icon_right = '<i class="fas fa-check"></i>';
							if ( is_array( $pricing_features ) ) {
								$bits          = explode( "\n", $pricing_features[ $apt_i ] );
								$feature_count = count( $bits );
								for ( $j = 0; $j < $feature_count; $j++ ) {
									$bit = trim( $bits[ $j ] );
									if ( ! empty( $bit ) ) {
										?>
										<li><i class="fas fa-angle-double-right"></i>
										<?php
											// change 0 and 1 to cross and right icon
											if ( strchr( 'cross', $bit ) ) {
												echo $icon_cross;
											} elseif ( strchr( 'right', $bit ) ) {
												echo  $icon_right;
											} else {
												echo  $bit; }
										?>
										</li>
										<?php
									}
								}
							}
							?>
						</ul>
					</div><!-- /  CONTENT BOX-->

					<div class="pricingTable-sign-up_<?php echo esc_attr( $apt_id ); ?>">
						<a href="<?php echo esc_url( $pricing_btn_url[ $apt_i ] ); ?>" class="btn btn-block_<?php echo esc_attr( $apt_id ); ?> btn-default"><i style="margin-right: 10px; font-size: 17px;" class="fas fa-sign-in-alt"></i><?php echo esc_html( $pricing_btn_text[ $apt_i ] ); ?></a>
					</div><!-- BUTTON BOX-->
				</div>
					
				<?php } elseif ( $pricing_table_design == 'template3' ) { ?>
		   
					<div class="pricingTable_<?php echo esc_attr( $apt_id ); ?> <?php
					if ( isset( $pricing_post_settings['featured_button'][ $apt_i ] ) ) {
						if ( $pricing_post_settings['featured_button'][ $apt_i ] == 'true' ) {
							echo 'active';}
					}
					?>
					">
					<div class="pricingTable-header_<?php echo esc_attr( $apt_id ); ?>">
						<h3 class="headings_<?php echo esc_attr( $apt_id ); ?>"><?php echo esc_html( $pricing_name[ $apt_i ] ); ?></h3>
						<span class="price-value_<?php echo esc_attr( $apt_id ); ?>">
							<span class="currency_<?php echo esc_attr( $apt_id ); ?>">
								 <?php
									if ( $currency_icon == 'nocurrency' ) {
										?>
										<?php
									} else {
										?>
										 <?php echo esc_html( $currency_icon ); ?><?php } ?></span><?php echo esc_html( $pricing_price[ $apt_i ] ); ?>
							<span class="month_<?php echo esc_attr( $apt_id ); ?>"><?php echo esc_html( $pricing_plan[ $apt_i ] ); ?></span>
						</span>
					</div>
						<div class="pricing-content_<?php echo esc_attr( $apt_id ); ?>">
							<ul>
							   <?php
									$icon_cross = '<i class="fas fa-times"></i>';
									$icon_right = '<i class="fas fa-check"></i>';
								if ( is_array( $pricing_features ) ) {
									$bits          = explode( "\n", $pricing_features[ $apt_i ] );
									$feature_count = count( $bits );
									for ( $j = 0; $j < $feature_count; $j++ ) {
										$bit = trim( $bits[ $j ] );
										if ( ! empty( $bit ) ) {
											?>
											<li>
											<?php
												// change 0 and 1 to cross and right icon
												if ( strchr( 'cross', $bit ) ) {
													echo $icon_cross;
												} elseif ( strchr( 'right', $bit ) ) {
													echo  $icon_right;
												} else {
													echo  $bit; }
											?>
											</li>
											<?php
										}
									}
								}
								?>
							</ul>
						</div><!-- /  CONTENT BOX-->
						
						<a href="<?php echo esc_url( $pricing_btn_url[ $apt_i ] ); ?>" class="read_<?php echo esc_attr( $apt_id ); ?>"><?php echo esc_html( $pricing_btn_text[ $apt_i ] ); ?></a>
					</div>
					
				<?php } elseif ( $pricing_table_design == 'template4' ) { ?>
		   
					<div class="pricingTable_<?php echo esc_attr( $apt_id ); ?> <?php
					if ( isset( $pricing_post_settings['featured_button'][ $apt_i ] ) ) {
						if ( $pricing_post_settings['featured_button'][ $apt_i ] == 'true' ) {
							echo 'active';}
					}
					?>
					">
					<div class="pricingTable-header_<?php echo esc_attr( $apt_id ); ?>">
						<span class="heading_<?php echo esc_attr( $apt_id ); ?>">
							<h3><?php echo esc_html( $pricing_name[ $apt_i ] ); ?></h3>
						</span>
						<span class="price-value_<?php echo esc_attr( $apt_id ); ?>"><span class="currency_<?php echo esc_attr( $apt_id ); ?>">
							<?php
							if ( $currency_icon == 'nocurrency' ) { ?>
							<?php } else { ?>
							<?php echo esc_html( $currency_icon ); ?><?php } ?></span><?php echo esc_html( $pricing_price[ $apt_i ] ); ?><span class="mo_<?php echo esc_attr( $apt_id ); ?>"> <?php echo esc_html( $pricing_plan[ $apt_i ] ); ?></span></span>
					</div>
						
					<div class="pricingContent_<?php echo esc_attr( $apt_id ); ?>">
						<ul>
							<?php
								$icon_cross = '<i class="fas fa-times"></i>';
								$icon_right = '<i class="fas fa-check"></i>';
							if ( is_array( $pricing_features ) ) {
								$bits          = explode( "\n", $pricing_features[ $apt_i ] );
								$feature_count = count( $bits );
								for ( $j = 0; $j < $feature_count; $j++ ) {
									$bit = trim( $bits[ $j ] );
									if ( ! empty( $bit ) ) {
										?>
										<li>
										<?php
											// change 0 and 1 to cross and right icon
											if ( strchr( 'cross', $bit ) ) {
												echo $icon_cross;
											} elseif ( strchr( 'right', $bit ) ) {
												echo  $icon_right;
											} else {
												echo  $bit; }
										?>
										</li>
										<?php
									}
								}
							}
							?>
						</ul>
					</div><!-- /  CONTENT BOX-->
						<div class="pricingTable-sign-up_<?php echo esc_attr( $apt_id ); ?>">
							<a href="<?php echo esc_url( $pricing_btn_url[ $apt_i ] ); ?>" class="btn btn-block_<?php echo esc_attr( $apt_id ); ?> btn-default"><?php echo esc_html( $pricing_btn_text[ $apt_i ] ); ?></a>
						</div>
					</div>
				
			<?php } ?>
			<?php endwhile; ?>
		</div> 
			<?php
		}
	}
	?>
	</div>
	<?php
	wp_reset_query();
	return ob_get_clean();
} ?>
