<?php

    require_once "Usuario.php";

    class Upload
    {
        private $_destino;
        private $_usuario;
        private $_uploadOK;
        private $_file;

        public function getDestino()
        {
            return $this->_destino;
        }

        public function Upload($destino, $usuario,$file[0], $uploadOK)
        {
            $this->_destino = $destino;
            $this->_usuario = $usuario;
            $this->_file = $file;
            $this->_uploadOK = $uploadOK;
        }

        public static function darPersmisosSO($dir,$tipoPermiso)
        {
            //Verifico que so tiene el sistema
            $validaOK = true;
            if((strtoupper(substr(PHP_OS,0,3) === "LIN")))
            {
                echo PHP_OS." - No es Windows, se mantiene los directorios<br>";
                $validaOK = false;
            }else {
                echo "<br>".PHP_OS."<br>";
                
                if(chmod($dir, $tipoPermiso))
                {
                    echo "<h2>Se da persmisos de al dir especificado</h2><br>";
                }
            }

            return $validaOK;
        }

        public function ValidarArchivo()
        {
            $NOMBRE = "";
            $tipoArchivo = pathinfo($this->_file,PATHINFO_EXTENSION);
            var_dump($this->_file);
            $fecha = date();

            $NOMBRE = $this->_usuario->id ."-".$fecha.".".$tipoArchivo;

            #Verifica si el archivo existe
            if(file_exists($this->_destino.$NOMBRE))
            {
                echo "<h2>El archivo ya existe. Verificar</h2><br>";
                $this->_uploadOK = false;
            }

            #Verifico el tamaño maximo que permito subir. En php.ini el max es 2MB (modificable)
            if($this->_file > 1000000)
            {
                echo "<h2>El archivo es demasiado grande</h2><br>";
                $this->_uploadOK = false;
            }

            #Obtiene el tamño de una imagen, si el archivo no escapeshellarg
            #una imagen, retorna FALSE
            $esImagen = getimagesize($_FILES[$this->_name]["tmp_name"]);
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
                    $this->_uploadOK = false;
                }
            }else { // si es imagen
                if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "png" )
                {
                    echo "Solo se permiten imagenes con extension JPG, JPEG, PNG";
                    $this->_uploadOK = false;
                }
            }
    
            #Verifico si hubo algun error en los chequeos upload
            if($this->_uploadOK === FALSE)
            {
                echo "<h2>No se pudo subir el archivo.</h2><br>";
            }else {
                $tmp_name = $_FILES[$this->_name]["tmp_name"];
                $this->_destino = $this->_destino.$NOMBRE;
                //var_dump($this->_destino);
                $destino = $this->_destino;
               
               // var_dump($tmp_name);
               // var_dump($destino);die();
                //Muevo el archivo al destino
       
                if(move_uploaded_file($tmp_name,$destino))
                {
                    echo "<h2>El archvo ".basename($tmp_name)." se ha subido con exito.</h2>";
                    var_dump($destino);
                    Upload::darPersmisosSO($destino,0755);
                }else {
                    echo "<h2>Lamentablemente no se pudo subir el archivo</h2>";
                }
            }
            //var_dump($this->_uploadOK);
            return $this->_uploadOK;
 
        }

    }

?>