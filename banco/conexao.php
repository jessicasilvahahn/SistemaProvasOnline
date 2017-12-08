<?php
class conexao{
	private $parametrosXML;
	
	function __construct(){
		$this->parametrosXML = simplexml_load_file('../config/aplicacao.xml');
	}
	
	function conectaBanco() {
		$host = $this->parametrosXML->host;
		$user = $this->parametrosXML->user;
		$pass = $this->parametrosXML->senha;
		$bancoEsquema = $this->parametrosXML->bd;
		
		try {
			$conexao = new PDO("mysql:host=$host;dbname=$bancoEsquema", $user, $pass);
			return $conexao;
		} catch (PDPException $e) {
			echo $e->getMessage();
			die;
		}	
	}
	
	function fechaConexao($conexaoBanco){
		unset($conexaoBanco);
	}
	
	
}


?>