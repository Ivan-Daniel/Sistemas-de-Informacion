<?php
    include 'conect.php';

    if($_SERVER["REQUEST_METHOD"] =="POST"){
        $nombres= $_POST["nombres"] ?? '';
        $apellidos = $_POST["apellidos"] ?? '';
        $identificacion = $_POST["identificacion"] ?? '';
        $genero= $_POST["genero"] ?? '';
        $tipoUserDB = $_POST["rol"] ?? '';
        $user = $_POST["user"] ?? '';
        $password = $_POST["password"] ?? '';
        $correo = $_POST["correo"] ?? '';
        $telefono = $_POST["telefono"] ?? '';
        $direccion = $_POST["direccion"] ?? '';

        $sql ="INSERT INTO regisuser (nombres,apellidos,identificacion,genero,rol,user,password,correo,telefono,direccion)
        VALUES ('$nombres','$apellidos','$identificacion','$genero','$tipoUserDB','$user','$password','$correo','$telefono','$direccion')";
        if (mysqli_query($conn,$sql)){
            echo "Nuevo registro creado exitosamente";
        } else{
            echo "Error: " . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>
