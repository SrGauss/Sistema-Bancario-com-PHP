<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Venom.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="Estilo.css">

    <title>Cadastro de Cliente</title>

    <style>
        .Cadastro{
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -120%);
            font-size: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            letter-spacing: 2.5px;
        }
        .Cadastro #cliente{
            height: 30px;
            width: 300px;
            font-size: 17px;
            filter: drop-shadow(1px 1px 1px black);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .Cadastro .Env{
            position: absolute;
            top: 125%;
            left: 50%;
            transform: translate(-50%, -50%);
            height: 34.5px;
            width: 100px;
            font: 17px  Verdana, Geneva, Tahoma, sans-serif;
            filter: drop-shadow(1px 1px 1px black);
            letter-spacing: 1.5px;


        }

        .Cep{
            height: 30px;
            width: 300px;
            font-size: 17px;
            filter: drop-shadow(1px 1px 1px black);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

    </style>
    
</head>
<body>
    
    <?php
        session_start();

        if(empty($_SESSION['User'])){
            echo "<script>alert('erro')</script>";
            header("location: index.php",true,301);
            exit();
        }else{
        
           echo "<header class='RR'><p class='bi bi-person-circle'> ".$_SESSION['User']."</p></header>";


           //conexao banco de dandos
           if (isset($_POST["cliente"])) {
        
           $hostname = "127.0.0.1";
           $user = "root";
           $senha = "root";
           $bd = "guricred";

           $conexao = new mysqli($hostname,$user,$senha,$bd);

           if ($conexao -> connect_errno) {
            echo "erro" . $conexao -> connect_error;
           }
           else{
            $cliente = $conexao -> real_escape_string($_POST["cliente"]);
            $cep = $conexao -> real_escape_string($_POST["cep"]);

            if ($cliente != "") {
            $sql1 = "SELECT `NomeCliente`, `ativo` FROM `clientes` WHERE `NomeCliente`='".$cliente."' AND `ativo`='s';";
            $result1 = $conexao -> query($sql1);
                if ($result1->num_rows == 0) {
                    $sql = "INSERT INTO `guricred`.`clientes`(`NomeGerente`, `NomeCliente`,`ativo`,`CEP`) VALUES ('".$_SESSION['User']."', '".$cliente."','s','".$cep."');";
                    $resultado = $conexao->query($sql);
                }else{
                    echo '<script>alert("Usuario ja cadastrado")</script>';
                }
            }else if($cliente == ""){
                echo "<br>";
                echo "Nome vazio";
            }

            $conexao ->close();
           }
        }
        }
    ?>

<form class="Cadastro" action="RRecebe.php" method="post">
        <label for="cliente">Insira o Nome do cliente:</label><br>
        <input type="text" name="cliente" id="cliente">
        <br><br>
        <label for="cep">Insira o CEP do cliente:</label><br>
        <input class="Cep" type="text" maxlength="9" name="cep" id="cep" onkeyup="handleZipCode(event)"/><br>
        <input onclick="Confirma()" class="Env" type="submit" value="Enviar">
</form>



    <a href="sair.php" class="Exit"><button>Sair</button></a>

    <a href="Segunda.php"><button class="Back">
    <p>Voltar</p>
    </button></a>



    <script>

const handleZipCode = (event) => {
  let input = event.target
  input.value = zipCodeMask(input.value)
}

const zipCodeMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,'')
  value = value.replace(/(\d{5})(\d)/,'$1-$2')
  return value
}

    </script>


    <script>
function Confirma() {
  var txt;
  if (confirm("Confira se o nome do cliente foi digitado corretamente")) {
    txt = "You pressed OK!";
    console.log("Ok Funcionando");
  } else {
    txt = "You pressed Cancel!";
    console.log("Cancel Funcionando");
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>

</body>
</html>