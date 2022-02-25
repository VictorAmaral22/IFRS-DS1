<?php

$mysqli = new mysqli("localhost","root","","meuBancoDeDdados");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


$query = $mysqli->query('select * from usuarios');
$rows = [];

while($row = $query->fetch_array()){
  $rows[] = $row;
}

// print_r($rows);

echo "<h2>Todos os Users</h2>";
echo "<table>";
  echo "<thead>";
    echo "<tr>";
      echo "<td>";
      echo "Id";
      echo "</td>";
      echo "<td>";
      echo "Nome";
      echo "</td>";
      echo "<td>";
      echo "Email";
      echo "</td>";
      echo "<td>";
      echo "Aniversário";
      echo "</td>";
    echo "</tr>";
  echo "</thead>";
  foreach ($rows as $user) {
    echo "<tr>";
      echo "<td>$user[id]</td>";
      echo "<td>$user[nome]</td>";
      echo "<td>$user[email]</td>";
      echo "<td>$user[data_nasc]</td>";
    echo "</tr>";
  }
echo "</table>";

$specialQuery = $mysqli->query("select * from usuarios where nome like '%fulaninho%'");
$rowsAgain = [];

while($row = $specialQuery->fetch_array()){
  $rowsAgain[] = $row;
}

echo "<h2>Users onde o nome contém fulaninho</h2>";
echo "<table>";
  echo "<thead>";
    echo "<tr>";
      echo "<td>";
      echo "Id";
      echo "</td>";
      echo "<td>";
      echo "Nome";
      echo "</td>";
      echo "<td>";
      echo "Email";
      echo "</td>";
      echo "<td>";
      echo "Aniversário";
      echo "</td>";
    echo "</tr>";
  echo "</thead>";
  foreach ($rowsAgain as $user) {
    echo "<tr>";
      echo "<td>$user[id]</td>";
      echo "<td>$user[nome]</td>";
      echo "<td>$user[email]</td>";
      echo "<td>$user[data_nasc]</td>";
    echo "</tr>";
  }
echo "</table>";