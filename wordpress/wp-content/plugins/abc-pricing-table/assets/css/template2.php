<style>
.pricingTable_<?php echo esc_html( $apt_id ); ?> {
	text-align: center;
	border: 1px solid #dbdbdb;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.14);
	border-radius: 10px;
	margin-top: 10px;
	margin-bottom: 10px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>:hover .price-value_<?php echo esc_html( $apt_id ); ?> {
	transform: rotate(360deg);
	transition:0.6s ease;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  > .pricingTable-header_<?php echo esc_html( $apt_id ); ?>  {
		color: <?php echo esc_attr( $heading_text_color ); ?>;
	}
	h3 {
		color: <?php echo esc_attr( $heading_text_color ); ?>;
	}
	.heading-background_<?php echo esc_html( $apt_id ); ?>  {
		background: <?php echo esc_attr( $heading_background_color ); ?>;
	}
	.pricingTable_<?php echo esc_html( $apt_id ); ?>:hover .heading {
		background-color: <?php echo esc_attr( $background_hover_color ); ?>;
	}
	
	.btn-block_<?php echo esc_html( $apt_id ); ?>  {
		background: <?php echo esc_attr( $button_color ); ?> !important;
	}
	.pricingTable_<?php echo esc_html( $apt_id ); ?>  .btn-block_<?php echo esc_html( $apt_id ); ?>:hover {
		background-color:<?php echo esc_attr( $button_hover_color ); ?> !important;
	}
	.btn-block_<?php echo esc_html( $apt_id ); ?>  {
		color: <?php echo esc_attr( $button_heading_color ); ?> !important;
	}
	.pricingContent_<?php echo esc_html( $apt_id ); ?>  > ul > li:before{
		color: <?php echo esc_attr( $heading_background_color ); ?>;
	}

.pricingTable-header_<?php echo esc_html( $apt_id ); ?>  > .heading {
	display: block;
	padding: 7px 10px;
	border-radius: 10px 10px 0 0;
}
.active .pricingTable-header_<?php echo esc_html( $apt_id ); ?>  .heading_<?php echo esc_html( $apt_id ); ?>  {
	color: <?php echo esc_attr( $feature_heading_text_color ); ?>;
}
.active .heading-background_<?php echo esc_html( $apt_id ); ?>  {
	background: <?php echo esc_attr( $feature_heading_background_color ); ?>;
}
.active:hover .heading{
	background-color: <?php echo esc_attr( $feature_background_hover_color ); ?>;
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
.active .pricingContent_<?php echo esc_html( $apt_id ); ?>  > ul > li:before{
	color: <?php echo esc_attr( $feature_heading_background_color ); ?> !important;
}
	
.heading_<?php echo esc_html( $apt_id ); ?>  > h3{
	font-weight:bold;
	margin: 0; 
 }
.heading_<?php echo esc_html( $apt_id ); ?>  > .subtitle{
	font-size: 13px;
	margin-top: 3px;
	display: block;
}
.pricingTable-header_<?php echo esc_html( $apt_id ); ?>  > .price-value_<?php echo esc_html( $apt_id ); ?> {
	width: 120px;
	height: 120px;
	border-radius: 50%;
	border:2px solid #474747;
	display: block;
	margin: 0 auto;
	color:#474747;
	font-size: 17px;
	font-weight: 800;
	margin-top: 10px;
	padding: 20px 10px 0 10px;
	line-height: 35px;
}
.price-value_<?php echo esc_html( $apt_id ); ?>  > span{
	font-size: 20px;
}
.price-value_<?php echo esc_html( $apt_id ); ?>  > .mo_<?php echo esc_html( $apt_id ); ?> {
	display: inline-block;
	line-height: 0;
	padding-top: 13px;
	border-top: 1px solid #474747;
	letter-spacing: 2px;
	font-size: 13px;
	margin-top: -20px;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  > .pricingContent{
	margin: 10px 0 0 0;
}
.pricingContent > ul{
	padding: 0;
	list-style: none;
	margin-bottom: 0;
}
.pricingContent > ul > li{
	border-top: 1px solid #dbdbdb;
	padding: 10px 0;
	text-align: center;
	transition:0.4s ease-in-out;
}
.pricingContent > ul > li:hover{
	padding-left: 15px;
	transition:0.4s ease-in-out;
}
.pricingContent > ul > li:last-child{
	border-bottom: 1px solid #dbdbdb;
}
.pricingTable_<?php echo esc_html( $apt_id ); ?>  > .pricingTable-sign-up_<?php echo esc_html( $apt_id ); ?>  {
	padding: 25px 0;
}
.btn-block_<?php echo esc_html( $apt_id ); ?>  {
	width: 50% !important;
	margin: 0 auto;
	border:0px none;
	padding: 10px 5px;
	transition:0.3s ease;
	border-radius: 0px;
	font-size: 15px !important;
	text-decoration:none !important;
}

.btn-block_<?php echo esc_html( $apt_id ); ?> :hover{
	border-radius: 10px;
}
@media screen and (max-width: 990px){
	.pricingTable{
		margin-bottom: 20px;
	}
}
</style>
