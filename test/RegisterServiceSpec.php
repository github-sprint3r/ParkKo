<?php 
	require_once 'registerService.php';
	class RegisterServiceSpec extends PHPUnit_Framework_TestCase{
		var $input;
		function setup(){
			$this->input = new parkKoRegisterService();
		}
		// function test_insertData(){
		// 	$this->input->startConnect();
		// 	$field = array('id','fist_name','gender','last_name','link','local','name','timezone','updated_time','verified','type_api','timeupdate');
		// 	$updated_time = date("Y-m-d H:i:s");
		// 	$data = array('3243','John','male','Dooe','www.sdfsdf','th','John Dooe','7','2014-04-30T11:07:29+0000','false',1,$updated_time);
		// 	$result = $this->input->insert($field, $data)->save();
		// 	$this->assertTrue($result);
		// }
		function test_2(){
			$this->input->startConnect();
			$this->input->dataQuery('fist_name',"WHERE fist_name ='John'")->parseQueryToJson();
			$data = $this->input->parseJsonToObject();
			$this->assertEquals('John',$data[0]->{'fist_name'});
		}
	}
?>