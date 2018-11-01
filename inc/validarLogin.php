<?php
session_start();

try{
$base=new PDO("mysql:host=localhost; dbname=ticketsys", "root", "");

$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM usuario WHERE correo= :login AND password= :password";
$resultado =$base->prepare($sql);

$login=htmlentities(addslashes($_POST['usuario']));
$password=htmlentities(addslashes($_POST['pass']));

$resultado->bindValue(":login", $login);
$resultado->bindValue(":password", $password);
$resultado->execute();

$existe=$resultado->rowCount();


if($existe!=0){
    foreach ($resultado as $rs) {
        $_SESSION['usuario'] = $rs['nombre'];
        $_SESSION['idUsuario'] = $rs['ID_usuario'];
    }

    header("Location: ../vista-tickets.php");


}else{
    $_SESSION['no'] = 1;
    header("Location: ../index.php");

}

}catch(Exception $e){
    die("Error: ".$e->getMessage());
}


?>