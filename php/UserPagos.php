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
  <script type="text/javascript" src="../js/funcionesPagos.js"></script>
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
      <a class="navbar-brand" href="UserUser.php">Volver</a>
    </div>
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

<div class="container kv-main">
    <div class="page-header">
   Comprobantes de pago
    </div>
      
    <form enctype="multipart/form-data">
            
        <div class="form-group">
            <input id="file-1" type="file" multiple class="file" data-overwrite-initial="false" >
        </div>
      
    </form>

      <form enctype="multipart/form-data">
            
        <div class="form-group">
          <input id="input-image-3" name="input-image" type="file" class="file-loading" accept="image/*">
        </div>
      
    </form>

    <hr>
    <br>
</div>
</body>
<script>
   
   
    $("#file-1").fileinput({
        uploadUrl: '#', // you must set a valid URL here else you will get an error
        allowedFileExtensions: ['jpg', 'png'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFilesNum: 10,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });

    $("#input-image-3").fileinput({
    uploadUrl: "/site/image-upload",
    allowedFileExtensions: ["jpg", "png", "gif"],
    maxImageWidth: 200,
    maxImageHeight: 150,
    resizePreference: 'height',
    maxFileCount: 1,
    resizeImage: true
}).on('filepreupload', function() {
    $('#kv-success-box').html('');
}).on('fileuploaded', function(event, data) {
    $('#kv-success-box').append(data.response.link);
    $('#kv-success-modal').modal('show');
});
   
   
    $(document).ready(function () {
    //  alert("OK");
    });
</script>

</html>