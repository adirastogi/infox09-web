<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_infox_db = "localhost";
$database_infox_db = "infox";
$username_infox_db = "addy1injoy";
$password_infox_db = "addy1injoy";
$infox_db = mysql_pconnect($hostname_infox_db, $username_infox_db, $password_infox_db) or trigger_error(mysql_error(),E_USER_ERROR); 
?>