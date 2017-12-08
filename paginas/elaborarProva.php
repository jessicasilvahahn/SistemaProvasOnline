<?php 
	//bloqueia o acesso a página pela url
	//bloqueia o acesso a página pela url
	session_start();
	if (!isset($_SESSION['loginAdministrador']) && !isset($_SESSION['senhaAdministrador'])){
		header('Location: ../paginas/administrador.html');
	}
	
	require_once '../banco/conexao.php';
	require_once '../banco/Questao.php';
	
	//banco de dados
	$banco = new conexao();
	$conexaoBanco = $banco->conectaBanco();
	$q = new Questao($conexaoBanco);
	$array = $q->selecionaTemas();
	

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
 	<title>Elaborar Prova</title>
</head>
	<body>
		<div class="container">
		    <h1 class="btn btn-lg btn-danger btn-block">SISconsult</h1><br>
			<div class="col-lg-12 well">
			<div class="row">
						<form  action="../servidor/tratamentoCadastroProva.php" method="post">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-6 form-group">
									<label>1º Tema:</label>
									<select name="tema1Select">
									<?php 
										
										foreach ($array as $row) {
											echo "
												<option value='$row'>$row</option>";
										}
									
									?>
									</select>
									</div>
									<div class="col-sm-6 form-group">
									<input type="number" id="proporcaoTema1" name="proporcaoTema1" min="1" max="10" class="form-control" placeholder="Digite o número de questões do 1º tema" required>
									</div>
									<div class="col-sm-6 form-group">
									<label>2º Tema:</label>
									<select name="tema2Select">
									<?php 
										
										foreach ($array as $row) {
											echo "
												
												<option value='$row'>$row</option>
												
											";
										}
									
									?>
									</select>
									</div>
									<div class="col-sm-6 form-group">
									<input type="number" id="proporcaoTema2" name="proporcaoTema2" min="1" max="10" class="form-control" placeholder="Digite o número de questões do 2º tema" required>
									</div>
									<div class="col-sm-6 form-group">
									<label>3º Tema:</label>
									<select name="tema3Select">
									<?php 
										
										foreach ($array as $row) {
											echo "
												
												<option value='$row'>$row</option>
												
											";
										}
									
									?>
									</select>
									</div>
									<div class="col-sm-6 form-group">
									<input type="number" id="proporcaoTema3" name="proporcaoTema3" min="1" max="10" class="form-control" placeholder="Digite o número de questões do 3º tema" required>
									</div>
									<div class="col-sm-6 form-group">
									<label>Data de Início da Prova:</label>
							        <br><input type="date" id="dataInicio" name="dataInicio" class="form-control" required autofocus>
							        </div>
							        <div class="col-sm-6 form-group">
							        <label>Hora Inicial da Prova:</label>
							        <br><input type="time" id="tempoInicio" name="tempoInicio" class="form-control" required>
							        </div>
							        <div class="col-sm-6 form-group">
							      	<label>Data de Término da Prova:</label>
							        <br><input type="date" id="dataFim" name="dataFim" class="form-control" required>
							        </div>
							        <div class="col-sm-6 form-group">
							        <label>Hora de Término da Prova:</label>
							        <br><input type="time" id="tempoFim" name="tempoFim" class="form-control" required>
							        </div>
							        
							        <div class="col-sm-6 form-group">
									<label>Número de Questões:</label>
									<input type="number" id="numeroQuestoes" name="numeroQuestoes" min="1" max="30" class="form-control" placeholder="Digite o número de Questões" required>
									</div>
							        <div class="col-sm-6 form-group">
									<br><button class="btn btn-primary btn-block" type="submit" id="cadastrarProva"> Criar Prova </button>	
									</div>
								</div>					
									
											
							</div>
						</form> 
						</div>
			</div>
			</div>
	</body>
</html>