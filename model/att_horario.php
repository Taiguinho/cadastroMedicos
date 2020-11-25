<?php

include_once("config-banco-dados.php");

if (isset($_POST["horario"])){
	$id_horario = $_POST['id_horario'];
	$tipo = $_POST['tipo'];  

	try {
		
		if ($tipo == "remover"){ //remover horario agendado
			
			$horario_agendado = 0;
			$result = "UPDATE horario SET horario_agendado ='$horario_agendado' WHERE id = '$id_horario'"; 
			$resultado = mysqli_query($conn,$result) or die ("Tente novamente mais tarde.");
			header("location: ../index.php");

		} else { 
			if ($tipo == "adicionar_agendamento"){
				$horario_agendado = 1;
				$result = "UPDATE horario SET horario_agendado ='$horario_agendado' WHERE id = '$id_horario'"; 
				$resultado = mysqli_query($conn,$result) or die ("Tente novamente mais tarde.");
				header("location: ../index.php");
				
			} else {
				if ($tipo == "adicionar_horario"){
					
					$id_medico = $_POST['id_medico'];
					$data = $_POST['novo_horario'];  
					$result = "INSERT INTO horario (id_medico,data_horario,horario_agendado) VALUES('$id_medico','$data','0')" or die ("Banco de dados inativo");
					$resultado = mysqli_query($conn,$result);
					header('location: ../index.php');
				} else {
					
				}
			} 
		}
		
		} catch (Exception $e){ 
			echo $e;
		}

	} else {
		echo "POST DEU ERRADO";
	}
?>