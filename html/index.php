<?php 
require_once("../php/usuario.php");

if(!isset($_SESSION)) 
session_start(); 
?>
<html>
<head>
	<title>Ingreso</title>
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../js/funciones.js"></script>
	<script type="text/javascript" src="../js/BorrarCookies.js"></script>
  	<link rel="stylesheet" type="text/css" href="../css/login.css">
  	<link rel="stylesheet" type="text/css" media="all" href="../css/style.css">
  	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  
</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Ingreso administrador</a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      
      <?php
      	if (isset($_SESSION['usuario'])) 
		{
			echo "<li><a href='#'><span class='glyphicon glyphicon-user'></span>". $_SESSION['usuario']->mail . "</a></li>";
      echo"<li><a href='javascript:deslogear();'><span class='glyphicon glyphicon-log-in'></span> Desloguearse</a></li>";
   	}
 	  ?>	
    </ul>
  </div>
</nav>
		<div class='container'> 
				<div class='row'>
					<div class='col-sm-3'></div>
				<div class='col-sm-5'>
	<?php 
	
		if(isset($_SESSION['usuario']) != true) 
		{
					
			echo "  <h4>Ingresar al sistema</h4>";
			echo "	<ul class='nav nav-pills nav-stacked' role='tablist'>";
			echo " <a class='btn btn-custom btn-lg btn-block' id='btnLogin' href='login.php' role='button'>Log in</a>";
			echo "	 <br>       ";
			echo "  <a class='btn btn-custom btn-lg btn-block' id='btnLogin' href='registro.html' role='button'>Crear Cuenta</a> ";
    		echo "	</ul>";
				
		}
			

 ?>	
 </div>
		<div class='col-sm-3'></div>
				</div>

				
</div>";

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
              <!--   <p>Page www.apratesi.com.ar - 2017</p> -->
                <!-- <p>Powered by AP<strong><a href="" target="_blank">AP</a></strong></p> -->
            </div>
        </div>
    </div>
</footer>

</div>
		
	
	
	
</body>
</html>