<style>
.pricingTable_<?php echo esc_html( $apt_id ); ?>  {
	margin-top: 10px;
	margin-bottom: 10px !important;
}	
.pricingTable_<?php echo esc_html( $apt_id ); ?> {
	text-align: center;
	border: 2px #F5F5F5 solid;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingTable-header_<?php echo esc_html( $apt_id ); ?> {
	padding: 30px 0;
	background: <?php echo esc_attr( $heading_background_color ); ?>;
	position: relative;
	transition: all 0.3s ease 0s;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>:hover .pricingTable-header_<?php echo esc_html( $apt_id ); ?> {
	background: <?php echo esc_attr( $background_hover_color ); ?>;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingTable-header_<?php echo esc_html( $apt_id ); ?>:before,
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingTable-header_<?php echo esc_html( $apt_id ); ?>:after{
	content: "";
	width: 16px;
	height: 16px;
	border-radius: 50%;
	border: 1px solid #d9d9d8;
	position: absolute;
	bottom: 12px;
}
.active .headings_<?php echo esc_html( $apt_id ); ?> ,
.active .price-value_<?php echo esc_html( $apt_id ); ?>  {
	color: <?php echo esc_attr( $feature_heading_text_color ); ?>!important;
	color: <?php echo esc_attr( $feature_heading_text_color ); ?>!important;
}
.active .pricingTable-header_<?php echo esc_html( $apt_id ); ?> {
	background: <?php echo esc_attr( $feature_heading_background_color ); ?>;
}
.active:hover .pricingTable-header_<?php echo esc_html( $apt_id ); ?> {
	background: <?php echo esc_attr( $feature_background_hover_color ); ?>;
}
.active:hover .pricing-content_<?php echo esc_html( $apt_id ); ?>  ul:before,
.active:hover .pricing-content_<?php echo esc_html( $apt_id ); ?>  ul:after{
	background: linear-gradient(to bottom, <?php echo esc_attr( $feature_background_hover_color ); ?> 50%, <?php echo esc_attr( $feature_background_hover_color ); ?> 50%) !important;
}
.active .read_<?php echo esc_html( $apt_id ); ?>  {
	background: <?php echo esc_attr( $feature_button_color ); ?> !important;
	color:<?php echo esc_attr( $feature_button_heading_color ); ?> !important;
}
.active:hover .read_<?php echo esc_html( $apt_id ); ?>  {
	background-color: <?php echo esc_attr( $feature_button_hover_color ); ?> !important;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingTable-header_<?php echo esc_html( $apt_id ); ?>:before{
	left: 40px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricingTable-header_<?php echo esc_html( $apt_id ); ?>:after{
	right: 40px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .headings_<?php echo esc_html( $apt_id ); ?> {
	font-size: 20px;
	color: <?php echo esc_attr( $heading_text_color ); ?>;
	letter-spacing: 2px;
	margin-top: 0;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .price-value_<?php echo esc_html( $apt_id ); ?> {
	display: inline-block;
	position: relative;
	font-size: 50px;
	font-weight: bold;
	color: <?php echo esc_attr( $heading_text_color ); ?>;
	transition: all 0.3s ease 0s;
}
h3 {
	color: <?php echo esc_attr( $heading_text_color ); ?>;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>:hover .price-value_<?php echo esc_html( $apt_id ); ?> ,
.pricingTable_<?php echo esc_html( $apt_id ); ?>:hover .headings_<?php echo esc_html( $apt_id ); ?> {
	color: #fff;
}
.active:hover .price-value_<?php echo esc_html( $apt_id ); ?> ,
.active:hover .headings_<?php echo esc_html( $apt_id ); ?>  {
	color: #fff !important;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .currency_<?php echo esc_html( $apt_id ); ?> {
	font-size: 30px;
	font-weight: bold;
	position: absolute;
	top: 6px;
	left: -19px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .month_<?php echo esc_html( $apt_id ); ?> {
	font-size: 14px;
	color: #fff;
	position: absolute;
	bottom: 3px;
	-webkit-margin-start: 0.5em;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricing-content_<?php echo esc_html( $apt_id ); ?> {
	padding-top: 50px;
	background: #fff;
	position: relative;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricing-content_<?php echo esc_html( $apt_id ); ?>:before,
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricing-content_<?php echo esc_html( $apt_id ); ?>:after{
	content: "";
	width: 16px;
	height: 16px;
	border-radius: 50%;
	border: 1px solid #7c7c7c;
	position: absolute;
	top: 12px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricing-content_<?php echo esc_html( $apt_id ); ?>:before{
	left: 40px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricing-content_<?php echo esc_html( $apt_id ); ?>:after{
	right: 40px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricing-content_<?php echo esc_html( $apt_id ); ?>  ul{
	padding: 0 20px;
	margin: 0;
	list-style: none;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricing-content_<?php echo esc_html( $apt_id ); ?>  ul:before,
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricing-content_<?php echo esc_html( $apt_id ); ?>  ul:after{
	content: "";
	width: 8px;
	height: 46px;
	border-radius: 3px;
	background: linear-gradient(to bottom,#818282 50%,#727373 50%);
	position: absolute;
	top: -22px;
	z-index: 1;
	box-shadow: 0 0 5px #707070;
	transition: all 0.3s ease 0s;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>:hover .pricing-content_<?php echo esc_html( $apt_id ); ?>  ul:before,
.pricingTable_<?php echo esc_html( $apt_id ); ?>:hover .pricing-content_<?php echo esc_html( $apt_id ); ?>  ul:after{
	background: linear-gradient(to bottom, <?php echo esc_attr( $background_hover_color ); ?> 50%, <?php echo esc_attr( $background_hover_color ); ?> 50%);
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricing-content_<?php echo esc_html( $apt_id ); ?>  ul:before{
	left: 44px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricing-content_<?php echo esc_html( $apt_id ); ?>  ul:after{
	right: 44px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricing-content_<?php echo esc_html( $apt_id ); ?>  ul li{
	font-size: 15px;
	font-weight: bold;
	color: #777473;
	padding: 10px 0;
	border-bottom: 1px solid #d9d9d8;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .pricing-content_<?php echo esc_html( $apt_id ); ?>  ul li:last-child{
	border-bottom: none;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .read_<?php echo esc_html( $apt_id ); ?> {
	display: inline-block;
	font-size: 15px;
	color: <?php echo esc_attr( $button_heading_color ); ?>;
	text-decoration:none !important;
	background: <?php echo esc_attr( $button_color ); ?>;
	padding: 8px 25px;
	margin: 30px 0;
	transition: all 0.3s ease 0s;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  .read_<?php echo esc_html( $apt_id ); ?>:hover{
	text-decoration: none;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>:hover .read_<?php echo esc_html( $apt_id ); ?> {
	background: <?php echo esc_attr( $button_hover_color ); ?>;
}
@media screen and (max-width: 990px){
	.pricingTable_<?php echo esc_html( $apt_id ); ?> { margin-bottom: 25px; }
}
</style>
