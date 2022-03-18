<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar produto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php 

$mysqli = new mysqli("localhost","root","","mercado");

$insertSuccessful = null;

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
} else {
    if(isset($_GET['id'])) {
        echo var_dump($_POST);
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $qtd = $_POST['quantidade'];
        $sql = "update produto set nome = '$nome', preco = $preco, quantidade = $qtd where id = $_GET[id]";
        if (mysqli_query($mysqli, $sql)) {
            $insertSuccessful = 'sucesso';
            header("refresh:1;url=lista.php");
        } else {
            $insertSuccessful = 'erroo';
        }
    } else {
        header("refresh:0;url=lista.php");
    }
}
?>

<?php 
    echo "<form action='/edit.php?id=$_GET[id]' method='post' class='Container'>";
        echo "<h3>Edição de produto</h3>";
        echo "<p>Digite as novas informações do produto...</p>";
        $query = $mysqli->query("select * from produto where id = $_GET[id]");
        $query = $query->fetch_array();
        // var_dump($query);

        echo "<input type='text' name='nome' id='' class='input' placeholder='Nome' value='$query[nome]'/>";
        echo "<input type='number' name='quantidade' id='' class='input' placeholder='Quantidade' value=$query[quantidade] />";
        echo "<input type='number' step='0.01' name='preco' id='' class='input' placeholder='Preço' value=$query[preco] />";
        echo "<div class='button-wrapper'>";
        echo '<a href="/lista.php" class="link-btn-edit">Voltar</a>';
        echo '<button type="submit" class="button-edit" >Enviar</button>';
        echo "</div>";
    echo "</form>";
?>

<?php 

if($insertSuccessful == 'sucesso') echo "<p class='sucessoTxt'>Produto alterado com sucesso!</p>";
if($insertSuccessful == 'erro') echo "<p class='erroTxt'>Erro ao alterar produto</p>";

$mysqli->close();
?>

<script src="index.js"></script>

</body>
</html>