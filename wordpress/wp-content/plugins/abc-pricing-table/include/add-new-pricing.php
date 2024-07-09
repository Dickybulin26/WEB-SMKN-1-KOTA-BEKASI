<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// js
wp_enqueue_script( 'apt-popper-min-js', APT_PLUGIN_URL . 'assets/js/popper.min.js', array( 'jquery' ), '2.0', true );
wp_enqueue_script( 'apt-bootstrap-min-js', APT_PLUGIN_URL . 'assets/js/bootstrap.min.js', array( 'jquery' ), '4.3.1', true );
wp_enqueue_script( 'apt-bootstrap-iconset-all-min-js', APT_PLUGIN_URL . 'assets/js/bootstrap-iconpicker-iconset-all.min.js', array( 'jquery' ), '1.10.0', true );
wp_enqueue_script( 'apt-bootstrap-iconpicker-min-js', APT_PLUGIN_URL . 'assets/js/bootstrap-iconpicker.min.js', array( 'jquery' ), '1.10.0', true );
wp_enqueue_script( 'apt-color-picker-js', APT_PLUGIN_URL . 'assets/js/apt-color-picker.js', array( 'wp-color-picker' ), false, true );
wp_enqueue_style ( 'wp-color-picker' );

// css
wp_enqueue_style( 'apt-bootstrap-css', APT_PLUGIN_URL . 'assets/css/pricing-admin-bootstrap.css', array(), '4.3.1' ); 
wp_enqueue_style( 'apt-bootstrap-iconpicker-css', APT_PLUGIN_URL . 'assets/css/bootstrap-iconpicker.min.css', array(), '1.10.0' ); 
wp_enqueue_style( 'apt-toogle-button-css', APT_PLUGIN_URL . 'assets/css/toogle-button.css'); 
wp_enqueue_style( 'apt-styles-css', APT_PLUGIN_URL . 'assets/css/styles.css'); 
wp_enqueue_style( 'metabox-css', APT_PLUGIN_URL . 'assets/css/metabox.css'); 
wp_enqueue_style( 'apt-all-css', APT_PLUGIN_URL . 'assets/css/all.css', array(), '5.15.2' ); 
wp_enqueue_style( 'team-setting-css', APT_PLUGIN_URL . 'assets/css/team-setting.css'); 

// code
$pricing_post_settings = get_post_meta( $post->ID, 'apt_pricing_table_data_' . $post->ID, true );

?>

