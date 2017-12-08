$(document).ready(
		
	function(){	
		//variaveis
		var paginaElaboradorQuestao = $("#paginaElaboradorQuestao");
			paginaElaboradorQuestao.click(function(){
			location.assign("../paginas/elaborarQuestao.php") 
		});
			
		var paginaAdministrador = $("#cadastraProcesso");
		paginaAdministrador.click(function() {
			location.assign("../paginas/cadastroProcesso.php");

		});
		var voltarPaginaElaborarQuestao = $("#voltarPaginaElaborador");
		voltarPaginaElaborarQuestao.click(function(){
			location.assign("../paginas/paginaElaborador.php");
		});
		
		var sairElaborador = $("#sairPaginaElaborador");
		sairElaborador.click(function(){
			location.assign("../paginas/elaborador.html");
		});
		
		var sairAdministrador = $("#sairPaginaAdministrador");
		sairAdministrador.click(function(){
			location.assign("../paginas/administrador.html");
		});
		
		var sairCandidato = $("#sairPaginaCandidato");
		sairCandidato.click(function() {
			location.assign("../paginas/candidato.html");
		});
		
		var recursoElaborador = $("#paginaElaboradorRecurso");
		recursoElaborador.click(function(){
			location.assign("../paginas/recursoElaborador.php");
		});
		
		var continuarCadastroProva = $("#continuarElaboracaoProva");
		continuarCadastroProva.click(function(){
			location.assign("../paginas/elaborarProva.php");
		});
		
		var encerraProcessoSeletivo = $("#encerraProcessoSeletivo");
		encerraProcessoSeletivo.click(function(){
			location.assign("../paginas/paginaAdministrador.php");
		});
		
		var adminRecursos = $("#administradorRecursos");
		adminRecursos.click(function(){
			location.assign("../paginas/recursoAdmin.php");
		});
		
		var realizarProva = $("#realizarProva");
		realizarProva.click(function(){
			location.assign("../paginas/Prova.php");
		});
		
}

	

);
