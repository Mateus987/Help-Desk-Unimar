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

      <div class="container mt-5">
        <h2>Consulta Técnica de Chamados</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">RA</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Hora de Cadastro</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
       </div>
        <?php
  
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "teste1";

        $conn = new mysqli($servername, $username, $password, $dbname);

  
        if ($conn->connect_error) {
            die("Erro na conexão: " . $conn->connect_error);
        }


        $sql = "SELECT id, ra, descricao, data_criacao FROM chamados WHERE status = 'pendente'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['ra'] . "</td>";
                echo "<td>" . $row['descricao'] . "</td>";
                echo "<td>" . $row['data_criacao'] . "</td>";
                echo "<td><a href='resolver_chamado.php?id=" . $row['id'] . "'>Resolver</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum chamado pendente.</td></tr>";
        }

  
        $conn->close();
        ?>
    </table>
</body>
</html>
