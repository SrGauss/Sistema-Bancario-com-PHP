<?php 

session_start();

$hostname = "127.0.0.1";
$user = "root";
$senha = "root";
$bd = "guricred";

$conexao = new mysqli($hostname,$user,$senha,$bd);

if ($conexao -> connect_errno) {
    echo "erro" . $conexao -> connect_error;
    header("location: Visualizar.php",true,301);
    exit();
}else{
    $cart = $conexao->real_escape_string($_POST["cart"]);
    if ($cart == '') {
        header('location: Visualizar.php',true,301);
    }
    else{
        $sql2 = "SELECT `cartao` FROM `cartao` WHERE `cartao`='".$cart."';";
        $result2 = $conexao -> query($sql2);
        if ($result2->num_rows == 0) {
            $sql = "INSERT INTO `cartao`(`cartao`, `cliente`, `ativo`) VALUES ('".$cart."','".$_POST['cliente']."','s');";
            $resultado = $conexao->query($sql);
            header("location: Segunda.php",true,301);            

        }else{
            header("location: Visualizar.php",true,301);            
        }
    }
    $conexao->close();
}