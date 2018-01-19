<?php
	//require_once "Upload.php";
	require_once "Usuario.php";
	if(!isset($_SESSION)) 
    session_start(); 
    
	$id = isset($_POST["id"]) ? $_POST["id"]:NULL;
	$queHago = isset($_POST["queHago"]) ? $_POST["queHago"]:NULL;
	$res = "no ok";
    $file = isset($_FILE["file"]["name"]) ? $_FILE["file"]["name"]:NULL;
	switch ($queHago) {
		case "1": 
		    $usuario = Usuario::TraerUnUsuario($id);
		    echo $usuario->id;
		    $destino = "../archivos_subidos/";
			$NOMBRE = "";
			$uploadOK = true;
            $tipoArchivo = pathinfo($_FILE["file"]["name"],PATHINFO_EXTENSION);
            var_dump($tipoArchivo);
            $fecha = date();

            $NOMBRE = $this->_usuario->id ."-".$fecha.".".$tipoArchivo;

            #Verifica si el archivo existe
            if(file_exists($destino.$NOMBRE))
            {
                echo "<h2>El archivo ya existe. Verificar</h2><br>";
                $uploadOK = false;
            }

            #Verifico el tamaño maximo que permito subir. En php.ini el max es 2MB (modificable)
            if($_FILE["file"]["name"] > 1000000)
            {
                echo "<h2>El archivo es demasiado grande</h2><br>";
                $uploadOK = false;
            }

            #Obtiene el tamño de una imagen, si el archivo no escapeshellarg
            #una imagen, retorna FALSE
            $esImagen = getimagesize($_FILES["file"]["tmp_name"]);
           // echo "imagen es";
           // var_dump($esImagen);
            if($esImagen === false)
            {
                //Solo se permite la carga de algunas extensiones
                if($tipoArchivo != "doc" && $tipoArchivo != "pdf" && $tipoArchivo != "docx")
                {
                    echo "Solo se permiten archivos con extension DOC, DOCX O PDF";
                }
                else {
                    $uploadOK = false;
                }
            }else { // si es imagen
                if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "png" )
                {
                    echo "Solo se permiten imagenes con extension JPG, JPEG, PNG";
                    $uploadOK = false;
                }
            }
    
            #Verifico si hubo algun error en los chequeos upload
            if($ploadOK === FALSE)
            {
                echo "<h2>No se pudo subir el archivo.</h2><br>";
            }else {
                $tmp_name = $_FILES["file"]["tmp_name"];
                $destino = $destino.$NOMBRE;
                //var_dump($this->_destino);
                
               
               // var_dump($tmp_name);
               // var_dump($destino);die();
                //Muevo el archivo al destino
       
                if(move_uploaded_file($tmp_name,$destino))
                {
                    echo "<h2>El archvo ".basename($tmp_name)." se ha subido con exito.</h2>";
                    var_dump($destino);
                    Upload::darPersmisosSO($destino,0755);
                    $res = "ok";
                }else {
                    echo "<h2>Lamentablemente no se pudo subir el archivo</h2>";
                }
            }
			break;
		case "2":
			# code...
			break;
		case "3":
			# code...
			break;
		case "4":
			# code...
			break;
		case "5":
			# code...
			break;
		case "6":
			# code...
			break;
		case "7":
			# code...
			break;
		default:
			# code...
			break;
	}

	echo $res;
?>