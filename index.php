<?php
error_reporting(0);
// Conectando, seleccionando la base de datos
$link = mysql_connect('sql9.freesqldatabase.com', 'sql9375823', '8uUsDzPE1G')
    or die('No se pudo conectar: ' . mysql_error());
//echo '¡Conexion Exitosa!';
echo "<br>"; 
mysql_select_db('sql9375823') or die('No se pudo seleccionar la base de datos'); 
//comentario generico

// Realizar una consulta MySQL
$query = 'SELECT * FROM sensores';
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
if ($row = mysql_fetch_array($result)){
   //echo "Temperatura °C\n"; 
   do { 
      $var3 = "".$row["temperatura"]." \n";
      $var4 = "".$row["luz"]." \n"; 
      if ($var4 ==1) {
       	$var5 = "Day";
       } 
       else{
       	$var5 = "Night";
       }
      //echo $var3;
   } while ($row = mysql_fetch_array($result)); 
   echo "</table> \n"; 
}
// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?>
<!--Front End-->
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://www.w3.org/2005/10/profile">
	<title>Prototype Dashboard</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;800&display=swap" rel="stylesheet">
	
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Expires" content="0"/>
    <script src="../general_functions.js"></script>
	<script src="functions.js"></script>
</head>
<body onload="do_login();">
	<div class="container" id="page">
		<!--Side panel-->
		<div class="side-panel">
			<h2 class="side-panel-item">SmrtCtrl</h2>
			<a href="index.html" class="side-panel-button Disp">Devices</a><br/>
			<!--<a href="#" class="side-panel-button">Base de datos</a><br/>-->
			<a href="about.html" class="side-panel-button">About</a><br/>
			<a class="space"></a>
			<h3 class="side-panel-item-2">Alan Bayolo 2020.</h3>
		</div>
		<!--big box-->
		<div class="big-box hidden" >
				<div class="hidden" id="login">
					<div id="username"></div>
					<div id="password"></div>
					<div id="region" data-inline="true"></div>
					<div id="storecreds"></div>
					<div id="loginfailed"></div>
				</div>
				<div type="checkbox" name="autorefresh" id="autorefresh"></div>
			<!--regular-->
			<h2>Connected Devices</h2>
			<p>Glove 1.0</p>
			<div class="row1">
				<div class="col">&#x1F91A;</div>
				<div class="col">&#x1F44A;</div>
				<div class="col">&#x270B;</div>
			</div>

			<div class="row2">
				<div class="col2">
					<div id="rctngl1">
						<p id="txtp">Tv</p>
						<img src="img/Picture3.png">
					</div>
					<div class="minibox">
						<b id="D">Status</b><b id="B" onclick="toggle(1);">Connected</b>
						<div id="crcl"></div>
					</div>
				</div>
				<div class="col2">
					<div id="rctngl2">
						<p id="txtp">AC</p>
						<img src="img/Picture2.png">
					</div>
					<div class="minibox">
						<b id="D">Status</b><b id="B">Connected</b>
						<div id="crcl"></div>
					</div>
				</div>
				<div class="col2">
					<div id="rctngl3">
						<p id="txtp">Main light</p>
						<img src="img/Picture1.png">
					</div>
					<div class="minibox">
						<b id="D">Status</b><b id="B" onclick="toggle(0);">Connected</b>
						<div id="crcl"></div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>