<?php
session_start();
if(!isset($_SESSION['email'])){
    echo "<script>
                    alert('Tienes que estar registrado para usar esta aplicación');
                    window.location.href='../php/SignUp.php';
                    </script>"; 
}else if($_SESSION['email'] == "admin@ehu.es" ){
    echo "<script>
                    alert('Un administrador no puede gestionar preguntas');
                    window.location.href='Layout.php';
                    </script>"; 
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/AddPregunatForoAJAX.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
        <form action="AddPregunta.php" name="fcoment" id="fcoment" method="post" enctype="multipart/form-data">
            <p>Introduce tu dirección de correo: *</p>
            <?php echo "<input type='text' id='dirCorreo' name='dirCorreo' size='60' value='".$_SESSION['email']."' readonly>"; ?>
            <p>Introduce la pregunta/duda que desees añadir: *</p>
            <input type="text" size="60" id="comentario" name="comentario">
            <br>
            <p>
                <input type="button" name="enviar" id="enviar" value="Enviar"> 
                <input type="reset" id='reset' value="Limpiar">
            </p>
            <div id="mensaje"></div>
        </form>    
    </div>

    <script>
        $('#reset').click(function(){
                    $('#preguntas').html("");
                    $('#mensaje').html("");
                });
    </script>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>