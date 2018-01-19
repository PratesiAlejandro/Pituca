<?php
	include 'AccesoDatos.php';

	class Usuario 
	{
		public $id;
		public $nombre;
		public $apellido;
		public $usuario;
		public $mail;
		public $clave;
		public $fechaNac;
		public $dni;
		public $NroPasaporte;
		public $ciudad;
		public $provincia;
		public $nacionalidad;
		public $domicioReal;
		public $codigoPostal;
		public $telefonoFijo;
		public $celular;
		public $usuarioSkype;
		public $contactoEmergencia;
		public $telEmergencia;
		public $cuil;
		public $tipo;

		public $ArDetalle;
		public $ArNombre;
		public $ArTipo;
		public $ArRuta;
		public $ArUser;

		public $ComMes;
		public $ComImpPesos;
		public $ComImpDolares;
		public $ComObservaciones;
		public $ComUser;
		
		 public function GetNombre()
		{
			return $this->nombre;
		}

		public static function TraerTodosLosUsuarios()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT * from users");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");		
		}

		public static function GetAllUsers()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT * from users");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");		
		}

		public static function TraerUnUsuario($id) 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT * from users where users.UsrId = $id");
			$consulta->execute();
			$usuarioBuscado = $consulta->fetchObject('Usuario');
			return $usuarioBuscado;	
		}


			public static function TraerArchivos() 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT ArID,ArDetalle,ArNombre,ArTipo,ArRuta,ArUser FROM archivos");
			$consulta->execute();
		  return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
		}


		public static function TraerComprobantesDePago($id) 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT ComID,ComMes,ComImpPesos,ComImpDolares,ComObservaciones,ComUser from comprobantes where comprobantes.ComUser = $id");
			$consulta->execute();
				  return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
	
		}

		public static function TraerTotalPesos($id) 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT SUM(ComImpPesos) AS TotalPesos from comprobantes where comprobantes.ComUser = $id");
			$consulta->execute();
		    return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
	
		}
		public static function TraerTotalDolar($id) 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT SUM(ComImpDolares) AS TotalDolar from comprobantes where comprobantes.ComUser = $id");
			$consulta->execute();
		    return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
	
		}

		public static function TraerTotalAPagarPesos($id) 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT UsrTotalAPagarPesos from users where users.UsrId = $id");
			$consulta->execute();
		    return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
	
		}

		public static function TraerTotalAPagarDolar($id) 
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("SELECT UsrTotalAPagarDolar from users where users.UsrId = $id");
			$consulta->execute();
		    return $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");	
	
		}



		public function InsertarElUsuario()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,usuario,mail,clave,dni,tipo,telefono,importe,descripcion,arccv) values('$this->nombre','$this->usuario','$this->mail','$this->clave','$this->dni','$this->tipo','$this->telefono','$this->importe','$this->descripcion','$this->foto')");
			$consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
		}

		public function InsertarElArchivo()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into archivos (ArDetalle,ArNombre,ArTipo,ArRuta,ArUser)
			values('$this->ArDetalle','$this->ArNombre','$this->ArTipo','$this->ArRuta','$this->ArUser')");
			$consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
		}

			public function InsertarComprobantePago()
		{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into comprobantes (ComMes,ComImpPesos,ComImpDolares,ComObservaciones,ComUser)
			values('$this->ComMes','$this->ComImpPesos','$this->ComImpDolares','$this->ComObservaciones','$this->ComUser')");
			$consulta->execute();
			return $objetoAccesoDato->RetornarUltimoIdInsertado();
		}

		public static function BorrarUsuarioPorId($id)
	 	{
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("
				delete 
				from usuarios 				
				WHERE id=:id");	
			$consulta->bindValue(':id',$id, PDO::PARAM_INT);		
			$consulta->execute();
			return $consulta->rowCount();


		}

		public function ModificarUsuario()
	 	{
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta = $objetoAccesoDato->RetornarConsulta("
				update users 
				set UsrNombre='$this->nombre',
					UsrApellido='$this->apellido',
					UsrMail='$this->mail',
					Userdni='$this->dni',
					UsrClave='$this->clave',
					UsrTipo='$this->tipo',
					UserfechaNacimiento='$this->fechaNac',
					UserNroPasaporte='$this->NroPasaporte',
					UsrCiudadNac='$this->ciudad',
					UsrProvinciaNac='$this->provincia',
					UsrNacionalidad='$this->nacionalidad',
					UsrDomicilioReal='$this->domicioReal',
					UsrCP='$this->codigoPostal',
					UsrTelefonoFijo='$this->telefonoFijo',
					UsrCelular='$this->celular',
					UsrSkype='$this->usuarioSkype',
					UsrContactoEmerg='$this->contactoEmergencia',
					UsrTelEmerg='$this->telEmergencia',
					UsrCuil='$this->cuil'
				
				WHERE UsrId='$this->id'");
			return $consulta->execute();
		}

	public function GuardarTxt()
	{
        $archivo=fopen("../archivos/usuarios.txt","a");//escribe y mantiene la informacion existente		
		//$ahora=date("Y-m-d H:i:s"); 
		$renglon=$this->mail."=>".$this->nombre."=>".$this->clave."=>".$this->tipo."=>".$this->foto."\r\n";

		fwrite($archivo,$renglon); 		 
		fclose($archivo);

		return true;
	}
	public static function CrearTablaUsuarios()
	{
		if(file_exists("../archivos/usuarios.txt"))
		{	
			$cadena=" <table border=1><th> Mail </th><th> Nombre </th><th> Clave </th><th> Tipo </th><th> Foto </th>";

			$archivo = fopen("../archivos/usuarios.txt","r");

			while (!feof($archivo)) {
				
				$archivoAuxiliar = fgets($archivo);

				$alumnos = explode("=>", $archivoAuxiliar);

				$alumnos[0] = trim($alumnos[0]);
				if($alumnos[0] != "")

					$cadena = $cadena."<tr> <td> ".$alumnos[0]."</td> <td> ".$alumnos[1]."</td><td>".$alumnos[2]."</td><td>".$alumnos[3]."</td><td> <img width=50px height=50px style=border-radius:50% src=".$alumnos[4]."></img></td></tr> "; 
			}

			$cadena = $cadena." </table>";
			fclose($archivo);

			$archivo=fopen("../archivos/TablaUsuarios.php", "w");
			fwrite($archivo, $cadena);
			fclose($archivo);
		}
		else
		{
			$cadena = "No hay Usuarios";

			$archivo = fopen("../archivos/TablaUsuarios.php", "w");
			fwrite($archivo, $cadena);
			fclose($archivo);
		}
	
	}



	}
?>