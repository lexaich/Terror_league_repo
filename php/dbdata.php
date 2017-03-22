<?php

	header('Content-type: text/html; charset=utf-8');

	class dbData{
        var $host;
        var $login;
        var $password;
        var $database;
    }
    $dbDataUser = new dbData;
    $dbDataUser->host = 'localhost';
    $dbDataUser->login = 'user';
    $dbDataUser->password = 'fargot1423';
    $dbDataUser->database = 'terror_league';
    @ $dbconnect = new mysqli($dbDataUser->host, $dbDataUser->login, $dbDataUser->password, $dbDataUser->database);
    mysql_query('SET character_set_database=utf8'); 
    mysql_query('SET NAMES utf8');
    if(mysqli_connect_errno()){
        echo "<p class='no-connect-db'>Не удалось подлючиться к базе данных. Повторите попытку позже.</p>".$dbDataUser->login.$dbDataUser->password;
        exit;
    }

?>