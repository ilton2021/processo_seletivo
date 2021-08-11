<!DOCTYPE HTML>
<html>
	<head>
		<title>Processo Seletivo - HCP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ ('assets/css/main.css') }}" />
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
								<li><a href="#top" id="top-link" title="Página Inicial"><span class="icon solid fa-home">Página Inicial</span></a></li>
								<li><a href="#portfolio1" id="portfolio-link"><span class="icon solid fa-calendar-plus">Processos Abertos</span></a></li>
								<li><a href="#about" id="about-link"><span class="icon solid fa-book-open">Editais em Curso</span></a></li>
								<li><a href="#contact" id="about-link"><span class="icon solid fa-calendar-check">Result. de Processos Anter.</span></a></li>
								<li><a href="#avisos" id="avisos-link"><span class="icon solid fa-check-square">Quadro de Avisos</span></a></li>
								<li><a href="#portfolio2" id="portfolio-link"><span class="icon solid fa-th">Sobre</span></a></li>
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
								<p>Bem Vindo ao Processo Seletivo das Unidades da OS HCP.</p>
							</header>
						</div>
					</section>
					
					<section id="portfolio1" class="two" style="width: auto; overflow: scroll;">
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
									<th scope="col"><center>Edital</center></th>
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
									@if($processo->unidade_id == 8)
									<td style="width: 240px;" title="Hospital Provisório do Recife I"><center>{{ 'HPR' }}</center></td>
									@elseif($processo->unidade_id == 7)
									<td style="width: 240px;" title="Hospital São Sebastião"><center>{{ 'HSS' }}</center></td>
									@elseif($processo->unidade_id == 6)
									<td style="width: 240px;" title="UPAE Caruaru"><center>{{ 'UPAE CARUARU' }}</center></td>
									@elseif($processo->unidade_id == 5)
									<td style="width: 240px;" title="UPAE Arruda"><center>{{ 'UPAE ARRUDA' }}</center></td>
									@elseif($processo->unidade_id == 4)
									<td style="width: 240px;" title="UPAE Arcoverde"><center>{{ 'UPAE ARCOVERDE' }}</center></td>
									@elseif($processo->unidade_id == 3)
									<td style="width: 240px;" title="UPAE Belo Jardim"><center>{{ 'UPAE BELO JARDIM' }}</center></td>
									@elseif($processo->unidade_id == 2)
									<td style="width: 240px;" title="Hospital da Mulher do Recife"><center>{{ 'HMR' }}</center></td>
									@endif
									<td style="width: 170px;" title=""><center>{{date('d-m-Y', (strtotime($processo->inscricao_fim)))}}</center></td>
									<td style="width: 5px;" title="">
									<center>
									 <form method="get" action="{{asset('storage')}}/{{$processo->edital_caminho}}">	
									  <center><button href="" target="_blank">Download</button></center>
									 </form>
									</center>
									</td>
									<td style="width: 5px;">
									 <form method="get" action="{{ route('informativo', array($processo->unidade_id, $processo->id)) }}">	
									  <center><button id="div" href="" target="_blank">Inscrição</button></center>
									 </form>
									</td>
								  </tr>							 
								  @endif
								 @endforeach
								</tbody>
							</table>
						</div>
					</section>

					<section id="about" class="three" style="width: 100%; overflow: scroll;">
						<div class="container">
							<header>
								<h2>Editais em Curso</h2>
							</header>
							<table class="table table-responsive table-border" border="1"> 
							<tr>
							<?php $hoje = date('d-m-Y', strtotime('now')); $a = 0; ?> 
							   @foreach($ps as $prc)
								 <?php $inscricao_fim = date('d-m-Y', strtotime($prc->inscricao_fim)); ?> 
								   @if(strtotime($hoje) <= strtotime($inscricao_fim))
									   <?php $a = [$prc->unidade_id]; ?>
								   @endif
							   @endforeach
							   <?php $qtd = sizeof($a); ?>
							   @foreach($unidades as $unidade)
							      @if($unidade->id == 2) 
								   <td width="300px">
									  <a href="{{ route('candidatoEditais', $unidade->id) }}" title="{{ $unidade->nome }}"><img id="img-unity" src="{{asset('storage')}}/{{$unidade->caminho}}" class="rounded-sm"  width="80px"></a>
								   </td>
								   @else
								   <td width="300px">
									  <a href="" title="{{ $unidade->nome }}"><img id="img-unity" src="{{asset('storage')}}/{{$unidade->caminho}}" class="rounded-sm" style="opacity: 30%" width="80px"></a>
								   </td>
								   @endif 
							   @endforeach
						   </tr>
						  </table>
						</div>
					</section>

					<section id="contact" class="four" style="width:100%; overflow: scroll;">
						<div class="container">
							<header>
								<h2>Resultado de Processos Anteriores</h2>
							</header>
							<table class="table table-responsive table-border" border="1"> 
							<tr>
							   @foreach($unidades as $unidade)
							   <td width="300px">
								 <a href="{{ route('candidatoResultados', $unidade->id) }}" title="{{ $unidade->nome }}"><img id="img-unity" src="{{asset('storage')}}/{{$unidade->caminho}}" class="rounded-sm"  width="80px"></a>
							   </td>
							   @endforeach
						   </tr>
						  </table>
						</div>
				 </section>

				 <section id="avisos" class="four" style="width:100%; overflow: scroll;">
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
				 
				 <section id="portfolio2" class="five">
						<div class="container">
							<header>
								<h2><b>Sobre</b></h2>
							</header>
							<p align="justify"> 
							Fundada em 1945, a Sociedade Pernambucana de Combate ao Câncer (SPCC) é uma instituição filantrópica que teve suas atividades iniciadas em 1952, com a fundação do Hospital de Câncer de Pernambuco (HCP). Depois de 70 anos de serviços prestados à população pernambucana, especialmente a população mais carente, o Hospital de Câncer de Pernambuco iniciou uma nova fase em sua existência, marcada por um moderno modelo de gestão, sendo reconhecido, de forma inquestionável, como instituição de referência no tratamento do câncer e como modelo de gestão hospitalar a ser seguido e copiado.
							</p>
							<p align="justify">
							Nesse cenário, em 2014 a SPCC, entidade mantenedora do Hospital de Câncer de Pernambuco, se viu preparada para ampliar sua atuação no setor de saúde e se qualificou como OSS (Organização Social de Saúde), iniciando a atuação na gestão de outras unidades de saúde.
							</p>
							<p align="justify">
							Em 2016, com a ampliação dessa atuação, a SPCC se renovou e criou a Superintendência Geral das Unidades sob Gestão (SGUSG) para atuar no controle da gestão dessas novas unidades, que se somou à já existente Superintendência Geral do HCP (SGHCP), responsável por atuar diretamente na gestão do Hospital de Câncer de Pernambuco.
							</p>
							<p align="jusitify">
							No âmbito de Gestão por OSS, a SPCC executa desde o ano de 2014 a gestão das UPAE Padre Assis Neves no município de Belo Jardim/PE e da UPAE Áureo Bradley no município de Arcoverde/PE; e desde o ano de 2018 a gestão da UPAE Caruaru e do Hospital São Sebastião, todas unidades do Governo do Estado de Pernambuco.
							</p>
							<p align="jusitfy">
							Ainda, desde o ano de 2016 executa a gestão do Hospital da Mulher do Recife e da UPAE Arruda, ambos da Prefeitura Municipal do Recife.
						    </p>

						</div>
					</section>
					
			</div>

	    <div id="footer" style="background-image: linear-gradient(to right, #80c52e , #65b345)">
            <div class="container text-center">
                <div class="row">
                    <div class="col-sm">
                        <ul class="list-group" >
                            <li style="background-color: rgba(185, 178, 178, 0);color:white;">HCPGESTAO@HCP.ORG.BR</li>
                            <li class="list-group-item border-0" style="background-color: rgba(185, 178, 178, 0);">
                                <img src="{{asset('img/imagem-link-site-hcp-rodape-v2.png')}}" alt="" srcset="">
                            </li>
                            <li class="list-group-item border-0" style="background-color: rgba(185, 178, 178, 0);">
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
            </div>
        </div>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>