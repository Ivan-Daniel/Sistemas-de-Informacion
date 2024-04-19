<?php
    include '../conect.php';

    if($_SERVER["REQUEST_METHOD"] =="POST"){
        $nombres= $_POST["Nombres"];
        $apellidos = $_POST["Apellidos"];
        $identificacion = $_POST["Identificacion"];
        $genero= $_POST["Genero"];
        $tipoUserDB = $_POST["Rol"];
        $user = $_POST["User"];
        $password = $_POST["Password"];
        $correo = $_POST["Correo"];
        $telefono = $_POST["Telefono"];
        $direccion = $_POST["Direccion"];

        $sql ="INSERT INTO regisuser (Nombres,Apellidos,Identificacion,Genero,Rol,User,Password,Correo,Telefono,Direccion)
        VALUES ('$nombres','$apellidos','$identificacion','$genero','$tipoUserDB','$user','$password','$correo','$telefono','$direccion')";
        if (mysqli_query($conn,$sql)){
            echo "Nuevo registro creado exitosamente";
        } else{
            echo "Error: " . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>
