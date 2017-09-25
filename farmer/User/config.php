<?php
define('CURRENCY', '$');
//define('WEB_URL', 'http://127.0.0.1/wt/Farmer/');
//define('WEB_URL', 'file:///C:\xampp\htdocs\wt\Farmer');

$Root_Path = "http://".$_SERVER['SERVER_NAME'];
define('WEB_URL', "http://".$_SERVER['SERVER_NAME']."/Farmer/");
define('DB_HOSTNAME', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'farmers');
$link = mysql_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD) or die(mysql_error());
mysql_select_db(DB_DATABASE, $link) or die(mysql_error());?>