<?php 
session_start();
date_default_timezone_set('Asia/Bangkok');//�絤������
define(HOST,'119.59.97.37');
define(USER,'root');
define(PASS,'logon');
define(DB,'park_ko');//�ҹ�����ŷ���ͧ�����������

mysql_connect( HOST, USER, PASS );
mysql_select_db( DB );
mysql_query("SET NAMES 'utf8' ");
?>