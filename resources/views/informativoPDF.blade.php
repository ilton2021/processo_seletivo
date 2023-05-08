<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Processo Seletivo - Cadastro Candidato</title>
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
</head>
<body>
	<div id="reflexo"> 	
	  <div class="container">
		<div id="sp-page-builder" class="sp-page-builder page-1">
		   <div class="page-content">
			 <section  class="sppb-section" style="background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:0 0;">
			   <div class="sppb-addon-container" style="">
				  <div class="sppb-addon-content">
					<div class="custom">
					  <div class="container"> <br> <br>
					  	<table class="table table-borderless" align="center" id="tabelatitulo" style="margin-bottom: 15px;">
						 <tr>
						    <td>
						 	  <div style="text-align:center; opacity:75%;border-radius: 25px; color: white;margin-top:-45px;height: 160px;background-color: #57D211;  margin-bottom: -25px; Font-family: Cambria, Georgia, serif."class="jumbotron jumbotron-fluid">
								<div class="container">
								  <h5 class="display-8"><p style="align: center"><br><b>INSCRIÇÃO </p> <p style="align: center">  PROCESSO SELETIVO: {{ $processos[0]->nome }}</b> <br><img id="hcp" width="120px;" style="margin-top: 5px;" src="{{ asset('img/logo-hcp-branca-350px.png') }}"></p></td></h5>
							    </div>
							  </div>	
							</td>
						 </tr>
						</table>
					  </div>
					</div>
				  </div>
			   </div>
			 </section>	 
		   </div>
	       <br>

		    <table class="table table-borderless" border="0" width="500" id="inicio">
			 <tr>
			   <td align="center"><strong> Olá! Seja bem vindo ao Processo Seletivo Simplificado: {{ $processos[0]->nome }}. </strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			   <a href="javascript:history.back();" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm"> VOLTAR <i class="fas fa-undo-alt"></i></a></td>
			 </tr>
			 <tr> 
			   <td>
				<center>
				<section id="portfolio-details" class="portfolio-details">
				 <div class="container">
				  <div class="row gy-4">
				   <section class="cards">
				    <div class="card" style="width: 1000px;">
					   <br><br>
					   <center><b>Você precisa ler o EDITAL para poder prosseguir;</b></center><br>
					   <center><b>Na última página do Edital, irá aparecer o botão Inscrição;</b></center><br>
                       <input hidden value="{{ asset('storage') }}/{{ $processos[0]->caminhoEdital }}" width="100px" class="btn btn-sm btn-info" id="{{ $processos[0]->id }}politica" name="{{ $processos[0]->id }}" readonly />
						<a class="btn btn-info m-1"; onclick="exibirPDF({{ $processos[0]->id }},'politica')" data-bs-toggle="modal" data-bs-target="#exampleModal_{{ $processos[0]->id }}P" data-bs-whatever="@getbootstrap">Edital</a>
						 <div class="modal fade" id="exampleModal_{{ $processos[0]->id }}P" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog modal-xl">
						   <div class="modal-content">
							<div class="modal-header">
							 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
							 <div class="d-flex text-center justify-content-between flex-column">
							  <div class="d-flex justify-content-between">
							    <div class="m-1">
								 <button class="btn btn-info" id="prev{{ $processos[0]->id }}politica">Página anterior</button>
								</div>
								<div class="d-flex flex-column m-1">
								 <a style="font-size:20px" href="{{asset('storage')}}/{{$processos[0]->caminhoEdital}}" download="{{$processos[0]->nome}}.pdf"><b>Baixar Documento</b></a>
								 <span>Page: <span id="page_num{{ $processos[0]->id }}politica"></span> / <span id="page_count{{ $processos[0]->id }}politica"></span></span>
								</div>
								<div class="m-1">
								 <button class="btn btn-info" id="next{{ $processos[0]->id }}politica">Próxima página</button> &nbsp; &nbsp;
								</div>
								<form method="get" action="{{ route('informativo', array($processos[0]->unidade_id, $processos[0]->id)) }}">	
								 <button hidden style="margin-right: 35px;" id="botaoInscricao" href="" class='btn btn-success btn-sm' target="_blank">INSCRIÇÃO</button> 	
								</form>
							  </div>

							  <canvas id="pdf-exemplo{{ $processos[0]->id }}politica"></canvas>

							  <div class="d-flex justify-content-between">
							   <div class="m-1">
								 <button class="btn btn-info" id="prev2{{ $processos[0]->id }}politica"> Página anterior </button>
							   </div>
							   <div class="m-1">
								 <span>Page: <span id="page_num2{{ $processos[0]->id }}politica"></span> / <span id="page_count2{{ $processos[0]->id }}politica"></span></span>
							   </div>
							   <div class="m-1">
								 <button class="btn btn-info" id="next2{{ $processos[0]->id }}politica">Proxima página</button> &nbsp; &nbsp;
							   </div>
							   <form method="get" action="{{ route('informativo', array($processos[0]->unidade_id, $processos[0]->id)) }}">	
								 <button hidden style="margin-right: 35px;" id="botaoInscricao" href="" class='btn btn-success btn-sm' target="_blank">INSCRIÇÃO</button> 	
							   </form>
							  </div>
							 </div>
							 <script src="{{ asset('assets/vendor/jquery/jquery-3.6.0.js') }}"></script>
							</div>
						   </div>
						  </div>
						 </div>
					 </div>
					</div>
				   </section>
				  </div>
				 </div>
				</section>
				</center>
			   </td>
			  </tr>
			</table>
        </div>
      </div>
    </div>

	<script src="{{ asset('assets/js/pdf.js') }}"></script>
	
	<script type="text/javascript">
	 function exibirPDF(val,doc) {

		var valoratual = val;

		var idDoc = valoratual + doc;	

		var url_atual = document.getElementById(idDoc).value;

		var url = url_atual;

		var pdfjsLib = window['pdfjs-dist/build/pdf'];

		pdfjsLib.GlobalWorkerOptions.workerSrc = "{{asset('assets/js/pdf.worker.js') }}";

		var pdfDoc = null,
		pageNum = 1,
		pageRendering = false,
		pageNumPending = null,
		scale = 2,
		canvas = document.getElementById('pdf-exemplo' + idDoc),
		ctx = canvas.getContext('2d');

		function renderPage(num) {
			pageRendering = true;

			pdfDoc.getPage(num).then(function(page) {
				var viewport = page.getViewport({
				scale: scale
				});
				canvas.height = viewport.height;
				canvas.width = viewport.width;

				var renderContext = {
				canvasContext: ctx,
				viewport: viewport
				};
				var renderTask = page.render(renderContext);

				renderTask.promise.then(function() {
				pageRendering = false;
				if (pageNumPending !== null) {
					renderPage(pageNumPending);
					pageNumPending = null;
				}
				});
			});

			document.getElementById('page_num' + idDoc).textContent = num;
			document.getElementById('page_num2' + idDoc).textContent = num;

			if(num == pdfDoc.numPages) {
				document.getElementById('botaoInscricao').hidden = false;
			}
			
		}

		function queueRenderPage(num) {
			if (pageRendering) {
				pageNumPending = num;
			} else {
				renderPage(num);
			}
		}

		function onPrevPage() {
			if (pageNum <= 1) {
				return;
			}
			pageNum--;
			queueRenderPage(pageNum);
		}
		document.getElementById('prev' + idDoc).addEventListener('click', onPrevPage);

		function onPrevPage() {
			if (pageNum <= 1) {
				return;
			}
			pageNum--;
			queueRenderPage(pageNum);
		}
		document.getElementById('prev2' + idDoc).addEventListener('click', onPrevPage);

		function onNextPage() {
			if (pageNum >= pdfDoc.numPages) {
				return;
			}
			pageNum++;
			queueRenderPage(pageNum);
		}
		document.getElementById('next' + idDoc).addEventListener('click', onNextPage);

		function onNextPage() {
			if (pageNum >= pdfDoc.numPages) {
				return;
			}
			pageNum++;
			queueRenderPage(pageNum);
		}
		document.getElementById('next2' + idDoc).addEventListener('click', onNextPage);

		pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
			pdfDoc = pdfDoc_;
			document.getElementById('page_count' + idDoc).textContent = pdfDoc.numPages;
			document.getElementById('page_count2' + idDoc).textContent = pdfDoc.numPages;
			renderPage(pageNum);
			});
		}
	</script>

  <style>
    #pdf-exemplo {
      border: 1px solid black;
      border-radius: 10px;
      width: 100%;
    }
  </style>

</body>
</html>
