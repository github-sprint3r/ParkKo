<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>PARK KO</title>
</head>
<body>
<div class="contrainer">
	<div class="header"><div class="wrapper" style="padding:0; text-align:left;"><strong>Park KO</strong></div></div>
    <div class="boxBody">
    <div class="wrapper">
    	<div class="leftfrme">
        <!-- Left frame -->
        	<!-- Left Welcomeframe frame -->
            <div class="welcomebox-top" style="padding:20px 10px 0 10px;">
            <div class="welcombox-img"><img src="images/egg.png" style="border-radius: 5px; width:70px;" /></div>
            </div>
            <div class="welcomebox-bottom">
             KTM Master
            </div>
            <!-- Left Welcomeframe frame -->
            <!-- Left Menu frame -->
            <div class="menubox">
            <ul>
            	<li><a href="?page=print">พิมพ์ใบเสร็จ</a></li>
                <li><a href="?page=form_checkin">คำนวณค่าจอดรถ</a></li>
                <li><a href="?page=parkko_change">ชำระค่าจอดรถ</a></li>
            </ul>
            </div>
            <!-- Left Menu frame -->
		<!-- Left frame -->
         </div>
         <div class="rightframe">
         	<!-- Right frame -->
         	<div class="detailbox">
            <?php
			$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'].'.php' : 'parkko_change.php';
			include_once $page;
			?>
            </div>
            <!-- Right frame -->
         </div>
    </div>
    </div>
</div>
</body>
</html>
