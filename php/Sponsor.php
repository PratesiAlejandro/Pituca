<!DOCTYPE html>
<html lang="en">
<head>
  <title>Validar sponsor</title>
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
      <a class="navbar-brand" href="UserUser.php">Volver</a>
    </div>
    <ul class="nav navbar-nav">
    
     
    </ul>
  </div>
</nav>
  
<div class="container">
  <?php
require_once("../php/usuario.php");
if(!isset($_SESSION)) 
session_start(); 

$nombre = $_FILES['sponsor']['name'];
$tipo = $_FILES['sponsor']['type'];
$tamanio = $_FILES['sponsor']['size'];
$ruta = $_FILES['sponsor']['tmp_name'];
$destino = "../archivos_subidos/".$nombre;


if (file_exists($destino)) {
    echo "<div class='alert alert-danger' role='alert'>
          <strong>Error !!!</strong> Existe una imagen con el mismo nombre.
          </div>";

} else {
  
    if (copy($ruta, $destino)) {
    
   $objUsuario = new Usuario();
   $objUsuario->ArDetalle = "Sponsor";
   $objUsuario->ArNombre = $nombre;
   $objUsuario->ArTipo = "PDF";
   $objUsuario->ArRuta = $destino;
   $objUsuario->ArUser = $_SESSION['usuario']->UsrId;
   $objUsuario->InsertarElArchivo();
 
header('Location: UserUser.php');

  }
  else{
    echo "Error al subir el archivo";
   
  }
}


?>

</div>

</body>
</html>

