<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Processo Seletivo - HCP Gestão</title>
	<link href="{{ asset('css/teste.css') }}" rel="stylesheet" type="text/css" />
	<script type="{{ asset('text/javascript') }}"> </script>        
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script>
		function desabilitar(valor) {
			var x = document.getElementById('val7').checked;
			var y = document.getElementById('val6').checked;
			if(x == true && y == true) { 
				document.getElementById('tr1').hidden = true;
				document.getElementById('tr2').hidden = false;
			} else {
				document.getElementById('tr1').hidden = false;
				document.getElementById('tr2').hidden = true;
			}
		}
	</script>
</head>
    <body class="page homepage  ltr preset1 menu-homepage responsive bg hfeed clearfix">
      	<header id="sp-header-wrapper" class=" "><div class="container"><div class="row-fluid" id="header">
		<div id="sp-logo" class="span2"><div class="logo-wrapper"><a href="/"><img alt="" class="image-logo" src="{{ asset('/images/layout/marca-site-hcp.png') }}" /></a></div></div>
		<div id="sp-menu" class="span7">	
			<div>
			  <p style="margin-left: -150px"><img width="150" src="{{ asset('img/gestao.png') }}" alt=""></p>
			  <p style="margin-top: -80px; margin-left: 200px; font-size: 26px; font-family: Lucida Console, Courier, monospace;">PROCESSO SELETIVO HCP GESTÃO</p> <br>
			  <p style="margin-left: 215px; font-size: 15px;">Bem Vindo ao Processo Seletivo das Unidades da OS HCP </p>
			</div>  				
		</div>
	   </div></div>
	   </header>
	   <br>
	   <div class="container">
		<div id="sp-page-builder" class="sp-page-builder page-1">
		   <div class="page-content">
			 <section  class="sppb-section" style="background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:0 0;">
			   <div class="sppb-addon-container" style="">
				  <div class="sppb-addon-content">
					<div class="custom">
					  <div class="container" style="width:100%;"> <br> <br>
						 <table class="table table-responsive table-border table-striped" align="center" border="2" width="500" bordercolor=DCDCDC >
						    <tr>
							  <td><p style="font-size: 20px; margin-top: 20px;"> <center>Termo de Uso Portal Área do Candidato HCP Gestão:</center> </p></td>
							</tr>
						  </table>
					  </div>
					 </div>
				   </div>
				 </div>
			  </section>	 
			  </div>
			  <p align="right"><a href="{{route('informativoLGPD', array($unidades[0]->id, $processos[0]->id))}}" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> VOLTAR <i class="fas fa-undo-alt"></i> </a></p>
			  <table class="table table-responsive table-border" border="2" bordercolor=DCDCDC>
				<tbody>
					<td>
					<h5>1. ADESÃO:</h5>
					 <p align="justify">No momento do cadastro, você deverá ler, compreender e aceitar estes Termos de Uso, conforme opção específica disponibilizada no portal.</p>
					 <p align="justify">Caso não concorde com estes termos, você deverá deixar de utilizar o site e de realizar cadastro na plataforma. E para dar continuidade ao seu processo seletivo deverá entrar em contato com a instituição conforme dados disponibilizados no edital da seleção.</p>
					 <p align="justify">Este documento, bem como a <a href="{{ route('politicaP') }}" target="_blank">Política de Privacidade</a>, tem natureza de contrato de adesão e passam por revisões periódicas, sem que seja necessária a sua notificação prévia. Por isso, é importante que você consulte os Termos de Uso e a Política de Privacidade para saber se continua concordando com seus termos antes de seguir com a utilização deste serviço.</p>
					<br><h5>2. USO DO PORTAL:</h5>
					 <p align="justify">O portal (https://hcpgestao.org.br/processo_seletivo_hcpgestao/public/login), permite aos candidatos a inscrição em vagas disponibilizadas pelo HCP Gestão para as suas unidades sob gestão.</p>
					 <p align="justify">Para cadastro, o Titular deverá informar, de livre consentimento e escolha, dados pessoais, incluindo, mas não se limitando a dados de identificação fornecidos por entidades governamentais, endereço, experiências profissionais, se portador de deficiência e os necessários para atender as legislações e as normativas internas para o processo seletivo.</p>
					 <p align="justify">A exatidão dos dados cadastrados por você, são de sua responsabilidade, podendo realizar atualizações enquanto o processo estiver aberto.</p>
					 <p align="justify">Na disponibilização do portal de admissão o HCP Gestão empregará todos os esforços para manter seus dados protegidos com a utilização de medidas técnicas e administrativas necessárias para tal. Promovendo atualizações periódicas em seus sistemas e bases tecnológicas com o objetivo de mitigar os riscos e evitar usos indevidos. Além de capacitação constante de seus colaboradores e operadores quanto a privacidade dos seus dados.</p>
					 <p align="justify">Você se compromete a acessar e utilizar o site exclusivamente para fins lícitos, segundo o sistema jurídico vigente, observando a melhor ética no uso de internet e a mais estrita boa fé, bem como todas as regras de uso do site nele divulgadas, respondendo integralmente, como único responsável, pelas informações que veicular através de seus dados cadastrais.</p>
					 <p align="justify">É de sua exclusiva responsabilidade e ônus providenciar os equipamentos de informática e a conexão à Internet necessários para o acesso ao site. O HCP Gestão não se responsabiliza em nenhuma hipótese pela existência, funcionamento e qualidade de tais equipamentos, sistemas e conexões.</p>
					 <p align="justify">No caso de utilização do site por crianças e adolescentes menores de idade - nos casos permitidos em lei (14 anos ou mais) - o responsável legal se responsabiliza pelo preenchimento dos dados, caracterizando autorização do responsável legal do candidato para uso da plataforma.</p>
					 <p align="justify">O acesso aos seus dados pessoais cadastrados no portal é protegido nos termos da Lei Geral de Proteção de Dados - LGPD (Lei nº 13.709/2018), e da nossa Política de Privacidade.</p>
					 <p align="justify">A versão do portal publicada na internet e a disposição do candidato, é por esse aceito, no estado técnico em que se encontra, razão pela qual o HCP Gestão não responde por nenhuma outra garantia. Entre outras: pela adequação do site às necessidades ou expectativas do candidato, pelos resultados ou desempenhos esperados pelo candidato, por um uso do site ininterrupto e livre de erros e pela correção e aperfeiçoamento dos erros encontrados pelo candidato no site.</p>
					 <p align="justify">O HCP Gestão se reserva no direito de suspender ou interromper o funcionamento do site para fins de manutenção ou de força maior, independentemente de qualquer aviso prévio.</p>
					 <p align="justify">Constatado descumprimento por você de qualquer obrigação decorrente dos presentes Termos de Uso ou da Política de Privacidade, seu acesso será desativado ou excluído sem prejuízo da possibilidade de remessa de seus dados cadastrais e de acesso às autoridades legais competentes, sem que isso represente lesão a seus direitos de privacidade.</p>
					<br><h5>3. SENHAS, SEGURANÇA E PRIVACIDADE:</h5>
					 <p align="justify">Ao se cadastrar, recomendamos a adoção de uma senha com nível de complexidade alto que contenha no mínimo 8 (oito) dígitos, combinados entre letras maiúsculas, minúsculas, números e caracteres.</p>
					 <p align="justify">Você reconhece que sua senha de acesso ao portal é de uso pessoal, intransferível e de sua exclusiva responsabilidade, não devendo ser fornecida a terceiros em nenhuma hipótese. Você deverá tomar todas as providências cabíveis para garantir sua confidencialidade.</p>
					 <p align="justify">As senhas de acesso são armazenadas em banco de dados utilizando algoritmos de criptografia que impedem a sua recuperação pelo HCP Gestão. A recuperação de senhas perdidas ou esquecidas poderá ser realizada exclusivamente por meio eletrônico através do link disponibilizado no portal na tela inicial.</p>
					 <p align="justify">Os dados coletados serão tratados em servidores em nuvem (cloud computing) podendo estes estarem localizados no Brasil ou fora do Brasil (Estados Unidos), o que exigirá transferência e/ou processamento internacional de dados. O serviço de nuvem utilizado é ofertado por empresa parceira, com seu devido contrato e cláusulas de privacidade, confidencialidade e segurança, respeitando as legislações de proteção de dados de cada localidade de tratamento.</p>
					 <p align="justify">É proibido o uso de qualquer dispositivo, software ou outro recurso que venha a interferir nas atividades e operações tanto pelo site quanto por outros sistemas ou bancos de dados. Devendo cumprir as disposições estabelecidas neste Termo de Uso, Política de Privacidade, Lei Geral de Proteção de Dados (13.709), Lei de Direitos Autorais (9.610).</p>
					 <p align="justify">Para os candidatos não aprovados, as informações ficarão em base de dados para cadastro de reserva pelo período de 12 meses, depois serão eliminados sem aviso prévio. Durante este período poderemos utilizar seus dados para manter contato sobre novas oportunidades e vagas.</p>
					 <p align="justify">Para os candidatos aprovados e que tenham realizado o carregamento (upload) no portal dos seus documentos com dados pessoais, incluindo de dependentes menores de idade, estes dados e documentos serão inseridos em sistema de gestão interno, com a finalidade de compor o dossiê do colaborador para atendimento da legislação trabalhistas e eliminados do portal do candidato após cumprimento das obrigatoriedades legais de registro do colaborador ou após o período de 60 (sessenta) dias.</p>
					 <p align="justify">Detalhes sobre como tratamos os seus dados podem ser obtidos na política de privacidade disponibilizada no portal do candidato.</p>
					<br><h5>4. DISPOSIÇÕES GERAIS:</h5>
					 <p align="justify">O candidato declara, por este instrumento, que, nos termos do artigo 46 do Código de Defesa do Consumidor (Lei nº 8.078/1990), tomou conhecimento prévio deste termo no portal do candidato e que avaliou, leu e concordou com todas as disposições e aqui descritas.</p>
					 <p align="justify">Estes Termos de Uso estão em conformidade e deverão ser interpretados com base nas leis vigentes na República Federativa do Brasil. Para dirimir eventuais dúvidas ou questões relativas a eles, as partes elegem o Foro do Recife/PE, com exclusão de qualquer outro.</p><br><br>
					 <center><input type="checkbox" onclick="desabilitar('sim')" id="val7" name="val7" /> <b>Li e Concordo com a <a href="{{ route('politicaP') }}" target="_blank">Política de Privacidade</a>.</b> </center>
					 <center><input type="checkbox" onclick="desabilitar('sim')" id="val6" name="val6" /> <b>Li e Concordo com o Termo de Uso.</b> </center>
				   </td>
			    </tbody>
				<tr id="tr1">
					<td><center><a class="btn btn-success btn-sm" style="margin-top: 10px; color: #FFFFFF; opacity: 30%;" id="btn" name="btn"> Inscrição</a></center></td>
				</tr>
				<tr id="tr2" hidden>
					<td><center><a href="{{ route('cadastroVagaCandidato', array($unidades[0]->id, $processos[0]->id)) }}" class="btn btn-success btn-sm" style="margin-top: 10px; color: #FFFFFF;" id="btn" name="btn"> Inscrição</a></center></td>
				</tr>
			</table>
	    </section>
		
	  </div>
 </body>
</html>