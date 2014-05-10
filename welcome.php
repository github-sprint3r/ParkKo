<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style>

.parkkowelcome{
	-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius: 8px;	
}
</style>
<title>PARK KO</title>
</head>
<body>
<div class="contrainer">
	<div class="header"><div class="wrapper" style="padding:0; text-align:left;"><strong>Park KO</strong></div></div>
    <div class="boxBody">
    <div class="wrapper">
    	<div style="font-size:3em; color:#FFF; margin-bottom:20px;padding:10px;background: #69C" class="parkkowelcome">ยินดีต้อนรับสู่  Park-Ko </div>
    	<div class="leftfrme">
        <!-- Left frame -->
        	<!-- Left Welcomeframe frame -->
            <div class="welcomebox-top" style="padding:20px 10px 0 10px;">
            <div class="welcombox-img"><img src="images/egg.png" style="border-radius: 5px; width:70px;" /></div>
            </div>
            <div class="welcomebox-bottom">
             <?php echo $_SESSION['displayname']; ?>
            </div>
            <!-- Left Welcomeframe frame -->
            <!-- Left Menu frame -->
           <div class="menubox">
            <ul>
            	<li><a href="?page=print">พิมพ์ใบเสร็จ</a></li>
                <li><a href="?page=print">คำนวณค่าจอดรถ</a></li>
                <li><a href="?page=parkko_change">ชำระค่าจอดรถ</a></li>
            </ul>
            </div>
            <!-- Left Menu frame -->
		<!-- Left frame 
         </div>-->
         
         <div class="rightframe">
         	
         </div>
    </div>
    </div>
    </div>
</div>
</body>
</html>
