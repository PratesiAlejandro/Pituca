 <?php
require_once("../php/usuario.php");
if(!isset($_SESSION)) 
   session_start(); 
	require 'productos.php';
	require 'archivo.php';


	$queHago = $_POST['queHago'];

	switch ($queHago) 
	{
		case 'MostrarGrillaAdmin':
			
			$arrayDeUsuarios = Usuario::GetAllUsers();

     $tabla = "<div class='panel panel-primary'>
               <div class='panel-heading'>
               Usuarios
            	</div>
               <table class='table table-condensed' border='0'>
               <thead>
               <tr>
               <th>Mail</th>
               <th>Nombre</th>   
               <th>Clave</th>
               <th>Tipo</th>
               <th>Usuario Skype</th>
               <th></th>
               <th></th>
               <th></th>
               </tr>
               </thead>";

                foreach ($arrayDeUsuarios as $usuario) 
              {
                $tabla .= "<tr>
                <td>$usuario->UsrMail</td>
                <td>$usuario->UsrNombre</td>
                <td>$usuario->UsrClave</td>
                <td>$usuario->UsrTipo</td>
                <td>$usuario->UsrSkype</td>
                <td><button class='btn btn-info btn-xs' title='Ver archivos' data-toggle='modal' data-target='#myModalFile' onclick=InfoArchivos($usuario->UsrId)> <span class='glyphicon glyphicon-file'></span></button></td>
                <td><button class='btn btn-warning btn-xs' title='Editar' data-toggle='modal' data-target='#myModal' onclick=TraerUsuario($usuario->UsrId)><span class='glyphicon glyphicon-pencil'></span></button></td>
                <td><button class='btn btn-danger btn-xs' title='Eliminar' onclick=Borrar($usuario->UsrId)> <span class='glyphicon glyphicon-remove'></span></button></td>
                </tr>";
              }
              $tabla .= " </table></div>"; 
              echo $tabla;
			break;
	
		case 'ingresar':
				//echo "estoy en ingresar de admin"; 
				//die();
			  	$mail = $_POST['mail'];
				$clave = $_POST['clave'];
		
			//	$arrayDeUsuarios = Usuario::TraerTodosLosUsuarios();
				$arrayDeUsuarios = Usuario::GetAllUsers();
				$retorno["Exito"] = FALSE;
				$retorno["Mensaje"] = "Correo o contraseña incorrecta.";
				$retorno["Tipo"] = "";
				foreach ($arrayDeUsuarios as $usuario)
				{
					if ($usuario->UsrMail == $mail && $usuario->UsrClave == $clave)
					{

						$_SESSION['usuario'] = $usuario;
						$retorno["Exito"] = TRUE;
						$retorno["Mensaje"] = "Bienvenido ". $usuario->mail;
						$retorno["Tipo"] = $usuario->UsrTipo;
					//	$retorno["Combo"] = $_SESSION['combo'];
						break;
					}
				}
				echo json_encode($retorno);	
				break;	
		
		case 'borrar':
				$id = $_POST['id'];
			
				Usuario::BorrarUsuarioPorId($id);
				//Usuario::Borrar(new Usuario($mail,$nombre,$clave,$tipo,$foto)); 

				break;

	    case 'traerUsuario':
				$id = $_POST['id'];
				
				$usuarioBuscado = Usuario::TraerUnUsuario($id);
				//var_dump($usuarioBuscado);
				//die();
				// ESTA ES EDICION DE USUARIOS POR ADMIN
				$nuevoDiv = " <div class='table-responsive'>
				 <table class='table'>
                    <tr>
                    <td><input type='text' class='form-control input-sm' id='nombreModif' value='$usuarioBuscado->UsrNombre'></td>
                     <td><input type='text' class='form-control input-sm' id='apellidoModif' value='$usuarioBuscado->UsrApellido'></td>
                     <td><input type='text' class='form-control input-sm' id='mailModif' value='$usuarioBuscado->UsrMail'></td>
                    </tr>
                    <tr>
                    <td><input type='text' class='form-control input-sm' id='claveModif' value='$usuarioBuscado->UsrClave'></td>
                    <td><input type='text' class='form-control input-sm' id='tipoModif' value='$usuarioBuscado->UsrTipo'></td>
                    <td><input type='text' class='form-control input-sm' id='fechaNacModif' value='$usuarioBuscado->UserfechaNacimiento'></td>
                    </tr>
                    <tr>
                    <td><input type='text' class='form-control input-sm' id='dniModif' value='$usuarioBuscado->Userdni'></td>
                    <td><input type='text' class='form-control input-sm' id='pasaporteModif' value='$usuarioBuscado->UserNroPasaporte'></td>
                    <td><input type='text' class='form-control input-sm' id='ciudadModif' value='$usuarioBuscado->UsrCiudadNac'></td>
                    </tr>
                    <tr>
                    <td><input type='text' class='form-control input-sm' id='provinciaModif' value='$usuarioBuscado->UsrProvinciaNac'></td>
                    <td><input type='text' class='form-control input-sm' id='nacionalidadModif' value='$usuarioBuscado->UsrNacionalidad'></td>
                    <td><input type='text' class='form-control input-sm' id='domicilioModif' value='$usuarioBuscado->UsrDomicilioReal'></td>
                    </tr>
                     <tr>
                    <td><input type='text' class='form-control input-sm' id='cpModif' value='$usuarioBuscado->UsrCP'></td>
                    <td><input type='text' class='form-control input-sm' id='telefonoModif' value='$usuarioBuscado->UsrTelefonoFijo'></td>
                     <td><input type='text' class='form-control input-sm' id='celularModif' value='$usuarioBuscado->UsrCelular'></td>
                    </tr>
                    <tr>
                    <td><input type='text' class='form-control input-sm' id='skypeModif' value='$usuarioBuscado->UsrSkype'></td>
                    <td><input type='text' class='form-control input-sm' id='contactoModif' value='$usuarioBuscado->UsrContactoEmerg'></td>
                    <td><input type='text' class='form-control input-sm' id='telEmergenciaModif' value='$usuarioBuscado->UsrTelEmerg'></td>
                    </tr>
                     <tr>
                    <td><input type='text' class='form-control input-sm' id='cuilModif' value='$usuarioBuscado->UsrCuil'></td>
                    </tr>
                    <tr>
                    <td><button class='btn btn-success btn-sm' onclick=Modificar($id)>Guardar</button></td>
			 </tr></table></div>";
              echo $nuevoDiv;
              break;	

             case 'traerArchivos':
         
				$id = $_POST['id'];
				$archivoBuscado = Usuario::TraerArchivos();

				 $tabla = "<div class='panel panel-primary'>
               <div class='panel-heading'>
               Archivos
            	</div>
               <table class='table table-bordered' border='0'>
               <thead>
               <tr>
               <th>Detalle</th>
               <th>Nombre</th>
               <th>Tipo</th>   
               <th>Ruta</th>
               <th>User</th>
              
             
               </tr>
               </thead>";

                foreach ($archivoBuscado as $usuario) 
              {
                $tabla .= "<tr>
                <td>$usuario->ArDetalle</td>
                <td>$usuario->ArNombre</td>
                <td>$usuario->ArTipo</td>
                <td>$usuario->ArRuta</td>
                <td>$usuario->ArUser </td>";
              }
              $tabla .= " </table></div>"; 
              echo $tabla;
			

              break;	

        case 'traerUsuarioParaEditarPerfil':
				// Modificar Perfil
        		$id = $_POST['id'];	

				$usuarioBuscado = Usuario::TraerUnUsuario($id);

				$nuevoDiv = "<div class='panel panel-info'>
				<div class='panel-heading'>
				<div class='panel-title'>
                    Datos personales
				</div>
				</div>
				<div class='panel-body'>
				   <form class='form-horizontal'>
				       <div class='form-group'>
  				       <label for='usuario' class='control-label col-sm-2'>Usuario: </label>
  				       <div class='col-sm-10'> 
    				   <input type='text' id='usuario' class='form-control input-sm' placeholder='Usuario de login' value='$usuarioBuscado->usuario'>
                       </div>
					   </div>
					     <div class='form-group'>
  				    <label for='clave' class='control-label col-sm-2'>Clave:</label>
  				    <div class='col-sm-10'> 
  				     <input type='text' id='clave' class='form-control input-sm' value='$usuarioBuscado->clave'>
  				     </div>
  				     </div>
		               <div class='form-group'>
  				       <label for='email' class='control-label col-sm-2' >Email:</label>
  				       <div class='col-sm-10'> 
    				   <input type='text' id='mail' class='form-control input-sm' value='$usuarioBuscado->mail'>
  				       </div>
  				       </div>
				     <div class='form-group'>
  				     <label for='nombre' class='control-label col-sm-2'>Nombre: </label>
  				     <div class='col-sm-10'> 
                     <input type='text' id='nombre' class='form-control input-sm' value='$usuarioBuscado->nombre'>
                     </div>
					 </div>
					
					<div class='form-group'>
  				    <label for='dni' class='control-label col-sm-2'>DNI: </label>
  				    <div class='col-sm-10'> 
   					<input type='text' id='dni' class='form-control input-sm' disabled placeholder='DNI' value='$usuarioBuscado->dni'>
                    </div>
					</div>
		          
  				     <div class='form-group'>
  				     <label for='tipo' class='control-label col-sm-2'>Tipo:</label>
  				     <div class='col-sm-10'> 
  				     <input type='text' id='tipo' class='form-control input-sm' disabled value='$usuarioBuscado->tipo'>
  				     </div>
                     </div>
                     <div class='form-group'>
  				     <label for='telefono' class='control-label col-sm-2'>Telefono:</label>
  				     <div class='col-sm-10'> 
  				     <input type='text' id='telefono' placeholder='Numero de contacto' class='form-control input-sm' value='$usuarioBuscado->telefono'>
  				     </div>
                     </div>
                     <div class='form-group'>
  				    <label for='importe' class='control-label col-sm-2'>Importe:</label>
  				    <div class='col-sm-10'> 
  				     <input type='text' id='importe' class='form-control input-sm' placeholder='$' value='$usuarioBuscado->importe'>
  				     </div>
  				     </div>
                     <div class='form-group'>
 					 <label for='comment' class='control-label col-sm-2'>Obs:</label>
 					 <div class='col-sm-10'> 
 					 <input type='text' class='form-control col-sm-10' rows='2' id='descripcion' value='$usuarioBuscado->descripcion'>
					 </div>
					 </div>
                
                    
            </form>
        </div>
        <div class='panel-footer'>
        <button class='btn btn-warning btn-sm' onclick=editarPerfil($id)>Modificar</button>
        </div>
            </div>";
              echo $nuevoDiv;

              break;	      

        case 'modificar':
				
				echo "estoy en modificar de usuarios"; 
				
				$objUsuario = new Usuario();
				$objUsuario->UsrId = $_POST['id'];
				$objUsuario->UserNombre = $_POST['nombre'];
				$objUsuario->UsrApellido = $_POST['apellido'];
				$objUsuario->usrMail = $_POST['email'];
				$objUsuario->UsrClave = $_POST['clave'];
				$objUsuario->UserfechaNacimiento = $_POST['fechaNac'];
				$objUsuario->Userdni = $_POST['dni'];
				$objUsuario->UserNroPasaporte = $_POST['NroPasaporte'];
				$objUsuario->UsrCiudadNac = $_POST['ciudad'];
				$objUsuario->UsrProvinciaNac = $_POST['provincia'];
				$objUsuario->UsrNacionalidad = $_POST['nacionalidad'];
				$objUsuario->UsrDomicilioReal = $_POST['domicilioReal'];
				$objUsuario->UsrCP = $_POST['codigoPostal'];
				$objUsuario->UsrTelefonoFijo = $_POST['telFijo'];
				$objUsuario->UsrContactoEmerg = $_POST['contactoEmergencia'];
				$objUsuario->UsrCelular = $_POST['celular'];
				$objUsuario->UsrSkype = $_POST['usuarioSkype'];
				$objUsuario->UsrTelEmerg = $_POST['telEmergencia'];
				$objUsuario->UsrCuil = $_POST['cuil'];
				
				$objUsuario->ModificarUsuario();

					$_SESSION['usuario']=null;
	                $_SESSION['combo']=null;

                    session_destroy();

              break;	 

               case 'modificarAdmin':
				
				echo "estoy en modificar de admin"; 
				
				$objUsuario = new Usuario();
				$objUsuario->UsrId = $_POST['id'];
				$objUsuario->UserNombre = $_POST['nombre'];
				$objUsuario->UsrApellido = $_POST['apellido'];
				$objUsuario->usrMail = $_POST['email'];
				$objUsuario->UsrClave = $_POST['clave'];
				$objUsuario->UserfechaNacimiento = $_POST['fechaNac'];
				$objUsuario->Userdni = $_POST['dni'];
				$objUsuario->UserNroPasaporte = $_POST['NroPasaporte'];
				$objUsuario->UsrCiudadNac = $_POST['ciudad'];
				$objUsuario->UsrProvinciaNac = $_POST['provincia'];
				$objUsuario->UsrNacionalidad = $_POST['nacionalidad'];
				$objUsuario->UsrDomicilioReal = $_POST['domicilioReal'];
				$objUsuario->UsrCP = $_POST['codigoPostal'];
				$objUsuario->UsrTelefonoFijo = $_POST['telFijo'];
				$objUsuario->UsrContactoEmerg = $_POST['contactoEmergencia'];
				$objUsuario->UsrCelular = $_POST['celular'];
				$objUsuario->UsrSkype = $_POST['usuarioSkype'];
				$objUsuario->UsrTelEmerg = $_POST['telEmergencia'];
				$objUsuario->UsrCuil = $_POST['cuil'];
				
				$objUsuario->ModificarUsuario();

				//	$_SESSION['usuario']=null;
	            //    $_SESSION['combo']=null;

                  //  session_destroy();

              break;	 

        case 'editarPerfil':
				echo "estoy en editarPerfil de admin"; 
				//die();

				$objUsuario = new Usuario();
				$objUsuario->id = $_POST['id'];
				$objUsuario->nombre = $_POST['nombre'];
				$objUsuario->usuario = $_POST['usuario'];
				$objUsuario->mail = $_POST['mail'];
				$objUsuario->clave = $_POST['clave'];
				$objUsuario->dni = $_POST['dni'];
				$objUsuario->tipo = $_POST['tipo'];
				$objUsuario->telefono = $_POST['telefono'];
				$objUsuario->importe = $_POST['importe'];
				$objUsuario->descripcion = $_POST['descripcion'];

				//var_dump($objUsuario);

				$objUsuario->ModificarUsuario();
              break;    

               case 'BorrarCookie':   

              //setCookie('miMail', '', time() - 1000);

              	$mail = $_POST['mail'];
				$nombre = $_POST['nombre'];
				$clave = $_POST['clave'];

			 // if(isset($_COOKIE["miMail"])){
			    setcookie("miMail", $mail, time()-60, '/');
			    //$retorno = "COOKIE BORRADA!";
			   //}
			   //if(isset($_COOKIE['nombre'])){
			    setcookie("nombre", $nombre, time()-60, '/');
			    setcookie("miClave", $clave, time()-60, '/');
			    $retorno = "COOKIE BORRADA!";

			    echo $retorno;
				//}
                break; 	

    	case 'MostrarComprobantesDePago':

    	         if(!isset($_SESSION)) 
                 session_start();

                 if (isset($_SESSION['usuario'])) 
				          {
			      
                    $id = $_SESSION['usuario']->UsrId;
    	          
			            } 

				    $comprobantes = Usuario::TraerComprobantesDePago($id);

				    $tabla = "<div class='panel panel-primary'>
               <div class='panel-heading'>
               Comprobantes de pago
              	</div>
                <table class='table table-bordered' border='0'>
                <thead>
                <tr>
                <th>Periodo</th>
                <th>Importe pesos</th>
                <th>Importe dolares</th>   
                <th>Observaciones</th>
               </tr>
               </thead>";

                foreach ($comprobantes as $usuario) 
                {
                $tabla .= "<tr>
                <td>$usuario->ComMes</td>
                <td>$usuario->ComImpPesos</td>
                <td>$usuario->ComImpDolares</td>
                <td>$usuario->ComObservaciones</td>";
                }
              $tabla .= " </table></div>"; 
              echo $tabla;
			
		         break;	


             case 'MostrarTotalPesos':

               if(!isset($_SESSION)) 
               session_start();

               if (isset($_SESSION['usuario'])) 
               {
               $id = $_SESSION['usuario']->UsrId;
               } 

               $TotalPesos = Usuario::TraerTotalPesos($id);

                  $tabla = "";

                foreach ($TotalPesos as $usuario) 
                {
                $tabla .= "$usuario->TotalPesos";
                }
               
              echo $tabla;

             break;

             case 'MostrarTotalDolar':

               if(!isset($_SESSION)) 
               session_start();

               if (isset($_SESSION['usuario'])) 
               {
               $id = $_SESSION['usuario']->UsrId;
               } 

               $TotalPesos = Usuario::TraerTotalDolar($id);

                  $tabla = "";

                foreach ($TotalPesos as $usuario) 
                {
                $tabla .= "$usuario->TotalDolar";
                }
               
              echo $tabla;

             break;


               case 'MostrarTotalAPagarPesos':

               if(!isset($_SESSION)) 
               session_start();

               if (isset($_SESSION['usuario'])) 
               {
               $id = $_SESSION['usuario']->UsrId;
               } 

               $APagarPesos = Usuario::TraerTotalAPagarPesos($id);

                  $tabla = "";

                foreach ($APagarPesos as $usuario) 
                {
                $tabla .= "$usuario->UsrTotalAPagarPesos";
                }
               
              echo $tabla;

             break;

              case 'MostrarTotalAPagarDolar':

               if(!isset($_SESSION)) 
               session_start();

               if (isset($_SESSION['usuario'])) 
               {
               $id = $_SESSION['usuario']->UsrId;
               } 

               $APagarDolar = Usuario::TraerTotalAPagarDolar($id);

                  $tabla = "";

                foreach ($APagarDolar as $usuario) 
                {
                $tabla .= "$usuario->UsrTotalAPagarDolar";
                }
               
              echo $tabla;

             break;







	}

 ?>

