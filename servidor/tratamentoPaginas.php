<?php
require_once '../banco/conexao.php';
require_once '../banco/validaUsuarios.php';
//conecta ao banco de dados
$banco = new conexao();
$conexaoBanco = $banco->conectaBanco();
//criando objeto de validacao
$validaUser = new validaUsuarios($conexaoBanco);

function criaSessaoElaborador($login,$senha){
	session_start();
	//apaga todas as variavais da sessao anterior
	$_SESSION = array();
	if (!isset($_SESSION['loginElaborador']) && !isset($_SESSION['senhaElaborador'])){
		$_SESSION['loginElaborador'] = $login;
		$_SESSION['senhaElaborador'] = $senha;
		
		
	}
	
}

function criaSessaoAdministrador($login,$senha){
	session_start();
	//apaga todas as variavais da sessao anterior
	$_SESSION = array();
	if (!isset($_SESSION['loginAdministrador']) && !isset($_SESSION['senhaAdministrador'])){
		$_SESSION['loginAdministrador'] = $login;
		$_SESSION['senhaAdministrador'] = $senha;
		
		
	}
	
}

function criaSessaoCandidato($login,$senha){
	session_start();
	//apaga todas as variavais da sessao anterior
	$_SESSION = array();
	if (!isset($_SESSION['loginCandidato']) && !isset($_SESSION['senhaCandidato'])){
		$_SESSION['loginCandidato'] = $login;
		$_SESSION['senhaCandidato'] = $senha;
		
		
	}
	
}
function trataAdm(){
	//Pega dados do login do administrador
	$emailAdm = $_POST['inputEmailAdm'];
	$senhaAdm = $_POST['inputSenhaAdm'];
	echo $emailAdm;
	echo $senhaAdm;
	//pegando variaveis globais
	$conexaoBanco = $GLOBALS['conexaoBanco'];
	$validaUser = $GLOBALS['validaUser'];
	$banco = $GLOBALS['banco'];
	
	$validaUser->validaAdm($emailAdm,$senhaAdm);
	$retorno = $validaUser->getRetornoValidacao();
	$banco->fechaConexao($conexaoBanco);
	if($retorno){
		//só cria a sessao se o usuário logou no sistema
		criaSessaoAdministrador($emailAdm,$senhaAdm);
		//carrega página administrador
		header("location:/paginas/paginaAdministrador.php");
	}else{
		echo 
		'<script>

			alert("Login incorreto!");

			location.assign("/paginas/administrador.html"); 	

		</script>';
		
	}
	
}

function trataElaborador() {
	$emailElaborador = $_POST['inputEmailElaborador'];
	$senhaElaborador = $_POST['inputSenhaElaborador'];
	//pegando variaveis globais
	$conexaoBanco = $GLOBALS['conexaoBanco'];
	$validaUser = $GLOBALS['validaUser'];
	$banco = $GLOBALS['banco'];
	$validaUser->validaElaborador($emailElaborador,$senhaElaborador);
	$retorno = $validaUser->getRetornoValidacao();
	$banco->fechaConexao($conexaoBanco);
	if($retorno){
		//só cria a sessao se o usuário logou no sistema
		criaSessaoElaborador($emailElaborador,$senhaElaborador);
		//carrega página elaborador
		header("location:/paginas/paginaElaborador.php");
	}else{
		echo
		'<script>
				
			alert("Login incorreto!");
				
			location.assign("/paginas/elaborador.html");
				
		</script>';
	}
}

function trataCandidato() {
	$emailCandidato = $_POST['inputEmailCandidato'];
	$senhaCandidato = $_POST['inputSenhaCandidato'];
	//pegando variaveis globais
	$conexaoBanco = $GLOBALS['conexaoBanco'];
	$validaUser = $GLOBALS['validaUser'];
	$banco = $GLOBALS['banco'];
	$validaUser->validaCandidato($emailCandidato,$senhaCandidato);
	$retorno = $validaUser->getRetornoValidacao();
	$banco->fechaConexao($conexaoBanco);
	if($retorno){
		//só cria a sessao se o usuário logou no sistema
		criaSessaoCandidato($emailCandidato,$senhaCandidato);
		//carrega página elaborador
		header("location:/paginas/paginaCandidato.php");
	}else{
		
		echo
		'<script>
				
			alert("Login incorreto!");
				
			location.assign("/paginas/candidato.html");
				
		</script>';
		
	}
}
//Escolhe a funcao correspondente
$operacao = $_POST['escolheOperacao'];
switch ($operacao) {
	case "elaborador":
		trataElaborador();
	break;
	
	case "administrador":
		trataAdm();
	break;
	
	case "candidato":
		trataCandidato();
	break;
}

?>