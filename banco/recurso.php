<?php 
require_once '../banco/Questao.php';
class recurso{
	private $conexao;
	private $questao;
	private $loginCorrente;
	private $senhaCorrente;
	
	
	function __construct($conexaoBanco,$login,$senha){
		$this->conexao = $conexaoBanco;
		$this->questao = new Questao($conexaoBanco);
		$this->loginCorrente=$login;
		$this->senhaCorrente=$senha;
		
	}
	
	//selecionar id do recurso em aberto do elaborador corrente
	function recursoElaborador() {
		$idElaborador = $this->questao->selecionaResponsavel($this->loginCorrente,$this->senhaCorrente);
		$stmt = $this->conexao->prepare("SELECT DISTINCT r.idRecurso FROM Recurso r, Questao q WHERE r.idQuestao = q.idQuestao AND q.idElaborador = ? AND r.deferimento IS NULL");
		$stmt->bindValue(1, $idElaborador);
		if($stmt->execute()){
			$resultado =  $stmt->fetchAll();
			if(empty($resultado)){
				return 1;
			}else{
				return $resultado;
			}
		   
		}else{
			return 0;
		}
		
	}
	
	//seleciona id da questao dado o id de um recurso
	function selecionaQuestao($idRecurso) {
		$stmt = $this->conexao->prepare("SELECT idQuestao FROM Recurso WHERE idRecurso=?");
		$stmt->bindValue(1, $idRecurso);
		if($stmt->execute()){
			$resultado = $stmt->fetch();
			if(empty($resultado)){
				return 1;
			}else{
				return $resultado['idQuestao'];
			}
		}else{
			return 0;
		}
		
	}
	
	//seleciona o id da Prova de um recurso
	function selecionaIdProva($idRecurso) {
		$stmt = $this->conexao->prepare("SELECT idProva FROM Recurso WHERE idRecurso=?");
		$stmt->bindValue(1, $idRecurso);
		if($stmt->execute()){
			$resultado = $stmt->fetch();
			if(empty($resultado)){
				return 1;
			}else{
				return $resultado['idProva'];
			}
		}else{
			return 0;
		}
	}
	
	//seleciona a descricao de um recurso
	function descricaoRecurso($idRecurso) {
		$stmt = $this->conexao->prepare("SELECT descricao FROM Recurso WHERE idRecurso=?");
		$stmt->bindValue(1, $idRecurso);
		if($stmt->execute()){
			$resultado = $stmt->fetch();
			if(empty($resultado)){
				return 1;
			}else{
				return $resultado['descricao'];
			}
		}else{
			return 0;
		}
	}
	

function recursoAdministrador() {
	$stmt = $this->conexao->prepare("SELECT * FROM Recurso r, Questao q WHERE r.idQuestao = q.idQuestao AND r.deferimento IS NULL");
	if($stmt->execute()){
		$resultado =  $stmt->fetchAll();
		if(empty($resultado)){
			return 1;
		}else{
			return $resultado;
		}
	}else{
		return 0;
	}
}

function atualizaRecurso($deferimento,$justificativa,$idRecurso) {
	echo "Atualiza rec";
	$stmt = $this->conexao->prepare("UPDATE Recurso SET deferimento = ?,justificativa = ? WHERE idRecurso = ?");
	$stmt->bindValue(1, $deferimento);
	$stmt->bindValue(2, $justificativa);
	$stmt->bindValue(3, $idRecurso);
	$retorno = $stmt->execute();
	if($retorno){
		echo "1return";
		return 1;
	}else{
		echo "rever retorno 0";
		return 0;
	}
}
}


?>