<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sansano Films</title>
    <link href="dise�o.css" rel="stylesheet"/>
      <body>
      
        <div class ="menu">
          <ul id="menu">
            <li><a href="index.php">Logout</a></li>
            <li><a href="empleado.php">Pagina Principal</a></li>
            <li><a href="peliculaR.php">Registrar Pelicula</a></li>
            <li><a href="peliculaM.php">Modificar Pelicula</a></li>
            <li><a href="funcion.php">Agregar Funcion</a></li>
            <li><a href="turno.php">Gestion de Turnos</a></li>
            <li>Usted es Admin, si no le es cierre esto</li>
          </ul>
        </div>

        <div class="contenido">
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tarea2";

            $conn = new mysqli($servername,$username,$password,$dbname);
            if ($conn -> connect_error){
                die ("Fallo la conexi�n". $conn->connect_error);
            }
            $nombre = $_POST['nombre'];
            $genero = $_POST['genero'];
            $precio =(INT) $_POST['precio'];
            $clasificacion = $_POST['clasificacion'];
            $directores = $_POST['directores'];
            $actores = $_POST['actores'];
            $id_pelicula = (INT)$_POST['pelicula'];
            
            if($nombre == NULL or $genero == NULL or $precio == NULL or $clasificacion == NULL or $directores == NULL or $actores == NULL or $id_pelicula == NULL or !preg_match("/^[0-9]+$/", $precio) or !preg_match("/^[0-9]+$/", $id_pelicula)){
                if($nombre == NULL or $genero == NULL or $precio == NULL or $clasificacion == NULL or $directores == NULL or $actores == NULL or $id_pelicula == NULL){
                   echo "RELLENA TODOS LOS CAMPOIS<br>"; 
                }
                
                    if (!preg_match("/^[0-9]+$/", $id_pelicula)){
                    echo "solo numeros en el ID<br>";
                }
                
                if (!preg_match("/^[0-9]+$/", $precio)){
                    echo "los precios son numeros<br>";
                }
           
                
          ?>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
		            ID Pelicula a Modificar:<br>
		            <input type="text" name="pelicula"><br>
					Nombre Pelicula:<br>
		            <input type="text" name="nombre"><br>
		            Genero:<br>
		            <input type="text" name="genero"><br>
		            Clasificacion:<br>
		            <input type="text" name="clasificacion"><br>
		            Costo de Arriendo:<br>
		            <input type="text" name="precio"><br>
		            Director(es):<br>
		            <input type="text" name="directores"><br>
		            Reparto:<br>
		            <input type="text" name="actores"><br>
		            <input type="submit" value="Ingresar">
                </form>
        <?php
            }    
            else{    
                $sql = "UPDATE peliculas SET Nombre='$nombre', Genero='$genero', Clasificacion='$clasificacion', Precio='$precio', Directores='$directores', Actores='$actores' WHERE id_pelicula = '$id_pelicula' ";
                $result = $conn->query($sql) or die("ERROR PI: Mami que ser� lo que quiere el negro.  SQL ERROR: " . $conn->error);
                $conn->close();
                echo "Pelicula Modificada Correctamente";
                echo "<ul id='menu'><li><a href='empleado.php'>Volver</a></li></ul>";
            }
          ?>
        </div>
      </body>
</html>
