<?php
require_once(__DIR__."/../CalculateParkingFee.php");
class CalculateParkingFeeSpec extends PHPUnit_Framework_TestCase{
	var $parkingHourNormal;
	var $parkingHourNight;
	
	function setup() {
		$this->parkingHour = new CalculateParkingFee();
		$this->parkingHourNormal = new CalculateParkingFee();
		$this->parkingHourNight = new CalculateParkingFee();
	}
	
	function test_Hour_1() {
		$this->assertEquals(1, $this->parkingHourNormal->calculateHour('2006-04-12 12:30:00', '2006-04-12 13:30:00'));
	}
	
	function test_Hour_1_30() {
		$this->assertEquals(2, $this->parkingHourNormal->calculateHour('2006-04-12 12:30:00', '2006-04-12 14:00:00'));
	}
	
	function test_1_0() {
		$this->assertEquals(0, $this->parkingHourNormal->CalculateFeeNormalRate(1));
	}
	
	function test_2_10() {
		$this->assertEquals(10, $this->parkingHourNormal->CalculateFeeNormalRate(2));
	}
	
	function test_3_10() {
		$this->assertEquals(10, $this->parkingHourNormal->CalculateFeeNormalRate(3));
	}
	
	function test_4_30() {
		$this->assertEquals(30, $this->parkingHourNormal->CalculateFeeNormalRate(4));
	}
	
	function test_1_250() {
		$this->assertEquals(250, $this->parkingHourNight->CalculateFeeNightRate(1));
	}
}
?>