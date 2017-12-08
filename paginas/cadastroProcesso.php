<?php 
	//bloqueia o acesso a página pela url
	session_start();
	if (!isset($_SESSION['loginAdministrador']) && !isset($_SESSION['senhaAdministrador'])){
		header('Location: ../paginas/administrador.html');
	}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="../css/paginaCadastro.css" rel="stylesheet">
<!-- Bootstrap core CSS -->
    <link href="../bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="../css/signin.css" rel="stylesheet">
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>
	<link rel="icon" href="../imagens/IFSC.png">
	 <script src="../js/jquery-3.2.1.min.js"></script>
	  <script src="../js/funcionalidadesExtras.js"></script>
 	<title>Elaborar Questão</title>
</head>
<body>
<div class="container">
		<div class="row">
			<div class="col-md-10 well">
			<h1 class="btn btn-lg btn-danger btn-block">SISconsult</h1><br>
			
				<div class="col-sm-12 form-group">
					<form id="questaoFormulario" action="../servidor/tratamentoCadastroProcesso.php" method="post">
					<label>Data de cadastro inicial</label>
		            <br><input type="date" id="dataInicio" name="dataInicio" class="form-control" required autofocus>
		            <br><label>Tempo Incial do cadastro</label>
		            <br><input type="time" id="tempoInicio" name="tempoInicio" class="form-control" required>
		            <br><label>Data de cadastro final</label>
		            <br><input type="date" id="dataFim" name="dataFim" class="form-control" required>
		            <br><label>Tempo final do cadastro</label>
		            <br><input type="time" id="tempoFim" name="tempoFim" class="form-control" required>
					<br><button id="cadastraProcesso" type="submit" class="btn btn-lg btn-primary btn-block" >Criar Prova</button><br>    
					</form> 
				
				</div>
				
			</div>
	</div>	
</div>
</body>
</html>

