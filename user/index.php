<?php
	session_start();
	header('Content-type: text/html; charset=utf-8');
	require "../php/dbdata.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="../css/styles.css">
	<meta charset="UTF-8">
	<script src="../js/jquery.js"></script>
	<script src="../js/index.js"></script>
	<script src="../js/getXHR.js"></script>
	<title>Terror</title>
</head>
<body>

<div class="wrapper">
<? include '../header.php' ;?>

	<div class="clear">
		<div class="profile" style="width:200px; float:left;margin: 30px;">
			<img src=<?php 

				$query = 'select avatar from users where userid = '.$_SESSION['id'];
				$result = $dbconnect->query($query);
				$rows = $result->num_rows;
				if($rows){
					$row = $result->fetch_assoc();
					if($row['avatar'] == '0'){
						echo "'../images/users/no-avatar.jpg'";
					}else{
						echo "'".$row['avatar']."'";
					}
				}

			?> alt="аватар участника" style="width:200px; height: 200px; margin-bottom: 0px;">
			<div class="user-name" style="height: 40px;width:100%;text-align: center;">
				<?php 
					$query = "select firstName, secondName, login from users where userid = ".$_SESSION['id'];
					$result = $dbconnect->query($query);
					$rows = $result->num_rows;
					if($rows){
						$row = $result->fetch_assoc();
						echo $row['firstName'].' '.$row['secondName'];
					}
				?>
			</div>
			<div class="control-panel">
				<ul>
					<li>Заполнить профиль</li>
					<li>Вступить в команду</li>
					<li>Моя команда</li>
					<li id="exit-user">Выйти</li>
				</ul>
			</div>
		</div>

		<div class="midside" style="float:left; background-color: white;">
			<div class="info" style="width:840px; height: 150px; margin: 30px 40px 40px 40px;">
				Информация об игроке с редактирование ее
			</div>
			<div class="team" style="width: 400px; height: 350px; float:right;margin: 0px 40px 0px 0px;"> информация о составе команды в кторой он находится
				
			</div>
			<div class="tornament" style="width: 400px; height: 350px;margin: 0px 0px 10px 40px;">
				Информация о текущем турнире в ктором учавствует команда
			</div>	
			</div>
</div>

		<div id="footer">
			<div class="inner-footer">
				<div>copyright</div>
			</div>
		</div>
</div>
</body>
</html>