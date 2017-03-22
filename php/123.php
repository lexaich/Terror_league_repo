<?php
	session_start();
    header('Content-type: text/html; charset=utf-8');
    require_once "dbdata.php";

	var_dump($dbconnect->query($query));

?>