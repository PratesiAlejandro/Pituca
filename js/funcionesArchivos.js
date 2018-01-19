
var nombre;
var apellido;
var email;
var fechaNac;
var dni;
var NroPasaporte;
var ciudad;
var provincia;
var nacionalidad;
var domicioReal;
var codigoPostal;
var telFijo;
var celular;
var usuarioSkype;
var contactoEmergencia;
var telEmergencia;
var cuil;

$( document ).ready(function() {

  nombre = $("#nombre").val();
  apellido = $("#apellido").val();   
  email = $("#email").val();
  fechaNac = $("#fechaNac").val();
  dni = $("#dni").val();
  NroPasaporte = $("#pasaporte").val();
  ciudad = $("#ciudad").val();
  provincia = $("#prov").val();
  nacionalidad = $("#nacionalidad").val();
  domicioReal = $("#domicioReal").val();
  codigoPostal = $("#codigoPostal").val();
  telFijo = $("#telFijo").val();
  celular = $("#celular").val();
  usuarioSkype = $("#skype").val();
  contactoEmergencia = $("#contactoEmergencia").val();
  telEmergencia = $("#telEmergencia").val();
  cuil = $("#cuil").val();
 
});

function EditarPerfil(id)
{

var miid = id;
nombre = $("#nombre").val();
apellido = $("#apellido").val();
email = $("#email").val();
fechaNac = $("#fechaNac").val();
dni = $("#dni").val();
NroPasaporte = $("#pasaporte").val();
ciudad = $("#ciudad").val();
provincia = $("#prov").val();
nacionalidad = $("#nacionalidad").val();
domicioReal = $("#domicioReal").val();
codigoPostal = $("#codigoPostal").val();
telFijo = $("#telFijo").val();
celular = $("#celular").val();
usuarioSkype = $("#skype").val();
contactoEmergencia = $("#contactoEmergencia").val();
telEmergencia = $("#telEmergencia").val();
cuil = $("#cuil").val();

  var pagina = "../php/nexo.php";

  $.ajax({ 
      type: 'POST',
      url: pagina, 
      dataType: "html",
      data: {
      queHago : "modificar",
      id : miid,
      nombre : nombre, 
      apellido : apellido, 
      email : email,
      fechaNac : fechaNac, 
      dni : dni, 
      NroPasaporte : NroPasaporte,
      ciudad : ciudad, 
      provincia : provincia, 
      nacionalidad : nacionalidad,
      domicioReal : domicioReal, 
      codigoPostal : codigoPostal, 
      usuarioSkype : usuarioSkype,
      contactoEmergencia : contactoEmergencia, 
      telEmergencia : telEmergencia, 
      cuil : cuil
    },
        async: true 
    })
  .done(function (respuesta) { 
    
    alert(respuesta + "Modificar");
    window.location.replace("../html/login.php");

  })
  .fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
         window.location.replace("../html/login.php");
   });
}   

function cancelarEdicion() {
 
  $("#nombre").val(nombre);
  $("#nombre").prop('disabled', true);
   $("#apellido").val(apellido);
  $("#apellido").prop('disabled', true);
   $("#email").val(email);
  $("#email").prop('disabled', true);
   $("#fechaNac").val(fechaNac);
  $("#fechaNac").prop('disabled', true);
   $("#dni").val(dni);
  $("#dni").prop('disabled', true);
   $("#pasaporte").val(NroPasaporte);
  $("#pasaporte").prop('disabled', true);
   $("#ciudad").val(ciudad);
  $("#ciudad").prop('disabled', true);
   $("#prov").val(provincia);
  $("#prov").prop('disabled', true);
   $("#nacionalidad").val(nacionalidad);
  $("#nacionalidad").prop('disabled', true);
   $("#domicioReal").val(domicioReal);
  $("#domicioReal").prop('disabled', true);
   $("#codigoPostal").val(codigoPostal);
  $("#codigoPostal").prop('disabled', true);
   $("#telFijo").val(telFijo);
  $("#telFijo").prop('disabled', true);
   $("#celular").val(celular);
  $("#celular").prop('disabled', true);
   $("#skype").val(usuarioSkype);
  $("#skype").prop('disabled', true);
   $("#contactoEmergencia").val(contactoEmergencia);
  $("#contactoEmergencia").prop('disabled', true);
   $("#telEmergencia").val(telEmergencia);
  $("#telEmergencia").prop('disabled', true);
   $("#cuil").val(cuil);
  $("#cuil").prop('disabled', true);
 
 $("#btnCancelar").prop('disabled', true);
  $("#btnAceptar").prop('disabled', true);

}

function IrCargaArchivos(){

  window.location.replace("../php/UserArchivos.php");

}

function Agregar(){

var pagina = "../php/nexo.php";
  var fileArchivo = $("#filePago").val();
  var importe = $("#importe").val();
 

  alert(fileArchivo);
  alert(importe);

  SubirFoto();

}


