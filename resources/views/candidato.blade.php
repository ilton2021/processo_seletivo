<!DOCTYPE HTML>
<html>
	<head>
		<title>Processo Seletivo - HCP Gestão</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ ('assets/css/main.css') }}" />
		<style>.cookieConsentContainer{z-index:999;width:350px;min-height:20px;box-sizing:border-box;padding:30px 30px 30px 30px;background:#232323;overflow:hidden;position:fixed;bottom:30px;right:30px;display:none}.cookieConsentContainer .cookieTitle a{font-family:OpenSans,arial,sans-serif;color:#fff;font-size:22px;line-height:20px;display:block}.cookieConsentContainer .cookieDesc p{margin:0;padding:0;font-family:OpenSans,arial,sans-serif;color:#fff;font-size:13px;line-height:20px;display:block;margin-top:10px}.cookieConsentContainer .cookieDesc a{font-family:OpenSans,arial,sans-serif;color:#fff;text-decoration:underline}.cookieConsentContainer .cookieButton a{display:inline-block;font-family:OpenSans,arial,sans-serif;color:#fff;font-size:14px;font-weight:700;margin-top:14px;background:#000;box-sizing:border-box;padding:15px 24px;text-align:center;transition:background .3s}.cookieConsentContainer .cookieButton a:hover{cursor:pointer;background:#3e9b67}@media (max-width:980px){.cookieConsentContainer{bottom:0!important;left:0!important;width:100%!important}}</style>
	</head> 
	<body class="is-preload">
			<div id="header">
				<div class="top">
						<div id="logo">
							<p><span class=""><a href="{{ url('/') }}"><img src="images/gestao.png" alt="" /></a></span></p>
							<h1 id="title">Processo Seletivo</h1>
							<p>Hospital do Câncer de Pernambuco</p>
						</div>
						<nav id="nav">
							<ul>
								<li><a href="#top" id="top" title="Página Inicial"><span class="icon solid fa-home">Página Inicial</span></a></li>
								<li><a href="#part1" id="part1-link"><span class="icon solid fa-calendar-plus">Processos Abertos</span></a></li>
								<li><a href="#part2" id="part2-link"><span class="icon solid fa-book-open">Editais em Curso</span></a></li>
								<li><a href="#part3" id="part3-link"><span class="icon solid fa-calendar-check">Processos Anter.</span></a></li>
								<li><a href="#part4" id="part4-link"><span class="icon solid fa-check-square">Quadro de Avisos</span></a></li>
								@if($qtdP > 0)
								<li><a href="#part5" id="part5-link"><span class="icon solid fa-user">Área do Candidato</span></a></li>
								@endif
								<li><a href="#part6" id="part6-link"><span class="icon solid fa-user">Área de Dúvidas</span></a></li>
								<li><a href="#part7" id="part7-link"><span class="icon solid fa-th">Sobre</span></a></li>
								<li><a href="#part8" id="part8-link"><span class="icon solid fa-th">Nosso DNA</span></a></li>
							</ul>
						</nav>
				</div>
			</div>
			

			<div id="main">
					<section id="top" class="one dark cover" style="width:100%; height: 300px">
						<div class="container">
							<header>
								<span class=""><img src="images/avatar.jpg" alt="" style="margin-top: -180px" /></span>
								<h2 class="alt">Processo Seletivo HCP Gestão</h2>
								<p>Bem Vindo ao Processo Seletivo das Unidades da OS HCP</p>
							</header>
						</div>
					</section>
					
					<section id="part1" class="two" style="width: auto; overflow: scroll;">
						<div class="container">
							<header>
								<h2><b>Processos Abertos</b></h2>
							</header>
							<table class="table table-responsive" border="2" bordercolor=DCDCDC>
								<thead>
								  <tr>
									<th scope="col"><center>Processo</center></th>
									<th scope="col"><center>Unidade</center></th>
									<th scope="col"><center>Fim Inscrição</center></th>
									<th scope="col"><center>Inscrição</center></th>
								  </tr>
								</thead>
								<?php $hoje = date('d-m-Y', strtotime('now')); ?>
								  @foreach($processos as $processo)
								   <?php $fim = date('d-m-Y', strtotime($processo->inscricao_fim)); ?>
								   <?php $ini = date('d-m-Y', strtotime($processo->inscricao_inicio)); ?>
								   @if((strtotime($hoje) >= strtotime($ini)) && (strtotime($hoje) <= strtotime($fim)))
								   <tr> 
									<td style="width: 200px;" title=""><center>{{$processo->nome}}</center></td>
									@if($processo->unidade_id == 1)
                                    <td style="width: 240px;" title="Hospital do Câncer do Recife"><center>{{ 'HCP' }}</center></td>
									@elseif($processo->unidade_id == 2)
									<td style="width: 240px;" title="Hospital da Mulher do Recife"><center>{{ 'HMR' }}</center></td>
									@elseif($processo->unidade_id == 3)
									<td style="width: 240px;" title="UPAE Belo Jardim"><center>{{ 'UPAE BELO JARDIM' }}</center></td>
									@elseif($processo->unidade_id == 4)
									<td style="width: 240px;" title="UPAE Arcoverde"><center>{{ 'UPAE ARCOVERDE' }}</center></td>
									@elseif($processo->unidade_id == 5)
									<td style="width: 240px;" title="UPAE Arruda"><center>{{ 'UPAE ARRUDA' }}</center></td>
									@elseif($processo->unidade_id == 6)
									<td style="width: 240px;" title="UPAE Caruaru"><center>{{ 'UPAE CARUARU' }}</center></td>
									@elseif($processo->unidade_id == 7)
									<td style="width: 240px;" title="Hospital São Sebastião"><center>{{ 'HSS' }}</center></td>
									@elseif($processo->unidade_id == 8)
									<td style="width: 240px;" title="Hospital Provisório do Recife I"><center>{{ 'HCA' }}</center></td>
									@elseif($processo->unidade_id == 9)
                                    <td style="width: 240px;" title="UPA Igarassu"><center>{{ 'UPA IGARASSU' }}</center></td>
									@elseif($processo->unidade_id == 10)
                                    <td style="width: 240px;" title="UPAE Palmares"><center>{{ 'UPAE PALMARES' }}</center></td>
									@endif
									<td style="width: 170px;" title=""><center>{{date('d-m-Y', (strtotime($processo->inscricao_fim)))}}</center></td>
									<td style="width: 5px;">
									 <form method="get" action="{{ route('informativoPDF', array($processo->unidade_id, $processo->id)) }}">	
									  <center><button id="div" href="" target="_blank">Inscrição</button></center>
									 </form>
									</td>
								   </tr>	
								   <tr>
									<td colspan="4"><center><font color="#F40000" size="5">*Ao preencher o formulário de inscrição, informe suas experiências e responda o questionário!</font></center></td>
								   </tr>						 
								  @endif
								 @endforeach
								</tbody>
							</table>
						</div>
						
					</section>

					<section id="part2" class="three" style="width: 100%; overflow: scroll;">
						<div class="container">
						  <header>
							<h2>Editais em Curso</h2>
						  </header>
						  <table class="table table-responsive table-border" border="1"> 
						   <tr> <?php $t = ''; $idUn = 1; ?>
							<td width="300px">
							  @foreach($unidades as $unidade)
							    @if($qtdP == 0) <?php $t = '0'; ?> 
								 @elseif($qtdP == 1) <?php $t = ''.$processos2[0]->id == $unidade->id; ?>	
								 @elseif($qtdP == 2) <?php $t = ''.$processos2[0]->id == $unidade->id || $processos2[1]->id == $unidade->id; ?>
								 @elseif($qtdP == 3) <?php $t = ''.$processos2[0]->id == $unidade->id || $processos2[1]->id == $unidade->id || $processos2[2]->id == $unidade->id; ?>
								 @elseif($qtdP == 4) <?php $t = ''.$processos2[0]->id == $unidade->id || $processos2[1]->id == $unidade->id || $processos2[2]->id == $unidade->id || $processos2[3]->id == $unidade->id; ?>
								 @elseif($qtdP == 5) <?php $t = ''.$processos2[0]->id == $unidade->id || $processos2[1]->id == $unidade->id || $processos2[2]->id == $unidade->id || $processos2[3]->id == $unidade->id || $processos2[4]->id == $unidade->id; ?>
								 @elseif($qtdP == 6) <?php $t = ''.$processos2[0]->id == $unidade->id || $processos2[1]->id == $unidade->id || $processos2[2]->id == $unidade->id || $processos2[3]->id == $unidade->id || $processos2[4]->id == $unidade->id || $processos2[5]->id == $unidade->id; ?>
								 @elseif($qtdP == 7) <?php $t = ''.$processos2[0]->id == $unidade->id || $processos2[1]->id == $unidade->id || $processos2[2]->id == $unidade->id || $processos2[3]->id == $unidade->id || $processos2[4]->id == $unidade->id || $processos2[5]->id == $unidade->id || $processos2[6]->id == $unidade->id; ?>
								 @elseif($qtdP == 8) <?php $t = ''.$processos2[0]->id == $unidade->id || $processos2[1]->id == $unidade->id || $processos2[2]->id == $unidade->id || $processos2[3]->id == $unidade->id || $processos2[4]->id == $unidade->id || $processos2[5]->id == $unidade->id || $processos2[6]->id == $unidade->id || $processos2[7]->id == $unidade->id; ?>
								@endif

								@if($t != '' && $t != '0')
    							  <a href="{{ route('candidatoEditais', $unidade->id) }}" title="{{ $unidade->nome }}"><img id="img-unity" src="{{asset('img')}}/{{$unidade->caminho}}" class="rounded-sm" width="70px"></a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								@elseif($t == '')
								  <a href="{{ route('candidatoEditais', $unidade->id) }}" title="{{ $unidade->nome }}"><img id="img-unity" src="{{asset('img')}}/{{$unidade->caminho}}" class="rounded-sm" width="70px" style="opacity: 50%"></a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								@endif
							   <?php if($qtdP == 0 && $idUn <= 9) { ?>
							      <a href="{{ route('candidatoEditais', $unidade->id) }}" title="{{ $unidade->nome }}"><img id="img-unity" src="{{asset('img')}}/{{$unidade->caminho}}" class="rounded-sm" width="70px" style="opacity: 50%"></a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							   <?php } ?>
							   <?php $idUn += 1; ?>
							  @endforeach
						    </td>
						   </tr>
						  </table>
						</div>
					</section>

					<section id="part3" class="four" style="width:100%; overflow: scroll;">
						<div class="container">
							<header>
								<h2>Resultado de Processos Anteriores</h2>
							</header>
							<table class="table table-responsive table-border" border="1"> 
							<tr> 
							   @foreach($unidades as $unidade)
							   <td width="300px">
								 <a href="{{ route('candidatoResultados', $unidade->id) }}" title="{{ $unidade->nome }}"><img id="img-unity" src="{{asset('img')}}/{{$unidade->caminho}}" class="rounded-sm"  width="70px"></a>
							   </td>
							   @endforeach
						   </tr>
						  </table>
						</div>
				    </section>

				    <section id="part4" class="five" style="width:100%; overflow: scroll;">
						<div class="container">
							<header>
								<h2>Quadro de Avisos:</h2>
							</header>
							<table class="table table-responsive" border="2" style="background-color: #131819"> 
						     @foreach($quadros as $qd)
						  	  <tr> 
								@foreach($processos as $pc)
								 @if($qd->processo_seletivo_id == $pc->id)
								  <td> {{ $pc->nome }} </td>
								 @endif
								@endforeach
								<td><p> {{ $qd->descricao }} </p></td> 
								<td> <a target="_blank" class="button" style="padding: 3px;" href="{{asset('storage')}}/{{($qd->arquivo_caminho)}}">Download</a> </td>
							  </tr>
							 @endforeach
						    </table>
						</div>
				    </section>

				    <section id="part5" class="six" style="width: 100%; overflow: scroll;">
						<div class="container">
							<header>
								<h2>Área do Candidato</h2>
							</header>
							<table class="table table-responsive table-border" border="1"> 
							<tr>
							 <td>
							   <center><a href="{{ route('termoU') }}" id="avisos-link"> Área do Candidato <span width="40" class="icon solid fa-address-card"></span></a></center>
						     </td>
							</tr>
						  </table>
						</div>
					</section>

					<section id="part6" class="six" style="width: 100%; overflow: scroll;">
						<div class="container">
							<header>
								<h2>Área de Dúvidas do Candidato</h2>
							</header>
							<table class="table table-responsive table-border" border="1"> 
							<tr>
							 <td> 
							 <a href="{{asset('storage/pdfs/Inscricao.pdf')}}" target="_blank"><img width="40" id="img-unity" src="{{asset('img')}}/{{('pdf.png')}}" class="rounded-sm" alt="..."> Como se inscrever no Processo Seletivo?</a>
							 </td>
						    </tr>
							<tr>
							 <td> 
							 <a href="{{asset('storage/pdfs/InscricaoErro.pdf')}}" target="_blank"><img width="40" id="img-unity" src="{{asset('img')}}/{{('pdf.png')}}" class="rounded-sm" alt="..."> Não consigo me inscrever e agora?</a> 
							 </td>
						    </tr>
							<tr>
							 <td> 
							 <a href="{{asset('storage/pdfs/importanciaExperiencias.pdf')}}" target="_blank"><img width="40" id="img-unity" src="{{asset('img')}}/{{('pdf.png')}}" class="rounded-sm" alt="..."> A importância de cadastrar minhas experiências?</a> 
							 </td>
						    </tr>
							<tr>
							 <td> 
							 <a href="{{asset('storage/pdfs/acessarÁreaCandidato.pdf')}}" target="_blank"><img width="40" id="img-unity" src="{{asset('img')}}/{{('pdf.png')}}" class="rounded-sm" alt="..."> Como acessar a área do candidato?</a>
							 </td>
						    </tr>
							<tr>
							 <td> 
							 <a href="{{asset('storage/pdfs/alterarInformacoes.pdf')}}" target="_blank"><img width="40" id="img-unity" src="{{asset('img')}}/{{('pdf.png')}}" class="rounded-sm" alt="..."> Como alterar meus dados de inscrição?</a>
							 </td>
						    </tr>
							<tr>
							 <td> 
							 <a href="{{asset('storage/pdfs/naoConseguiuQuestionario.pdf')}}" target="_blank"><img width="40" id="img-unity" src="{{asset('img')}}/{{('pdf.png')}}" class="rounded-sm" alt="..."> Não conseguir responder o questionário e cadastrar minhas experiências, e agora?</a>
							 </td>
						    </tr>
							<tr>
							 <td> 
							 <a href="{{asset('storage/pdfs/resultadosProcessos.pdf')}}" target="_blank"><img width="40" id="img-unity" src="{{asset('img')}}/{{('pdf.png')}}" class="rounded-sm" alt="..."> Como ver os resultados dos Processos Seletivos?</a>
							 </td>
						    </tr>
							<tr>
							 <td> 
							 <a href="{{asset('storage/pdfs/anexarDocumentos.pdf')}}" target="_blank"><img width="40" id="img-unity" src="{{asset('img')}}/{{('pdf.png')}}" class="rounded-sm" alt="..."> Como cadastrar meus documentos, se for aprovado.</a>
							 </td>
						    </tr>						  
						  </table>
						</div>
					</section>
				 
				 <section id="part7" class="seven">
						<div class="container">
							<header>
								<h2><b>Sobre</b></h2>
							</header>
							<p align="justify"> <center>O que é HCP GESTÃO?</center> </p>
							<p align="justify"> Fundada em 1945, a Sociedade Pernambucana de Combate ao Câncer (SPCC) é uma instituição filantrópica que teve suas atividades iniciadas em 1952, com a fundação do Hospital de Câncer de Pernambuco (HCP). Depois de 70 anos de serviços prestados à população pernambucana, especialmente a população mais carente, o Hospital de Câncer de Pernambuco iniciou uma nova fase em sua existência, marcada por um moderno modelo de gestão, sendo reconhecido, de forma inquestionável, como instituição de referência no tratamento do câncer e como modelo de gestão hospitalar a ser seguido e copiado. </p>
							<p align="justify"> Nesse cenário, em 2014 a SPCC, entidade mantenedora do Hospital de Câncer de Pernambuco, se viu preparada para ampliar sua atuação no setor de saúde e se qualificou como OSS (Organização Social de Saúde), iniciando a atuação na gestão de outras unidades de saúde. atualmente responde pelo gerenciamento de oito unidades de saúde no Estado de PE: </p>
							<p align="justify"> •	UPAE ARCOVERDE </p>
							<p align="justify"> •	UPAE BELO JARDIM </p>
							<p align="justify">	•	UPAE CARUARU </p>
							<p align="justify"> •	UPAE PALMARES </p>
							<p align="justify">	•	UPAE ARRUDA – RECIFE </p>
							<p align="justify">	•	UPA IGARASSU </p>
							<p align="justify">	•	HOSPITAL SÃO SEBASTIÃO – CARUARU </p>
							<p align="justify">	•	HOSPITAL DA MULHER DO RECIFE </p>
							<p align="justify"> Nosso site: <a href="https://hcpgestao.org.br/" target="_blank">https://hcpgestao.org.br/</a> </p>
							<p align="justify"> ATENÇÃO!  Não é concurso público. O tipo de contrato de trabalho é no formato CLT. </p>
							<p align="justify"> Confira os nossos processos seletivos disponíveis e cadastre seu currículo. Faça parte do nosso time! </p>
						</div>
				 </section>

				 <section id="part8" class="eight">
						<div class="container">
							<header>
								<h2><b>Nosso DNA</b></h2>
							</header>
							<img width="100%" id="img-unity" src="{{asset('img/NossoDNA.png')}}" class="rounded-sm" />
						</div>
				 </section>
					
			</div>

	    <div id="footer" style="background-image: linear-gradient(to right, #80c52e , #65b345)">
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm">
                        <ul class="list-group">
                            <li style="background-color: rgba(185, 178, 178, 0);color:white;">HCPGESTAO@HCP.ORG.BR</li>
                            <li class="list-group-item border-0" style="background-color: rgba(185, 178, 178, 0); color:white;">
                                <img src="{{asset('img/imagem-link-site-hcp-rodape-v2.png')}}" alt="" srcset="">
                            </li>
                            <li class="list-group-item border-0" style="background-color: rgba(185, 178, 178, 0); color:white;">
                                <p style="font-size: 40px;letter-spacing: 10px;">
                                    <a class="text-decoration-none" target="_blank" href="https://www.facebook.com/sigahcp/">
                                        <i class="fab fa-facebook-square" style="color:white;"></i>
                                    </a>
                                    <a class="text-decoration-none" target="_blank" href="https://www.linkedin.com/company-beta/5314142/">
                                        <i class="fab fa-linkedin" style="color:white;"></i>
                                    </a>
                                    <a class="text-decoration-none" target="_blank" href="https://www.youtube.com/user/hcppernambuco">
                                        <i class="fab fa-youtube" style="color:white;"></i>
                                    </a>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm"> </div>
					<div class="col-sm"> </div>
					<div class="col-sm"> </div>
					<div class="col-sm"> </div>
					<div class="col-sm"> </div>
					<div class="col-sm"> </div>
					<div class="col-sm"> </div>
					<div class="col-sm"> </div>
                    <div class="col-sm ">
                        <ul class="list-group">
                        <li class="list-group-item border-0" style="background-color: rgba(185, 178, 178, 0);">
                            <img src="{{asset('img/logo-hcp-gestao-oss-v2.png')}}" alt="" srcset="">
                        </li>
						
                        <li class="list-group-item border-0" style="background-color: rgba(185, 178, 178, 0); margin-top: 30px;">
                            <img src="{{asset('img/logo-ibross-rodape.png')}}" alt="" srcset="">
                        </li>
                        </ul>
                    </div>
                </div>
				<div class="row">  
                    <div class="col-sm">
					 <ul class="list-group">
					  <li style="background-color: rgba(185, 178, 178, 0); color:white;">
						<a href="{{ route('politicaP') }}"><span class="icon solid fa-book-open"> POLÍTICA DE PRIVACIDADE</span></a>
					  </li>
					 </ul>
					</div>
				</div>
            </div>
        </div>
		
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script>var purecookieTitle="Cookies.",purecookieDesc="Usamos cookies para personalizar e melhorar a sua experiência no site. Ao continuar navegando, você concorda com a nossa Política de Privacidade. Mais informações.",purecookieLink='<a href="https://hcpgestao.org.br/processo_seletivo_hcpgestao/public/politica_privacidade" target="_blank">Clique aqui!</a>',purecookieButton="Aceito";function pureFadeIn(e,o){var i=document.getElementById(e);i.style.opacity=0,i.style.display=o||"block",function e(){var o=parseFloat(i.style.opacity);(o+=.02)>1||(i.style.opacity=o,requestAnimationFrame(e))}()}function pureFadeOut(e){var o=document.getElementById(e);o.style.opacity=1,function e(){(o.style.opacity-=.02)<0?o.style.display="none":requestAnimationFrame(e)}()}function setCookie(e,o,i){var t="";if(i){var n=new Date;n.setTime(n.getTime()+24*i*60*60*1e3),t="; expires="+n.toUTCString()}document.cookie=e+"="+(o||"")+t+"; path=/"}function getCookie(e){for(var o=e+"=",i=document.cookie.split(";"),t=0;t<i.length;t++){for(var n=i[t];" "==n.charAt(0);)n=n.substring(1,n.length);if(0==n.indexOf(o))return n.substring(o.length,n.length)}return null}function eraseCookie(e){document.cookie=e+"=; Max-Age=-99999999;"}function cookieConsent(){getCookie("purecookieDismiss")||(document.body.innerHTML+='<div class="cookieConsentContainer" id="cookieConsentContainer"><div class="cookieTitle"><a>'+purecookieTitle+'</a></div><div class="cookieDesc"><p>'+purecookieDesc+" "+purecookieLink+'</p></div><div class="cookieButton"><a onClick="purecookieDismiss();">'+purecookieButton+"</a></div></div>",pureFadeIn("cookieConsentContainer"))}function purecookieDismiss(){setCookie("purecookieDismiss","1",1),pureFadeOut("cookieConsentContainer")}window.onload=function(){cookieConsent()};</script>
    </body>
</html>