<?php
// Incluímos o arquivo de conexão com o banco de dados
include 'db_conn.php';

try {
    // Consulta para obter as reservas
    $query = "SELECT * FROM reservas";
    $stmt = $pdo->query($query);

    // Verifica se a consulta foi executada com sucesso
    if ($stmt) {
        // Exibe as reservas em uma tabela HTML
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Data</th><th>Horário</th><th>Convidados</th></tr>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['id_reserva']."</td>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".date("d/m/Y", strtotime($row['data']))."</td>";
            echo "<td>".$row['horario']."</td>";
            echo "<td>".$row['convidados']."</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Erro na consulta ao banco de dados.";
    }
} catch (PDOException $e) {
    // Tratamento de erro na execução da consulta
    echo "Erro na consulta SQL: " . $e->getMessage();
}

// Fecha a conexão com o banco de dados
$pdo = null;
?>

