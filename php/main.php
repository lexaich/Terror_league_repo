<?php

	session_start();
	header('Content-type: text/html; charset=utf-8');
	require "php/dbdata.php";

	if($_POST['function']){
		$_POST['function']();
	}

	function signin(){
		$login = addslashes(trim($_POST['login']));
		$password = addslashes(trim($_POST['password']));
		$query = "select * from users where login = '".$login."' and password = '".sha1($password)."' or mail = '".$login."' and password = '".sha1($password)."'";
		$result = $dbconnect->query($query);
		$numrows = $result->num_rows;
		if($numrows){
			echo "Вы успешно авторизованы";
			exit;
		}else{
			echo "Не удалось авторизовать пользователя";
			exit;
		}
	}

?>