<?php

/**
 * Plugin Name: Date Validation
 * Plugin URI: http://my-dev.pro
 * Author: MY-Dev | Mohamed Youssef
 * Author URI: https://my-dev.pro
 * Description: Validate date inputs based on server time
 * Version: 1.0.2
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * license: GPLv2 or later
 * Text Domain: my-dev-date-validation
 * Domain Path: /lang
 */

if ( ! defined( 'ABSPATH' ) ) exit();

if ( ! function_exists( 'my_dev_confirm_date_input' ) ) {

	function my_dev_confirm_date_input() {

		$today_date = date('Y-m-d');
		?>
			<div id="my-dev-container" hidden><?php echo $today_date; ?></div>
		<?php
	
		echo "<script>var today = new Date();
		dateToday = today.getFullYear() + '-' + ('0' + (today.getMonth()+1)).slice(-2) + '-' + today.getDate();
		var dateValue = document.querySelector('#my-dev-container').textContent;
		
		if ( dateValue == dateToday ) {
			jQuery('input[type=date]').attr('min', dateToday);
		}
		
		if ( ((dateToday) - (dateValue)) > 1 ) {
			jQuery('input[type=date]').attr('min', dateValue);
		}
		</script>";
	}

	add_action( 'wp_footer', 'my_dev_confirm_date_input' );


}