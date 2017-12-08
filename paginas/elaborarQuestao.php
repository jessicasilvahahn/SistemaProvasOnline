<?php

	//bloqueia o acesso a página pela url
	//bloqueia o acesso a página pela url
	session_start();
	if (!isset($_SESSION['loginElaborador']) && !isset($_SESSION['senhaElaborador'])){
		header('Location: ../paginas/elaborador.html');
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
	  <script src="../js/loadPages.js"></script>
 	<title>Elaborar Questão</title>
</head>
<body>
<div class="container">
    <h1 class="btn btn-lg btn-danger btn-block">SISconsult</h1><br>
	<div class="col-lg-12 well">
		<div class="row">
			<form id="questaoFormulario" action="../servidor/tratamentoElaboracaoQuestoes.php" method="post">
				<div class="col-sm-6">
					<div class="row">
						<div class="col-sm-6 form-group">
							<label>Tema:</label>
							<select name="temaSelect">
							<?php 
								
								foreach ($array as $row) {
									echo "
										
										<option value='$row'>$row</option>
										
									";
								}
							
							?>
							</select>
							<br><br><button type="button" name="temaBotao" id="temaBotao">Criar Novo Tema</button><br>
							<br><input type="text" id="temaInput" style=display:none;" name="tema" class="form-control" maxlength="50" placeholder="Novo tema"><br>
							<label>Questão</label>
							<textarea rows="10" cols="30" maxlength="500" id="questao" name="questao" required></textarea>
						</div>	
					</div>
					<label>Nível</label><br>
						<input type="radio" name="nivel" value="facil" id="radioFacil" checked required> Fácil<br>
  						<input type="radio" name="nivel" value="medio" id="radioMedio" required> Médio<br>
 						<input type="radio" name="nivel" value="dificil" id="radioDificil" required> Difícil<br><br> 	
				</div>
				<div class="col-sm-6 form-group">
						<label>Alternativas</label>
						<input type="text" id="A" name="A" class="form-control" maxlength="100" placeholder="Alternativa A" required><br>
						<input type="text" id="B" name="B" class="form-control" maxlength="100" placeholder="Alternativa B" required><br>
						<input type="text" id="C" name="C" class="form-control" maxlength="100" placeholder="Alternativa C" required><br>
						<input type="text" id="D" name="D" class="form-control" maxlength="100" placeholder="Alternativa D" required><br>
						<input type="text" id="E" name="E" class="form-control" maxlength="100" placeholder="Alternativa E" required><br>	
						<label>Gabarito:</label><br>
						<select name="gabarito" required>
 							<option value="A">A</option>
  							<option value="B">B</option>
							<option value="C">C</option>
							<option value="D">D</option>
							<option value="E">E</option>
						</select><br><br>	
 						<div class="col-sm-6 form-group">
 						 <br><br><button class="btn btn-primary btn-block" type="button" id="voltarPaginaElaborador">Voltar</button>		
 						</div>
 						<div class="col-sm-6 form-group" >
 						<br><br><button class="btn btn-primary btn-block" type="submit" id="enviarQuestao"> Próximo </button>					 
 						
 						</div>
				</div>	
				
				
				
			</form> 
		</div>
		
	</div>	
</div>
</body>
</html>

