<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php 

$mysqli = new mysqli("localhost","root","","mercado");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
} else {
    $query = $mysqli->query('select * from produto');
    $rows = [];

    if(isset($_POST['excluirProd'])){
        $delete = $mysqli->query("delete from produto where id = $_POST[excluirProd]");
        if($delete) header("refresh:0;url=lista.php");
    }

    while($row = $query->fetch_array()){
        $rows[] = $row;
    }
    echo "<table class='Container-table'>";
        echo "<thead>";
            echo "<tr>";
                echo "<td>";
                    echo "Código";
                echo "</td>";
                echo "<td>";
                    echo "Nome";
                echo "</td>";
                echo "<td>";
                    echo "Quantidade";
                echo "</td>";
                echo "<td>";
                    echo "Preço";
                echo "</td>";
                echo "<td>";
                echo "</td>";
            echo "</tr>";
        echo "</thead>";
        echo "<form action='/lista.php' method='post'>";
            foreach ($rows as $prod) {
                echo "<tr>";
                    echo "<td>$prod[id]</td>";
                    echo "<td>$prod[nome]</td>";
                    echo "<td>$prod[quantidade]</td>";
                    echo "<td>R$ $prod[preco]</td>";
                    echo "<td class='td-btns'><a href='/edit.php?id=$prod[id]'>📝</a><button type='submit'>❌</button></td>";
                    echo "<input type='hidden' name='excluirProd' value=$prod[id] />";
                echo "</tr>";
            }
        echo "</form>";
    echo "</table>";   
}

$mysqli->close();

?>

<a href="/index.php" class="link-btn">Cadastrar produtos</a>

<script src="index.js"></script>

</body>
</html>