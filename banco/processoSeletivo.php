<?php 

class processoSeletivo{
	private $conexao;
	
	function __construct($conexaoBanco){
		$this->conexao = $conexaoBanco;
	}
	
	function idProcesso(){
		$id = 0;
		$stmt = $this->conexao->prepare("SELECT MAX(idProcessoSeletivo) FROM ProcessoSeletivo");
		if($stmt->execute()){
			$idProcesso = $stmt->fetch();
			if(empty($idProcesso)){
				$id = 1;
			}else{
				$id = ($idProcesso[0])+1;
			}
		}
		return $id;
			
	}
	
	function armazenaProcesso($idProcesso,$inicio,$fim,$idAdministrador){
		$r = 0;
		$stmt = $this->conexao->prepare("INSERT INTO ProcessoSeletivo(idProcessoSeletivo,tempoInicioCadastro,tempoFimCadastro,idAdministrador) VALUES(?,?,?,?)");
		$stmt->bindValue(1, $idProcesso);
		$stmt->bindValue(2, $inicio);
		$stmt->bindValue(3, $fim);
		$stmt->bindValue(4, $idAdministrador);
		$retorno = $stmt->execute();
		if($retorno){
			$r = 1;
			
		}
		
		return $r;
		
		
		
	}
	
	function selecionaResponsavel($login,$senha) {
		$stmt = $this->conexao->prepare("SELECT idAdministrador FROM Administrador WHERE login=? and senha=?");
		$stmt->bindValue(1, $login);
		$stmt->bindValue(2, $senha);
		$retorno = $stmt->execute();
		if($retorno){
			$row =  $stmt->fetch();
			echo "responsavel".$row['idAdministrador'];
			return $row['idAdministrador'];
		}
		
		return 0;
		
	}
}




?>