<style>
.pricingTable_<?php echo esc_html( $apt_id ); ?> {
	margin-top: 10px;
	margin-bottom: 10px !important;
}	
.pricingTable_<?php echo esc_html( $apt_id ); ?> {
	text-align: center;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingTable-header_<?php echo esc_html( $apt_id ); ?> {
	background: <?php echo esc_attr( $heading_background_color ); ?>;
}
h3 {
	color: <?php echo esc_attr( $heading_text_color ); ?>;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>:hover .pricingTable-header_<?php echo esc_html( $apt_id ); ?> {
	background-color: <?php echo esc_attr( $background_hover_color ); ?>;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .heading_<?php echo esc_html( $apt_id ); ?> {
	display: block;
	padding-top: 25px;
}
.active .heading_<?php echo esc_html( $apt_id ); ?>  > h3{
	color: <?php echo esc_attr( $feature_heading_text_color ); ?>;
}
.active .pricingTable-header_<?php echo esc_html( $apt_id ); ?>  {	
	background: <?php echo esc_attr( $feature_heading_background_color ); ?>;
}
.active:hover .pricingTable-header_<?php echo esc_html( $apt_id ); ?>  {	
	background: <?php echo esc_attr( $feature_background_hover_color ); ?>;
}
.active:hover .pricingTable-header_<?php echo esc_html( $apt_id ); ?>  .heading_<?php echo esc_html( $apt_id ); ?> {
	background-color: <?php echo esc_attr( $feature_background_hover_color ); ?>!important;
}
.active .btn-block_<?php echo esc_html( $apt_id ); ?>  {
	background: <?php echo esc_attr( $feature_button_color ); ?> !important;
}
.active .btn-block_<?php echo esc_html( $apt_id ); ?>  {
	color: <?php echo esc_attr( $feature_button_heading_color ); ?> !important;
}
.active .btn-block_<?php echo esc_html( $apt_id ); ?>:hover {
	background-color: <?php echo esc_attr( $feature_button_hover_color ); ?> !important;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .heading_<?php echo esc_html( $apt_id ); ?>:after{
	content: "";
	border-top: 1px solid rgba(255, 255, 255 ,0.4);
	display: inline-block;
	width: 85%;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .heading_<?php echo esc_html( $apt_id ); ?>  > h3{
	margin: 0;
	font-size: 20px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .heading_<?php echo esc_html( $apt_id ); ?>  > span{
	font-size: 13px;
	margin-top: 5px;
	display: block;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .price-value_<?php echo esc_html( $apt_id ); ?> {
	padding-bottom: 25px;
	display: block;
	font-size: 34px;
	color: #fff;
}
.pricingTable-header_<?php echo esc_html( $apt_id ); ?>  > .price-value_<?php echo esc_html( $apt_id ); ?>  > .month_<?php echo esc_html( $apt_id ); ?> {
	font-size: 14px;
	display: inline-block;
	margin: 5px;
	
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .price-value_<?php echo esc_html( $apt_id ); ?>  > span{
	display: block;
	font-size: 14px;
	line-height: 20px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingContent_<?php echo esc_html( $apt_id ); ?> {
	background: #151515;
	color:#fefeff;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingContent_<?php echo esc_html( $apt_id ); ?>  > i{
	font-size: 60px;
	margin-top: 20px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingContent_<?php echo esc_html( $apt_id ); ?>  ul{
	list-style: none;
	padding: 0;
	margin-bottom: 0;
	text-align: left;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingContent_<?php echo esc_html( $apt_id ); ?>  ul li{
	padding: 12px 0;
	border-bottom: 1px solid #000;
	border-top: 1px solid #333;
	width: 85%;
	margin: 0 auto;
	color: #fff;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingContent_<?php echo esc_html( $apt_id ); ?>  ul li:first-child{
	border-top: 0px none;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingContent_<?php echo esc_html( $apt_id ); ?>  ul li:last-child{
	border-bottom: 0px none;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingContent_<?php echo esc_html( $apt_id ); ?>  ul li:before{
	font-family: 'FontAwesome';
	margin-right: 10px;
	color: <?php echo esc_attr( $heading_background_color ); ?>;
	transition:all 0.5s ease 0s;
}
.active .pricingContent_<?php echo esc_html( $apt_id ); ?>  ul li:before{
	color: <?php echo esc_attr( $feature_heading_background_color ); ?>;
}

.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingContent_<?php echo esc_html( $apt_id ); ?>  ul li:hover:before{
	margin-right: 20px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingTable-sign-up_<?php echo esc_html( $apt_id ); ?> {
	padding: 20px 0;
	background: #151515;
	color:#fff;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingTable-sign-up_<?php echo esc_html( $apt_id ); ?>  > span{
	margin-top: 10px;
	display: block;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .btn-block_<?php echo esc_html( $apt_id ); ?> {
	width: 50%;
	margin: 0 auto;
	border: 0px none;
	background: <?php echo esc_attr( $button_color ); ?>;
	color: <?php echo esc_attr( $button_heading_color ); ?>;
	padding: 10px;
	border-radius: 3px;
	font-size: 15px;
	transition:all 0.5s ease 0s;
	text-decoration:none !important;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?> .btn-block_<?php echo esc_html( $apt_id ); ?>:hover{
	border-radius: 12px;
	background-color: <?php echo esc_attr( $button_hover_color ); ?>;
	color: <?php echo esc_attr( $button_heading_color ); ?>;
}
@media screen and (max-width: 990px){
	.pricingTable_<?php echo esc_html( $apt_id ); ?> {
		margin-bottom: 20px;
	}
}
</style>
