<?php

error_reporting( ~E_DEPRECATED & ~E_NOTICE );

define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', 'root');
 define('DBNAME', 'ecommerce');

$con = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

?>