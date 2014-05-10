<?php 
session_start();
date_default_timezone_set('Asia/Bangkok');//เซ็ตค่าเวลา
define(HOST,'119.59.97.37');
define(USER,'root');
define(PASS,'logon');
define(DB,'park_ko');//ฐานข้อมูลที่ต้องการเชื่อมต่อ

mysql_connect( HOST, USER, PASS );
mysql_select_db( DB );
mysql_query("SET NAMES 'utf8' ");
?>