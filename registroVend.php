<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sansano Films</title>
    <link href="dise�o.css" rel="stylesheet"/>
      <body>
        <div class ="menu">
          <ul id="menu">
            <li><a href="index.php">Volver</a></li>
            <li><a href="login.php">LogIn</a></li>
            <li><a href="persona.php">Registrate aqui</a></li>
            <li><a href="clienteR.php">Nuevo Cliente</a></li>
            <li><a href="vendedor.php">Nuevo Vendedor</a></li>
            <li><a href="proyectador.php">Nuevo Proyectador</a></li>
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
            $id_vendedor = (INT)$_POST['ID'];
            $rut = (INT)$_POST['Rut'];
            
            if($id_vendedor == NULL or $rut == NULL or !preg_match("/^[0-9]+$/", $rut) or !preg_match("/^[0-9]+$/", $id_vendedor)){
                if($id_vendedor == NULL or $rut == NULL or $pass == NULL){
                   echo "RELLENA TODOS LOS CAMPOIS<br>"; 
                }
				if (!preg_match("/^[0-9]+$/", $rut)){
                    echo "Solo N�meros en el rut c:<br>";
                }
				if (!preg_match("/^[0-9]+$/", $id_vendedor)){
                    echo "Solo N�meros en el rut c:<br>";
                }

          ?>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
		            RUT (sin digito Verificador):<br>
		            <input type="text" name="Rut"><br>
		            ID Proyectador:<br>
		            <input type="text" name="ID"><br>
		            <input type="submit" value="Ingresar">
		            <input type="submit" value="Ingresar">
                </form>
        <?php
            }    
            else{    
                $sql = "INSERT INTO vendedores (id_vendedor, RUT)VALUES ('$id_vendedor','$rut')";
                $result = $conn->query($sql) or die("ERROR PI: Mami que ser� lo que quiere el negro.  SQL ERROR: " . $conn->error);
                $conn->close();
                echo "Vendedor Ingresado Correctamente";
                echo "<ul id='menu'><li><a href='index.php'>Volver</a></li></ul>";
            }
          ?>
        </div>
      </body>
</html>