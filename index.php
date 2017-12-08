<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="UTF-8">

<title>Censo Escolar 2016</title>

<!-- jquery - link cdn -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- bootstrap - link cdn -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style type="text/css">
	@media screen and (min-width: 768px){
		.jumbotron {
			padding-top: 1px !important;
			padding-bottom: 0px !important;
		}
	}

	#resultados{
		background-color: #d3d3d3;
		border-radius: 5px;
		min-height: 600px;
	}

	body{
	   background-color: #eee;	
	}

</style>

<script type="text/javascript">

$(document).ready(function() {
    $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
});

$(document).ready(function(){
	$('.btn_carrega_conteudo').click(function(){
		
		var carrega_url = 'http://localhost/trab/';
		$('#loader').css({display:"block"});
		$.ajax({
			url: carrega_url,
			success: function(){
				$('#loader').css({display:"block"});
			}
		});
	});
});	

$(document).ready(function(){

	$('#btn_escola_nome').click(function(){
		if($('#nome_escola').val().length > 0){
			$.ajax({
				url: 'consulta_sql.php',
				method: 'post',
				data: { nome_escola: $('#nome_escola').val(), loc: '', novo_noesc: '', cod_esc: '', qtd_res: '',codigo_escola: '', codigo_matricula: '', codigo_docente: '', codigo_turma: '' },
				success: function(data){
					$('#teste').html(data);
				}
			});
	
		}else{
			alert("<h2><b>Por Favor preencha os dados nos campos de pesquisa</b></h2>");
		}
	});	

	$('#btn_escola_codigo').click(function(){
		if($('#codigo_escola').val().length > 0){
			$.ajax({
				url: 'consulta_sql.php',
				method: 'post',
				data: { codigo_escola: $('#codigo_escola').val(), loc: '', novo_noesc: '', cod_esc: '', qtd_res: '',nome_escola: '', codigo_matricula: '', codigo_docente: '', codigo_turma: '' },
				success: function(data){
					$('#teste').html(data);
				}
			});
		
		}else{
			alert("<h2><b>Por Favor preencha os dados nos campos de pesquisa</b></h2>");
		}
	});

	$('#btn_aluno_codigo').click(function(){
		if($('#codigo_matricula').val().length > 0){
			$.ajax({
				url: 'consulta_sql.php',
				method: 'post',
				data: { codigo_matricula: $('#codigo_matricula').val(), loc: '', novo_noesc: '', cod_esc: '', qtd_res: '',nome_escola: '', codigo_escola: '', codigo_docente: '', codigo_turma: '' },
				success: function(data){
					$('#teste').html(data);
				}
			});
		
		}else{
			alert("<h2><b>Por Favor preencha os dados nos campos de pesquisa</b></h2>");
		}
	});

	$('#btn_docente_codigo').click(function(){
		if($('#codigo_docente').val().length > 0){
			$.ajax({
				url: 'consulta_sql.php',
				method: 'post',
				data: { codigo_docente: $('#codigo_docente').val(), novo_noesc: '', loc: '', cod_esc: '', qtd_res: '',codigo_escola: '', nome_escola: '', codigo_matricula: '', codigo_turma: '' },
				success: function(data){
					$('#teste').html(data);
				}
			});
	
		}else{
			alert("<h2><b>Por Favor preencha os dados nos campos de pesquisa</b></h2>");
		}
	});

	$('#btn_turma_codigo').click(function(){
		if($('#codigo_turma').val().length > 0){
			$.ajax({
				url: 'consulta_sql.php',
				method: 'post',
				data: { codigo_turma: $('#codigo_turma').val(), novo_noesc: '', cod_esc: '', loc: '', qtd_res: '',codigo_escola: '', nome_escola: '', codigo_matricula: '', codigo_docente: '' },
				success: function(data){
					$('#teste').html(data);
				}
			});
	
		}else{
			alert("<h2><b>Por Favor preencha os dados nos campos de pesquisa</b></h2>");
		}
	});
	$('#btn_docente_velho').click(function(){
		if($('#qtd_res').val().length > 0){	
			$.ajax({
				url: 'consulta_sql.php',
				method: 'post',
				data: { qtd_res: $('#qtd_res').val(), novo_noesc: '', cod_esc: '', codigo_escola: '', loc: '', nome_escola: '', codigo_matricula: '', codigo_docente: '', codigo_turma: '' },
				success: function(data){
					$('#teste').html(data);
				}
			});	
		}else{
			alert("<h2><b>Por Favor preencha os dados nos campos de pesquisa</b></h2>");
		}		
	});
	$('#btn_trigger').click(function(){
		if($('#cod_esc').val().length > 0){	
			$.ajax({
				url: 'consulta_sql.php',
				method: 'post',
				data: { cod_esc: $('#cod_esc').val(), novo_noesc: $('#novo_noesc').val(), qtd_res: '', loc: '', codigo_escola: '', nome_escola: '', codigo_matricula: '', codigo_docente: '', codigo_turma: '' },
				success: function(data){
					$('#teste').html(data);
				}
			});	
		}else{
			alert("<h2><b>Por Favor preencha os dados nos campos de pesquisa</b></h2>");
		}		
	});
	$('#btn_procedure').click(function(){
		if($('#loc').val().length > 0){	
			$.ajax({
				url: 'consulta_sql.php',
				method: 'post',
				data: { loc: $('#loc').val(), cod_esc: '', novo_noesc: '', qtd_res: '', codigo_escola: '', nome_escola: '', codigo_matricula: '', codigo_docente: '', codigo_turma: '' },
				success: function(data){
					$('#teste').html(data);
				}
			});	
		}else{
			alert("<h2><b>Por Favor preencha os dados nos campos de pesquisa</b></h2>");
		}		
	});
});

