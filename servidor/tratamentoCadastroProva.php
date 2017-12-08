<?php
	require_once '../banco/conexao.php';
	require_once '../banco/prova.php';
	require_once '../banco/Questao.php';


	function verificaTemas($retornoBanco) {
		$retorno = 0;
		switch ($retornoBanco) {
			case 0:
				$retorno = 0;
				break;
			case 1:
				$retorno = 0;
				break;
			case 2:
				$retorno = 0;
			default:
				$retorno = 1;
				break;
		}
		return $retorno;
	}

	function atualizaQuestoes($q,$idsQuestoes,$idProva) {
		$retornos = 0;
		//print_r($idsQuestoes);
		foreach ($idsQuestoes as $id) {
			$retornos += $q->atualizaQuestao($id,true,$idProva);
		}
		//echo "retorno";
		//echo $retornos;
		return $retornos;
	}
	//temas
	//resolver problema de pegar mais de uma palavra
	$tema1 = $_POST['tema1Select'];
	$tema2 = $_POST['tema2Select'];
	$tema3 = $_POST['tema3Select']; 	
	
	//proporrcoes
	$proTema1 = $_POST['proporcaoTema1'];
	$proTema2 = $_POST['proporcaoTema2'];
	$proTema3 = $_POST['proporcaoTema3'];

	//time e date
	$timeStampInicial = $_POST['dataInicio']." ".$_POST['tempoInicio'];
	$dateTimeInicial = new DateTime($timeStampInicial);
	$timeStampFinal = $_POST['dataFim']." ".$_POST['tempoFim'];
	$dateTimeFinal = new DateTime($timeStampFinal);

	//numero de questoes
	$num = $_POST['numeroQuestoes'];

	/*
	echo $tema1."<br>";
	echo $tema2."<br>";
	echo $tema3."<br>";
	echo $proTema1."<br>";
	echo $proTema2."<br>";
	echo $proTema3."<br>";
	echo $dateTimeInicial->format("Y-m-d H:i")."<br>";
	echo $dateTimeFinal->format("Y-m-d H:i")."<br>";
	echo $num."<br>";
*/
	//verifica se da o total de questoes
	$soma = $proTema1+$proTema2+$proTema3;

	//calculando a quantidade de questoes de acordo com a dificuldade TEMA 1

		$facil1=round($proTema1 * 0.3); if($facil1 ==0) $facil1 = 1;
		$dificil1=round($proTema1 * 0.3);if($dificil1 ==0) $dificil1 = 1;

	$media1 = $proTema1 - ($facil1 + $dificil1);
/*
	echo "<br>TEMA 1 <br>";
	echo "Questoes Faceis".$facil1."<br>";
	echo "Questoes Medias".$media1."<br>";
	echo "Questoes Dificeis".$dificil1."<br>";
*/
	//calculando a quantidade de questoes de acordo com a dificuldade TEMA 2
	$facil2=round($proTema2 * 0.3); if($facil2 ==0) $facil2 = 1;
	$dificil2=round($proTema2 * 0.3);if($dificil2 ==0) $dificil2 = 1;
	
	$media2 = $proTema2- ($facil2 + $dificil2);
/*
	echo "<br>TEMA 2 <br>";
	echo "Questoes Faceis".$facil2."<br>";
	echo "Questoes Medias".$media2."<br>";
	echo "Questoes Dificeis".$dificil2."<br>";
*/
	//calculando a quantidade de questoes de acordo com a dificuldade TEMA 3
	$facil3=round($proTema3 * 0.3); if($facil3 ==0) $facil3 = 1;
	$dificil3=round($proTema3 * 0.3);if($dificil3 ==0) $dificil3 = 1;
	$media3 = $proTema3 - ($facil3 + $dificil3);
