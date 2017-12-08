<?php 
require_once '../banco/conexao.php';
require_once '../banco/processoSeletivo.php';
	//pega dados do administrador
	session_start();
	$senha = $_SESSION['senhaAdministrador'];
	$login = $_SESSION['loginAdministrador'];
	//Pegando os dados do formulário
	$dataInicial = $_POST['dataInicio'];
	$tempoIncial = $_POST['tempoInicio'];
	$dataFinal = $_POST['dataFim'];
	$tempoFinal = $_POST['tempoFim'];
	
	//formatando timestamp
	$tempoIncioCadastro = $dataInicial." ".$tempoIncial;
	$dateTimeInicial = new DateTime($tempoIncioCadastro);
	$tempoFimCadastro = $dataFinal." ".$tempoFinal;
	$dateTimeFinal = new DateTime($tempoFimCadastro);
	
	//banco de dados
	$banco = new conexao();
	$conexaoBanco = $banco->conectaBanco();
	$cp = new processoSeletivo($conexaoBanco);
	$adm = $cp->selecionaResponsavel($login,$senha);
	$id = $cp->idProcesso();
	if( $cp->armazenaProcesso($id,$dateTimeInicial->format("Y-m-d H:i"),$dateTimeFinal->format("Y-m-d H:i"),$adm)){
		
		echo "<script>
				alert('Armazenada com sucesso');
				location.assign('../paginas/elaborarProva.php') ;
				
			</script>";
			
	}else{
		echo "<script>
				alert('Algum erro ocorreu');
			</script>";
	}
	
	
	
?>