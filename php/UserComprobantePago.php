<?php 
require_once("../php/usuario.php");

if(!isset($_SESSION)) 
session_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Comprobantes Pago</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
   <script type="text/javascript" src="../js/funcionesDoc.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../js/plugins/sortable.js" type="text/javascript"></script>
    <script src="../js/fileinput.js" type="text/javascript"></script>
    <script src="../js/locales/fr.js" type="text/javascript"></script>
    <script src="../js/locales/es.js" type="text/javascript"></script>
    <script src="../themes/explorer/theme.js" type="text/javascript"></script>
 
<script src="/js/plugins/piexif.js"></script>
<script src="/js/fileinput.js"></script>

</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="UserUser.php"><span class='glyphicon glyphicon-home'></a>
    </div>
     <ul class="nav navbar-nav">
      <li><a href="#">Comprobantes de pago</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php
    if (isset($_SESSION['usuario'])) 
    {
     $id = $_SESSION["usuario"]->id;
     echo "<li class='dropdown'>
           <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span class='glyphicon glyphicon-user'></span> ". $_SESSION['usuario']->UsrMail . "<span class='caret'></span></a>
           <ul class='dropdown-menu'>
           <li><a href='javascript:deslogear();'><span class='glyphicon glyphicon-log-in'></span> Desloguearse</a></li>
           </ul>
           </li>";
    }
    ?>  
    </ul>
  </div>
</nav>

<div class="col-sm-6">
        <div class="panel-heading"></div>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <form method="POST" action="ComprobantePago.php" enctype="multipart/form-data">
                      <tr>
                      <td> <label for="importe">Seleccione mes </label></td>
                       <td><select class="form-control input-sm" id="selMes" name="selValMes">
                       <option>Enero</option>
                       <option>Febrero</option>
                       <option>Marzo</option>
                       <option>Abril</option>
                       <option>Mayo</option>
                       <option>Junio</option>
                       <option>Julio</option>
                       <option>Agosto</option>
                       <option>Septiembre</option>
                       <option>Octubre</option>
                       <option>Noviembre</option>
                       <option>Diciembre</option>
                       </select></td>
                        <td><input type="number" class="form-control input-sm" id="comPesos" name="comPesos" placeholder="importe en pesos" min="1" required="" step="any"></td>
                        <td><input type="number" class="form-control input-sm" id="comDolares" name="comDolares" placeholder="importe en dolares" required="" min="1" step="any"></td>
                      </tr>
                      <tr>
                      <td colspan="3" ><input type="file" class="form-control input-sm" id="comPago" name="comPago" onchange="ValidarComprobantePago(this);"></td>
                       <td>
                       <?php
                        if (isset($_SESSION['usuario'])) 
                        {
                        $id = $_SESSION["usuario"]->id;
                       
                       echo "<button type='submit' value='subirPago' id='btnCompPago' disabled class='btn btn-primary btn-block btn-sm'><span class='glyphicon glyphicon-upload'></span></button>";
                      
                         }
                      ?>  
                       </td>
                      </tr>
                    </form>
                                 
                      </tbody>
                    </table>
              </div>

              <div class="col-sm-12" id="MostrarComprobantesDePago">

</div>
       
</div>


<div class="col-sm-6" >
</div>

<div class="col-sm-6" id="kk">
<div class="alert alert-info" role="alert">
  <strong>Total pagado a la fecha</strong>
    <br /><hr>
 <p >Pesos ( $ ) ..... <strong><span id="MostrarTotalPesos"></span></strong></p>
 <p >Dolar ( u$s )....  <strong><span id="MostrarTotalDolar"></span></strong></p>

</div>
</div>

<div class="col-sm-6" >
</div>

<div class="col-sm-6" id="kk">
<div class="alert alert-danger" role="alert">
  <strong>Total a pagar</strong>
    <br /><hr>
 <p >Pesos ( $ ) ..... <strong><span id="MostrarTotalAPagarPesos"></span></strong></p>
 <p >Dolar ( u$s )....  <strong><span id="MostrarTotalAPagarDolar"></span></strong></p>

</div>
</div>


</body>
</html>