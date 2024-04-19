<?php

include 'conect.php';

$user= $_POST['user'];
$password = $_POST['psw'];
echo $user;
echo $password;

$sql = "SELECT nombres, apellidos, rol  FROM regisuser WHERE user ='$user' AND Password = '$password'";
$result = mysqli_query($conn, $sql);

//mysqli_num_rows obtiene al numero de filas de unca consulta realizada

if (mysqli_num_rows($result) > 0) {
  
    while($row = mysqli_fetch_assoc($result)) //mysql_fetch_assoc() devuelve una matriz de los registros que ha encontrado.
    {
        echo "El usuario existe en la base de datos ";
        //echo "consecutivo: " . $row["cont"]. " - Nombre: " . $row["nombres"]. " Apellidos " . $row["apellidos"]. " Tipo de Usuario" . $row["tipoUsuario"] . "<br>";
        echo "Bienvenido". "<br>";
        $tipoUserDB = $row["Rol"];
        echo $tipoUserDB;
        
        switch ($tipoUserDB)
            {
             case "User": {
                header("Location: ../index.html");
                break;
             }

             case "Invetarios": {
                
                break;
             }



            }
        //
    }
}  
    else 
     {
    echo "No existe en la base de datos ";
    header("Location: /Dweb/ErrorUsuario.html");
     }
mysqli_close($conn);

?>