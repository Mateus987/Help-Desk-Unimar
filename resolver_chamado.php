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


$id = $_GET['id'];


$sql = "UPDATE chamados SET status = 'resolvido', data_resolvido = NOW() WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<div class='container mt-4 d-flex justify-content-center align-items-center'>";
    echo "<br><br><br><br><br><h1>Chamado resolvido com sucesso!</h1><br>";
    echo "</div>";
} else {
    echo "Erro ao resolver chamado: " . $conn->error;
}


$conn->close();
?>
