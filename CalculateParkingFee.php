<?php
date_default_timezone_set('Asia/Bangkok');
class CalculateParkingFee{
	function calculateHour($checkin, $checkout){
		$time_checkin = strtotime ($checkin);
		$time_checkout = strtotime ($checkout);
		$diff_hour = $time_checkout - $time_checkin;
		return ceil($diff_hour / ( 60 * 60 ));
	}
	
	function calculateFeeNormalRate($parking_hour_normal){
		$parking_fee = 0;
		if ($parking_hour_normal  == 2 || $parking_hour_normal  == 3) {
			$parking_fee = 10;
		}
		if ($parking_hour_normal >3) {
			$parking_fee = 10 + (($parking_hour_normal-3)*20);
		}
		return $parking_fee;
	}
	
	function calculateFeeNightRate($parking_hour_night){
		return $parking_hour_night * 250;
	}
}
?>