/*
	echo "<br>TEMA 3 <br>";
	echo "Questoes Faceis".$facil3."<br>";
	echo "Questoes Medias".$media3."<br>";
	echo "Questoes Dificeis".$dificil3."<br>";
	*/
	if($soma==$num){
		//conexao com o banco
		//banco de dados
		$banco = new conexao();
		$conexaoBanco = $banco->conectaBanco();
		$q = new Questao($conexaoBanco);
		//consulta TEMA 1
		
		$retornoFacil1 = verificaTemas($q->selecionaQuestoesProva($tema1,1,$facil1));
		$retornoMedia1 = verificaTemas($q->selecionaQuestoesProva($tema1,2,$media1));
		$retornoDificil1 = verificaTemas($q->selecionaQuestoesProva($tema1,3,$dificil1));
		//echo $retornoFacil1;echo $retornoDificil1;echo $retornoMedia1;
		if(($retornoFacil1+$retornoDificil1+$retornoMedia1)!=3){
			echo "<script>
					alert('Problema com a quantidade de questoes, numero de questoes insuficientes ou problema com o banco de dados!');
					alert('Problema com o tema.$tema1.');
					location.assign('../paginas/elaborarProva.php');
					</script>";
		}
		 
		//consulta TEMA 2
		$retornoFacil2 = verificaTemas($q->selecionaQuestoesProva($tema2,1,$facil2));
		$retornoMedia2 = verificaTemas($q->selecionaQuestoesProva($tema2,2,$media2));
		$retornoDificil2 = verificaTemas($q->selecionaQuestoesProva($tema2,3,$dificil2));
		//echo $retornoFacil2;echo $retornoDificil2;echo $retornoMedia2;
		if(($retornoFacil2+$retornoDificil2+$retornoMedia2)!=3){
			echo "<script>
					alert('Problema com a quantidade de questoes, numero de questoes insuficientes ou problema com o banco de dados!');
					alert('Problema com o tema.$tema2.');
					location.assign('../paginas/elaborarProva.php');
				</script>";
		}
		//consulta TEMA 3
		$retornoFacil3 = verificaTemas($q->selecionaQuestoesProva($tema3,1,$facil3));
		$retornoMedia3 = verificaTemas($q->selecionaQuestoesProva($tema3,2,$media3));
		$retornoDificil3 = verificaTemas($q->selecionaQuestoesProva($tema3,3,$dificil3));
	    
		if(($retornoFacil3+$retornoDificil3+$retornoMedia3)!=3){
			echo "<script>
					alert('Problema com a quantidade de questoes, numero de questoes insuficientes ou problema com o banco de dados!');
					alert('Problema com o tema.$tema3.');
					location.assign('../paginas/elaborarProva.php');
					</script>";

		}else{
			//se chegou aqui esta tudo ok
			//armazenar prova no banco
			$p = new prova($conexaoBanco);
			$idProcessoSeletivo = $p-> selecionaIdProcesso();
			if($idProcessoSeletivo!=0){
				$retornoUpdate = 0;
				//armazena prova
				if($p->armazenaProva($idProcessoSeletivo,$dateTimeInicial->format("Y-m-d H:i"),$dateTimeFinal->format("Y-m-d H:i"))){
					//update questoes utilizadas
					$idProva = $p->selecionaIdProva();
					//TEMA 1
					$idQuestoes = $q->selecionaQuestoesProva($tema1,1,$facil1);
		  			$retornoUpdate += atualizaQuestoes($q,$idQuestoes,$idProva);

					$idQuestoes = $q->selecionaQuestoesProva($tema1,2,$media1);
					$retornoUpdate += atualizaQuestoes($q,$idQuestoes,$idProva);

					$idQuestoes = $q->selecionaQuestoesProva($tema1,3,$dificil1);
					$retornoUpdate += atualizaQuestoes($q,$idQuestoes,$idProva);
					if($retornoUpdate==3){
						echo "<script>
								alert('TEMA1 armazenado!');
							</script>";
						$retornoUpdate = 0;
						//TEMA 2
						$idQuestoes = $q->selecionaQuestoesProva($tema2,1,$facil2);
						$retornoUpdate += atualizaQuestoes($q,$idQuestoes,$idProva);

						$idQuestoes = $q->selecionaQuestoesProva($tema2,2,$media2);
						$retornoUpdate += atualizaQuestoes($q,$idQuestoes,$idProva);

						$idQuestoes = $q->selecionaQuestoesProva($tema2,3,$dificil2);
						$retornoUpdate += atualizaQuestoes($q,$idQuestoes,$idProva);
						if($retornoUpdate==3){
							echo "<script>
								alert('TEMA2 armazenado!');
							</script>";
							//TEMA3
							$retornoUpdate = 0;
							$idQuestoes = $q->selecionaQuestoesProva($tema3,1,$facil3);
							$retornoUpdate += atualizaQuestoes($q,$idQuestoes,$idProva);

							$idQuestoes = $q->selecionaQuestoesProva($tema3,2,$media3);
							$retornoUpdate += atualizaQuestoes($q,$idQuestoes,$idProva);

							$idQuestoes = $q->selecionaQuestoesProva($tema3,3,$dificil3);
							$retornoUpdate += atualizaQuestoes($q,$idQuestoes,$idProva);
							if($retornoUpdate==3){
								echo "<script>
									alert('Prova Cadastrada com Sucesso!');
									location.assign('../paginas/continuarCadastroProva.php') ;
								</script>";
							}else{
								echo "<script>
									alert('Problema ao armazenar Tema3 no banco!');
									location.assign('../paginas/elaborarProva.php') ;
								</script>";
							}

						}else{
							echo "<script>
								alert('Problema ao armazenar Tema2 no banco!');
								location.assign('../paginas/elaborarProva.php') ;
							</script>";
						}
					}else{
						echo "<script>
								alert('Problema ao armazenar Tema1 no banco!');
								location.assign('../paginas/elaborarProva.php') ;
							</script>";
					}


				}
			}else{
				echo "<script>
						alert('Problema ao buscar Processo Seletivo!');
						location.assign('../paginas/elaborarProva.php') ;
					</script>";
			}

		}


	}else{
		echo "<script>
				alert('Problema com quantidade total dos temas!');
				location.assign('../paginas/elaborarProva.php') ;
	
			  </script>";
	
	
	}
	
?>