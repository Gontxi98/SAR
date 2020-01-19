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
  <!--<?php include '../html/Head.html'?>-->
</head>
<body>
  <!--<?php include '../php/Menus.php' ?>-->
  <section class="main" id="s1">
    <div>
      <?php
      if(isset($_REQUEST['dirCorreo'])){
        $email = $_REQUEST['dirCorreo'];
        $descripcion = $_REQUEST['comentario'];

        if(!$xml = simplexml_load_file('../xml/Foro.xml')){
                echo "No se ha podido insertar la pregunta en el XML.";
        } else {
              $comentario = $xml->addChild('Pregunta');
              $comentario->addAttribute('author',$email);
              $comentario_ = $comentario->addChild('descripcion',$descripcion);

              $xml->asXML('../xml/Foro.xml');
              echo "Pregunta añadida al archivo XML";
        }
      }else{
              echo "El correo electronico no es correcto.<br>";
              echo"<a href='javascript:history.back()'>Volver al formulario.</a>";
      }


      ?>
    </div>
  </section>
  <!--<?php include '../html/Footer.html' ?>-->
</body>
</html>
