<?php

include_once("config-banco-dados.php");

function retornaEditaMedico(){
	header('Status: 301 Moved Permanently', false, 301);
	header('location: ../view/editaCadastro.php');
	exit();
}

if (isset($_POST["atualizar"])){
	$nome = $_POST['nome'];
	$senhaAntiga = $_POST['senhaAntiga'];  //senha atual do medico, vem codificada em MD5 pelo banco de dados
	$novaSenha = md5($_POST['novaSenha']); //nova senha 
	$id_medico = $_POST['id_medico']; 
	$senha = $_POST['senha']; //senha digitada pelo medico, que provavelmente seja a antiga(atual), deve ser passada pra MD5
	

	try {
		
		
		if (md5($senha) == $senhaAntiga){ //compara se a senha digitada pelo usuario eh a mesma que esta cadastrada no banco de dados

			$result = "UPDATE medicos SET nome ='$nome' , senha = '$novaSenha' WHERE id = '$id_medico'"; 
			$resultado = mysqli_query($conn,$result) or die ("Tente novamente mais tarde.");
			retornaEditaMedico();

		} else {
		
			echo '<script>history.back();</script>';
			echo "A SENHA ESTÁ INCORRETA.";
			exit();

			}
			
		
		} catch (Exception $e){ 
    		retornaEditaMedico();

		}
	

	} else {
		retornaEditaMedico();
	}
?>