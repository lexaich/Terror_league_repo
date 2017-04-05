<?php
	session_start();
	header('Content-type: text/html; charset=utf-8');
	require "../php/dbdata.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" href="styles.css">
	<link href="http://allfont.ru/allfont.css?fonts=roboto-condensed" rel="stylesheet" type="text/css" />
	<meta charset="UTF-8">
	<script src="../js/jquery.js"></script>
	<script src="../js/index.js"></script>
	<script src="../js/getXHR.js"></script>
	<title>Terror</title>
</head>
<body>

<div class="wrapper">
<? include '../header.php' ;?>
<div id="banner">
	<img src="/images/banners/banner.jpg" alt="большой большой баннер турнира">
</div>

	<div class="clear" style="background-color: white;">
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

		<div class="mid_side" style="float:left; background-color: white;">
			<div class="info" style="">
    				Информация об игроке с редактирование ее
			</div>
			<div class="team" style=""> 
<div style="float:left; margin-right: 50px">
<div><span style="font-size: 23px;color: brown;">Капитан команды</span></div>
<div><span>Ник игрока -</span><span> Роль</span></div>
</div>
<img  src="#" alt="логотип" style="width:130px; height: 50px">
<div class="clear"></div>
     
    <hr>
<div>    
<div><span>Ник игрока -</span><span> Роль</span></div>
<div><span>Ник игрока -</span><span> Роль</span></div>
<div><span>Ник игрока -</span><span> Роль</span></div>
<div><span>Ник игрока -</span><span> Роль</span></div>
</div>
    <hr>
<div>
<div><span>Запасные</span></div>
<div><span>Ник игрока -</span><span> Роль</span></div>
<div><span>Ник игрока -</span><span> Роль</span></div>
</div>
				
			</div>
			<div class="tornament" style="">
	<span>Название турнира</span>
	<div><span>Команда слева</span> <span>VS</span> <span>Команда справа</span></div>
	<div><span>Команда слева</span> <span>VS</span> <span>Команда справа</span></div>
	<div><span>Команда слева</span> <span>VS</span> <span>Команда справа</span></div>
	<div><span>Команда слева</span> <span>VS</span> <span>Команда справа</span></div>
	<div><span>Команда слева</span> <span>VS</span> <span>Команда справа</span></div>
	<span style="">Статус турнира</span>


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