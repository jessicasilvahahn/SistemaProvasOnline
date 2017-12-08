$(document).ready(
		
	function(){	
		//variaveis
		var candidato = $("#candidato");
		var elaborador = $("#elaborador");
		var administrador = $("#administrador");
		
		candidato.click(function(){
		location.assign("../paginas/candidato.html") 
		});
		elaborador.click(
				function(){
					location.assign("../paginas/elaborador.html")
				});
		administrador.click(
				function() {
					location.assign("../paginas/administrador.html")
				}
		
		
		)
   
}
	

);

