<?php
// Dados da reserva enviados via POST
$nome = $_POST['nome'];
$email = $_POST['email'];
$data = $_POST['data'];
$horario = $_POST['horario'];
$convidados = $_POST['convidados'];

// Incluindo o arquivo de conexão com o banco de dados
include "db_conn.php";

// Preparar e executar a consulta para inserir os dados da reserva
try {
    $stmt = $pdo->prepare("INSERT INTO reservas (nome, email, data, horario, convidados) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $email, $data, $horario, $convidados]);
    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        // A reserva foi inserida com sucesso no banco de dados
        $response = "Reserva confirmada para $nome no dia $data às $horario para $convidados convidado(s).";
    } else {
        // Ocorreu um erro ao inserir a reserva no banco de dados
        $response = "Erro ao efetuar a reserva. Por favor, tente novamente.";
    }
} catch (PDOException $e) {
    // Tratamento de erro na execução da consulta
    echo "Erro na consulta SQL: " . $e->getMessage();
    exit();
}

// Retornar a resposta como texto simples
echo $response;
?>
