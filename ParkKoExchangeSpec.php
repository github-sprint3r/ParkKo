<?php
require_once('ParkKoExchange.php');
class ParkKoExchangeSpec extends PHPUnit_Framework_TestCase{
	
	function test(){
		$obj = new ParkKoExchange();
		$exchenge = json_decode($obj->cal(10,1000),true);
		$this->assertEquals(990,$exchenge[exchange]);
		
		$exchenge = json_decode($obj->cal(10,10),true);
		$this->assertEquals(0,$exchenge[exchange]);
		
		$exchenge = json_decode($obj->cal(250,300),true);
		$this->assertEquals(50,$exchenge[exchange]);
		
		$exchenge = json_decode($obj->cal(250,'sss'),true);
		$this->assertEquals('จำนวณเงินที่รับ ต้องเป็นตัวเลขเท่านั้น',$exchenge[error]);
	}
	
//./vendor/bin/phpunit --colors NumRomanSpec.php	
//$this->assertTrue(false);
}
?>
