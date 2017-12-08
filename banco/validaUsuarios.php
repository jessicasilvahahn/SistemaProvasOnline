<?php
class validaUsuarios {
	private $conexao;
	private $retorno;
	
	function __construct($conexaoBanco){
		$this->conexao = $conexaoBanco;
		$this->retorno = 0;
	}
	
	function validaAdm($user,$pass) {
		$stmt = $this->conexao->prepare("SELECT login,senha FROM Administrador WHERE login=? and senha=?");
		$stmt->bindValue(1, $user);
		$stmt->bindValue(2, $pass);
		$stmt->execute();
		$row = $stmt->fetch();
		if(empty($row)){
			$this->retorno = 0;
		}else{
			$this->retorno = 1;
		}
	}
	
	function validaElaborador($user,$pass) {
		$stmt = $this->conexao->prepare("SELECT login,senha FROM Elaborador WHERE login=? and senha=?");
		$stmt->bindValue(1, $user);
		$stmt->bindValue(2, $pass);
		$stmt->execute();
		$row = $stmt->fetch();
		if(empty($row)){
			$this->retorno = 0;
		}else{
			$this->retorno = 1;
		}
	}
	
	function validaCandidato($user,$pass){
		$stmt = $this->conexao->prepare("SELECT login,senha FROM Candidato WHERE login=? and senha=?");
		$stmt->bindValue(1, $user);
		$stmt->bindValue(2, $pass);
		$stmt->execute();
		$row = $stmt->fetch();
		if(empty($row)){
			$this->retorno = 0;
		}else{
			$this->retorno = 1;
		}
	}
	function getRetornoValidacao(){
		return $this->retorno;
	}
}

?>