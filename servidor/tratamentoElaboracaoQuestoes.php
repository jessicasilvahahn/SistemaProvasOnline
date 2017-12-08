<?php
require_once '../banco/conexao.php';
require_once '../banco/Questao.php';
//pega dados do elaborador
session_start();
$senha = $_SESSION['senhaElaborador'];
$login = $_SESSION['loginElaborador'];
//pegando dados enviados do formulario da elaboração das questões e tratando para aceitar acentuação e só aceitar letra minuscula
$tema_select = strtolower($_POST['temaSelect']);
$novo_tema = strtolower($_POST['tema']);
if (empty($novo_tema)){
	$tema = $tema_select;
}else{
	$tema = $novo_tema;
}
$descricao=  $_POST['questao'];
$alternativaA = $_POST['A'];
$alternativaB = $_POST['B'];
$alternativaC = $_POST['C'];
$alternativaD = $_POST['D'];
$alternativaE = $_POST['E'];
$gabarito = strtolower($_POST['gabarito']);
$nivel = iconv('UTF-8', 'ISO-8859-1//TRANSLIT',strtolower($_POST['nivel']));

switch ($nivel) {
	case "facil":
		$nivel = 1;
	break;
	
	case "medio":
		$nivel = 2;
	break;
	
	case "dificil":
		$nivel = 3;
}
//banco de dados
$banco = new conexao();
$conexaoBanco = $banco->conectaBanco();
$q = new Questao($conexaoBanco);
$idElaborador = $q->selecionaResponsavel($login,$senha);
if($idElaborador!=0){
	if($q->armazenaQuestao($tema,$descricao,$nivel,$idElaborador)){
		if(armazenaAlternativas($alternativaA,$alternativaB,$alternativaC,$alternativaD,$alternativaE)==5){
			echo "<script>
				alert('Armazenada com sucesso');
				location.assign('../paginas/elaborarQuestao.php') ;
					
			</script>";
		}else{
			echo "<script>
				alert('Algum erro ocorreu');
			</script>";
		}
		
		
		
	}
	
}

function armazenaAlternativas($alternativaA,$alternativaB,$alternativaC,$alternativaD,$alternativaE){
	$i=0;
	$q = $GLOBALS['q'];
	$gabarito = $GLOBALS['gabarito'];
	//pegar o id da última questao armazenada
	$idQuestao = $q->selecionaIdQuestaoCorrente();
	switch ($gabarito) {
		case "a":
			echo "a";
			//armazena A como correta
			$i += $q->armazenaAlternativa($alternativaA,$idQuestao,true);
			$i += $q->armazenaAlternativa($alternativaB,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaC,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaD,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaE,$idQuestao,false);
			break;
			
		case "b":
			echo "b";
			//armazena a B como correta
			$i += $q->armazenaAlternativa($alternativaA,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaB,$idQuestao,true);
			$i += $q->armazenaAlternativa($alternativaC,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaD,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaE,$idQuestao,false);
			break;
			
		case "c":
			echo "c";
			//armazena C como correta
			$i += $q->armazenaAlternativa($alternativaA,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaB,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaC,$idQuestao,true);
			$i += $q->armazenaAlternativa($alternativaD,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaE,$idQuestao,false);
			break;
			
		case "d":
			echo "d";
			//armazena D como correta
			$i += $q->armazenaAlternativa($alternativaA,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaB,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaC,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaD,$idQuestao,true);
			$i += $q->armazenaAlternativa($alternativaE,$idQuestao,false);
			break;
			
		case "e":
			echo "e";
			//armazena E como correta
			$i += $q->armazenaAlternativa($alternativaA,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaB,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaC,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaD,$idQuestao,false);
			$i += $q->armazenaAlternativa($alternativaE,$idQuestao,true);
			break;
			
	} 
	
	return $i;
}
?>