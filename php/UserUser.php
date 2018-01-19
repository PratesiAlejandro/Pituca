<?php 
require_once("../php/usuario.php");
if(!isset($_SESSION)) 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Usuario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="../js/funcionesArchivos.js"></script>
<script type="text/javascript" src="../js/BorrarCookies.js"></script>
<script type="text/javascript" src="../js/funcionesDoc.js"></script>
<link rel="stylesheet" type="text/css" href="../css/login.css">
<link rel="stylesheet" type="text/css" media="all" href="../css/style.css">
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
     <a class="navbar-brand" href="#"><span class='glyphicon glyphicon-home'></a>
   </div>
    <ul class="nav navbar-nav navbar-right">
      <?php
      	if (isset($_SESSION['usuario'])) 
    		{
       
        echo " <li><a href='UserComprobantePago.php' disabled='true' ><span class='glyphicon glyphicon-file'></span> Comprobantes pago</a></li>
        <li class='dropdown'>
              <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
              <span class='glyphicon glyphicon-user'></span> " . $_SESSION['usuario']->UsrMail . "<span class='caret'></span></a>
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

<div class="col-sm-4">
  <div class="panel panel-info">
   <div class="panel-heading">Datos usuario</div>
    <div class="table-responsive">
      <table class="table">
        <tbody>
          <tr>
          <td>  <?php
          echo "<input type='text' disabled class='form-control input-sm' placeholder='nombre' id='nombre' value=".$_SESSION['usuario']->UsrNombre." >";
          ?>
          </td>
          <td><?php
          echo "<input type='text' disabled class='form-control input-sm' placeholder='apellido' id='apellido' value=".$_SESSION['usuario']->UsrApellido." >";
          ?></td>
          </tr>
          <tr>
          <td><?php echo "<input type='email' disabled class='form-control input-sm' value=".$_SESSION['usuario']->UsrMail." placeholder='mail' id='email'>";?> </td>
          <td><?php echo "<input type='data-toggle' disabled class='form-control input-sm' value=".$_SESSION['usuario']->UserfechaNacimiento." placeholder='fecha nacimiento' id='fechaNac'>"?></td>
          </tr>
          <tr>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=".$_SESSION['usuario']->Userdni." placeholder='dni' id='dni'>";?></td>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=".$_SESSION['usuario']->UserNroPasaporte." placeholder='Nro pasaporte' id='pasaporte'>";?></td>
          </tr>
          <tr>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=". $_SESSION['usuario']->UsrCiudadNac." placeholder='ciudad de nacimiento' id='ciudad'>";?></td>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=". $_SESSION['usuario']->UsrProvinciaNac." placeholder='provincia de nacimiento' id='prov'>";?></td>
          </tr>
           <tr>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=".$_SESSION['usuario']->UsrNacionalidad." placeholder='nacionalidad' id='nacionalidad'>"; ?></td>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=".$_SESSION['usuario']->UsrDomicilioReal." placeholder='domicilio real' id='domicioReal'>"; ?></td>
          </tr>
           <tr>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=".$_SESSION['usuario']->UsrCP." placeholder='codigo postal' id='codigoPostal'>"; ?></td>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=".$_SESSION['usuario']->UsrTelefonoFijo." placeholder='telefono fijo' id='telFijo'>"; ?></td>
          </tr>
           <tr>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=".$_SESSION['usuario']->UsrCelular." placeholder='celular' id='celular'>"; ?></td>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=".$_SESSION['usuario']->UsrSkype." placeholder='usuario skype' id='skype'>"; ?></td>
          </tr>
           <tr>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=".$_SESSION['usuario']->UsrContactoEmerg." placeholder='nombre contacto de emergencia' id='contactoEmergencia'>"; ?></td>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=".$_SESSION['usuario']->UsrTelEmerg." placeholder='telefono contacto de emergencia' id='telEmergencia'>"; ?></td>
          </tr>
           <tr>
          <td><?php echo "<input type='text' disabled class='form-control input-sm' value=".$_SESSION['usuario']->UsrCuil." placeholder='cuil' id='cuil'>"; ?></td>
          <td></td>
            </tr>
            
          </tbody>
        </table>
  </div>
  <div class="panel-footer" align="right">
  <table width="100%" border="0" cellspacing="5">
  <tbody>
    <tr>
   <td>
   <?php echo "<button type='submit' id='btnAceptar' onclick='EditarPerfil(".$_SESSION['usuario']->UsrId.");' disabled class='btn btn-success  btn-block'>Aceptar</button> "; ?>
   </td>
   <td>     </td>
   <td><button type="button" id="btnCancelar" onclick="cancelarEdicion();" disabled class="btn btn-default  btn-block">cancelar</button></td>
  </tbody>
  </table>
   </div>
</div>
</div>
<div class="col-sm-8">
       <div class="panel panel-danger">
        <div class="panel-heading">Archivos</div>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                       <form method="post" action="archivoUsuario.php" enctype="multipart/form-data">
                      <tr>
                      <td> <label for="cv" title="ARCHIVO EN FORMATO WORD ÚNICAMENTE">Curriculum vitae <span class="glyphicon glyphicon-info-sign"></span></label></td>
                      <td><input type="file" class="form-control input-sm" id="cv" name="cv" onchange="ValidarDocumento(this);"></td>
                       <td>
                       <?php
                        if (isset($_SESSION['usuario'])) 
                        {
                        $id = $_SESSION["usuario"]->id;
                       
                       echo "<button type='submit' value='subirCV' id='btnCV' disabled class='btn btn-primary btn-block'><span class='glyphicon glyphicon-upload'></span></button>";
                      
                         }
                      ?>  
                       </td>
                      </tr>
                    </form>
 
                    <form method="post" action="UniversityProof.php" enctype="multipart/form-data">
                      <tr>
                      <td> <label for="proof" title="ARCHIVO EN FORMATO DE IMAGEN .JPG">University Proof <span class="glyphicon glyphicon-info-sign"></span></label></td>
                      <td><input type="file" class="form-control input-sm" id="proof" name="proof" onchange="ValidarImagen(this);"></td>
                       <td>
                       <?php
                        if (isset($_SESSION['usuario'])) 
                        {
                        $id = $_SESSION["usuario"]->id;
                       
                       echo "<button type='submit' value='subirUP' id='btnUP' disabled class='btn btn-primary btn-block'><span class='glyphicon glyphicon-upload'></span></button>";
                      
                         }
                      ?>  
                       </td>
                      </tr>
                    </form>

                    <form method="post" action="EmbassyForm.php" enctype="multipart/form-data">
                      <tr>
                      <td> <label for="proof" title="ARCHIVO EN FORMATO DE IMAGEN .JPG">Embassy Form <span class="glyphicon glyphicon-info-sign"></span></label></td>
                      <td><input type="file" class="form-control input-sm" id="embassy" name="embassy" onchange="ValidarEmbassy(this);"></td>
                       <td>
                       <?php
                        if (isset($_SESSION['usuario'])) 
                        {
                        $id = $_SESSION["usuario"]->id;
                       
                       echo "<button type='submit' value='subirEmbassy' id='btnEmbassy' disabled class='btn btn-primary btn-block'><span class='glyphicon glyphicon-upload'></span></button>";
                      
                         }
                      ?>  
                       </td>
                      </tr>
                    </form>

                      <form method="post" action="Pasaporte.php" enctype="multipart/form-data">
                      <tr>
                      <td> <label for="proof" title="ARCHIVO EN FORMATO DE IMAGEN .JPG">Primera hoja del pasaporte <span class="glyphicon glyphicon-info-sign"></span></label></td>
                      <td><input type="file" class="form-control input-sm" id="passport" name="passport" onchange="ValidarPasaporte(this);"></td>
                       <td>
                       <?php
                        if (isset($_SESSION['usuario'])) 
                        {
                        $id = $_SESSION["usuario"]->id;
                       
                       echo "<button type='submit' value='subirPassport' id='btnPassport' disabled class='btn btn-primary btn-block'><span class='glyphicon glyphicon-upload'></span></button>";
                      
                         }
                      ?>  
                       </td>
                      </tr>
                    </form>

                      <form method="post" action="FotoCarnet.php" enctype="multipart/form-data">
                      <tr>
                      <td> <label for="proof" title="ARCHIVO EN FORMATO DE IMAGEN .JPG">Foto sonriente tipo carnet <span class="glyphicon glyphicon-info-sign"></span></label></td>
                      <td><input type="file" class="form-control input-sm" id="fotocarnet" name="fotocarnet" onchange="ValidarFotoCarnet(this);"></td>
                       <td>
                       <?php
                        if (isset($_SESSION['usuario'])) 
                        {
                        $id = $_SESSION["usuario"]->id;
                       
                       echo "<button type='submit' value='subirFotocarnet' id='btnFotocarnet' disabled class='btn btn-primary btn-block'><span class='glyphicon glyphicon-upload'></span></button>";
                      
                         }
                      ?>  
                       </td>
                      </tr>
                    </form>

                      <form method="post" action="workfun.php" enctype="multipart/form-data">
                      <tr>
                      <td> <label for="workfun" title="ARCHIVO EN FORMATO PDF">Términos y condiciones Work and Fun <span class="glyphicon glyphicon-info-sign"></span></label></td>
                      <td><input type="file" class="form-control input-sm" id="workfun" name="workfun" onchange="ValidarWorkFun(this);"></td>
                       <td>
                       <?php
                        if (isset($_SESSION['usuario'])) 
                        {
                        $id = $_SESSION["usuario"]->id;
                       
                       echo "<button type='submit' value='subirWorkfun' id='btnWorkfun' disabled class='btn btn-primary btn-block'><span class='glyphicon glyphicon-upload'></span></button>";
                      
                         }
                      ?>  
                       </td>
                      </tr>
                    </form>

                      <form method="post" action="JobOffer.php" enctype="multipart/form-data">
                      <tr>
                      <td> <label for="workfun" title="ARCHIVO EN FORMATO PDF">Job Offer firmada <span class="glyphicon glyphicon-info-sign"></span></label></td>
                      <td><input type="file" class="form-control input-sm" id="jobOffer" name="jobOffer" onchange="ValidarJobOffer(this);"></td>
                       <td>
                       <?php
                        if (isset($_SESSION['usuario'])) 
                        {
                        $id = $_SESSION["usuario"]->id;
                       
                       echo "<button type='submit' value='subirJobOffer' id='BtnJobOffer' disabled class='btn btn-primary btn-block'><span class='glyphicon glyphicon-upload'></span></button>";
                      
                         }
                      ?>  
                       </td>
                      </tr>
                    </form>

                      <form method="post" action="Sponsor.php" enctype="multipart/form-data">
                      <tr>
                      <td> <label for="workfun" title="ARCHIVO EN FORMATO PDF">Formularios del Sponsor <span class="glyphicon glyphicon-info-sign"></span></label></td>
                      <td><input type="file" class="form-control input-sm" id="sponsor" name="sponsor" onchange="ValidarSponsor(this);"></td>
                       <td>
                       <?php
                        if (isset($_SESSION['usuario'])) 
                        {
                        $id = $_SESSION["usuario"]->id;
                       
                       echo "<button type='submit' value='subirSponsor' id='BtnSponsor' disabled class='btn btn-primary btn-block'><span class='glyphicon glyphicon-upload'></span></button>";
                      
                         }
                      ?>  
                       </td>
                      </tr>
                    </form>
                  
                      </tbody>
                    </table>
              </div>
       </div>
</div>
  </div>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12" align="right">
               <small>
               <p>Powered by <b>pituca</b><strong></p></small>
            </div>
        </div>
    </div>
</footer>
	
</div>

</body>
</html>