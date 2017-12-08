<?php 

//bloqueia o acesso a página pela url
session_start();
if (!isset($_SESSION['loginCandidato']) && !isset($_SESSION['senhaCandidato'])){
	header('Location: ../paginas/candidato.html');
}

require_once '../banco/conexao.php';
require_once '../banco/Questao.php';
//banco de dados
$banco = new conexao();
$conexaoBanco = $banco->conectaBanco();
$q = new Questao($conexaoBanco);
//$q->retornaquestoes(35);
//tem que colocar na mao faltou pegar do banco
$resul = $q->retornaquestoes(43);

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
	<div class="col-lg-12 well">
		
		<label>Processo Seletivo:</label> <label>0717</label> <br>
		<label>Prova:</label> <label>01</label> <br> <br>
	    
		<label>Questão</label> <label>1</label><br>
		<label><?php  print_r($q->selecionaDescricao($resul[0])) ?> </label>
		<br>

<?php $alter = $q->retorna_alternativa($resul[0]); ?>
 <div class="radio">
 <label><input type="radio" name="optradio" value=0 >A)</label><label> <?php print_r($alter[0][1]) ?> </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio" value=1 >B)</label><label> <?php print_r($alter[1][1]) ?>  </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio" value=2 >C)</label><label> <?php print_r($alter[2][1]) ?>  </label>
</div> 
	<div class="radio">
  <label><input type="radio" name="optradio" value=3 >D)</label><label> <?php print_r($alter[3][1]) ?>  </label>
</div> 
<div class="radio">
  <label><input type="radio" name="optradio" value=4 >E)</label><label> <?php print_r($alter[4][1]) ?>  </label>
</div> 	<br> <br>

	    
		<label>Questão</label> <label>2</label><br>
		<label><?php  print_r($q->selecionaDescricao($resul[1])) ?> </label>
		<br>

<?php $alter2 = $q->retorna_alternativa($resul[1]); ?>
 <div class="radio">
 <label><input type="radio" name="optradio2" value=0 >A)</label><label> <?php print_r($alter2[0][1]) ?> </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio2" value=1 >B)</label><label> <?php print_r($alter2[1][1]) ?>  </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio2" value=2 >C)</label><label> <?php print_r($alter2[2][1]) ?>  </label>
</div> 
	<div class="radio">
  <label><input type="radio" name="optradio2" value=3 >D)</label><label> <?php print_r($alter2[3][1]) ?>  </label>
</div> 
<div class="radio">
  <label><input type="radio" name="optradio2" value=4 >E)</label><label> <?php print_r($alter2[4][1]) ?>  </label>
</div> 	<br> <br>

	    
		<label>Questão</label> <label>3</label><br>
		<label><?php  print_r($q->selecionaDescricao($resul[0])) ?> </label>
		<br>

<?php $alter3 = $q->retorna_alternativa($resul[2]); ?>
 <div class="radio">
 <label><input type="radio" name="optradio3" value=0 >A)</label><label> <?php print_r($alter3[0][1]) ?> </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio3" value=1 >B)</label><label> <?php print_r($alter3[1][1]) ?>  </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio3" value=2 >C)</label><label> <?php print_r($alter3[2][1]) ?>  </label>
</div> 
	<div class="radio">
  <label><input type="radio" name="optradio3" value=3 >D)</label><label> <?php print_r($alter3[3][1]) ?>  </label>
</div> 
<div class="radio">
  <label><input type="radio" name="optradio3" value=4 >E)</label><label> <?php print_r($alter3[4][1]) ?>  </label>
</div> 	<br> <br>

	    
		<label>Questão</label> <label>4</label><br>
		<label><?php  print_r($q->selecionaDescricao($resul[3])) ?> </label>
		<br>

<?php $alter4 = $q->retorna_alternativa($resul[3]); ?>
 <div class="radio">
 <label><input type="radio" name="optradio4" value=0 >A)</label><label> <?php print_r($alter4[0][1]) ?> </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio4" value=1 >B)</label><label> <?php print_r($alter4[1][1]) ?>  </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio4" value=2 >C)</label><label> <?php print_r($alter4[2][1]) ?>  </label>
</div> 
	<div class="radio">
  <label><input type="radio" name="optradio4" value=3 >D)</label><label> <?php print_r($alter4[3][1]) ?>  </label>
</div> 
<div class="radio">
  <label><input type="radio" name="optradio4" value=4 >E)</label><label> <?php print_r($alter4[4][1]) ?>  </label>
</div> 	<br> <br>

	    
		<label>Questão</label> <label>5</label><br>
		<label><?php  print_r($q->selecionaDescricao($resul[4])) ?> </label>
		<br>

<?php $alter5 = $q->retorna_alternativa($resul[4]); ?>
 <div class="radio">
 <label><input type="radio" name="optradio5" value=0 >A)</label><label> <?php print_r($alter5[0][1]) ?> </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio5" value=1 >B)</label><label> <?php print_r($alter5[1][1]) ?>  </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio5" value=2 >C)</label><label> <?php print_r($alter5[2][1]) ?>  </label>