function SubirFoto(){
 /*
    var pagina = "../php/nexo.php";
    var foto = $("#filePago").val();

 var archivo = $("#filePago")[0];//foto[0];
 var formData = new FormData(); //permite subir archivos
 formData.append("archivo",archivo.files[0]);//configurar el objeto
 formData.append("queHago", "subirFoto");

 $.ajax({
        type: 'post',
        url: pagina,
        dataType: "json",
  cache: false,
  contentType: false,
  processData: false,
        data: formData,
        async: true
    })
 .done(function (objJson) {//es una funcion que recibe un delegado una repuesta puede ser cualquier texto
  //alert(objJson);
  if(!objJson.Exito){
   //alert("Hubo un errorrrrrrrrrrrr");
   alert(objJson.Mensaje);
   //return false;
  }
  // else
  // {
  //  return true;
  // }
 
 })
 .fail(function (jqXHR, textStatus, errorThrown) {//recibe mas parametros entre ellos errores
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    }); 
     */
}

function habilitarEdicion(){

  $("#nombre").prop('disabled', false);
  $("#apellido").prop('disabled', false);
  $("#email").prop('disabled', false);
  $("#fechaNac").prop('disabled', false);
  $("#dni").prop('disabled', false);
  $("#pasaporte").prop('disabled', false);
  $("#ciudad").prop('disabled', false);
  $("#prov").prop('disabled', false);
  $("#nacionalidad").prop('disabled', false);
  $("#domicioReal").prop('disabled', false);
  $("#codigoPostal").prop('disabled', false);
  $("#telFijo").prop('disabled', false);
  $("#celular").prop('disabled', false);
  $("#skype").prop('disabled', false);
  $("#contactoEmergencia").prop('disabled', false);
  $("#telEmergencia").prop('disabled', false);
  $("#cuil").prop('disabled', false);
  $("#btnCancelar").prop('disabled', false);
  $("#btnAceptar").prop('disabled', false);

}

function AgregarArchivosCV(ids)
{

  var idUsuario = ids;
  var name = $("#cv").attr("name");
  var idArchivo = $("#cv").val();

  var inputFileImage = document.getElementById('cv');
        var file = inputFileImage.files[1];


        alert(file);
        var data = new FormData();
        data.append('fileToUpload',file);

 
alert("este es el Id de Usuario " + idUsuario);
alert("este es el name " + name);   
alert("este es el Id de Archivo " + idArchivo);


} 

function AgregarArchivosCV2(ids) 
{


  var pagina = "../php/nexo.php";

  var nombre = $("#nombre").val();
  var mail = $("#email").val();
  var clave = "1234";
  var tipo = "usuario";

    
  SubirFoto(mail);
 

  var foto = "../tmp/" + mail +  ".jpg";
 
  //alert("Nombre: " + nombre + " Clave: " + clave + " Tipo: " + tipo);

  $.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
      queHago : "agregar",
      nombre : nombre,
      mail : mail, 
      clave : clave,
      tipo : tipo,
      foto : foto
    },
        async: true 
    })
  .done(function () { 
    alert("Usuario registrado con exito. Loguearse para ingresar.");
    window.location.replace("../html/login.php");
    
  })
  .fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
}

function SubirFoto(mail){
 
 /*
    var pagina = "../php/nexo.php";
    var foto = $("#cv").val();


 if(foto === "")
 {
  return;
 }

 var archivo = $("#cv")[0];//foto[0];
 alert(archivo);
 var formData = new FormData(); //permite subir archivos
 formData.append("archivo",archivo.files[0]);//configurar el objeto
 formData.append("queHago", "subirFoto");
 formData.append("mail", mail);


 $.ajax({
        type: 'post',
        url: pagina,
        dataType: "json",
  cache: false,
  contentType: false,
  processData: false,
        data: formData,
        async: true
    })
 .done(function (objJson) {//es una funcion que recibe un delegado una repuesta puede ser cualquier texto
  //alert(objJson);
  if(!objJson.Exito){
   //alert("Hubo un errorrrrrrrrrrrr");
   alert(objJson.Mensaje);
   //return false;
  }
  // else
  // {
  //  return true;
  // }
  
  //destino = objJson.Destino;
  
  //$("#divFoto").html(objJson.Html);
  //Mostrar("MostrarEditarPerfil");
 })
 .fail(function (jqXHR, textStatus, errorThrown) {//recibe mas parametros entre ellos errores
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    }); 
    //son funciones q se disparan depues de que vuelve la funcion de la base de datos  
    */
}

function AgregarArchivosUNI(id){
     
    var file = $("#file").val();
    var archivos = file.files;

    alert(file);
    alert(archivos);
    /*
    var formData = new FormData();

    formData.append("file",file.files[]);
    formData.append("id",id);
    formData.append("queHago",$("#btnQueHago").val());
  
    $.ajax({ 
      type: 'POST',
      url: '../php/nexoArchivo.php', 
      cache: false,
      dataType: "text",
      data:formData,
      contentType:false,
      processData:false, 
      async: true 
    })
  .done(function(respuesta) { 
    alert(respuesta);
    //window.location.replace("../html/login.php");
    
  })
  .fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });
*/
}


function deslogear()
{ 
  var funcionAjax=$.ajax({
    url:"../php/deslogearUsuario.php",
    type:"post"   
  });
  funcionAjax.done(function(retorno){
     // alert("Sesión cerrada");
      window.location.replace("../html/login.php");
     
      
  }); 
}