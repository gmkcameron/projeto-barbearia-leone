<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];
    $data_ = $_POST['data_'];
    $horario = $_POST['horario']
    $created_at = $_POST['created_at']

    $sql = "INSERT INTO contatos (nome, sobrenome, telefone, mensagem, data_, horario, created_at) VALUES (:nome, :sobrenome, :telefone, :mensagem, :data_, :horario, :created_at)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['nome' => $nome, 'sobrenome' => $sobrenome, , 'telefone' => $telefone, 'mensagem' => $mensagem, 'data_' => $data_, 'horario' => $horario, 'created_at' => $created_at])) {
        $successMessage = "Mensagem enviada com sucesso";
    } else {
        $errorMessage = "Erro no envio da mensagem: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h2>Contato</h2>

    <?php if (isset($successMessage)) { ?>
        <p><?php echo $successMessage; ?></p>
    <?php } elseif (isset($errorMessage)) { ?>
        <p><?php echo $errorMessage; ?></p>
    <?php } ?>

    <form method="POST" action="form.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>
        <label for="sobrenome">Sobrenome:</label>
        <input type="text" id="sobrenome" name="sobrenome" required>
        <br>
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>
        <br>
        <label for="mensagem">Mensagem:</label>
        <input type="text" id="mensagem" name="mensagem" required>
        <br>
        <label for="data_">Data (dd/mm/aaaa):</label>
        <input type="text" id="data_" name="data_" required>
        <br>
        <label for="horario">Horário (hh:mm):</label>
        <input type="text" id="horario" name="horario" required>
        <br>
        <label for="created_at">created at:</label>
        <input type="text" id="created_at" name="created_at" required>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
