<?php
/**
 * Created by PhpStorm.
 * User: Amit
 * Date: 12/31/2015
 * Time: 4:55 PM
 */
$host = "localhost";
$username = "root";
$password = "";
$db = "loan";

$link = @mysql_connect($host, $username, $password) or die('Cannot connect to the database because: ' . mysql_error());
$db_link = @mysql_select_db($db, $link) or die("Database not selected error: " . mysql_error());

date_default_timezone_set('America/Los_Angeles');
?>