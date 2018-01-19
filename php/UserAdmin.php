<?php 
require_once("../php/usuario.php");
if(!isset($_SESSION)) 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Administrador</title>
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
      <a class="navbar-brand" href="#">Administrador</a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      
      <?php
      	if (isset($_SESSION['usuario'])) 
		{
      echo "<li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='glyphicon glyphicon-user'></span> ".$_SESSION['usuario']->UsrMail. "<span class='caret'></span></a>
              <ul class='dropdown-menu'>
              <li role='separator' class='divider'></li>
              <li><a href='javascript:deslogear();'><span class='glyphicon glyphicon-log-in'></span> Desloguearse</a></li>
             </ul>
             </li>";
       	}
 	  ?>	
    </ul>
  </div>
</nav>
			
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
          <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar</h4>
        </div>
        <div class="modal-body" id='grillaAdminModificar'> 
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="myModalFile" role="dialog">
    <div class="modal-dialog modal-lg">
          <!-- Modal content-->
      <div class="modal-content">
       
        <div class="modal-body" id='grillaAdminFile'> 
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
      
				<div class='col-sm-12'>
             <div id="grillaAdmin"></div> 
        </div>
		  
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" align="right">
               <small>
               <p>Powered by <b>pituca</b><strong></p></small>
            </div>
        </div>
    </div>
</footer>
	
</body>
</html>