</script>

</head>

<body>

<div class="jumbotron text-center">
   <h1>Censo Escolar 2016</h1>
  	<p>Trabalho Final de Banco de Dados 2º/2017</p>
  	<strong><pre>Alexandre Gonçalves Teixeira - 15/0115571<br />Jean Victor Ribeiro Vieira - 11/0031784<br />Iago Cortes - 13/0059943<br />Larissa Bianca Oliveira da Silva Lima - 10/0109829</pre> </strong>

</div>

<div class="container col-md-7">
	<div>
		<h2 class="text-center"><b>Pesquisas</b></h2>
		<!--Criação das tabs-->
		<ul class="nav nav-tabs" role="tablist">
			<li class="active"><a href="#escola" data-toggle="tab">Escola</a></li>
			<li><a href="#aluno" data-toggle="tab" role="tab">Aluno</a></li>
			<li><a href="#docente" data-toggle="tab" role="tab">Docente</a></li>
			<li><a href="#turma" data-toggle="tab" role="tab">Turma</a></li>
			<li><a href="#view" data-toggle="tab" role="tab">Mais Velho</a></li>
			<li><a href="#trigger" data-toggle="tab" role="tab">Update N.Escola</a></li>
			<li><a href="#procedure" data-toggle="tab" role="tab">Escolas Urb/Rur.</a></li>
		</ul>

		<!--Criação das tabs (container de conteúdos)-->
		<div class="tab-content">
					
			<!--Escola-->
			<div class="tab-pane active" role="tabpanel" id="escola">
				<div id="pesquisa_escola" class="row">
					<!--<form method="post" action="consulta_sql.php">-->
						<div class="container col-md-6">
							<h4>Pesquisar por nome da Escola:</h4>
							<div class="input-group">
								<input id="nome_escola" type="text" class="form-control" placeholder="Procurar por nome..." autocomplete="off">
								<span class="input-group-btn">
									<button id="btn_escola_nome" type="submit" class="btn btn-default btnSearch btn_carrega_conteudo">
										<span class="glyphicon glyphicon-search"> </span>
									</button>
								</span>
							</div>
						</div>

						<div class="container col-md-5">
							<h4>Pesquisar por Código da Escola:</h4>
							<div class="input-group ">
								<input id="codigo_escola" name="codigo_escola" type="text" class="form-control" placeholder="Procurar por escola..." autocomplete="off">
									<span class="input-group-btn">
										<button id="btn_escola_codigo" type="button" class="btn btn-default btnSearch btn_carrega_conteudo">
											<span class="glyphicon glyphicon-search"> </span>
										</button>
						 			</span>
							</div>
						</div>
					<!--</form>-->
				</div> <!--FECHA A ROW ESCOLA-->
			</div><!--FECHA A TAB ESCOLA-->

			<!--Aluno-->
			<div class="tab-pane" role="tabpanel" id="aluno">
				<div id="pesquisa_aluno" class="row">
					<form method="post" action="consulta_sql.php">
						<div class="container col-md-5">
							<h4>Pesquisar por Matrícula do Aluno:</h4>
							<div class="input-group">
								<input id="codigo_matricula" name="codigo_matricula" type="text" class="form-control" placeholder="Procurar por matrícula..." autocomplete="off">
								<span class="input-group-btn">
									<button id="btn_aluno_codigo" type="button" class="btn btn-default btnSearch btn_carrega_conteudo">
										<span class="glyphicon glyphicon-search"> </span>
									</button>
				 				</span>
							</div>
						</div>
					</form>
				</div> <!--FECHA A ROW ALUNO-->
			</div> <!--FECHA A TAB ALUNO-->

			<!--Docente-->
			<div class="tab-pane" role="tabpanel" id="docente">
				<div id="pesquisa_docente" class="row">
					<form method="post" action="consulta_sql.php">
						<div class="container col-md-5">
							<h4>Pesquisar por código do Docente:</h4>
							<div class="input-group">
								<input id="codigo_docente" name="codigo_docente" type="text" class="form-control" placeholder="Procurar por docente..." autocomplete="off">
									<span class="input-group-btn">
										<button id="btn_docente_codigo" type="button" class="btn btn-default btnSearch btn_carrega_conteudo">
											<span class="glyphicon glyphicon-search"> </span>
										</button>
						 			</span>
							</div>
						</div>
					</form>	
				</div><!--FECHA A ROW DOCENTE-->
			</div>	<!--FECHA A TAB DOCENTE-->

			<!--Turma-->
			<div class="tab-pane" role="tabpanel" id="turma">
				<div id="pesquisa_turma" class="row">
					<form method="post" action="consulta_sql.php">
						<div class="container col-md-5">
							<h4>Pesquisar por código da Turma:</h4>
							<div class="input-group">
								<input id="codigo_turma" name="codigo_turma" type="text" class="form-control" placeholder="Procurar por turma..." autocomplete="off">
								<span class="input-group-btn">
									<button id="btn_turma_codigo" type="button" class="btn btn-default btnSearch btn_carrega_conteudo">
										<span class="glyphicon glyphicon-search"> </span>
									</button>
				 				</span>
							</div>
						</div>
					</form>
				</div><!--FECHA A ROW TURMA-->
			</div><!--FECHA A TAB TURMA-->
			
			<!--View-->
			<div class="tab-pane" role="tabpanel" id="view">
				<div id="pesquisa_view" class="row">
					<form method="post" action="consulta_sql.php">
						<div class="container col-md-5">
							<h4>Pesquisar por Docentes mais velhos:</h4>
							<div class="input-group">
								<input id="qtd_res" name="qtd_res" type="text" class="form-control" placeholder="nro de Doc's a procurar..." autocomplete="off">
								<span class="input-group-btn">
									<button id="btn_docente_velho" type="button" class="btn btn-default btnSearch btn_carrega_conteudo">
										<span class="glyphicon glyphicon-search"> </span>
									</button>
				 				</span>
							</div>
						</div>
					</form>
				</div> <!--FECHA A ROW View-->
			</div> <!--FECHA A TAB View-->
		
		
			<!--Trigger-->
			<div class="tab-pane" role="tabpanel" id="trigger">
				<div id="pesquisa_trigger" class="row">
					<form method="post" action="consulta_sql.php">
						<div class="container col-md-5">
							<h4>Update no nome de uma escola:</h4>
							<div class="input-group">
								<input id="cod_esc" name="cod_esc" type="text" class="form-control" placeholder="codigo da escola..." autocomplete="off">
								<input id="novo_noesc" name="novo_noesc" type="text" class="form-control" placeholder="novo nome da escola..." autocomplete="off">
								<span class="input-group-btn">
									<button id="btn_trigger" type="button" class="btn btn-danger btn_carrega_conteudo">
										<span class="glyphicon glyphicon-search"> </span>
									</button>
				 				</span>
							</div>
						</div>
					</form>
				</div> <!--FECHA A ROW Trigger-->
			</div> <!--FECHA A TAB Trigger-->
			
			<!--Procedure-->
			<div class="tab-pane" role="tabpanel" id="procedure">
				<div id="pesquisa_procedure" class="row">
					<form method="post" action="consulta_sql.php">
						<div class="container col-md-5">
							<h4>Pesquisar escolas Urbanas ou Rurais:</h4>
							<div class="input-group">
								<input id="loc" name="loc" type="text" class="form-control" placeholder="1- Urbanas, 2- Rurais..." autocomplete="off">
								<span class="input-group-btn">
									<button id="btn_procedure" type="button" class="btn btn-default btnSearch">
										<span class="glyphicon glyphicon-search"> </span>
									</button>
				 				</span>
							</div>
						</div>
					</form>
				</div> <!--FECHA A ROW Procedure-->
			</div> <!--FECHA A TAB Procedure-->
			
		</div>	<!--FECHA O CONTAINER DE CONTEUDO DAS TABS-->

	</div> <!--Tab-content-->

</div> <!--FECHA O CONTAINER DA AREA DAS PESQUISAS-->







<div id="resultados" class="container col-md-5 text-center" style="position: relative;">
   <h1><strong>Resultados:</strong></h1>
   <div id="teste" class="list-group"><img src="loader.gif" style="display: none; margin-left: auto;margin-right: auto;height: 200px;" id="loader"></div>
</div>




<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>	

</body>
</html>


