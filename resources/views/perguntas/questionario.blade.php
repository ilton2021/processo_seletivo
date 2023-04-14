<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Processo Seletivo - Questionário</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>	
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
  <script src="https://kit.fontawesome.com/7656d93ed3.js" crossorigin="anonymous"></script>
</head>
<body id="page-top">
	<div class="container" style="margin-top: 80px;">
		@if ($errors->any())
		 <div class="alert alert-danger">
		  <ul>
		    @foreach ($errors->all() as $error)
		      <li>{{ $error }}</li>
			@endforeach
		  </ul>
		 </div>
		@endif
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Questionário Ética Profissional:</h6>
            </div>
            <div class="card-body"> <?php $ano = date('Y', strtotime('now')); ?>
              <div class="table-responsive">
			  <form method="POST" action="{{ route('storeQuestionario', array($id_u, $id, $idC)) }}">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<table class="table" width="100%" cellspacing="0">
				 <tr>
				    <td style="width: 230px"> Nome do Candidato: </td>
					<td><b>{{ $candidato[0]->nome }}</b></td>
				 </tr>
				 <tr>
				    <td> Nº de Inscrição do Candidato: </td>
					<td><b>{{ $candidato[0]->numeroInscricao }}</b></td>
				 </tr>
				 <tr>
				    <td> Unidade: </td>
					<td><b>{{ $unidade[0]->nome }}</b></td>
				 </tr>
				</table>
                <table class="table" width="100%" cellspacing="0">
					<?php $a = 1; ?>
					@foreach($perguntas as $pergunta)
					<thead class="thead-dark">
                    <tr>
                      <td><p align="justify"><b>{{ $a .') '. $pergunta->descricao }}</b></p></td>
				    </tr>
					</thead>
  					<tbody>
					@if($a == 1) 
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta1" name="resposta1" value="A"> Passividade. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta1" name="resposta1" value="B"> Capacidade de trabalhar em equipe. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta1" name="resposta1" value="C"> Objetividade. </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta1" name="resposta1" value="D"> Ética profissional. </p>
					    <p align="justify">E) <input class="form-check-input" type="radio" id="resposta1" name="resposta1" value="E"> Organização. </p>
					  </td>
					</tr>
					@elseif($a == 2)
					<tr>
					  <td> 
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta2" name="resposta2" value="A"> Ter lealdade profissional e honrar a própria profissão ou a instituição na qual exerce a atividade laboral. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta2" name="resposta2" value="B"> Formar uma consciência profissional e agir em conformidade com os princípios que a função e/ou profissão define. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta2" name="resposta2" value="C"> Manter sempre segredo profissional em relação a situações, informações e acontecimentos para os quais a atividade profissional exigir sigilo. </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta2" name="resposta2" value="D"> Seguir as normas administrativas definidas na instituição na qual trabalha para o exercício profissional. </p>
					    <p align="justify">E) <input class="form-check-input" type="radio" id="resposta2" name="resposta2" value="E"> Utilizar informações privilegiadas conseguidas na atividade laboral para obter vantagens pessoais. </p>
					  </td>
					</tr>
					@elseif($a == 3)
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta3" name="resposta3" value="A"> Respeito às Normas. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta3" name="resposta3" value="B"> Trabalho em Equipe. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta3" name="resposta3" value="C"> Organização. </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta3" name="resposta3" value="D"> Responsabilidade. </p>
					    <p align="justify">E) <input class="form-check-input" type="radio" id="resposta3" name="resposta3" value="E"> Individualismo. </p>
					  </td>
					</tr>
					@elseif($a == 4)
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta4" name="resposta4" value="A"> Se colocar no lugar das outras pessoas em qualquer situação. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta4" name="resposta4" value="B"> Os elogios frequentes e a divisão do sucesso com todos. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta4" name="resposta4" value="C"> Críticas a colegas na frente de outras pessoas ou responsabilizá-los na ausência. </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta4" name="resposta4" value="D"> Fazer comentários sobre a ação ou atitude de alguém em particular. </p> 
					  </td>
					</tr>
					@elseif($a == 5)
					<tr>
					  <td><b>Com base nos seus conhecimentos, assinale a alternativa que NÃO corresponde a uma característica de um bom profissional:</b></td>
					</tr>
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta5" name="resposta5" value="A"> Independentemente da ocupação, todos os profissionais precisam cuidar da imagem. A imagem não está ligada apenas ao visual, mas também ao comportamento do agente. </p> 
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta5" name="resposta5" value="B"> A simpatia é um dos melhores canais de sucesso no bom atendimento. As pessoas em geral gostam de quem as tratam bem, sendo cordial, afetuoso, entusiástico, indiferente e educado. </p> 
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta5" name="resposta5" value="C"> É importante que o profissional tenha conteúdo, saber o que dizer, possuir conhecimento, mostrar a que veio e transmiti-lo de forma natural. </p> 
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta5" name="resposta5" value="D"> Ter uma comunicação impecável é crucial para qualquer profissão e mais ainda quando se trata de garantir uma boa imagem diante do seu usuário. </p>  
					  </td>
					</tr>
					@elseif($a == 6)
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta6" name="resposta6" value="A"> O Sigilo Profissional trata de resguardar informações acerca do histórico de trabalho do funcionário, em suas passagens por outras empresas. </p> 
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta6" name="resposta6" value="B"> O Sigilo Profissional trata de resguardar informações importantes ou valiosas sobre conteúdos da vida empresarial, inclusive quando essas informações representarem alguma transgressão a Lei. </p> 
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta6" name="resposta6" value="C"> O Sigilo Profissional trata de uma conduta requerida dos funcionários comuns, não sendo, pois, requerido das funções de chefia e direção das empresas. </p> 
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta6" name="resposta6" value="D"> O Sigilo Profissional trata de uma informação a ser protegida, impõe uma relação entre privacidade e publicidade, cujo dever profissional se estabelece desde a se ater ao estritamente necessário ao cumprimento de seu trabalho, a não informar a matéria sigilosa. </p> 
				      </td>
					</tr>
					@elseif($a == 7)
					<tr>
					  <td>
						<b>
						 <p align="justify">I. Uma conduta ética no trabalho, seguindo padrões e valores, tanto da sociedade quanto da própria organização, são essenciais para o alcance da excelência profissional. </p>
					     <p align="justify">II. Ter bom relacionamento com os colegas, facilidade no trabalho em equipe, boa comunicação, flexibilidade entre outras características, são aspectos dispensáveis nas organizações. </p>
						 <p align="justify">III. Aplicada no mundo do trabalho, a ética é o conjunto de princípios que devem ser colocados em prática no ambiente profissional. São exemplos de ética no exercício profissional: ter atitudes de individualismo e oportunismo no trabalho em equipe. </p>
						 <p align="justify">IV. A ética no ambiente de trabalho proporciona ao profissional um exercício diário e prazeroso de honestidade, comprometimento e confiabilidade. </p>
						 <p align="justify">Assinale a alternativa correta:</p>
						</b>
					  </td>
					</tr>
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta7" name="resposta7" value="A"> Todas as afirmativas são verdadeiras. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta7" name="resposta7" value="B"> Somente as afirmativas I e IV são verdadeiras. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta7" name="resposta7" value="C"> Somente as afirmativas I, II e IV são verdadeiras. </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta7" name="resposta7" value="D"> Somente as afirmativas II e IV são verdadeiras.
					   </td>
					</tr>
					@elseif($a == 8)
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta8" name="resposta8" value="A"> Agir com parcialidade. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta8" name="resposta8" value="B"> Prestar serviços com agilidade e precisão. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta8" name="resposta8" value="C"> Cercear exercício profissional de outrem. </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta8" name="resposta8" value="D"> Contravir normas internas, condutas éticas específicas e legislações da sua profissão. </p>
					    <p align="justify">E) <input class="form-check-input" type="radio" id="resposta8" name="resposta8" value="E"> Agir com integridade, ambiguidade e desrespeito com os demais colegas de profissão.
					  </td>
					</tr>
					@elseif($a == 9)
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta9" name="resposta9" value="A"> Rede social é algo pessoal o qual o indivíduo é livre para se expressar. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta9" name="resposta9" value="B"> Faltou profissionalismo por parte da secretária municipal, demonstrou falta de liderança ao destacar seu favoritismo pessoal perdendo a credibilidade dos demais. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta9" name="resposta9" value="C"> Ela deveria ter citado o nome de todos os seus subordinados demonstrando sua real afetividade pelos mesmos. </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta9" name="resposta9" value="D"> Uma pessoa pública não pode ter redes sociais deixando explicito sua vida pessoal. </p>
					  </td>
					</tr>
					@elseif($a == 10)
					<tr>
					  <td><b>Nesse sentido, assinale a alternativa CORRETA em relação ao bom desenvolvimento de toda a equipe:</b></td>
					</tr>
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta10" name="resposta10" value="A"> O líder deve ser arbitrário em suas decisões. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta10" name="resposta10" value="B"> As críticas devem ser evitadas. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta10" name="resposta10" value="C"> A equipe deve respeitar as divergências e diversidades. </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta10" name="resposta10" value="D"> As opiniões deverão ser ignoradas. </p>
					    <p align="justify">E) <input class="form-check-input" type="radio" id="resposta10" name="resposta10" value="E"> As responsabilidades devem ser delegadas.
					  </td>
					</tr>
					</tbody>
					@elseif($a == 11)
					<tr>
					  <td>
						<b>
						   <p align="justify">I. Uso de pias de trabalho para fins diversos dos previstos. </p>
						   <p align="justify">II. Uso de adornos nos postos de trabalho. </p>
						   <p align="justify">III. Uso de calçados fechados. </p>
						   <p align="justify">IV. Consumo de alimentos e bebidas nos postos de trabalho. </p>
						   <p align="justify">Estão CORRETOS: </p>
						</b>
					  </td>
					</tr>
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta11" name="resposta11" value="A"> Somente os itens I, II e IV. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta11" name="resposta11" value="B"> Somente os itens I e III. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta11" name="resposta11" value="C"> Somente os itens I, III e IV. </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta11" name="resposta11" value="D"> Somente os itens II, III e IV. </p>
					  </td>
					</tr>
					</tbody>
					@elseif($a == 12)
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta12" name="resposta12" value="A"> Em caso de exposição acidental ou incidental, não é necessário adotar medidas de proteção e prevenção de novos acidentes, visto que se aprende com os erros e eles dificilmente se repetem. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta12" name="resposta12" value="B"> O uso de luvas substitui a higiene de mãos, que só deve ocorrer após o uso desse EPI. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta12" name="resposta12" value="C"> Com ou sem afastamento do trabalhador é obrigatória a emissão de Comunicação de Acidente de Trabalho (CAT). </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta12" name="resposta12" value="D"> Trabalhadores com feridas ou lesões nas mãos podem iniciar suas atividades assim que as lesões pararem de doer, não sendo necessária a avaliação de nenhum profissional da saúde liberando para o trabalho. </p>
					    <p align="justify">E) <input class="form-check-input" type="radio" id="resposta12" name="resposta12" value="E"> O trabalhador só deve comunicar o acidente de trabalho se ele for muito grave ou com exposição a um agente biológico que possa lhe causar algum dano a longo prazo. </p>
					  </td>
					</tr>
					</tbody>
					@elseif($a == 13)
					<tr>
					  <td>
						<b>
						   <p align="justify">I. A confirmação da identificação do paciente deve ser realizada antes de qualquer cuidado. </p>
						   <p align="justify">II. O cumprimento do protocolo não é obrigatório para todos os pacientes internados </p>
						   <p align="justify">III. Na pulseira de identificação deve constar no mínimo 3 identificadores. </p>
						   <p align="justify">IV. Quando não houver a informação do nome completo, utilizar a penas o número do leito que o paciente está alocado. </p>
						   <p align="justify">Está correto o que se afirma em: </p> 
						</b>
					  </td>
					</tr>
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta13" name="resposta13" value="A"> I, apenas. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta13" name="resposta13" value="B"> I, II, III e IV. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta13" name="resposta13" value="C"> II e IV, apenas. </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta13" name="resposta13" value="D"> I e III, apenas. </p>
					    <p align="justify">E) <input class="form-check-input" type="radio" id="resposta13" name="resposta13" value="E"> I e IV, apenas. </p>
					  </td>
					</tr>
					</tbody>
					@elseif($a == 14)
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta14" name="resposta14" value="A"> O uso de luvas de procedimento substitui totalmente a higienização das mãos. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta14" name="resposta14" value="B"> A higienização das mãos com água e sabão deve ser realizada apenas 2 vezes por dia. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta14" name="resposta14" value="C"> O uso de solução alcoólica (líquida ou gel) substitui totalmente a higienização das mãos. </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta14" name="resposta14" value="D"> A higienização das mãos com água e sabão só deverá ser realizada quando houver sujidade aparente. </p>
					    <p align="justify">E) <input class="form-check-input" type="radio" id="resposta14" name="resposta14" value="E"> A higienização das mãos com água e sabão deverá ser realizada quando necessário e sempre houver sujidade aparente. </p>
					  </td>
					</tr>
					</tbody>
					@elseif($a == 15)
					<tr>
					  <td>
					    <p align="justify">A) <input class="form-check-input" type="radio" id="resposta15" name="resposta15" value="A"> De forma antiética. </p>
					    <p align="justify">B) <input class="form-check-input" type="radio" id="resposta15" name="resposta15" value="B"> Com morosidade. </p>
					    <p align="justify">C) <input class="form-check-input" type="radio" id="resposta15" name="resposta15" value="C"> Com abuso de poder. </p>
					    <p align="justify">D) <input class="form-check-input" type="radio" id="resposta15" name="resposta15" value="D"> De forma desidiosa. </p>
					    <p align="justify">E) <input class="form-check-input" type="radio" id="resposta15" name="resposta15" value="E"> De forma ética. </p>
					  </td>
					</tr>
					</tbody>
					@endif
					<?php $a += 1; ?>
					@endforeach
		        </table>
				
				<table class="table table-bordered">
				  <tr>
				   <td colspan="2" align="right">
				     <a href="{{route('candidatoIndex')}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> VOLTAR <i class="fas fa-undo-alt"></i> </a>
					 <input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="CONCLUIR" id="Salvar" name="Salvar" /> 				 
				   </td>
				  </tr>
				</table>
			   </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
