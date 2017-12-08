<?php 
	//bloqueia o acesso a página pela url
	session_start();
	if (!isset($_SESSION['loginElaborador']) && !isset($_SESSION['senhaElaborador'])){
		header('Location: ../paginas/elaborador.html');
	}
	require_once '../banco/conexao.php';
	require_once '../banco/recurso.php';
	
	$login =  $_SESSION['loginElaborador'];
	$senha =  $_SESSION['senhaElaborador'];

	//banco de dados
	$banco = new conexao();
	$conexaoBanco = $banco->conectaBanco();
	//recurso
	$recurso = new recurso($conexaoBanco,$login,$senha);
	$resultado = $recurso->recursoElaborador();
	if($resultado==1){
		echo "<script>
				alert('Nenhum Recurso em Aberto');
				location.assign('../paginas/paginaElaborador.php');
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
 		<script>
		 		
 		$(document).ready(function(){
            var recursos = $("#recursos");
                recursos.change(function(){
                var recursosValor = recursos.val();
                $.post("../servidor/tratamentoRecursoElaborador.php" ,{ idRecurso: recursosValor}, function(resposta){
                    $("#prova").show();
                    $("#vProva").show();
                  	$("#questao").show();
                  	$("#vQuestao").show();
                    var resultado = $.parseJSON(resposta);
                   	$("#vProva").html(resultado.idProva);
                    $("#vQuestao").val(resultado.idQuestao);
                    $("#botao").show();
                    });
                });
            });
		 
			 			
			
		 </script>
 	</head>
 <body>
	
 <div class="container">
     <h1 class="btn btn-lg btn-danger btn-block">SISconsult</h1><br>
     <form class="navbar-form" action="../servidor/tratamentoDetalhesRecursoElaborador.php" method="post">
 	<div class="col-lg-12 well">
 		<label>Recurso:</label> 
 		<select id="recursos" name="recurso">
			<?php 
								
				foreach ($resultado as $row) {
					echo '
										
						<option value='.$row['idRecurso'].'>'.$row['idRecurso'].'</option>
						';
				}
							
			?>
		</select>
  	   <br> <label id="prova" style=display:none;>Prova:</label>
  	   <label id="vProva" style=display:none;></label><br>
  	   <label id="questao" style=display:none;>Nº Questao:</label>
 		<input type = "text" id="vQuestao" name = "idQuestao" style=display:none;><br>
 		<button id="botao" type="submit" class="btn btn-default btn-success btn-md" style=display:none; >Ver Detalhes do Recurso</button>
 
 </div>
 
 </form>
 </div> <!-- /container -->
 
     <!-- Bootstrap core JavaScript
     ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="../projeto-final-sisconsult/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
 
 </body>
 </html>

