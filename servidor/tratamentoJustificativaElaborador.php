<?php 
//bloqueia o acesso a página pela url
session_start();
if (!isset($_SESSION['loginElaborador']) && !isset($_SESSION['senhaElaborador'])){
	header('Location: ../paginas/elaborador.html');
}
require_once '../banco/conexao.php';
require_once '../banco/recurso.php';

$login =  $_SESSION['loginElaborador'];
$senha =  $_SESSION['senhaElaborador'];

$idRecurso = $_POST['idRecurso'];
$justificativa = $_POST['recursoJustificativa'];
$indeferir = $_POST['indeferir'];
$deferir = $_POST['deferir'];
$deferimento = false;
echo $idRecurso;echo $justificativa; echo $deferir; echo $indeferir; echo $deferimento;
if(!empty($deferir)){
	$deferimento = true;
}
if(!empty($indeferir)){
	$deferimento = false;
}
//armazenar no banco
//banco de dados
$banco = new conexao();
$conexaoBanco = $banco->conectaBanco();
//recurso
$rec = new recurso($conexaoBanco,$login,$senha);
$update = $rec->atualizaRecurso($deferimento,$justificativa,$idRecurso);
if($update){
	echo "<script>
			
				alert('Recurso atualizado!');
				location.assign('../paginas/paginaElaborador.php');
			
			</script>";
}else{
	echo "<script>
			
				alert('Problema ao atualizar o recurso.');
				location.assign('../paginas/paginaElaborador.php');
			
			</script>";
}
?>