
$( document ).ready(function() {

     $("#btnCV" ).prop("disabled", true ); 
     $("#btnUP" ).prop("disabled", true ); 
     $("#btnEmbassy" ).prop("disabled", true ); 
     $("#btnPassport" ).prop("disabled", true ); 
     $("#btnFotocarnet" ).prop("disabled", true ); 
     $("#BtnJobOffer" ).prop("disabled", true ); 
     $("#BtnSponsor" ).prop("disabled", true ); 
     $("#btnCompPago" ).prop("disabled", true ); 

    loadComprobantesDePago();
    LoadTotalPesos();
    LoadTotalDolar();
    LoadAPagarPesos();
    LoadAPagarDolar();

});


function ValidarImagen(obj){

    var uploadFile = obj.files[0];
    
    if (!window.FileReader) {
        alert('El navegador no soporta la lectura de archivos');
         $("#proof" ).val(""); 
          
            return;
    }

    if (!(/\.(jpg|jpeg|png|gif)$/i).test(uploadFile.name)) {
        alert('El archivo a adjuntar no es una imagen');
         $("#proof" ).val(""); 
         
        return;
    }
   
    if (uploadFile.size > 50000)
    {
          alert('El peso de la imagen no puede exceder los 500kb');
         $("#proof" ).val(""); 
      
    }
    else {
         $("#btnUP" ).prop("disabled", false );   
        

    }
                
}


function ValidarEmbassy(obj){

    var uploadFile = obj.files[0];
    
    if (!window.FileReader) {
        alert('El navegador no soporta la lectura de archivos');
        $("#embassy" ).val(""); 
            return;
    }

    if (!(/\.(jpg|jpeg|png|gif)$/i).test(uploadFile.name)) {
        alert('El archivo a adjuntar no es una imagen');
        $("#embassy" ).val(""); 
        return;
    }
   
    if (uploadFile.size > 50000)
    {
          alert('El peso de la imagen no puede exceder los 500kb');
       
        $("#embassy" ).val(""); 
    }
    else {
     
          $("#btnEmbassy" ).prop("disabled", false );    

    }
                
}


function ValidarFotoCarnet(obj){

    var uploadFile = obj.files[0];
    
    if (!window.FileReader) {
        alert('El navegador no soporta la lectura de archivos');
       
             $("#fotocarnet" ).val(""); 
            return;
    }

    if (!(/\.(jpg|jpeg|png|gif)$/i).test(uploadFile.name)) {
        alert('El archivo a adjuntar no es una imagen');
         $("#fotocarnet" ).val(""); 
          
        return;
    }
   
    if (uploadFile.size > 50000)
    {
        alert('El peso de la imagen no puede exceder los 500kb');
        $("#fotocarnet" ).val(""); 
    }
    else {
       
          $("#btnFotocarnet" ).prop("disabled", false );    

    }
                
}


function ValidarPasaporte(obj){

    var uploadFile = obj.files[0];
    
    if (!window.FileReader) {
        alert('El navegador no soporta la lectura de archivos');
        $("#passport" ).val(""); 
            return;
    }

    if (!(/\.(jpg|jpeg|png|gif)$/i).test(uploadFile.name)) {
        alert('El archivo a adjuntar no es una imagen');
         $("#passport" ).val(""); 
          
        return;
    }
   
    if (uploadFile.size > 50000)
    {
        alert('El peso de la imagen no puede exceder los 500kb');
         $("#passport" ).val(""); 
    }
    else {
        $("#btnPassport" ).prop("disabled", false );    

    }
                
}


