<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_upload = "localhost";
$database_upload = "upload";
$username_upload = "admin";
$password_upload = "123456";
$upload = mysql_pconnect($hostname_upload, $username_upload, $password_upload) or trigger_error(mysql_error(),E_USER_ERROR); 
?>