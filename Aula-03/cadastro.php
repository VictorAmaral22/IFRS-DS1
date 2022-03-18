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
    if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
        // echo var_dump($_POST);
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sql = "insert into usuario (nome, email, senha) values ('$nome', $email, $senha)";
        if (mysqli_query($mysqli, $sql)) {
            // ...
        } else {
            $insertSuccessful = 'erroo';
        }
    }
}

$mysqli->close();

?>

<form action="/cadastro.php" method="post" class="Container">
    <h3>Cadastro</h3>
    <p>Informe os seus dados</p>
    <input type="text" name="nome" id="" class="input" placeholder="Nome" />
    <input type="text" name="email" id="" class="input" placeholder="Email" />
    <input type="text" name="senha" id="" class="input" placeholder="Senha" />
    <button type="submit" class="button" >Criar conta</button>
</form>


<p class="link">Já tem uma conta? <a href="/index.php">Faça o login</a></p>

<script src="index.js"></script>

</body>
</html>