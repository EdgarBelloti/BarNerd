<?php
// Inclua o arquivo de conexão com o banco de dados
include 'db_conn.php';

// Consulta para obter as reservas
$query = "SELECT * FROM reservas";
$result = pg_query($conn, $query);

// Verifica se a consulta foi executada com sucesso
if ($result) {
    // Exibe as reservas em uma tabela HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Data</th><th>Horário</th><th>Convidados</th></tr>";
    
    while ($row = pg_fetch_assoc($result)) {
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

// Fecha a conexão com o banco de dados
pg_close($conn);
?>
