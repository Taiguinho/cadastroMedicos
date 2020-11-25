<?php
	include_once("../model/config-banco-dados.php");
	if (isset($_POST["id_medico"])){
		$id_medico = $_POST['id_medico'];
		
	} else {
		header("location: ../index.php");
		exit();
	}
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Cadastrar médico</title>
  </head>
  <body style="background: #E4E4E4; ">
    
	  
	<div class="container-fluid" style="background: #0094CF">
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 float-left " >
				<div class="float-right">
					<button style="color: #004768" type="button" class="btn btn-light">Cadastro de médico</button>
				</div>	
			</div>
			<div class="col-md-2"></div>
			</div>
			<br>
	</div>
	
	  <br><br>
	  
	  
	  <div class="container" style="background-color: #FFFFFF">
		  <div class="text-center"  style="color: #004768">
				  <br>
				  <h3>Editar  médico</h3>
			  	  
				  <br>
			  </div>
		  <?php
		  	$medico = "SELECT * FROM medicos WHERE id = '$id_medico'"; 
		  	$resultado_medico = mysqli_query($conn, $medico) or die ("Não foi possivel conectar no banco de dados. Tente novamente mais tarde."); 
		    $row = mysqli_fetch_assoc($resultado_medico);
		  ?>
		  
		  <div class="col-md-6 container">
			  <form action="../model/att_medic.php" method="post" >
					  <div class="form-group">
						  <label for="nome">Nome</label>
						  <input type="text" id="nomemedico" name="nome" class="form-control col-xs-4" value="<?php echo $row['nome']; ?>" required >
					  </div>
						  <br>
					   <div class="form-group">
						  <label for="senha">Senha antiga</label>
						  <input type="password" id="senhamedico" name="senha" class="form-control col-xs-4" placeholder="Insira a senha antiga" required>
					  </div>	  
						  <br>
					  <div class="form-group">
						  <label for="senha">Nova senha</label>
						  <input type="password" id="senhamedico" name="novaSenha" class="form-control col-xs-4" placeholder="Escolha uma nova senha forte e segura" required>
					  </div>
				  		   <input type="hidden" name="id_medico" value="<?php echo $row['id'];?>">
				  		   <input type="hidden" name="senhaAntiga" value="<?php echo $row['senha'];?>">
						  <br>
					  <div class="row justify-content-center">
							  <button type="submit" class="btn btn-primary" name="atualizar">Atualizar cadastro</button>
						  <br>
					  </div>
						  
				  </form>
						  
						  </div>
						  
						  <div class="text-center"  style="color: #0094CF">
							  <a href="../index.php"><button type="button" class="btn btn-link">Voltar para a página inicial</button></a>
							  <br>
						  </div>
						  <br>
		  </div> 
	  
	  
	  
	  
	  
	  
	  
	  
	  


	  
	
	  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>