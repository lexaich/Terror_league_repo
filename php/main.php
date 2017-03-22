<?php
	session_start();
    header('Content-type: text/html; charset=utf-8');
    require_once "dbdata.php";

	if($_POST['function']){
		$func = $_POST['function'];
		$func();
	}

	function signin(){
		class User{
			var $login;
			var $password;
			function login($login,$password){
				global $dbconnect;
				$this->login = $login;
				$this->password = $password;
				$query = "select * from users where login = '".$login."' and password = '".sha1($password)."' or mail = '".$login."' and password = '".sha1($password)."'";
				$result = $dbconnect->query($query);
				$numrows = $result->num_rows;
				if($numrows){
					echo "Вы успешно авторизованы";
					exit;
				}else{
					echo "Не удалось авторизовать пользователя ".$query;
					exit;
				}
			}
		}
		$user = new User;
		$user->login(addslashes(trim($_POST['login'])),addslashes(trim($_POST['password'])));
	}
	function registerNewUser(){
		class NewUser{
			//fields
			var $surName;
			var $name;
			var $email;
			var $login;
			var $password;
			var $skype;
			var $vkontakte;
			var $phone;
			var $country;
			var $city;
			var $bornDate;
			//fields end
			//methods
			function registerUser(){
				global $dbconnect;
				$query = "select mail, login, phoneNumber from users where mail = '$this->email' or login = '$this->login' or phoneNumber = '$this->phone'";
				$result = $dbconnect->query($query);
				$rows = $result->num_rows;
				if($rows){
					echo 2;
					exit;
				}
				$query = "insert into users VALUES (null, '$this->surName', '$this->name', '$this->email', '$this->login', '".sha1($this->password)."', 0, 0, 0, 0, '0', '$this->skype', '$this->vkontakte', '$this->phone', '$this->country', '$this->city', '$this->bornDate')";
				$result = $dbconnect->query($query);
				if($result){
					echo 1;
					exit;
				}else{
					echo "Не удалось зарегистрировать пользователя ".$query;
					exit;
				}
			}
		}
		$register = new NewUser;
		$register->surName = addslashes(trim($_POST['surName']));
		$register->name = addslashes(trim($_POST['name']));
		$register->email = addslashes(trim($_POST['email']));
		$register->login = addslashes(trim($_POST['login']));
		$register->password = addslashes(trim($_POST['password']));
		$register->skype = addslashes(trim($_POST['skype']));
		$register->vkontakte = addslashes(trim($_POST['vkontakte']));
		$register->phone = addslashes(trim($_POST['phone']));
		$register->country = addslashes(trim($_POST['country']));
		$register->city = addslashes(trim($_POST['city']));
		$register->bornDate = addslashes(trim($_POST['bornDate']));
		$register->registerUser();
	}

?>