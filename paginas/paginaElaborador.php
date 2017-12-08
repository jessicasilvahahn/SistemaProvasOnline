<?php
	//bloqueia o acesso a página pela url
	session_start();
	if (!isset($_SESSION['loginElaborador']) && !isset($_SESSION['senhaElaborador'])){
		header('Location: ../paginas/elaborador.html');
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
 		<title>Pagina Elaborador</title>

    	<!-- Bootstrap core CSS -->
    	<link href="../bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		 <link href="../css/signin.css" rel="stylesheet">

		 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		 <link href="../bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="../bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>
		<script src="../js/jquery-3.2.1.min.js"></script>
	  	<script src="../js/loadPages.js"></script>
	</head>
<body>
<div class="container">

      <form class="form-signin" >
        <label class="btn btn-lg btn-danger btn-block">SISconsult</label><br>
        <button id="paginaElaboradorQuestao" type="button" class="btn btn-lg btn-primary btn-block" >Elaborar Questões</button><br>
		<button id="paginaElaboradorRecurso" type="button" class="btn btn-lg btn-primary btn-block" >Avaliar Recursos</button><br>  
		<button id="sairPaginaElaborador" type="button" class="btn btn-md btn-primary btn-block" >Sair</button>
		     
      </form>
	
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>


</body>
</html>