function ValidarWorkFun(obj){


   $("#btnWorkfun" ).prop("disabled", true ); 

    var uploadFile = obj.files[0];
    
    if (!window.FileReader) {
        
        alert('El navegador no soporta la lectura de archivos');
        $("#workfun" ).val(""); 
        return;
    }

    if (!(/\.(pdf)$/i).test(uploadFile.name)) {
    
        alert('El archivo no es un documento PDF soportado');
        $("#workfun" ).val(""); 
        return;
    } else {
      $("#btnWorkfun" ).prop("disabled", false ); 
             
    }
              
  
    if (uploadFile.size > 307200)
    {
         alert('El peso del documento no puede exceder los 3 Megabits(mb)')
            $("#workfun" ).val(""); 
               $("#btnWorkfun" ).prop("disabled", true ); 
    }
    else {
      $("#btnWorkfun" ).prop("disabled", false ); 
             
    }  
                  
}
   

   function ValidarJobOffer(obj){

   $("#BtnJobOffer" ).prop("disabled", true ); 

    var uploadFile = obj.files[0];
    
    if (!window.FileReader) {
        
        alert('El navegador no soporta la lectura de archivos');
        $("#jobOffer" ).val(""); 
        return;
    }

    if (!(/\.(pdf)$/i).test(uploadFile.name)) {
    
        alert('El archivo no es un documento PDF soportado');
        $("#jobOffer" ).val(""); 
        return;
    } else {
      $("#BtnJobOffer" ).prop("disabled", false ); 
             
    }
              
  
    if (uploadFile.size > 307200)
    {
         alert('El peso del documento no puede exceder los 3 Megabits(mb)')
            $("#jobOffer" ).val(""); 
              $("#BtnJobOffer" ).prop("disabled", true ); 
    }
    else {
      $("#BtnJobOffer" ).prop("disabled", false ); 
             
    }  
                  
}


 function ValidarSponsor(obj){

   $("#BtnSponsor" ).prop("disabled", true ); 

    var uploadFile = obj.files[0];
    
    if (!window.FileReader) {
        
        alert('El navegador no soporta la lectura de archivos');
        $("#sponsor" ).val(""); 
        return;
    }

    if (!(/\.(pdf)$/i).test(uploadFile.name)) {
    
        alert('El archivo no es un documento PDF soportado');
        $("#sponsor" ).val(""); 
        return;
    } else {
      $("#BtnSponsor" ).prop("disabled", false ); 
             
    }
              
  
    if (uploadFile.size > 307200)
    {
        alert('El peso del documento no puede exceder los 3 Megabits(mb)')
            $("#sponsor" ).val(""); 
    }
    else {
      $("#BtnSponsor" ).prop("disabled", false ); 
             
    }  
                  
}

function ValidarDocumento(obj){

   $("#btnCV" ).prop("disabled", true ); 

    var uploadFile = obj.files[0];
    
    if (!window.FileReader) {
        
        alert('El navegador no soporta la lectura de archivos');
        $("#cv" ).val(""); 
        return;
    }

    if (!(/\.(doc|docx)$/i).test(uploadFile.name)) {
    
        alert('El archivo no es un documento de texto soportado');
        $("#cv" ).val(""); 
        return;
    }
  
    if (uploadFile.size > 307200)
    {
        alert('El peso del documento no puede exceder los 3 Megabits(mb)')
            $("#cv" ).val(""); 
    }
    else {
      $("#btnCV" ).prop("disabled", false ); 
             
    }
                  
}

function ValidarComprobantePago(obj){

      var uploadFile = obj.files[0];
    
    if (!window.FileReader) {
        alert('El navegador no soporta la lectura de archivos');
       
             $("#comPago" ).val(""); 
             $("#btnCompPago" ).prop("disabled", true );   
            return;
    }

    if (!(/\.(jpg|jpeg|png|gif)$/i).test(uploadFile.name)) {
        alert('El archivo a adjuntar no es una imagen');
         $("#comPago" ).val(""); 
            $("#btnCompPago" ).prop("disabled", true );   
          
        return;
    }
   
    if (uploadFile.size > 50000)
    {
        alert('El peso de la imagen no puede exceder los 500kb');
        $("#comPago" ).val(""); 
           $("#btnCompPago" ).prop("disabled", true );   
    }
    else {
       
          $("#btnCompPago" ).prop("disabled", false );    

    }
                
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

function loadComprobantesDePago()
{
 
  var pagina = "../php/nexo.php";

  $.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
      queHago : "MostrarComprobantesDePago"
    },
        async: true 
    })
  .done(function (respuesta) { 
    
    //alert(respuesta);
    
    $("#MostrarComprobantesDePago").html(respuesta);
    
  })
  .fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });

}

function LoadTotalPesos()
{

  var pagina = "../php/nexo.php";

  $.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
      queHago : "MostrarTotalPesos"
    },
        async: true 
    })
  .done(function (respuesta) { 
    
    //alert(respuesta);
    
    $("#MostrarTotalPesos").html(respuesta);
    
  })
  .fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });


}

function LoadTotalDolar()
{

  var pagina = "../php/nexo.php";

  $.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
      queHago : "MostrarTotalDolar"
    },
        async: true 
    })
  .done(function (respuesta) { 
    
    //alert(respuesta);
    
    $("#MostrarTotalDolar").html(respuesta);
    
  })
  .fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });


}

function LoadAPagarPesos()
{
  var pagina = "../php/nexo.php";

  $.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
      queHago : "MostrarTotalAPagarPesos"
    },
        async: true 
    })
  .done(function (respuesta) { 
    
    //alert(respuesta);
    
    $("#MostrarTotalAPagarPesos").html(respuesta);
    
  })
  .fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });


}

function LoadAPagarDolar()
{

 
  var pagina = "../php/nexo.php";

  $.ajax({ 
        type: 'POST',
        url: pagina, 
        dataType: "html",
        data: {
      queHago : "MostrarTotalAPagarDolar"
    },
        async: true 
    })
  .done(function (respuesta) { 
   
    $("#MostrarTotalAPagarDolar").html(respuesta);
    
  })
  .fail(function (jqXHR, textStatus, errorThrown) { 
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });


}
