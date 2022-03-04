<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php 

$mysqli = new mysqli("localhost","root","","bancoPessoas");

$insertSuccessful = null;

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
} else {
    // if(isset($_POST['nome']) && isset($_POST['preco']) && isset($_POST['quantidade'])) {
    //     echo var_dump($_POST);
    //     $nome = $_POST['nome'];
    //     $preco = $_POST['preco'];
    //     $qtd = $_POST['quantidade'];
    //     $sql = "insert into produto (nome, preco, quantidade) values ('$nome', $preco, $qtd)";
    //     if (mysqli_query($mysqli, $sql)) {
    //         $insertSuccessful = 'sucesso';
    //     } else {
    //         $insertSuccessful = 'erroo';
    //     }
    // }
}

$mysqli->close();

?>

<form action="/index.php" method="post" class="Container">
    <h3>Login</h3>
    <input type="text" name="email" id="" class="input" placeholder="Email" />
    <input type="text" name="senha" id="" class="input" placeholder="Senha" />
    <button type="submit" class="button" >Entrar</button>
</form>


<p class="link">Não tem uma conta? Cadastrar-se <a href="/cadastro.php">aqui</a></p>

<script src="index.js"></script>

</body>
</html>