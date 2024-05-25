<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['contactsName'];
    $data_ = $_POST['data_'];
    $horario = $_POST['horario'];
    $contactsTel = $_POST['contactsTel'];
    $contactsMessage = $_POST['contactsMessage'];

    $sql = "INSERT INTO contatos (nome, telefone, data_, mensagem, horario) VALUES (:nome, :telefone, :data_, :mensagem, :horario)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['contactsName' => $name, 'contactsTel' => $contactsTel, 'data_' => $data_, 'contactsMessage' => $contactsMessage, 'horario' => $horario])) {
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
    <?php include 'includes/header.php'; ?>
    
    <h2>Contato</h2>

    <?php if (isset($successMessage)) { ?>
        <p><?php echo $successMessage; ?></p>
    <?php } elseif (isset($errorMessage)) { ?>
        <p><?php echo $errorMessage; ?></p>
    <?php } ?>

    <form method="POST" action="form.php">
        <label for="contactsName">Nome:</label>
        <input type="text" id="contactsName" name="contactsName" required>
        <br>
        <label for="contactsTel">Telefone:</label>
        <input type="text" id="contactsTel" name="contactsTel" required>
        <br>
        <label for="data_">Data (dd/mm/aaaa):</label>
        <input type="text" id="data_" name="data_" required>
        <br>
        <label for="horario">Horário (hh:mm):</label>
        <input type="text" id="horario" name="horario" required>
        <br>
        <label for="contactsMessage">Mensagem:</label>
        <textarea id="contactsMessage" name="contactsMessage" required></textarea>
        <br>
        <button type="submit">Enviar</button>
    </form>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
