<?php
session_start();
if(!isset($_SESSION['email'])){
    echo "<script>
                    alert('Tienes que estar registrado para usar esta aplicación');
                    window.location.href='../php/SignUp.php';
                    </script>"; 
}else if($_SESSION['email'] == "admin@ehu.es" ){
    echo "<script>
                    alert('Un administrador no puede ver preguntas');
                    window.location.href='Layout.php';
                    </script>"; 
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
	table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
      <?php
       echo "<table align='center' border><tr><th>Autor</th><th>Pregunta</th>";
        if(!$xml = simplexml_load_file('../xml/Foro.xml')){
          echo "No se ha podido cargar el archivo XML.";
        } else {
            foreach ($xml->Pregunta as $pregunta){    
              $atributos = $pregunta->attributes();        
              echo '<tr><td><a href="mailto:'.$atributos[0].'">'.$atributos[0].'</a</td>';
              echo '<td>'.$pregunta->descripcion.'</td></tr>';           
            }
          }
          echo "</table>";
      ?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
