<?php 

	// Read the form values
	
	$name = $_POST['contactsName'];
	$data = $_POST['data'];
    $horario = $_POST['horario'];
	$senderTel = $_POST['contactsTel'] ;
	$message = $_POST['contactsMessage'];

	// configurações de credencias 
	$server =  'localhost';
	$usuario = 'root';
	$senha = '';
	$banco = 'barbearia';

	// conexao com nosso banco de dados
	$conn = new mysqli($server, $usuario, $senha, $banco);
	// verificar conexao
	if($conn->connect_error){
		die("falha ao se comunicar com o banco de dados:".$conn->connect_error);
	}
	$smtp = $conn-> prepare("INSERT INTO contatos (nome, telefone, data, mensagem, horario) VALUES (?,?,?,?,?)");
	$smtp->bind_param("sssss",$name, $senderTel, $data, $message, $horario);

	if($smtp->execute()){
		echo "Mensagem enviada com sucesso";
	}else{
		echo "erro no envio da mensagem: ".$smtp->error;
	}
	$smtp->close();
	$conn->close();

?>