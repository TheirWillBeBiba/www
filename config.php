<?php 

define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "howto");


$db = @mysqli_connect(HOST, USER, PASS, DB) or die('Non connection with DB');
mysqli_set_charset($db, 'utf8') or die('Not set coding');