</div> 
	<div class="radio">
  <label><input type="radio" name="optradio5" value=3 >D)</label><label> <?php print_r($alter5[3][1]) ?>  </label>
</div> 
<div class="radio">
  <label><input type="radio" name="optradio5" value=4 >E)</label><label> <?php print_r($alter5[4][1]) ?>  </label>
</div> 	<br> <br>

	    
		<label>Questão</label> <label>6</label><br>
		<label><?php  print_r($q->selecionaDescricao($resul[5])) ?> </label>
		<br>

<?php $alter6 = $q->retorna_alternativa($resul[5]); ?>
 <div class="radio">
 <label><input type="radio" name="optradio6" value=0 >A)</label><label> <?php print_r($alter6[0][1]) ?> </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio6" value=1 >B)</label><label> <?php print_r($alter6[1][1]) ?>  </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio6" value=2 >C)</label><label> <?php print_r($alter6[2][1]) ?>  </label>
</div> 
	<div class="radio">
  <label><input type="radio" name="optradio6" value=3 >D)</label><label> <?php print_r($alter6[3][1]) ?>  </label>
</div> 
<div class="radio">
  <label><input type="radio" name="optradio6" value=4 >E)</label><label> <?php print_r($alter6[4][1]) ?>  </label>
</div> 	<br> <br>

	    
		<label>Questão</label> <label>7</label><br>
		<label><?php  print_r($q->selecionaDescricao($resul[6])) ?> </label>
		<br>

<?php $alter7 = $q->retorna_alternativa($resul[6]); ?>
 <div class="radio">
 <label><input type="radio" name="optradio7" value=0 >A)</label><label> <?php print_r($alter7[0][1]) ?> </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio7" value=1 >B)</label><label> <?php print_r($alter7[1][1]) ?>  </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio7" value=2 >C)</label><label> <?php print_r($alter7[2][1]) ?>  </label>
</div> 
	<div class="radio">
  <label><input type="radio" name="optradio7" value=3 >D)</label><label> <?php print_r($alter7[3][1]) ?>  </label>
</div> 
<div class="radio">
  <label><input type="radio" name="optradio7" value=4 >E)</label><label> <?php print_r($alter7[4][1]) ?>  </label>
</div> 	<br> <br>

	    
		<label>Questão</label> <label>8</label><br>
		<label><?php  print_r($q->selecionaDescricao($resul[7])) ?> </label>
		<br>

<?php $alter8 = $q->retorna_alternativa($resul[7]); ?>
 <div class="radio">
 <label><input type="radio" name="optradio8" value=0 >A)</label><label> <?php print_r($alter8[0][1]) ?> </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio8" value=1 >B)</label><label> <?php print_r($alter8[1][1]) ?>  </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio8" value=2 >C)</label><label> <?php print_r($alter8[2][1]) ?>  </label>
</div> 
	<div class="radio">
  <label><input type="radio" name="optradio8" value=3 >D)</label><label> <?php print_r($alter8[3][1]) ?>  </label>
</div> 
<div class="radio">
  <label><input type="radio" name="optradio8" value=4 >E)</label><label> <?php print_r($alter8[4][1]) ?>  </label>
</div> 	<br> <br>

	    
		<label>Questão</label> <label>9</label><br>
		<label><?php  print_r($q->selecionaDescricao($resul[8])) ?> </label>
		<br>

<?php $alter9 = $q->retorna_alternativa($resul[8]); ?>
 <div class="radio">
 <label><input type="radio" name="optradio9" value=0 >A)</label><label> <?php print_r($alter9[0][1]) ?> </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio9" value=1 >B)</label><label> <?php print_r($alter9[1][1]) ?>  </label>
</div>
<div class="radio">
  <label><input type="radio" name="optradio9" value=2 >C)</label><label> <?php print_r($alter9[2][1]) ?>  </label>
</div> 
	<div class="radio">
  <label><input type="radio" name="optradio9" value=3 >D)</label><label> <?php print_r($alter9[3][1]) ?>  </label>
</div> 
<div class="radio">
  <label><input type="radio" name="optradio9" value=4 >E)</label><label> <?php print_r($alter9[4][1]) ?>  </label>
</div> 	<br> <br>

<!-- Conforme as questões forem sendo respondidas a barra anda, o style é quem define a porcetagem= -->
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"> 10%
  </div>
</div>

<!-- Custom styles for this template -->
<form class="navbar-form">
	<div class="form-group">
      </div>
          <div class=text-right>
             <button action=dogao.php type="button" name="cachorro" class="btn btn-default btn-lg">
  <span class="	glyphicon glyphicon-share-alt" aria-hidden="true"></span> Encerrar Prova</button>
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
