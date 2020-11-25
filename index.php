<?php

session_start();
include_once("model/config-banco-dados.php");

?>

<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Listagem</title>
  </head>
  <body style="background: #E4E4E4">
    
	  
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
	
	  
	  <div class="text-center">
		  <?php
			  //data atual
		  		date_default_timezone_set("America/Sao_Paulo");
				echo "Data atual: ".date('d/m/y')."<br>";
		  
				$medicos = "SELECT nome,id FROM medicos"; 
		  		$resultado_medicos = mysqli_query($conn, $medicos) or die ("Não foi possivel conectar no banco de dados. Tente novamente mais tarde."); 
		  
		  		while ($row_medico = mysqli_fetch_assoc($resultado_medicos)):
		  ?>
		  <br>
		  <div  class="row " >
			  <div class="col-md-3"></div>
			  <div class="col-md-6 " style="background-color: #FFFFFF">
				  <div class="d-flex">
					  <div class="p-2" style="padding: 2%"><h4 style="color:#004768"><?php echo $row_medico['nome'];?> </h4> </div>
					  
					  <form action="view/editaCadastro.php" method="post" id="<?php echo "cadastro".$row_medico['id'];?>">
						  <input type="hidden" name="id_medico" value="<?php echo $row_medico['id'];?>">
					  </form>
					  <form action="view/configuraHorarios.php" method="post" id="<?php echo "horarios".$row_medico['id'];?>">
						  <input type="hidden" name="id_medico" value="<?php echo $row_medico['id'];?>">
					  </form>
					  
					  <div class="ml-auto p-2" style="padding: 1%"><button style="color:#004768;"  form="<?php echo "cadastro".$row_medico['id'];?>" value="id_medico" type="submit" class="btn btn-light">Editar cadastro</button></div>
					  <div class="d-flex align-items-end flex-column" style="padding: 1%"><button style="color:#004768" form="<?php echo "horarios".$row_medico['id'];?>" value="id_medico" type="submit" class="btn btn-light">Configurar horários</button></div>
				  </div>
				 <div class="row" style="margin: 5px">
					 
				</div>
				<div class="row d-flex justify-content-center text-center" >
				  <?php
				  //////////////////////////////////////////////////////////////////////////////////////////////
				  //////// Busca horários no banco de dados 
				  /////////////////////////////////////////////////////////////////////////////////////////////
				  $id_medico = $row_medico['id'];
				  $horarios = "SELECT * FROM horario WHERE id_medico = '$id_medico' ORDER BY 'data_horario' ASC";
				  $resultado_horarios = mysqli_query($conn, $horarios) or die ("Não foi possivel conectar no banco de dados. Tente novamente mais tarde.");
				  
				  while ($row_horario = mysqli_fetch_assoc($resultado_horarios)): 
				  $dataLocal = $row_horario['data_horario'];
				  $dataLocal = date_create($dataLocal);
				  ?>
				
				  <div class="col-md-3" style="font-size: 15px; font-weight: bold ;color: white; background: #0094CF; border-radius: 15px; margin: 5px; "><?php echo  date_format($dataLocal, "d/m/Y H:i") ?></div>
					
				  <?php endwhile; ?>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		  </div>  
		  <br>
	  <br>
		  	<?php endwhile; ?>
		  
		  
		  
	  </div>
	  
	  
	  
	  
	  
	  
	  
	  



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>