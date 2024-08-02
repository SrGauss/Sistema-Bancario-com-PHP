<?php 

session_start();
$hostname = "127.0.0.1";
$user = "root";
$senha = "root";
$bd = "guricred";

$conexao = new mysqli($hostname,$user,$senha,$bd);

if ($conexao -> connect_errno) {
    echo "erro" . $conexao -> connect_error;
    header("location: segunda.php",true,301);
    exit();
    }
else{
    echo $_POST['Dell'];
    $sql = "UPDATE `clientes` SET `ativo`='n' WHERE `id`='".$_POST['Dell']."';";
    $resultado = $conexao->query($sql);
    $conexao->close();
    header("location: segunda.php",true,301);
    }
