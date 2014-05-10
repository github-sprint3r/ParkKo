<?php
include("connect_db.php");
if(isset($_POST['car_number'])){
	$sql_insert = "INSERT INTO car_parking
						(check_in,
						car_number,
						province)
					VALUES
						('".date("Y-m-d H:i:s")."',
						'".$_POST["car_number"]."',
						'".$_POST["province"]."'
						)";
	//$result_insert = mysql_db_query(DB,$sql_insert);
	if($result_insert){
		echo '<script>alert("บันทึกข้อมูลเรียบร้อย");</script>';
	}else{
		echo '<script>alert("ไม่สามารถบันทึกข้อมูลได้");</script>';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form action="" method="post">
<div style="width:570px;">
<table width="100%" border="0" >
	<tr>
    	<td colspan="2">บันทึกเวลาเข้าจอดรถ</td>
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
        	<center><input type="submit" name="bt_check_in" value="Check IN"/></center>
        </td>
    </tr>
</table>
</div>
</form>
</body>
</html>