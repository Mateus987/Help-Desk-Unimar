<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Técnica</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="src/style.css">
</head>
<body>
      <header>    
        <nav>
          <ul>
            <li><a href="/help_desk/index.html">início</a></li>
            <li><a href="cadastro_problema.html">Chamado</a></li>
            <li><a href="/help_desk/consulta_tecnica.php">Consulta Técnica</a></li>
            <li><a href="/help_desk/consulta_ra.html">Consulta por RA</a></li>
          </ul>
        </nav>
      </header>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste1";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$ra = $_POST['ra'];


$sql = "SELECT id, ra, problema, sala, descricao, data_criacao, data_resolvido, status FROM chamados WHERE ra = $ra";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='container mt-5'>";
    echo "<h3>Chamados encontrados para o RA $ra:</h3>";
    echo "<table class='table table-bordered'>";
    echo "<thead class='thead-dark'>
            <tr>
              <th>RA</th>
              <th>Problema</th>
              <th>Sala</th>
              <th>Descrição</th>
              <th>Hora de Cadastro</th>
              <th>Hora Resolvido</th>
              <th>Resolvido</th>
            </tr>
          </thead>
          <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ra'] . "</td>";
        echo "<td>" . $row['problema'] . "</td>";
        echo "<td>" . $row['sala'] . "</td>";
        echo "<td>" . $row['descricao'] . "</td>";
        echo "<td>" . $row['data_criacao'] . "</td>";
        echo "<td>" . ($row['data_resolvido'] ? $row['data_resolvido'] : '-') . "</td>";
        echo "<td>" . ($row['status'] == 'resolvido' ? 'Resolvido' : 'Não Resolvido') . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table></div>";
} else {
    echo "<div class='container mt-5'><h1>Nenhum chamado encontrado para o RA $ra.</h1></div>";
}

$conn->close();
?>
