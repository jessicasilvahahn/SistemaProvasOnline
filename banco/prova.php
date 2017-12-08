<?php 
class prova{
	private $conexao;
	
	function __construct($conexaoBanco){
		$this->conexao = $conexaoBanco;
	}
	
	function armazenaProva($idProcessoSeletivo,$tempoInicio,$tempoFim) {
		$r = 0;
		$stmt = $this->conexao->prepare("INSERT INTO Prova(idProcessoSeletivo,tempoInicio,tempoFim) VALUES (?,?,?)");
		$stmt->bindValue(1, $idProcessoSeletivo);
		$stmt->bindValue(2, $tempoInicio);
		$stmt->bindValue(3, $tempoFim);
		$retorno = $stmt->execute();
		if($retorno){
			$r = 1;
		}
		return $r;
		
	}
	
	function selecionaIdProcesso() {
		$stmt = $this->conexao->prepare("SELECT MAX(idProcessoSeletivo) FROM ProcessoSeletivo");
		if($stmt->execute()){
			$idProcessoSeletivo = $stmt->fetch();
			if(!empty($idProcessoSeletivo)){
				return $idProcessoSeletivo[0];
				
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	
	function selecionaIdProva() {
		$stmt = $this->conexao->prepare("SELECT MAX(idProva) FROM Prova");
		if($stmt->execute()){
			$idProva = $stmt->fetch();
			if(!empty($idProva)){
				return $idProva[0];
				
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
}



?>