<?php
class ParkKoExchange{
	private $arr_money = array(500,100,50,20,10);
	private $arr_exchange = array();
	function cal($money,$inputMoney){
		return json_encode($this->exchange($money,$inputMoney));
	}
	function exchange($money,$inputMoney){
		$check_input = $this->checkInput($money,$inputMoney);
		$exchange = $inputMoney-$money;
		$cal = $exchange;
		$cal_loop = '';
		
		while($cal>0){
			foreach($this->arr_money as $val){
				$cal_loop=$cal;
				while(($cal_loop-$val)>=0){
					if(($cal-$val)>=0){
						$this->arr_exchange[$val]++;
						$cal -=$val; 
						$cal_loop=$cal;
					}
				}
			}
		}
		return array('exchange'=>$exchange,'arr_exchange'=>$this->arr_exchange,'error'=>$check_input);
	}
	function checkInput($money,$inputMoney){
		if(!is_numeric($money)){
			$check = 'ค่าจอดรถ ต้องเป็นตัวเลขเท่านั้น';
		}else if(!is_numeric($inputMoney)){
			$check = 'จำนวณเงินที่รับ ต้องเป็นตัวเลขเท่านั้น';
		}else if($money>$inputMoney){
			$check = 'จำนวณเงินที่รับน้อยกว่า ค่าจอดรถ';
		}else{
			$check = 0;
		}
		return $check;
	}
}
?>
