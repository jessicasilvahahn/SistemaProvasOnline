<?php
	//bloqueia o acesso a página pela url
	session_start();
	if (!isset($_SESSION['loginAdministrador']) && !isset($_SESSION['senhaAdministrador'])){
		header('Location: ../paginas/administrador.html');
	}
	require_once '../banco/conexao.php';
	require_once '../banco/recurso.php';

	$login =  $_SESSION['loginAdministrador'];
	$senha =  $_SESSION['senhaAdministrador'];

	//banco de dados
	$banco = new conexao();
	$conexaoBanco = $banco->conectaBanco();
	$recAdm = new recurso($conexaoBanco,$login,$senha);
	
	$resultado = $recurso->recursoAdministrador();
	//recurso
	$recAdm->recursoAdministrador();
    $idCand = $recAdm['idCandidato'];
	$idQues = $recAdm['idQuestao'];
	$idRec = $recAdm['idRecurso'];
	$idPro = $recAdm['idProva'];
	$des = $recAdm['descricao'];
	$def = $recAdm['deferimento'];
	$just = $recAdm['justificativa'];
	
	echo $idCand;

	if($recAdm==1){
		echo "<script>
				alert('Nenhum Recurso em Aberto');
				location.assign('../paginas/paginaAdministrador.php');
			</script>";
	}elseif ($resultado==0){
		echo "<script>
				alert('Problema ao Consultar Recurso');
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
 		<title>Recurso Candidato</title>

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
    <h1 class="btn btn-lg btn-danger btn-block">SISconsult</h1><br>
	<div class="col-md-12 well">

<label>Recursos em aberto:</label>  

<div style="overflow: auto; height: 150px; border:solid 1px"> 
    <table class="table table-striped" >
    <thead>
    <tr>
        <th>Candidato</th>
        <th>Questão</th>
        <th>Questão</th>
	
        
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="filterable-cell"><?php echo $idCand?></td>
    </tr>
    <tr>
        <td class="filterable-cell"><?php echo $idQuestão?></td>
     </tr>
     <tr>
        <td class="filterable-cell">232</td>
        <td class="filterable-cell">23</td>
        <td class="filterable-cell">2</td>
 	    </tr>
     <tr>
        <td class="filterable-cell">3u2</td>
        <td class="filterable-cell">3</td>
        <td class="filterable-cell">5</td>
     </tr>
    </tbody>
    </table>
</div>
  
  
 <!-- Custom styles for this template -->
<form class="navbar-form">
	<div class="form-group">
      </div>
          <div class=text-center>
              <button id="AvisarElaboradordoRecurso" type="button" class="btn btn-danger btn-success btn-md" >Avisar Elaborador</button>
          </div>
</form> <br> <br>
<form class="navbar-form">
	<div class="form-group">
      </div>
          <div class=text-right>
              <button id="Criar" type="button" class="btn btn-default btn-success btn-md" >Criar Prova</button>
          </div>
</form> <br> <br>



    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../projeto-final-sisconsult/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>


</body>
</html>

