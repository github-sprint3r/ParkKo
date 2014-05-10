<?php
//
require_once 'ParkKoExchange.php';
$payment = new ParkKoExchange();
if(isset($_POST['submit'])){
	$exchenge = json_decode($payment->cal($_POST['cost'],$_POST['payment']),true);
}

if(isset($_POST['submit_1'])){
	$sql_insert = "UPDATE car_parking SET
						money_receive='{$_POST[payment_1]}',
						money_change='{$_POST[money_change]}'
						WHERE park_id='1' ";
	$result_insert = mysql_query($sql_insert);
	if($result_insert){
		echo '<script>alert("บันทึกข้อมูลเรียบร้อย");</script>';
	}else{
		echo '<script>alert("ไม่สามารถบันทึกข้อมูลได้");</script>'; 
	}
}

$sql_data="SELECT
car_parking.parking_fee,
money_receive
FROM `car_parking` 
WHERE car_parking.park_id='1' ";
$result_data=mysql_query($sql_data);
list($parking_fee,$money_receive)=mysql_fetch_row($result_data);
if(!isset($_POST['submit'])){
	$exchenge = json_decode($payment->cal($parking_fee,$money_receive),true);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

	<div style="float:left; width:100%; height:auto; padding:10px;">
	<font color="#8899a6"><strong>ชำระค่าที่จอดรถ</strong></font>
    </div>
    <hr />
    <div style="float:left; width:97%; height:auto; padding:10px;">
    <form name="form1" id="form1" action="" method="post">
	<fieldset>
    <legend>จ่ายค่าจอดรถ</legend>
	<table width="90%">
    	<tbody>
        	<tr>
            	<td width="30%" align="right">ค่าจอดรถ : </td>
                <td><input type="text" id="cost" name="cost" value="<?php echo (isset($_POST['cost']))?$_POST['cost']:$parking_fee;?>" autocomplete="off" style="text-align:right; width:100px;" /> บาท</td>
            </tr>
            <tr>
            	<td width="30%" align="right">จำนวนเงินที่รับ : </td>
                <td><input type="text" id="payment" name="payment" value="<?php echo (isset($_POST['payment']))?$_POST['payment']:$money_receive;?>" autocomplete="off"  style="text-align:right; width:100px;" /> บาท</td>
            </tr>
            <tr>
            	<td width="30%" align="right"></td>
                <td><input type="submit" name="submit" id="submit" value="คำนวณ" style="width:100px;" /></td>
            </tr>
        </tbody>
    </table>
    </fieldset>
    </form>
    <br />
    <form name="form2" id="form2" action="" method="post">
    <fieldset>
    <legend>คำนวณค่าใช้จ่าย/เงินทอน</legend>
    <?php if($exchenge['error']!=''){ ?>
    <table width="90%">
    	<tbody>
        	<tr>
            	<td width="30%" align="right">พบปัญหา : </td>
                <td align="left"> <?php echo $exchenge['error'];?></td>
            </tr>
		</tbody>
	</table>
    <?php }else{ ?>
	<table width="90%">
    	<tbody>
        	<tr>
            	<td width="30%" align="right">จำนวนเงินทอน : </td>
                <td align="right"> <?php echo (isset($exchenge['exchange']))?number_format($exchenge['exchange'],2):'0.00';?></td>
                <td width="50%"> บาท</td>
            </tr>
            <tr>
            	<td align="right">แบงค์ 500 : </td>
                <td align="right"> <?php echo (isset($exchenge['arr_exchange']['500']))?$exchenge['arr_exchange']['500']:0; ?></td>
                <td> ฉบับ</td>
            </tr>
            <tr>
            	<td align="right">แบงค์ 100 : </td>
                <td align="right"> <?php echo (isset($exchenge['arr_exchange']['100']))?$exchenge['arr_exchange']['100']:0; ?></td>
                <td> ฉบับ</td>
            </tr>
            <tr>
            	<td align="right">แบงค์ 50 : </td>
                <td align="right"> <?php echo (isset($exchenge['arr_exchange']['50']))?$exchenge['arr_exchange']['50']:0; ?></td>
                <td> ฉบับ</td>
            </tr>
            <tr>
            	<td align="right">แบงค์ 20 : </td>
                <td align="right"> <?php echo (isset($exchenge['arr_exchange']['20']))?$exchenge['arr_exchange']['20']:0; ?></td>
                <td> ฉบับ</td>
            </tr>
            <tr>
            	<td align="right">เหรียญ 10 : </td>
                <td align="right"> <?php echo (isset($exchenge['arr_exchange']['10']))?$exchenge['arr_exchange']['10']:0; ?></td>
                <td> เหรียญ</td>
            </tr>
            <?php if(isset($exchenge)){ ?>
            <tr>
            	<td align="right"></td>
                <td colspan="2">
                <input type="hidden" name="payment_1" id="payment_1" value="<?php echo (isset($_POST['payment']))?$_POST['payment']:$money_receive;?>" />
                <input type="hidden" name="money_change" id="money_change" value="<?php echo $exchenge['exchange']?>" />
                <input type="submit" name="submit_1" id="submit_1" value="บันทึกเงินทอน" style="width:100px;" />
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>
    </fieldset>
    </form>
    </div>

</body>
</html>
