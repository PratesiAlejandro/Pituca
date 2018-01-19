<html>
<head>
	<title>Login</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../js/funciones.js"></script>
  <script type="text/javascript" src="../js/BorrarCookies.js"></script>
	
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
				<a class="navbar-brand" href="#">Inicio</a>
			</div>
			
      <form class="navbar-form navbar-left">
        <div class="form-group">
         
        </div>
             
      </form>
		</div>
	</nav>
	<div class="container">
	
 <div class="col-sm-4">
 
 </div>
  <div class="col-sm-4">
    <h4>Loguearse</h4>
  	<form class="form-signin" method='POST' onsubmit="Ingresar();return false;">
  		<table class="table">
  			
  			<tr>
  				<td>
  				
              <?php

              if(isset($_COOKIE['miMail']))
                    {
                    $cadena = "<input type='email' id='correoLogin' required class='form-control' value=' ";
                    $cadena = $cadena. $_COOKIE['miMail'] ."'>";
                    
                    echo $cadena;
                   

                    }else
                      {
                      $cadena = "<input type='email' id='correoLogin' class='form-control' placeholder='Correo' >";
                      echo $cadena;
                    }
           ?>

  				</td>
  			</tr>
  			<tr>
  				<td>
  				
        <?php
               if(isset($_COOKIE['miClave']))
                    {
                    $cadena = "<input type='password'  id='claveLogin' class='form-control' maxlength='6' value=' ";
                    $cadena = $cadena. $_COOKIE['miClave'] ."'>";
                    
                    echo $cadena;
                   

                    }else
                      {
                      $cadena = "<input type='password' id='claveLogin' class='form-control' placeholder='Clave' maxlength='6' >";
                      echo $cadena;
                    }
           ?>

  				</td>
  			</tr>
  			<tr>
  				<td>
  					<button type="submit" class="btn btn-success btn-block" >Ingresar</button>

  				</td>
  			</tr>
  
	</table>
</form>
	</div>
	 <div class="col-sm-4"></div>
	</div>
</body>
</html>