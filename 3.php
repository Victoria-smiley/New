<html>
<head>
	<meta charset="utf-8">
</head>
	<body >
	<?php
	$msql = mysql_connect("localhost", "root", ""); //открытие соединения с сервером mysql
	
	if (isset($_POST['full_number']) && isset($_POST['weight']) && isset($_POST['height']) && isset($_POST['age']) && isset($_POST['nationality'])&& isset($_POST['kind_of_sport'])&& isset($_POST['rank'])&& isset($_POST['team'])) {
	

	
	$number=$_POST['number'];
	$full_number=$_POST['full_number'];
	$weight=$_POST['weight'];
	$height=$_POST['height'];
	$age=$_POST['age'];
	$nationality=$_POST['nationality'];
	$kind_of_sport=$_POST['kind_of_sport'];
	$rank=$_POST['rank'];
	$team=$_POST['team'];
	
	mysql_query("INSERT INTO sport.anketa VALUES('$number','$full_number', '$weight', '$height', '$age','$nationality','$kind_of_sport','$rank','$team')"); 
	}
	

	
	$query = mysql_query('select * from sport.anketa');
	echo '<form method= "POST">';
	echo 'Изменить <input type= "text" name= "izm">';
	echo ' на <input type= "text" name= "update">';
	echo ' где номер = <input type= "text" name= "where">';
	echo ' <input type= "submit" value= "Изменить" name="update_b">';
	echo '</form>';
	
	
	$update_info = "'".$_POST['update']."'";
    $update_where = $_POST['where'];
	$chosen_col = $_POST['izm'];

	mysql_query('UPDATE sport.anketa  SET '.$chosen_col.'='.$update_info.' WHERE number='.$update_where);
  
	echo '<form method= "POST">';
	echo '<input type= "text" name= "query">';
	echo ' <input type= "submit" value= "Поиск" name="execute">';
	echo '</form>';
    $user_query = $_POST['query'];
	$query = 'select * from sport.anketa';
	if ($user_query != "") {
		$query = "select * from sport.anketa WHERE number =".$user_query." OR full_number =".$user_query." OR weight =".$user_query." OR height =".$user_query." OR age =".$user_query." OR nationality =".$user_query." OR kind_of_sport =".$user_query." OR rank =".$user_query." OR team =".$user_query;
	}
	$qr_result = mysql_query("$query")
?>
	<table border="1">
	<thead>
	<tr>
	<th>number</th>
	<th>full_number</th>
	<th>weight</th>
	<th>height</th>
	<th>age</th>
	<th>nationality</th>
	<th>kind_of_sport</th>
	<th>rank</th>
	<th>team</th>
	</tr>
	</thead>
	<tbody>
	<?php 
					mysql_select_db("test", $msql);
				$res = mysql_query("SELECT * FROM abiturient");
				$count = mysql_num_rows($res);
				echo "Количество записей: $count<br>";
				for ($i=0; $i<$count; $i++) {
					$surname = mysql_result($res, $i, "Surname");
					$group = mysql_result($res, $i, "Group");
					$grade = mysql_result($res, $i, "Grade");					
					echo "$surname - $group гр. - $grade<br>";
				}			
				?>

	<?php 
mysql_close($msql);
	?>
	 </tbody>
	</table>
<p><a href="1.php">Добавить данные в таблицу</a></p>
	Изменение3
	</body>
</html>
