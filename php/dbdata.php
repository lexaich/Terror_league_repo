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
    $dbDataUser->password = '';
    $dbDataUser->database = 'terror_league';

?>