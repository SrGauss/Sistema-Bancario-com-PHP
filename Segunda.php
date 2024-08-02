<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Venom.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="Estilo.css">
    <title>Tela do Gerente</title>
</head>

<style>

/* .Middle1{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-left: 3px solid red;
    height: 45em;
}
.Middle2{
    border-bottom: 3px solid blue;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80em;
}
.MiddleCircle{
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border: 4px solid green;
    border-radius: 64px;
    position: absolute;
    height: 14px;
    width: 14px;
} */

table{
    position: relative;
    top: 180px; 
    left: 400px; 
    height: 104px;
    width: 280px;
    font-size: 19px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: black;
}

td button{
    height: 30px;
    width: 78px;
    color: white;
    text-shadow: 1px 1px 1px black;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

td button:hover{
    cursor: pointer;
}

th{
    text-align: center;
}


tr, td, th {
    border-bottom:  1.5px solid black;
    padding: 10px;
}

button p{
    position: relative;
    top: -15px;
    left: 24px;
}

.Dell{
    text-decoration: none;
    color: white;
    text-shadow: 1px 1px 1px black;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    border: 3px outset;
    background-color: crimson; 
    overflow: hidden;
}

.Dell a{
    text-decoration: none;
    color: white;
    text-shadow: 1px 1px 1px black;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}


.See{
    background-color: greenyellow;
    border: 2px outset;
    position: relative;
    left: -100px;
}

</style>

<body>

<a href="sair.php" class="Exit"><button>Sair</button></a>

<a href="RRecebe.php"><button class="BtnV"><p>Cadastrar Cliente</p></button></a>

<span class="Middle1"></span><span class="Middle2"></span><span class="MiddleCircle"></span>


<?php

session_start();

if (empty($_SESSION['User'])){
    // Logado??? Não?? Tchau, bb.
    header("Location: index.php", true,301);
    exit();
} else {
    $Nome = $_SESSION['User'];
}

echo "<header><p class='bi bi-person-circle'> ".$Nome."</p></header>"

// header('Content-Type: text/html; charset=utf-8');

?>



<p style=
    "position: absolute; 
    border-bottom:2px solid black;
    top: 24%; 
    left: 33.5%; 
    transform: translate(-50%, -50%); 
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: 28px;
    color: black;">
Clientes
</p>



<?php

     if (empty($_SESSION['User'])){
         header('Location: index.php');
         exit();
     } else {

        $hostname = "127.0.0.1";
        $user = "root";
        $password = "root";
        $database = "guricred";

        $conexao = new mysqli($hostname,$user,$password,$database);

        if ($conexao -> connect_errno) {
                echo "Puts, deu falha na conexão do MySQL: " . $conexao -> connect_error;
                exit();
            } else{

                $sql="SELECT `id`, `NomeCliente` FROM `clientes` WHERE `NomeGerente` = '".$_SESSION['User']."' AND `ativo`='s';";

                $resultado = $conexao ->query($sql);

                echo "";
                    echo "<table>";
                    echo "<tr>";
                        echo "<th>Id&emsp;&emsp;&emsp;&emsp;</th>";
                        echo "<th>Nome&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>";
                        echo "<th>Ação&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</th>";
                    echo "</tr>";

                while($row = mysqli_fetch_array($resultado)){
                
                     echo "<tr>";
                         echo "<td>&ensp;$row[0]</td>";
                         echo "<td>&ensp;$row[1]</td>";


                    echo '<td>
                            <form action="Excluir.php" method="POST">
                                <input type="hidden" id="Dell" name="Dell" value='.$row[0].'>
                                <button class="Dell" type="submit">Excluir</button>
                            </form>
                        </td>
				    
                        <td style="border-bottom: none;">
                            <form action="Visualizar.php" method="POST">
                                <input type="hidden" id="View" name="View" value='.$row[1].'>
                                <button class="See" type="submit">Visualizar</button>
                            </form>
                         </td>';
                         echo "</tr>";

                    echo "";
                }
                echo "</table>";

                $conexao -> close();
        }
    }

?>

    

<!-- <button id="Hide" style="position: absolute; bottom: 1em;">Esconder Linhas</button>

<script>
        document.getElementById("Hide").addEventListener("click", function() {
            document.querySelectorAll(".Middle1, .Middle2, .MiddleCircle").forEach(function(element) {
                if (element.style.display === "none") {
                    element.style.display = "block";
                } else {
                    element.style.display = "none";
                }
            });
        });
    </script> -->
    
</body>
</html>