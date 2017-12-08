<?php
//bloqueia o acesso a página pela url
session_start();
if (!isset($_SESSION['loginCandidato']) && !isset($_SESSION['senhaCandidato'])){
	header('Location: ../paginas/candidato.html');
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
<title>Candidato</title>
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
		
      <form class="form-signin">
        
		<button id="realizarProva" name="realizarProva" type="button" class="btn btn-lg btn-primary btn-block" >Realizar Prova</button>
		<button id="sairPaginaCandidato" name="sairPaginaCandidato" type="button" class="btn btn-lg btn-primary btn-block" >Sair</button>
      </form>
		
    </div> <!-- /container -->
		
		
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
		
		
</body>
</html>


