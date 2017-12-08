<?php
class Questao {
	private $conexao;
	
	function __construct($conexaoBanco){
		$this->conexao = $conexaoBanco;
	}
	
	function armazenaQuestao($tema,$descricao,$nivel,$responsavel) {
		$usada=false;
		$r = 0;
		$stmt = $this->conexao->prepare("INSERT INTO Questao(dificuldade,usada,descricao,tema,idElaborador) VALUES (?,?,?,?,?)");
		$stmt->bindValue(1, $nivel);
		$stmt->bindValue(2, $usada);
		$stmt->bindValue(3, $descricao);
		$stmt->bindValue(4, $tema);
		$stmt->bindValue(5, $responsavel);
		$retorno = $stmt->execute();
		if($retorno){
			$r = 1;
		}
		return $r;
	}
	
	function armazenaAlternativa($alternativa,$idQuestao,$alternativaCorreta){
		$r = 0;
		$stmt = $this->conexao->prepare("INSERT INTO Alternativas(descricao,idQuestao,alternativaCorreta) VALUES (?,?,?)");
		$stmt->bindValue(1, $alternativa);
		$stmt->bindValue(2, $idQuestao);
		$stmt->bindValue(3, $alternativaCorreta);
		$retorno = $stmt->execute();
		if($retorno){
			$r = 1;
			
		}
		
		return $r;

		
	}
	
	function selecionaIdQuestaoCorrente() {
		$stmt = $this->conexao->prepare("SELECT MAX(idQuestao) FROM Questao");
		if($stmt->execute()){
			$idQuestao = $stmt->fetch();
			if(!empty($idQuestao)){
				return $idQuestao[0];
				
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	
	function selecionaTemas() {
		$stmt = $this->conexao->prepare("SELECT DISTINCT tema FROM Questao");
		if($stmt->execute()){
			//nao ta pegando todos os temas
			$resultado =  $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
			return $resultado;
			
		}else{
			return 0;
		}
	

	}
	
	function selecionaResponsavel($login,$senha) {
		$stmt = $this->conexao->prepare("SELECT idElaborador FROM Elaborador WHERE login=? and senha=?");
		$stmt->bindValue(1, $login);
		$stmt->bindValue(2, $senha);
		$retorno = $stmt->execute();
		if($retorno){
			$row =  $stmt->fetch();
			return $row['idElaborador'];
		}
		
		return 0;
		
	}
	//retorna os id das Questoes por tema
	function selecionaQuestoesProva($tema,$dificuldade,$quantidadeTema) {
		/*1 - vazio
		 * 2 - Quantidade insuficiente
		 * 0 - erro banco
		 */

		$sql = "SELECT idQuestao FROM Questao WHERE tema=? and dificuldade=? and usada=false limit ?";
		$stmt = $this->conexao->prepare($sql);

		$stmt->bindValue(1, $tema);
		$stmt->bindValue(2, $dificuldade);
		$stmt->bindValue(3,$quantidadeTema,PDO::PARAM_INT); 
		$retorno = $stmt->execute();
		$resultado =  $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
		
		if($retorno){
			
			//verificar se retorna vazio
			if(empty($resultado)){
				return 1;
			}else{
				//return $resultado;
				//contar se tem a quantidade de questoes desejadas
				$stmt = $this->conexao->prepare("SELECT COUNT(*) FROM Questao WHERE tema=? and dificuldade=? and usada=? limit ?");
				$stmt->bindValue(1, $tema);
				$stmt->bindValue(2, $dificuldade);
				$stmt->bindValue(3, false);
				$stmt->bindValue(4, $quantidadeTema,PDO::PARAM_INT);
				$retorno = $stmt->execute();
				if($retorno){
					$resultado2 = $stmt->fetch();
					//print_r($resultado2);
					if($resultado2<=$quantidadeTema){
						return 2;
					}else{
						return $resultado;
					}
				}
			}
			
		}else{
			return 0;
		}
		
	}
	
	//retorna os id das Questoes por dificuldade
	function selecionaQuestoesDificuldadeProva($dificuldade,$quantidade) {
		/*1 - vazio
		 * 2 - Quantidade insuficiente
		 * 0 - erro banco
		 */
		echo "dificuldate";
		echo $quantidade;
		echo "termino dificuldade";
		$stmt = $this->conexao->prepare("SELECT idQuestao FROM Questao WHERE dificuldade = ? and usada=? limit ?");
		$stmt->bindValue(1, $dificuldade);
		$stmt->bindValue(2, false);
		$stmt->bindValue(3, $quantidade,PDO::PARAM_INT);
		$retorno = $stmt->execute();
		if($retorno){
			$resultado =  $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
			//verificar se retorna vazio
			if(empty($resultado)){
				return 1;
			}else{
				//return $resultado;
				//contar se tem a quantidade de questoes desejadas
				$stmt = $this->conexao->prepare("SELECT COUNT(*) FROM Questao WHERE dificuldade = ? and usada=? limit ?");
				$stmt->bindValue(1, $dificuldade);
				$stmt->bindValue(2, false);
				$stmt->bindValue(3, $quantidade,PDO::PARAM_INT);
				$retorno = $stmt->execute();
				if($retorno){
					$resultado2 = $stmt->fetch();
					if($resultado2<$quantidade){
						return 2;
					}else{
						return $resultado;
					}
				}
			}
			
		}else{
			return 0;
		}
		
	}
	function atualizaQuestao($idQuestao,$usada,$idProva) {
		$stmt = $this->conexao->prepare("UPDATE Questao SET usada = ?,idProva = ? WHERE idQuestao = ?");
		$stmt->bindValue(1, $usada);
		$stmt->bindValue(2, $idProva);
		$stmt->bindValue(3, $idQuestao);
		$retorno = $stmt->execute();
		if($retorno){
			return 1;
		}else{
			//rever retorno 0
			return 0;
		}
		
	}
	
	function selecionaDescricao($idQuestao) {
		$stmt = $this->conexao->prepare("SELECT descricao FROM Questao WHERE idQuestao=?");
		$stmt->bindValue(1, $idQuestao);
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
	
	function retornaquestoes ($idProva){
		$stmt = $this->conexao->prepare("select * from Questao where idProva = ? order by rand()");
		$stmt->bindValue(1, $idProva);
		if($stmt->execute()){
			$resultado = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
			//print_r($resultado);
			if(empty($resultado)){
				return 1;
			}else{
				return $resultado;
			}
		}else{
			return 0;
		}
	}
	function retorna_alternativa ($idQuestao){
		$stmt = $this->conexao->prepare("select * from Alternativas where idQuestao = ? order by rand()");
		$stmt->bindValue(1, $idQuestao);
		if($stmt->execute()){
			$resultado = $stmt->fetchAll();
			//print_r($resultado);
			if(empty($resultado)){
				return 1;
			}else{
				return $resultado;
			}
		}else{
			return 0;
		}
	}
	
	function insere_resposta($idQuestao, $idCandidato, $idAlternativa){
		$stmt = $this->conexao->prepare("insert into Respostas (idQuestao, idCandidato, idAlternativa) values (?,?,?)");
		$stmt->bindValue(1, $idQuestao);
		$stmt->bindValue(2, $idCandidato);
		$stmt->bindValue(3, $idAlternativa);
		if($stmt->execute()){
				return 1;
			}else{
				return 0;
		}
	}
	
	
}

	
?>