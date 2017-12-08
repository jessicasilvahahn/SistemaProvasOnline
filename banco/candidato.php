<?php 
class candidato{
	private $conexao;
	
	function __construct($conexaoBanco){
		$this->conexao = $conexaoBanco;
	}
	
	function armazenaCandidato($nome,$email,$nascimento,$login,$senha) {
		$r = 0;
		$stmt = $this->conexao->prepare("INSERT INTO Candidato(nome,email,nascimento,login,senha) VALUES (?,?,?,?,?)");
		$stmt->bindValue(1, $nome);
		$stmt->bindValue(2, $email);
		$stmt->bindValue(3, $nascimento);
		$stmt->bindValue(4, $login);
		$stmt->bindValue(5, $senha);
		$retorno = $stmt->execute();
		if($retorno){
			$r = 1;
		}
		return $r;	
	}
	//verifica user
	function verificaUser($login){
		//Verificar se já existe login no banco
			$stmt = $this->conexao->prepare("SELECT login FROM Candidato WHERE login=?");
			$stmt->bindValue(1, $login);
			$stmt->execute();
			$row = $stmt->fetch();
			if(empty($row)){
				return  1;
			}else{
				return 0;
			}
	}
}
?>