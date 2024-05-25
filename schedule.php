<?php include 'includes/db.php'; ?>

<section>
    <h2>Agendamento de Horário</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];

        // Verificar se o horário já está ocupado
        $sql = "SELECT COUNT(*) FROM appointments WHERE appointment_date = :date";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['date' => $date]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo "<p>Este horário já está ocupado. Por favor, escolha outro horário.</p>";
        } else {
            // Inserir o novo agendamento
            $sql = "INSERT INTO appointments (client_name, client_phone, appointment_date) VALUES (:name, :phone, :date)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['name' => $name, 'phone' => $phone, 'date' => $date]);

            echo "<p>Agendamento realizado com sucesso!</p>";
        }
    }
    ?>

    <form method="POST" action="schedule.php">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="phone">Telefone:</label>
        <input type="text" id="phone" name="phone" required>
        <br>
        <label for="date">Data e Hora:</label>
        <input type="datetime-local" id="date" name="date" required>
        <br>
        <button type="submit">Agendar</button>
    </form>
</section>

