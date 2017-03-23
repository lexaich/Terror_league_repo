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
		<div class="tournament-list">
			<p>ТУРНИРЫ</p>
			<hr>
			<table>
			<?php

				$query = 'select * from tournaments where 1';
				$result = $dbconnect->query($query);
				$rows = $result->num_rows;
				if($rows){
					for($i = 0; $i < $rows; $i++){
						$row = $result->fetch_assoc();
						echo '<tr><td><a href="./tournament.php?id='.$row['tournamentid'].'">'.$row['tournamentName'].'</a></td><td>Участники</td><td>Сетка</td><td class="'.$row['tournamentStatus'].'-tornament">'.$row['tournamentStatus'].'</td></tr>';
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