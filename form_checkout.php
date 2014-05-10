<?php
include("connect_db.php");
include("CalculateParkingFee.php");
if(isset($_POST['car_number'])){
	$check_out = date("Y-m-d H:i:s");
	$sql_select = "SELECT check_in
					FROM car_parking
					WHERE
						car_number = '".$_POST["car_number"]."' and 
						province = '".$_POST["province"]."' and 
						check_out = '0000-00-00 00:00:00'";
	$rs_date = mysql_query($sql_select);
	$check_in = mysql_fetch_assoc($rs_date);
	if(isset($check_in["check_in"])){
		$caluate = new CalculateParkingFee();
		$hours = $caluate->calculateHour($check_in["check_in"],$check_out);
		$pay = $caluate->calculateFeeNormalRate($hours);
		die();
		$sql_update = "UPDATE car_parking
						SET check_out = '".$check_out."',
							parking_time = '".$hours."'
						WHERE
							car_number = '".$_POST["car_number"]."' and
							province = '".$_POST["province"]."'";
		$result_update = mysql_db_query(DB,$sql_update);
		if($result_update){
			echo '<script>alert("เลขทะเบียนรถ:'.$_POST["car_number"].' '.$_POST["province"].'\n
								เวลาเข้า");</script>';
		}else{
			echo '<script>alert("ไม่สามารถบันทึกข้อมูลได้");</script>';
		}
	}else{
		echo '<script>alert("ไม่มีข้อมูล");</script>';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="js/jquery-1.8.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="css/ui/jquery-ui.css" media="screen" />
<script>
<?php
$sql_province="SELECT province_name FROM province ORDER BY province_name";
$re_province = mysql_db_query(DB,$sql_province);
?>
$(function() {
    var availableTags = [
	<?php
	while($province = mysql_fetch_assoc($re_province)){
									echo '"'.$province[province_name].'",';
							}
	?>
    ];
    $("#province").autocomplete({
		source: function(request, response) {
			var results = $.ui.autocomplete.filter(availableTags, request.term);
			response(results.slice(0, 6));
		}
    });
});
</script>
</head>
<body>
<form action="" method="post">
<div style="width:570px;">
<table width="100%" border="0" >
	<tr>
    	<td colspan="2">บันทึกเวลารถออกจากที่จอด</td>
    </tr>
    <tr>
        <td align="right" width="50%">เลขทะเบียน: </td>
        <td><input type="text" id="car_number" name="car_number" value=""/></td>
    </tr>
    <tr>
        <td align="right">จังหวัด: </td>
        <td><input type="text" id="province" name="province" value=""/></td>
    </tr>
    <tr>
    	<td colspan="2">
        	<center><input type="submit" name="bt_check_out" value="Check OUT"/></center>
        </td>
    </tr>
</table>
</div>
</form>
</body>
</html>