<?php
// Parâmetros de conexão com o banco de dados
$dbhost = '54.94.33.196';
$dbname = 'barnerd';
$dbuser = 'nerdrei';
$dbpass = 'O86nVv6kj80xggW';

// Dados da reserva enviados via POST
$nome = $_POST['nome'];
$email = $_POST['email'];
$data = $_POST['data'];
$horario = $_POST['horario'];
$convidados = $_POST['convidados'];

// Conexão com o banco de dados usando PDO
try {
    $pdo = new PDO("pgsql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Tratamento de erro na conexão com o banco de dados
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    exit();
}

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