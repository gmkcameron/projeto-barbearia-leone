<?php 

	// Read the form values
	$success = false;
	$name = $_POST['contactsName'];
	$service $_POST['contactsServiceValue'];
	$date = $_POST['contactsDateValue'];
	$senderTel = $_POST['contactsTel'];
	$message = $_POST['contactsMessage'];

	// configurações de credencias 
	$server =  'localhost';
	$usario = 'root';
	$senha = '';
	$banco = 'barbearia_formulario';

	// conexao com nosso banco de dados
	$conn = new mysqli($server, $usario, $senha, $banco);
	// verificar conexao
	if($conn->connect_error){
		die("falha ao se comunicar com o banco de dados:".$sconn->connect_error);
	}
	$smtp = $sconn-> prepare("INSERT INTO form_clientes(nome, servico, telefone, data, mensagem) VALUES (?,?,?,?,?)")
	$smtp0->bind_param("sssss", $name, $service, $senderTel, $date, $message);

	if($smtp->execute()){
		echo "mensagem enviada com sucesso"
	}else{
		echo "erro no envio da mensagem:".$smtp->error;
	}

	$smtp->close();
	$conn->close();
	/*Headers
	$to = "name@domain.com";
    $subject = 'Contact Us';
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

	//body message
	$message = "Name: ". $name . "<br>Phone: ". $senderTel . "<br>Service: ". $service . "<br>Date: ". $date . "<br> Message: " . $message . "";

	//Email Send Function
    $send_email = mail($to, $subject, $message, $headers);*/
	


?>