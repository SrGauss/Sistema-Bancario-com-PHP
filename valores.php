<?php
session_start();

$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "guricred";

$conexao = new mysqli($hostname,$user,$password,$database);

if ($conexao -> connect_errno) {
    echo "Falha ao comunicar com banco de dados.". $conexao -> connect_error;
    exit();
}else{

    $usuario = $conexao -> real_escape_string($_POST['user']);
    $senha = $conexao -> real_escape_string($_POST['Password']);

    $sql = "SELECT `id`,`User`,`Senha` FROM `gerente` WHERE `User`='".$usuario."' AND  `Senha`='".$senha."';";
    $dado = $conexao->query($sql);
    
    if ($dado->num_rows != 0) {
        $row = $dado -> fetch_array();
        $_SESSION['id'] = $row[0];
        $_SESSION['User'] = $row[1];
        // echo "deu bao";
        $conexao -> close();
        header("location: Segunda.php",true,301);
        }
        else{
        echo "deu ruim";
        $conexao ->close();
        header("location: index.php", true,301);
    }
}

