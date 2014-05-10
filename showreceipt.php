<?php
//$test_json = array("car_id" => "กก-1111", "province"=>"เชียงใหม่");
//json_encode($test_json);
?>

<!doctype html>
<html>
<head>
<link type="text/css" href="parkKo/css/style.css" rel="stylesheet" />
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>


<?php
//include "receipt.php";
$link = mysqli_connect("119.59.97.37","root","logon","park_ko") or die("Error " . mysqli_error($link));
$link->set_charset("utf8");
//$query = "SELECT name FROM mytable" or die("Error in the consult.." . mysqli_error($link));
//mysqli_connect("119.59.97.37","root","logon");
//mysql_select_db("park_ko");

	function tranTime($date){
		$date = explode(" ", $date);
		$date1 = explode("-", $date[0]);
		return $date1[2]."/".$date1[1]."/".($date1[0]+543-2500)." เวลา ".($date[1]." น.");
	}
	
class printout{
	function printslip($carid){
	$dataCar = "SELECT * FROM car_parking WHERE car_number='".$_POST['carNum']."' " or die("Error in the consult.." . mysqli_error($link));
	$data = $link->query($dataCar);
	$dataInCarNumber = mysqli_fetch_assoc($data);
	return $dataInCarNumber;
	}
}

if(isset($_POST['search'])){
	$dataCar = "SELECT * FROM car_parking WHERE car_number='".$_POST['carNum']."' " or die("Error in the consult.." . mysqli_error($link));
	$data = mysqli_query($link,$dataCar);
	$dataInCarNumber = mysqli_fetch_assoc($data);
	echo print_r($dataInCarNumber);
}	

?>
<form id="form1" name="form1" method="post">
<table border="1" >
<tr>
	<td>เลขทะเบียน</td>
    <td><input name="carNum" type="text" value="<?php if(isset($_POST['search'])){ echo $_POST['carNum'];} ?>" placeholder="กรุณากรอกเลขทะเบียนรถ"><input id="search" name="search" type="submit" value="search"></td>
</tr>
<tr>
<?php if(isset($_POST['search'])){ ?>
	<td>จังหวัด</td>
    <td><?php  echo $dataInCarNumber['province']; ?></td>
</tr>
<tr>
	<td>เวลาเข้า</td>
	<td>วันที่ <?php echo tranTime($dataInCarNumber['check_in']);?> </td>
</tr>
<tr>
	<td>เวลาออก</td>
	<td>วันที่ <?php echo tranTime($dataInCarNumber['check_out']); ?> </td>
</tr>
<tr>
	<td>จำนวนเวลา</td>
	<td><?php echo $dataInCarNumber['parking_time']; ?> ชั่วโมง</td>
</tr>
<tr>
	<td>ราคาค่าจอดรถ</td>
	<td><?php echo $dataInCarNumber['parking_fee']." บาท"; ?></td>
</tr>
<?php } ?>
</table>

</form>
</body>
</html>