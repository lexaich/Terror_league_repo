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
		<div class="team-list">
			<p>Команды</p>
			<hr>
			<table>
			<?php

				$query = 'select * from teams where 1';
				$result = $dbconnect->query($query);
				$rows = $result->num_rows;
				if($rows){
					for($i = 0; $i < $rows; $i++){
						$row = $result->fetch_assoc();
						echo '<tr><td><a href="./team.php?id='.$row['teamid'].'">'.$row['teamName'].'</a></td><td>Участники</td><td>Сетка</td><td class="'.$row['teamStatus'].'-tornament">'.$row['teamStatus'].'</td></tr>';
					}
				}

			?>
			</table>
		</div>
	</div>
		<div id="footer">
			<div class="inner-footer">
				<p>copyright</p>
			</div>
		</div>
</div>
</body>