<div class="col-lg-12 bhoechie-tab-container">
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
		<div class="list-group">
			<a href="#" class="list-group-item active text-center">
				<span class="dashicons dashicons-editor-table"></span><br/><?php esc_html_e( 'Add Pricing Table', 'abc-pricing-table' ); ?>
			</a>
			<a href="#" class="list-group-item text-center">
				<span class="dashicons dashicons-format-image"></span><br/><?php esc_html_e( 'Template Design', 'abc-pricing-table' ); ?>
			</a>
			<a href="#" class="list-group-item text-center">
				<span class="dashicons dashicons-admin-generic"></span><br/><?php esc_html_e( 'Config', 'abc-pricing-table' ); ?>
			</a>
			<a href="#" class="list-group-item text-center">
				<span class="dashicons dashicons-admin-appearance"></span><br/><?php esc_html_e( 'Color Settings', 'abc-pricing-table' ); ?>
			</a>
			<a href="#" class="list-group-item text-center">
				<span class="dashicons dashicons-admin-customizer"></span><br/><?php esc_html_e( 'Featured Color Settings', 'abc-pricing-table' ); ?>
			</a>
			<a href="#" class="list-group-item text-center">
				<span class="dashicons dashicons-media-code"></span><br/><?php esc_html_e( 'Custom CSS', 'abc-pricing-table' ); ?>
			</a>
		</div>
	</div>
	
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab">
		<div class="bhoechie-tab-content active">
			<div class="aad-btn text-center">
				<h3><?php esc_html_e( 'Click On Add Column To Add New Table', 'abc-pricing-table' ); ?></h3>
				<button type="button" id="pricing_appending" class="btn-default" onclick="return add_new_column()" aria-hidden="true"><span class="dashicons dashicons-plus icon_new"></span> <?php esc_html_e( 'ADD COLUMN', 'abc-pricing-table' ); ?></button>
				<button type="button" id="pricing_shortcode" class="btn-default" data-toggle="modal" data-target="#myModal"><span class="dashicons dashicons-arrow-right-alt icon_new_short"></span> <?php esc_html_e( 'GET SHORTCODE', 'abc-pricing-table' ); ?></button>
			</div>
			<div style="font-size: 20px"> <?php esc_html_e( 'Note:[Features] Type cross for (cross) icon', 'abc-pricing-table' ); ?> '<i class="fa fa-times"></i>'  <?php esc_html_e( 'and type (right) for right icon! ', 'abc-pricing-table' ); ?><i class="fa fa-check"></i>' </div> <p></p>
			<div id="pricing-container">
				<?php
				if ( is_array( $pricing_post_settings ) ) {
					$total_columns = count( $pricing_post_settings['pricing_name'] );
				} else {
					$total_columns = 0;
				}
				?>
				<input type="hidden" id="total_cols" name="total_cols" class="total_cols" value="<?php echo esc_attr( $total_columns ); ?>">
				<?php if ( is_array( $pricing_post_settings ) ) { for ( $apt_i = 0; $apt_i < $total_columns; $apt_i++ ) { ?>
				<div class="pri_main_div col-md-4 column_<?php echo esc_attr( $apt_i ); ?>">
					<div class="pri_head">
						<div class="switch-field em_size_field col-md-6" data-toggle="tooltip" data-placement="top" title="This table Will be Featured" aria-hidden="true">
							<?php
							if ( isset( $pricing_post_settings['featured_button'][ $apt_i ] ) ) {
								$featured_button = $pricing_post_settings['featured_button'][ $apt_i ];
							} else {
								$featured_button = 'false';
							}
							?>
							<input type="radio" name="featured_button[<?php echo esc_attr( $apt_i ); ?>]" id="featured_button1[<?php echo esc_attr( $apt_i ); ?>]" value="true" <?php if ( $featured_button == 'true' ) { echo 'checked=checked'; } ?> Featured>
							<label for="featured_button1[<?php echo esc_attr( $apt_i ); ?>]"><?php esc_html_e( 'Yes', 'abc-pricing-table' ); ?></label>
							<input type="radio" name="featured_button[<?php echo esc_attr( $apt_i ); ?>]" id="featured_button2[<?php echo esc_attr( $apt_i ); ?>]" value="false" <?php if ( $featured_button == 'false' ) { echo 'checked=checked';} ?> >
							<label for="featured_button2[<?php echo esc_attr( $apt_i ); ?>]"><?php esc_html_e( 'No', 'abc-pricing-table' ); ?></label>
						</div>
						<a data-toggle="tooltip" data-placement="top" title="Delete table" class="time" id="pri_delete" onclick="return delete_column('column_<?php echo esc_attr( $apt_i ); ?>')"><span class="dashicons dashicons-trash"></span></a>
						<input type="text" id="pricing_name[]" class="text" name="pricing_name[]" placeholder="<?php esc_html_e( 'Name', 'abc-pricing-table' ); ?>"  value="<?php echo esc_html( $pricing_post_settings['pricing_name'][ $apt_i ] ); ?>">
					</div>
					<ul>
						<li>
							<input type="text" id="pricing_price" name="pricing_price[]" class="text" placeholder="<?php esc_html_e( 'Pricing', 'abc-pricing-table' ); ?>" value="<?php echo esc_attr( $pricing_post_settings['pricing_price'][ $apt_i ] ); ?>">
						</li>
						<li>
							<input type="text" id="pricing_plan" name="pricing_plan[]" class="text" placeholder="<?php esc_html_e( 'Pricing Plan', 'abc-pricing-table' ); ?>" value="<?php echo esc_attr( $pricing_post_settings['pricing_plan'][ $apt_i ] ); ?>">
						</li>
						<li class="features">
							<textarea type="text" id="pricing_features" name="pricing_features[]" class="text" placeholder="<?php esc_html_e( 'Pricing Features', 'abc-pricing-table' ); ?>" rows="7"><?php echo esc_html( $pricing_post_settings['pricing_features'][ $apt_i ] ); ?></textarea>							</li>
						<li>
							<input type="text" id="pricing_btn_text" name="pricing_btn_text[]" class="text" placeholder="<?php esc_html_e( 'Button Text', 'abc-pricing-table' ); ?>" value="<?php echo esc_html( $pricing_post_settings['pricing_btn_text'][ $apt_i ] ); ?>">	
						</li>
						<li>
							<input type="text" id="pricing_btn_url" name="pricing_btn_url[]" class="text" placeholder="<?php esc_html_e( 'Button Url', 'abc-pricing-table' ); ?>" value="<?php echo esc_url( $pricing_post_settings['pricing_btn_url'][ $apt_i ] ); ?>">	
						</li>
					</ul>
				</div>
						<?php
					} // end of foreach
				} // end data check
				?>
			</div>	
		</div>	

		<!-- Setting-page-->
		<div class="bhoechie-tab-content">
			<h1><?php esc_html_e( 'Select Template Design', 'abc-pricing-table' ); ?></h1>
			<hr>
				<div id="pricing_table_template">
					<div class="row">
						<?php
						if ( isset( $pricing_post_settings['pricing_table_design'] ) ) {
							$pricing_table_design = $pricing_post_settings['pricing_table_design'];
						} else {
							$pricing_table_design = 'template1';
						}
						?>
						<div class="col-md-3">
							<input type="radio" name="pricing_table_design" id="pricing_table_design_one" value="template1" 
							<?php
							if ( $pricing_table_design == 'template1' ) {
								echo 'checked=checked';}
							?>
							 >
							<label for="pricing_table_design_one" class="pricing_layout_one"><img src="<?php echo esc_url(plugin_dir_url( __FILE__ ).'img/1.png'); ?>" style="box-shadow: 3px 2px 11px 0px #999;"></label> 
						</div>
						<div class="col-md-3">
							<input type="radio" name="pricing_table_design" id="pricing_table_design_two" value="template2" 
							<?php
							if ( $pricing_table_design == 'template2' ) {
								echo 'checked=checked';}
							?>
							 >
							<label for="pricing_table_design_two" class="pricing_layout_two" ><img src="<?php echo esc_url(plugin_dir_url( __FILE__ ).'img/2.png'); ?>" style="box-shadow: 3px 2px 11px 0px #999;">
							</label>
						</div>
						<div class="col-md-3">
							<input type="radio" name="pricing_table_design" id="pricing_table_design_three" value="template3" 
							<?php
							if ( $pricing_table_design == 'template3' ) {
								echo 'checked=checked';}
							?>
							>
							<label for="pricing_table_design_three" class="pricing_layout_three" ><img src="<?php echo esc_url(plugin_dir_url( __FILE__ ).'img/3.png'); ?>" style="box-shadow: 3px 2px 11px 0px #999;">
							</label>
						</div>
						<div class="col-md-3">
							<input type="radio" name="pricing_table_design" id="pricing_table_design_four" value="template4" 
							<?php
							if ( $pricing_table_design == 'template4' ) {
								echo 'checked=checked';}
							?>
							 >
							<label for="pricing_table_design_four" class="pricing_table_four" ><img src="<?php echo esc_url(plugin_dir_url( __FILE__ ).'img/4.png'); ?>" style="box-shadow: 3px 2px 11px 0px #999;">
							</label>
						</div>
					</div>
					<hr>
				</div>
				<div class="row pro-feature">
					<h1 style="color: red">Pro Version Templates</h1>
					<img src="<?php echo esc_url(plugin_dir_url( __FILE__ ).'img/set1.png'); ?>">
					<img src="<?php echo esc_url(plugin_dir_url( __FILE__ ).'img/set2.png'); ?>">
					<img src="<?php echo esc_url(plugin_dir_url( __FILE__ ).'img/set3.png'); ?>">
					<img src="<?php echo esc_url(plugin_dir_url( __FILE__ ).'img/set4.png'); ?>">
				</div>
		</div>
		
		<div class="bhoechie-tab-content">
			<h1><?php esc_html_e( 'Template & Icon Settings', 'abc-pricing-table' ); ?></h1>
			<hr>
			<div class="row">
				<div class="col-md-4">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Select Currency Icon.', 'abc-pricing-table' ); ?></h5>
						<p><?php esc_html_e( 'Select Currency Icon.', 'abc-pricing-table' ); ?></p> 
					</div>
				</div>
				<div class="col-md-8">
					<div class="ma_field p-4">
						<?php
						if ( isset( $pricing_post_settings['currency_icon'] ) ) {
							$currency_icon = $pricing_post_settings['currency_icon'];
						} else {
							$currency_icon = '&#36';
						}
						?>
						<select id="currency_icon" name="currency_icon" class="form-control" style="margin-left: 15px; width: 300px;">
							<option value="&#36" 
							<?php
							if ( $currency_icon == '$' ) {
								echo 'selected';}
							?>
							><?php esc_html_e( 'United States dollar ( $ )', 'abc-pricing-table' ); ?></option>
							<option value="€" 
							<?php
							if ( $currency_icon == '€' ) {
								echo 'selected';}
							?>
							><?php esc_html_e( 'Euro ( € )', 'abc-pricing-table' ); ?></option>
							<option value="¥" 
							<?php
							if ( $currency_icon == '¥' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Japanese yen ( ¥ )', 'abc-pricing-table' ); ?></option>
							<option value="Fr" 
							<?php
							if ( $currency_icon == 'Fr' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Swiss franc ( Fr )', 'abc-pricing-table' ); ?></option>
							<option value="INR" 
							<?php
							if ( $currency_icon == 'INR' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Indian rupee ( INR )', 'abc-pricing-table' ); ?></option>
							<option value="R$" 
							<?php
							if ( $currency_icon == 'R$' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Brazilian real ( R$ )', 'abc-pricing-table' ); ?></option>
							<option value="NIS" 
							<?php
							if ( $currency_icon == 'NIS' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Israeli new shekel ( NIS )', 'abc-pricing-table' ); ?></option>
							<option value="Kc" 
							<?php
							if ( $currency_icon == 'Kc' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Czech koruna ( Kc )', 'abc-pricing-table' ); ?></option>
							<option value="RM" 
							<?php
							if ( $currency_icon == 'RM' ) {
								echo 'selected=selected'; }
							?>
							><?php esc_html_e( 'Malaysian ringgit ( RM )', 'abc-pricing-table' ); ?></option>
							<option value="PHP" 
							<?php
							if ( $currency_icon == 'PHP' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Philippine peso ( PHP )', 'abc-pricing-table' ); ?></option>
							<option value="NT$" 
							<?php
							if ( $currency_icon == 'NT$' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'New Taiwan dollar ( NT$ )', 'abc-pricing-table' ); ?></option>
							<option value="THB" 
							<?php
							if ( $currency_icon == 'THB' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Thai baht ( THB )', 'abc-pricing-table' ); ?></option>
							<option value="t" 
							<?php
							if ( $currency_icon == 't' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Turkish lira ( t )', 'abc-pricing-table' ); ?></option>
							<option value="nocurrency" 
							<?php
							if ( $currency_icon == 'nocurrency' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'No Currency', 'abc-pricing-table' ); ?></option>
						</select>
					</div>
				</div>
			</div>
	
			<div class="row">
				<div class="col-md-4">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Columns Settings', 'abc-pricing-table' ); ?></h5>
						<p><?php esc_html_e( 'Pricing Columns Per Row.', 'abc-pricing-table' ); ?></p> 
					</div>
				</div>
				<div class="col-md-8">
					<div class="ma_field p-4">
						<?php
						if ( isset( $pricing_post_settings['total_cols'] ) ) {
							$total_cols = $pricing_post_settings['total_cols'];
						} else {
							$total_cols = 'col-md-4';
						}
						?>
						<select id="total_cols" name="total_cols" class="form-control" style="margin-left: 15px; width: 300px;">
							<option value="col-md-3" 
							<?php
							if ( $total_cols == 'col-md-3' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Columns 4', 'abc-pricing-table' ); ?></option>
							<option value="col-md-4" 
							<?php
							if ( $total_cols == 'col-md-4' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Columns 3', 'abc-pricing-table' ); ?></option>
							<option value="col-md-6" 
							<?php
							if ( $total_cols == 'col-md-6' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Columns 2', 'abc-pricing-table' ); ?></option>
							<option value="col-md-12" 
							<?php
							if ( $total_cols == 'col-md-12' ) {
								echo 'selected=selected';}
							?>
							><?php esc_html_e( 'Columns 1', 'abc-pricing-table' ); ?></option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="row pro-feature">
				<div class="col-md-4">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Heading Font Size', 'abc-pricing-table' ); ?> <span style="color:red; font-size: 20px;">(Pro)</span></h5>
						<p><?php esc_html_e( 'Pricing Heading Name Font Size.', 'abc-pricing-table' ); ?></p> 
					</div>
				</div>
				<div class="col-md-8">
					<div class="ma_field p-4">
						<input type="range" class="custom-range" id="apt_heading_size1" name="apt_heading_size" min="10" max="50" value="15" onchange="return display_range_value(this.id, this.value);">
						<span id="apt_heading_size1-value" class="badge badge-info pt-2 pb-2 pr-2 pl-2">15</span>
					</div>
				</div>
			</div>
			<div class="row pro-feature">
				<div class="col-md-4">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Feature Font Size', 'abc-pricing-table' ); ?> <span style="color:red; font-size: 20px;">(Pro)</span></h5>
						<p><?php esc_html_e( 'Pricing Table [Features] Font Size.', 'abc-pricing-table' ); ?></p> 
					</div>
				</div>
				<div class="col-md-8">
					<div class="ma_field p-4">
						<input type="range" class="custom-range" id="apt_feature_size1" name="apt_feature_size" min="10" max="50" value="15" onchange="return display_range_value(this.id, this.value);">
						<span id="apt_feature_size1-value" class="badge badge-info pt-2 pb-2 pr-2 pl-2">15</span>
					</div>
				</div>
			</div>
			<div class="row pro-feature">
				<div class="col-md-4">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Button Text Font Size', 'abc-pricing-table' ); ?> <span style="color:red; font-size: 20px;">(Pro)</span></h5>
						<p><?php esc_html_e( 'Pricing Button Text Font Size.', 'abc-pricing-table' ); ?></p> 
					</div>
				</div>
				<div class="col-md-8">
					<div class="ma_field p-4">
						<input type="range" class="custom-range" id="apt_button_size1" name="apt_button_size" min="10" max="50" value="15" onchange="return display_range_value(this.id, this.value);">
						<span id="apt_button_size1-value" class="badge badge-info pt-2 pb-2 pr-2 pl-2">15</span>
					</div>
				</div>
			</div>
			<div class="row pro-feature">
				<div class="col-md-4">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Open Link Tab', 'abc-pricing-table' ); ?><span style="color:red; font-size: 20px;">(Pro)</span></h5>
						<h5><?php esc_html_e( 'You can set link open in same tab or in new tab.', 'abc-pricing-table' ); ?></p> 
					</div>
				</div>
				<div class="col-md-8">
					<div class="ma_field p-4">
						<p class="switch-field em_size_field">
							<input type="radio" name="pricing_link_tab" id="pricing_link_tab1" value="_self" checked>
							<label for="pricing_link_tab1"><?php esc_html_e( 'Same', 'abc-pricing-table' ); ?></label>
							<input type="radio" name="pricing_link_tab" id="pricing_link_tab2" value="_blank">
							<label for="pricing_link_tab2"><?php esc_html_e( 'New', 'abc-pricing-table' ); ?></label>
						</p>
					</div>
				</div>
			</div>
			
			<div class="row pricing_iconpicker">
				<div class="col-md-4">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Icon Settings', 'abc-pricing-table' ); ?></h5>
						<p><?php esc_html_e( 'Select Pricing Header Icon ', 'abc-pricing-table' ); ?></p> 
					</div>
				</div>
				<div class="col-md-8">
					<div class="ma_field p-4" id="iconpicker-container">
						<?php
						if ( is_array( $pricing_post_settings ) ) {
							for ( $apt_i = 0; $apt_i < $total_columns; $apt_i++ ) {
						?>		
								<button type="button" value="" id="pricing_icon_pick[]" name="pricing_icon_pick[]" class="iconpick_<?php echo esc_attr( $apt_i ); ?> target_picker btn btn-default" data-iconset="fontawesome" data-icon="<?php echo esc_attr( $pricing_post_settings['pricing_icon_pick'][ $apt_i ] ); ?>" role="iconpicker"></button>
							<?php
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="bhoechie-tab-content">
			<h1><?php esc_html_e( 'Color Settings', 'abc-pricing-table' ); ?></h1>
			<hr>
			<div class="row">
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Heading Text Color', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ma_field">
						<?php
						if ( isset( $pricing_post_settings['heading_text_color'] ) ) {
							$heading_text_color = $pricing_post_settings['heading_text_color'];
						} else {
							$heading_text_color = '#ffffff';
						}
						?>
						<input type="text" id="heading_text_color" name="heading_text_color" value="<?php echo esc_attr( $heading_text_color ); ?>" default-color="<?php echo esc_attr( $heading_text_color ) ?>">
					</div>
				</div>
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Background Color', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ma_field">
						<?php
						if ( isset( $pricing_post_settings['heading_background_color'] ) ) {
							$heading_background_color = $pricing_post_settings['heading_background_color'];
						} else {
							$heading_background_color = '#962744';
						}
						?>
						<input type="text" id="heading_background_color" name="heading_background_color" value="<?php echo esc_attr( $heading_background_color ); ?>" default-color="<?php echo esc_attr( $heading_background_color ); ?>">
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Button Color', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ma_field">
						<?php
						if ( isset( $pricing_post_settings['button_color'] ) ) {
							$button_color = $pricing_post_settings['button_color'];
						} else {
							$button_color = '#962744';
						}
						?>
						<input type="text" id="button_color" name="button_color" value="<?php echo esc_attr( $button_color ); ?>" default-color="<?php echo esc_attr( $button_color ); ?>">
					</div>	
				</div>	
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Button Hover Color', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ma_field">
						<?php
						if ( isset( $pricing_post_settings['button_hover_color'] ) ) {
							$button_hover_color = $pricing_post_settings['button_hover_color'];
						} else {
							$button_hover_color = '#ff4266';
						}
						?>
						<input type="text" id="button_hover_color" name="button_hover_color" value="<?php echo esc_attr( $button_hover_color ); ?>" default-color="<?php echo esc_attr( $button_hover_color ); ?>">
					</div>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Background Hover Color', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ma_field">
						<?php
						if ( isset( $pricing_post_settings['background_hover_color'] ) ) {
							$background_hover_color = $pricing_post_settings['background_hover_color'];
						} else {
							$background_hover_color = '#ff4266';
						}
						?>
						<input type="text" id="background_hover_color" name="background_hover_color" value="<?php echo esc_attr( $background_hover_color ); ?>" default-color="<?php echo esc_attr( $background_hover_color ); ?>">
					</div>
				</div>
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Button Text Color', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ma_field">
						<?php
						if ( isset( $pricing_post_settings['button_heading_color'] ) ) {
							$button_heading_color = $pricing_post_settings['button_heading_color'];
						} else {
							$button_heading_color = '#ffffff';
						}
						?>
						<input type="text" id="button_heading_color" name="button_heading_color" value="<?php echo esc_attr( $button_heading_color ); ?>" default-color="<?php echo esc_attr( $button_heading_color ); ?>">
					</div>	
				</div>	
			</div>
			<div class="row pro-feature">
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Features Text Color', 'abc-pricing-table' ); ?> <span style="color:red; font-size: 20px;">(Pro)</span></h5>
					</div>
				</div>
				<div class="col-md-4 pro-disable">
					<div class="ma_field">
						<input type="text" id="apt_feature_color" name="apt_feature_color" value="" default-color="#000">
					</div>
				</div>
				<div class="col-md-2 pro-icon">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Icon Color', 'abc-pricing-table' ); ?> <span style="color:red; font-size: 20px;">(Pro)</span></h5>
					</div>
				</div>
				<div class="col-md-4 pro-icon pro-disable">
					<div class="ma_field">
						<input type="text" id="apt_icon_color" name="apt_icon_color" value="" default-color="#000">
					</div>
				</div>
			
			</div>
			
		</div>
		
		<div class="bhoechie-tab-content">
			<h1><?php esc_html_e( 'Featured Color Settings', 'abc-pricing-table' ); ?></h1>
			<hr>
			<div class="row">
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Heading Text Color', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ma_field">
						<?php
						if ( isset( $pricing_post_settings['feature_heading_text_color'] ) ) {
							$feature_heading_text_color = $pricing_post_settings['feature_heading_text_color'];
						} else {
							$feature_heading_text_color = '#ffffff';
						}
						?>
						<input type="text" id="feature_heading_text_color" name="feature_heading_text_color" value="<?php echo esc_attr( $feature_heading_text_color ); ?>" default-color="<?php echo esc_attr( $feature_heading_text_color ); ?>">
					</div>
				</div>
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Button Color', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ma_field">
						<?php
						if ( isset( $pricing_post_settings['feature_button_color'] ) ) {
							$feature_button_color = $pricing_post_settings['feature_button_color'];
						} else {
							$feature_button_color = '#b21a1a';
						}
						?>
						<input type="text" id="feature_button_color" name="feature_button_color" value="<?php echo esc_attr( $feature_button_color ); ?>" default-color="<?php echo esc_attr( $feature_button_color ); ?>">
					</div>	
				</div>	
				
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Background Color', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ma_field ">
						<?php
						if ( isset( $pricing_post_settings['feature_heading_background_color'] ) ) {
							$feature_heading_background_color = $pricing_post_settings['feature_heading_background_color'];
						} else {
							$feature_heading_background_color = '#b21a1a';
						}
						?>
						<input type="text" id="feature_heading_background_color" name="feature_heading_background_color" value="<?php echo esc_attr( $feature_heading_background_color ); ?>" default-color="<?php echo esc_attr( $heading_background_color ); ?>">
					</div>
				</div>
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Button Text Color', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ma_field">
						<?php
						if ( isset( $pricing_post_settings['feature_button_heading_color'] ) ) {
							$feature_button_heading_color = $pricing_post_settings['feature_button_heading_color'];
						} else {
							$feature_button_heading_color = '#ffffff';
						}
						?>
						<input type="text" id="feature_button_heading_color" name="feature_button_heading_color" value="<?php echo esc_attr( $feature_button_heading_color ); ?>" default-color="<?php echo esc_attr( $feature_button_heading_color ); ?>">		
					</div>	
				</div>	
			</div>
			
			<div class="row">
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Background Hover Color', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ma_field">
						<?php
						if ( isset( $pricing_post_settings['feature_background_hover_color'] ) ) {
							$feature_background_hover_color = $pricing_post_settings['feature_background_hover_color'];
						} else {
							$feature_background_hover_color = '#720202';
						}
						?>
						<input type="text" id="feature_background_hover_color" name="feature_background_hover_color" value="<?php echo esc_attr( $feature_background_hover_color ); ?>" default-color="<?php echo esc_attr( $feature_background_hover_color ); ?>">
					</div>
				</div>
			
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Button Hover Color', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ma_field">
						<?php
						if ( isset( $pricing_post_settings['feature_button_hover_color'] ) ) {
							$feature_button_hover_color = $pricing_post_settings['feature_button_hover_color'];
						} else {
							$feature_button_hover_color = '#720202';
						}
						?>
						<input type="text" id="feature_button_hover_color" name="feature_button_hover_color" value="<?php echo esc_attr( $feature_button_hover_color ); ?>" default-color="<?php echo esc_attr( $feature_button_hover_color ); ?>">
					</div>
				</div>
			</div>
			
			<div class="row pro-feature">
				<div class="col-md-2">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Features Text Color', 'abc-pricing-table' ); ?> <span style="color:red; font-size: 20px;">(Pro)</span></h5>
					</div>
				</div>
				<div class="col-md-4 pro-disable">
					<div class="ma_field">
						<input type="text" id="apt_featured_text_color" name="apt_featured_text_color" value="" default-color="#000">
					</div>
				</div>
				<div class="col-md-2 pro-icon">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Icon Color', 'abc-pricing-table' ); ?> <span style="color:red; font-size: 20px;">(Pro)</span></h5>
					</div>
				</div>
				<div class="col-md-4 pro-icon pro-disable">
					<div class="ma_field">
						<input type="text" id="apt_featured_icon_color" name="apt_featured_icon_color" value="" default-color="#000">
					</div>
				</div>
			</div>
		</div>
		<div class="bhoechie-tab-content">
			<h1><?php esc_html_e( 'Custom Css', 'abc-pricing-table' ); ?></h1>
			<hr>
			<div class="row">
				<div class="col-md-4">
					<div class="ma_field_discription">
						<h5><?php esc_html_e( 'Apply own css on Pricing Table and dont use style tag', 'abc-pricing-table' ); ?></h5>
					</div>
				</div>
				<div class="col-md-8">
					<div class="ma_field p-4">
						<?php
						if ( isset( $pricing_post_settings['apt_custom_css'] ) ) {
							$apt_custom_css = $pricing_post_settings['apt_custom_css'];
						} else {
							$apt_custom_css = '';
						}
						?>
						<textarea name="apt_custom_css" id="apt_custom_css" style="width: 50% !important; height: 150px;"><?php echo $apt_custom_css; ?></textarea>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>

	<!-- modal popup -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title Center"><?php esc_html_e( 'Copy the shortcode below and paste it wherever you want your pricing table to appear', 'abc-pricing-table' ); ?></h4>
				</div>
				<div class="modal-body center">
					<input type="text" name="abc-pricing-shortcode" id="abc-pricing-shortcode" value="<?php echo '[APT id=' . esc_attr( $post->ID ) . ']'; ?>" readonly style="height: 60px; text-align: center; font-size: 24px; width: 50%; border: 2px dashed;">
					<p></p>
					<input type="button" class="button button-primary" onclick="return ABCCopyShortcode();" readonly value="Copy Shortcode" />
					<span id="copy-msg" class="button button-primary" style="display:none; background-color:#32CD32; color:#FFFFFF; margin-left:4px; border-radius: 4px;">copied</span>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal"><?php esc_html_e( 'Close', 'abc-pricing-table' ); ?></button>
				</div>
			</div>
		</div>
	</div>

	<script>
		function ABCCopyShortcode() {
			var copyText = document.getElementById('abc-pricing-shortcode');
			copyText.select();
			document.execCommand('copy');
			
			//fade in and out copied message
			jQuery('#copy-msg').fadeIn('1000', 'linear');
			jQuery('#copy-msg').fadeOut(2500,'swing');
		}
	</script>
	
<!--js code-->
<script>

	var pricing_table_design = jQuery('input[name="pricing_table_design"]:checked').val();
	if(pricing_table_design == "template1") {
		jQuery(".pricing_iconpicker").show();
		jQuery(".pro-icon").show();
	}
	if(pricing_table_design == "template2") {
		jQuery(".pricing_iconpicker").hide();
		jQuery(".pro-icon").hide();
	}
	if(pricing_table_design == "template3") {
		jQuery(".pricing_iconpicker").hide();
		jQuery(".pro-icon").hide();
	}
	if(pricing_table_design == "template4") {
		jQuery(".pricing_iconpicker").hide();
		jQuery(".pro-icon").hide();
	}
		
	jQuery(document).ready(function(){
		jQuery('[data-toggle="tooltip"]').tooltip();  
		
		//toggle button on/off
		jQuery('input[name="pricing_table_design"]').change(function(){
			var pricing_table_design = jQuery('input[name="pricing_table_design"]:checked').val();
			
			if(pricing_table_design == "template1") {
				jQuery(".pricing_iconpicker").show();
				jQuery(".pro-icon").show();
			}
			
			if(pricing_table_design == "template2") {
				jQuery(".pricing_iconpicker").hide();
				jQuery(".pro-icon").hide();
			}
			
			if(pricing_table_design == "template3") {
				jQuery(".pricing_iconpicker").hide();
				jQuery(".pro-icon").hide();
			}
			
			if(pricing_table_design == "template4") {
				jQuery(".pricing_iconpicker").hide();
				jQuery(".pro-icon").hide();
			}

		});
		
	});
	
	//color-picker
	(function( jQuery ) {
		jQuery(function() {
			// Add Color Picker 
			jQuery('#heading_text_color').wpColorPicker();
			jQuery('#heading_background_color').wpColorPicker();
			jQuery('#background_hover_color').wpColorPicker();
			jQuery('#button_color').wpColorPicker();
			jQuery('#button_heading_color').wpColorPicker();
			jQuery('#button_hover_color').wpColorPicker();
			jQuery('#apt_feature_color').wpColorPicker();
			jQuery('#apt_icon_color').wpColorPicker();
				//featured color
			jQuery('#feature_heading_text_color').wpColorPicker();
			jQuery('#feature_heading_background_color').wpColorPicker();
			jQuery('#feature_background_hover_color').wpColorPicker();
			jQuery('#feature_button_color').wpColorPicker();
			jQuery('#feature_button_heading_color').wpColorPicker();
			jQuery('#feature_button_hover_color').wpColorPicker();
			jQuery('#apt_featured_text_color').wpColorPicker();
			jQuery('#apt_featured_icon_color').wpColorPicker();
			
		});
	})( jQuery );
	
	jQuery(document).ajaxComplete(function() {
		jQuery('#heading_text_color, heading_background_color, button_color, button_heading_color, background_hover_color, button_hover_color, feature_heading_text_color, feature_heading_background_color, feature_background_hover_color, feature_button_color, feature_button_heading_color, apt_feature_color, apt_icon_color, apt_featured_icon_color, apt_featured_text_color, feature_button_hover_color').wpColorPicker();
	});
	// function generate new cloumn
	function add_new_column() {
		var total_cols = jQuery('#total_cols').val();
		var columns_class_name = "column_" + total_cols;
		var iconpick_class_name = "iconpick_" + total_cols;
		var new_col_html = ''+
		'<div id="columns[]" class="pri_main_div col-md-4 '+columns_class_name+'">' +
			'<div class="pri_head">' +
				'<div class="switch-field em_size_field col-md-6" data-toggle="tooltip" data-placement="top" title="This Table Will Be Featured" aria-hidden="true">' +
					'<input type="radio" name="featured_button['+total_cols+']" id="featured_button1['+total_cols+']" value="true" >' +
						'<label for="featured_button1['+total_cols+']"><?php esc_html_e( "Yes", "abc-pricing-table" ); ?></label>' +
					'<input type="radio" name="featured_button['+total_cols+']" id="featured_button2['+total_cols+']" value="false" checked >' +
						'<label for="featured_button2['+total_cols+']"><?php esc_html_e( "No", "abc-pricing-table" ); ?></label>' +
				'</div>' +	
				'<a data-toggle="tooltip" data-placement="top" title="Delete table" class="time" id="pri_delete" onclick=delete_column("'+columns_class_name+'");><span class="dashicons dashicons-trash"></span></a>' +	
				'<input type="text" id="pricing_name" class="text" name="pricing_name[]" placeholder="<?php esc_html_e( "Name", "abc-pricing-table" ); ?>" value="">' +
			'</div>' +
			'<ul>' +
				'<li>' +
					'<input type="text" id="pricing_price[]" name="pricing_price[]"" class="text" placeholder="<?php esc_html_e( 'Pricing', "abc-pricing-table" ); ?>" value="">' +
				'</li>' +
				'<li>' +
					'<input type="text" id="pricing_plan[]" name="pricing_plan[]" class="text" placeholder="<?php esc_html_e( 'Pricing Plan', "abc-pricing-table" ); ?>" value="">' +
				'</li>' +
				'<li class="features">' +
					'<textarea type="text" id="pricing_features[]" name="pricing_features[]" class="text" placeholder="<?php esc_html_e( 'Pricing Features', 'abc-pricing-table' ); ?>" rows="7"></textarea>' +
				'</li>' +
				'<li>' +
					'<input type="text" id="pricing_btn_text[]" name="pricing_btn_text[]" class="text" placeholder="<?php esc_html_e( 'Button Text', 'abc-pricing-table' ); ?>" value="">' +
				'</li>' +
				'<li>' +
					'<input type="text" id="pricing_btn_url[]" name="pricing_btn_url[]" class="text" placeholder="<?php esc_html_e( 'Button Url', 'abc-pricing-table' ); ?>" value="">' +
				'</li>' +
			'</ul>' +
		'</div>';
		
		var new_icon_picker = '<button type="button" value="" id="pricing_icon_pick[]" name="pricing_icon_pick[]" class="'+iconpick_class_name+' '+columns_class_name+' target_picker btn btn-default" data-iconset="fontawesome" data-icon="fa-wifi" role="iconpicker"></button>';
		
		jQuery('#iconpicker-container').append(new_icon_picker);
		
		jQuery('#pricing-container').append(new_col_html);
		
		var total_cols = parseInt(jQuery('#total_cols').val());
		jQuery('#total_cols').val(total_cols + 1);
		jQuery('[data-toggle="tooltip"]').tooltip();
		jQuery('.target_picker').iconpicker();
	}
	
	// delete button
	function delete_column(col_id){
		if (confirm('Are sure to delete this columns from table?')) {
			jQuery( "."+ col_id ).fadeOut( 1000, function() {
				jQuery( "."+ col_id ).remove();
				var total_cols = parseInt(jQuery('#total_cols').val());
				//jQuery('#total_cols').val(total_cols - 1);
			});
		}
	}
	
	var alwselectedlayout = jQuery('[name=pricing_table_design]:checked').val();
	if(alwselectedlayout == 'template1') {
		jQuery('.pricing_layout_one').addClass('team_layout'); 	
		
	} else {
		jQuery('.pricing_layout_one').removeClass('team_layout');	
	}
		
	if(alwselectedlayout == 'template2') {
		jQuery('.pricing_layout_two').addClass('team_layout'); 
		
		
	} else {
		jQuery('.pricing_layout_two').removeClass('team_layout');
	}
	
	if(alwselectedlayout == 'template3') {
		jQuery('.pricing_layout_three').addClass('team_layout'); 
		
	} else {
		jQuery('.pricing_layout_three').removeClass('team_layout'); 
	}
	if(alwselectedlayout == 'template4') {
		jQuery('.pricing_table_four').addClass('team_layout'); 
		
	} else {
		jQuery('.pricing_table_four').removeClass('team_layout'); 
	}
			
	jQuery(document).ready(function() {
		jQuery('input[type=radio][name=pricing_table_design]').change(function() {
			var alwselectedlayout = jQuery('[name=pricing_table_design]:checked').val();
			
			if(alwselectedlayout == 'template1') {
				jQuery('.pricing_layout_one').addClass('team_layout');	
				jQuery('#heading_text_color').iris('color', '#ffffff');
				jQuery('#heading_background_color').iris('color', '#962744');
				jQuery('#background_hover_color').iris('color', '#ff4266');
				jQuery('#button_color').iris('color', '#962744');
				jQuery('#button_heading_color').iris('color', '#ffffff');
				jQuery('#button_hover_color').iris('color', '#ff4266');
			} else {
				jQuery('.pricing_layout_one').removeClass('team_layout'); 
			}
			
			if(alwselectedlayout == 'template2') {
				jQuery('.pricing_layout_two').addClass('team_layout'); 
				jQuery('#heading_text_color').iris('color', '#ffffff');
				jQuery('#heading_background_color').iris('color', '#F26547');
				jQuery('#background_hover_color').iris('color', '#F28168');
				jQuery('#button_color').iris('color', '#F26547');
				jQuery('#button_heading_color').iris('color', '#ffffff');
				jQuery('#button_hover_color').iris('color', '#F28168');
			} else {
				jQuery('.pricing_layout_two').removeClass('team_layout'); 
			}
			
			if(alwselectedlayout == 'template3') {
				jQuery('.pricing_layout_three').addClass('team_layout'); 
				jQuery('#heading_text_color').iris('color', '#ffffff');
				jQuery('#heading_background_color').iris('color', '#1E73BE');
				jQuery('#background_hover_color').iris('color', '#4D4D4D');
				jQuery('#button_color').iris('color', '#1E73BE');
				jQuery('#button_heading_color').iris('color', '#ffffff');
				jQuery('#button_hover_color').iris('color', '#4D4D4D');
			} else {
				jQuery('.pricing_layout_three').removeClass('team_layout'); 
			}
			
			if(alwselectedlayout == 'template4') {
				jQuery('.pricing_table_four').addClass('team_layout'); 
				jQuery('#heading_text_color').iris('color', '#ffffff');
				jQuery('#heading_background_color').iris('color', '#1ABC9C');
				jQuery('#background_hover_color').iris('color', '#1ABC9C');
				jQuery('#button_color').iris('color', '#1ABC9C');
				jQuery('#button_heading_color').iris('color', '#ffffff');
				jQuery('#button_hover_color').iris('color', '#1ABC9C');
			} else {
				jQuery('.pricing_table_four').removeClass('team_layout'); 
			}
			
		});
	});

// range bar value display
function display_range_value(id, value) {
	var slider = document.getElementById(id);
	var output = document.getElementById(id+"-value");
	output.innerHTML = slider.value; // display the default value

	// Update the current slider value (each time you drag the slider handle)
	slider.oninput = function() {
		output.innerHTML = this.value;
	}
}
	
	// tab
	jQuery("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
		e.preventDefault();
		jQuery(this).siblings('a.active').removeClass("active");
		jQuery(this).addClass("active");
		var index = jQuery(this).index();
		jQuery("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
		jQuery("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
	});
	
</script>
