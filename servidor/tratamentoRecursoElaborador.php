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

//pegando dados enviados via jquery
$idRecurso = $_POST['idRecurso'];
//vars
$idProva=0;
$descRecurso=0;
$idQuestao = 0;
$banco = new conexao();
$conexaoBanco = $banco->conectaBanco();
$r = new recurso($conexaoBanco,$login,$senha);
$resultadoProva = $r->selecionaIdProva($idRecurso);
if($resultadoProva==1){
	echo 0;
}elseif ($resultadoProva==0){
	echo 0;
}else{
	$idProva = $resultadoProva;
	$idQuestao = $r->selecionaQuestao($idRecurso);
	if($idQuestao==1){
		echo 0;
	}elseif ($idQuestao==0){
		echo 0;
	}else{
		$array = array("idProva"=>$idProva,"idQuestao"=>$idQuestao);
		print_r(json_encode( $array ));
	}
	
}




?>