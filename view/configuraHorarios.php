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

    <title>Configurar horários</title>
  </head>
  <body style="background: #E4E4E4; ">
    
	  
	<div class="container-fluid" style="background: #0094CF">
		<div class="container">
		<br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 float-left " >
				<div class="float-right">
					<a href="view/cadastraMedico.html"><button style="color:#004768" type="button" class="btn btn-light">Cadastro de médicos</button></a>
				</div>	
			</div>
			<div class="col-md-2"></div>
			</div>
			<br>
			</div>
	</div>
	
	  <br><br>
	  
	  
	  <div class="container">
		  <div class="text-center"  style="color: #004768">
			  	  <div class="container padding-64 text-center align-items-center" id="coordenadores">
							<br>

						<div class="align-items-center">
						<div class= "col-md-12 form-row text-center">
						<div class="col-md-6 col-xs-offset-1" style="background-color: #FFFFFF">
							
						  <div class="text-center"  style="color: #004768">
							  <br>
							  <h3>Adicionar horários</h3>
							  <br>
						  </div>
							
							<div class="text-left" style="margin-left: 20px; font-weight: bolder">
								Nome:
								<br>
							</div>
							<?php
								$medico = "SELECT nome FROM medicos WHERE id = '$id_medico'"; 
								$resultado_medico = mysqli_query($conn, $medico) or die ("Não foi possivel conectar no banco de dados. Tente novamente mais tarde."); 
								$row = mysqli_fetch_assoc($resultado_medico);
							?>
							<div class="text-left" style="margin-left: 20px; font-weight: bolder; font-size: 25">
								<?php echo $row['nome']."<br><br>"; ?>
							</div>
							<div class="text-left" style="margin-left: 20px; font-weight: bolder">
								Data e hora
								<br>
							</div>
							<form action="../model/att_horario.php" method="post">
							  <div class="form-group" style="margin-left: 20px; font-weight: bolder">
								<input type="datetime-local" class="form-control" id="novo_horario" name="novo_horario" >
								<input type="hidden" name="tipo" value="adicionar_horario">
							    <input type="hidden" name="id_horario" value="null">
								<input type="hidden" name="id_medico" value="<?php echo $id_medico?>">
							  </div>
								<div class="row justify-content-center">
							  <button type="submit" class="btn btn-primary" name="horario">Adicionar horários</button>
							  <br>
					  		</div>
							</form>
							<br>
							
							<div class="text-center"  style="color: #0094CF">
									<a href="../index.php"><button type="button" class="btn btn-link">Voltar para a página inicial</button></a>
									<br>
							</div>
						</div>
							
						<div class="col-md-6 col-xs-offset-1" style="background-color: #FFFFFF">
						  <div class="text-center"  style="color: #004768">
							  <br>
							  <h3>Horários configurados</h3>
							  <br>
							  <?php
								  $horarios = "SELECT * FROM horario WHERE id_medico = '$id_medico' ORDER BY 'data_horario' ASC";
								  $resultado_horarios = mysqli_query($conn, $horarios) or die ("Não foi possivel conectar no banco de dados. Tente novamente mais tarde.");

								  while ($row_horario = mysqli_fetch_assoc($resultado_horarios)): 
									  $dataLocal = $row_horario['data_horario'];
									  $dataLocal = date_create($dataLocal);
							  ?>
							  <div class="d-flex">
								  <div class="align-items-start" style="margin-left: 25px; font-weight: bold; font-size: 20">
									  <?php echo  date_format($dataLocal, "d/m/Y H:i"); ?>
								  </div>
								  <?php
									  if ($row_horario['horario_agendado'] == 1): ?>
								  		  
								  		  <form action="../model/att_horario.php" method="post" id="<?php echo "horarios".$row_horario['id'];?>">
											  <input type="hidden" name="id_horario" value="<?php echo $row_horario['id'];?>">
											  <input type="hidden" name="tipo" value="remover">
										  </form>
										  <div class="ml-auto align-items-end" style="margin-right: 25px">
											  <button type="submit" form="<?php echo "horarios".$row_horario['id'];?>" name="horario" style="color: red" class="btn btn-link">Remover</button>
										  </div>
								<?php endif?>
								  <?php
									  if ($row_horario['horario_agendado'] == 0): ?>
								  		  
								  		  <form action="../model/att_horario.php" method="post" id="<?php echo "horarios".$row_horario['id'];?>">
											  <input type="hidden" name="id_horario" value="<?php echo $row_horario['id'];?>">
											  <input type="hidden" name="tipo" value="adicionar_horario">
										  </form>
										  <div class="ml-auto align-items-end" style="margin-right: 25px">
											  <button type="submit" form="<?php echo "horarios".$row_horario['id'];?>" name="horario" style="color: green" class="btn btn-link">Adicionar</button>
										  </div>
								<?php endif?> 
							  </div>
							  <hr/>
						  	<?php endwhile; ?>
						  </div>
						</div>
						</div>	
						</div>
				</div>  
				  <br>
			  </div>
				<br>
		  </div> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>