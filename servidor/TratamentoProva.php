<?php 
//bloqueia o acesso a página pela url
session_start();
if (!isset($_SESSION['loginCandidato']) && !isset($_SESSION['senhaCandidato'])){
	header('Location: ../paginas/candidato.html');
}

$Questoes= $_POST['Questoes'];
$AlternativaSeleciona= $_POST['AlternativaSeleciona'];
$Alternativas= $_POST['Alternativas'];
$idCandidato= $_POST['idCandidato'];
$contador= $_POST['contador'];

insere_resposta($Questoes[$contador], $idCandidato, $Alternativas[$AlternativaSeleciona][0]);
//armazenar no banco
//banco de dados
$banco = new conexao();
$conexaoBanco = $banco->conectaBanco();
//recurso
$rec = new prova($conexaoBanco);
$update = $rec->insere_resposta($Questoes,$idCandidato,$AlternativaSeleciona);
if($update){
	echo "<script>
			
				alert('Recurso atualizado!');
				location.assign('../paginas/Prova.php');
			
			</script>";
}else{
	echo "<script>
			
				alert('Problema ao atualizar o recurso.');
				location.assign('../paginas/Prova.php');
			
			</script>";
}
?>