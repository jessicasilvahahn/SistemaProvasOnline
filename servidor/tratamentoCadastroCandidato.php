<?php 
require_once '../banco/conexao.php';
require_once '../banco/candidato.php';
	//Pegando os dados do formulário
	$nomeCandidato = $_POST['nomeCadastroCandidato'];
	$emailCandidato = $_POST['emailCadastroCandidato'];
	$dataNascimento = $_POST['dataCadastroCandidato'];
	$usuarioCandidato = $_POST['usuarioCadastroCandidato'];
	$senhaCandidato = $_POST['senhaCadastroCandidato'];

	//banco de dados
	$banco = new conexao();
	$conexaoBanco = $banco->conectaBanco();
	$cd = new candidato($conexaoBanco);
	//verifica o login
	if($cd->verificaUser($usuarioCandidato)){
		//tenta armazenanr no banco
		if($cd->armazenaCandidato($nomeCandidato,$emailCandidato,$dataNascimento,$usuarioCandidato,$senhaCandidato)){
			echo "<script>
					alert('Cadastrado com sucesso');
					location.assign('../paginas/paginaCandidato.php') ;
					</script>";
		}else{
			echo "<script>
					alert('ERRO');
					location.assign('../paginas/inscricaoCandidato.html') ;
					</script>";
		}
	}else{
		echo "<script>
					alert('Este usuario ja esta cadastrado,escolha outro usuario!');
					location.assign('../paginas/inscricaoCandidato.html') ;

					</script>";
	}
	
?>