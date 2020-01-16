
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
        $lab = $_REQUEST['lab'];
        $descripcion = $_REQUEST['comentario'];

        if(!$xml = simplexml_load_file('../xml/Comentarios.xml')){
                echo "No se ha podido insertar la pregunta en el XML.";
              } else {
              $comentario = $xml->addChild('comentario');
              $comentario->addAttribute('author',$email);
              $comentario->addAttribute('laboratorio',$lab);

              $comentario_ = $comentario->addChild('itemBody',$descripcion);

              $xml->asXML('../xml/Comentarios.xml');
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
