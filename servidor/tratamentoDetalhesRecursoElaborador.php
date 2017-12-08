<?php 
	session_start();
	if (!isset($_SESSION['loginElaborador']) && !isset($_SESSION['senhaElaborador'])){
		header('Location: ../paginas/elaborador.html');
	}
	require_once '../banco/conexao.php';
	require_once '../banco/recurso.php';
	require_once '../banco/Questao.php';
	
	$login =  $_SESSION['loginElaborador'];
	$senha =  $_SESSION['senhaElaborador'];

	$idQuestao = $_POST['idQuestao'];
	$idRecurso = $_POST['recurso'];

	//banco de dados
	$banco = new conexao();
	$conexaoBanco = $banco->conectaBanco();
	//recurso
	$recurso = new recurso($conexaoBanco,$login,$senha);
	$descricaoRecurso = $recurso->descricaoRecurso($idRecurso);
	if($descricaoRecurso==1){
		echo "<script>

				alert('Descricao Recurso invalido!');
				location.assign('../paginas/paginaElaborador.php') ;
				
			</script>";
	}
	
	$questao  = new Questao($conexaoBanco);
	$descricaoQuestao = $questao->selecionaDescricao($idQuestao);
	if($descricaoQuestao==1){
			echo "<script>
					
				alert('Descricao Questao invalida!');
				location.assign('../paginas/paginaElaborador.php') ;
	
					
			</script>";
		}
	
	

?>

<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<script src="../js/jquery-3.2.1.min.js"></script>
		<script src="../js/loadPages.js"></script>
		<meta name="author" content="SISconsult">
    	<link rel="icon" href="../imagens/IFSC.png">
 		<title>Recurso Elaborador</title>

<!-- Bootstrap core CSS -->
    	<link href="../bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		 <link href="../css/signin.css" rel="stylesheet">

		 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		 <link href="../bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="../bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>
		
	</head>
<body>
<div class="container">
<form action = "/servidor/tratamentoJustificativaElaborador.php" method="post">
    <h1 class="btn btn-lg btn-danger btn-block">SISconsult</h1><br>
	<div class="col-lg-12 well">
		<label>Questao:</label> <br>
		<textarea rows="4" cols="50" id="recursoQuestao" class="form-control" required autofocus> 
		<?php echo $descricaoQuestao?>
    	</textarea>
		<label>Descrição:</label> <br>
		<textarea rows="4" cols="50" id="recursoDesc" class="form-control" required autofocus> 
		<?php echo $descricaoRecurso?>
    	</textarea>
		<br> <br>
		<label>Justificativa:</label> <br>
		<textarea rows="4" cols="50" name="recursoJustificativa" class="form-control" placeholder="Justificativa" required autofocus> 
   		</textarea>
   		<?php echo "<input type='hidden' name='idRecurso' value=$idRecurso>"?>
		 <br>
		<div class="radio">
		  <input type="radio" name="indeferir" value="0">Indeferir
		</div>
		<div class="radio">
		  <input type="radio" name="deferir" value="1">Deferir
		</div><br>
		
	</div>
	<!-- Custom styles for this template -->
	
		<div class="form-group"></div>
	          <div class=text-right>
	   			  <button id="confirma" name ="confirma" type="submit" class="btn btn-default btn-success btn-md" >Confirmar</button>
	          </div>
 
</form>	
	</div> 


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../projeto-final-sisconsult/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
