<?php 

require_once('conecta_bd.php'); 

$objBd = new bd();
$link = $objBd->conecta_mysql();


if( ($nome_escola = $_POST['nome_escola']) != ''){
	$sql = "select * from escola where noEsc like '%$nome_escola%';";

	if($resultado = mysqli_query($link, $sql)){

		while($resultado_linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			
			if( $resultado_linha['depAdm']=='1'){ 
				$depAdm = 'Federal'; }
			if($resultado_linha['depAdm']=='2'){ 
				$depAdm = 'Estadual'; }
			if($resultado_linha['depAdm']=='3'){
				$depAdm = 'Municipal'; }
			if($resultado_linha['depAdm']=='4'){
				$depAdm = 'Privada'; }
			
			if($resultado_linha['locali']=='1'){
				$locali = 'Urbana'; }
			if($resultado_linha['locali']=='2'){
				$locali = 'Rural'; }

			echo "<pre><strong>Código da escola: " . $resultado_linha['codEsc'] . '<br>';
			echo "Nome da Escola: " . $resultado_linha['noEsc'] . '<br>';
			echo "Dependencia Administrativa: " . $depAdm . '<br>';
			echo "Localização: " . $locali . '</strong><br></pre>';
		}
	}
	else{
		echo "<h2><b>Nenhum Registro Encontrado</b></h2>";
	}
}

if( ($codigo_escola = $_POST['codigo_escola']) != ''){
	$sql = "select * from escola where codEsc = '$codigo_escola';";

	if($resultado = mysqli_query($link, $sql)){

		while($resultado_linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			
			if( $resultado_linha['depAdm']=='1'){ 
				$depAdm = 'Federal'; }
			if($resultado_linha['depAdm']=='2'){ 
				$depAdm = 'Estadual'; }
			if($resultado_linha['depAdm']=='3'){
				$depAdm = 'Municipal'; }
			if($resultado_linha['depAdm']=='4'){
				$depAdm = 'Privada'; }
			
			if($resultado_linha['locali']=='1'){
				$locali = 'Urbana'; }
			if($resultado_linha['locali']=='2'){
				$locali = 'Rural'; }

			echo "<pre><strong>Código da escola: " . $resultado_linha['codEsc'] . '<br>';
			echo "Nome da Escola: " . $resultado_linha['noEsc'] . '<br>';
			echo "Dependencia Administrativa: " . $depAdm . '<br>';
			echo "Localização: " . $locali . '</strong><br></pre>';
		}
	}
	else{
		echo "<h2><b>Nenhum Registro Encontrado</b></h2>";
	}
}

if( ($codigo_escola = $_POST['codigo_matricula']) != ''){
	$sql = "select matricula.*, escola.noEsc from matricula 
	left join escola on matricula.codEsc=escola.codEsc
	where codMat = '$codigo_escola';";

	if($resultado = mysqli_query($link, $sql)){

		while($resultado_linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			
			if($resultado_linha['sexo']=='1'){
				$sexo = 'Masculino'; }
			if($resultado_linha['sexo']=='2'){
				$sexo = 'Feminino'; }

			if( $resultado_linha['corRaca']=='0'){ 
				$corRaca = 'Não Declarada'; }
			if( $resultado_linha['corRaca']=='1'){ 
				$corRaca = 'Branca'; }
			if($resultado_linha['corRaca']=='2'){ 
				$corRaca = 'Preta'; }
			if($resultado_linha['corRaca']=='3'){
				$corRaca = 'Parda'; }
			if($resultado_linha['corRaca']=='4'){
				$corRaca = 'Amarela'; }
			if($resultado_linha['corRaca']=='5'){
				$corRaca = 'Indígena'; }

			echo "<pre><strong>Matrícula: " . $resultado_linha['codMat'] . '<br>';
			echo "Idade: " . $resultado_linha['idade'] . '<br>';
			echo "Sexo: " . $sexo . '<br>';
			echo "Cor/Raça: " . $corRaca . '<br>';
			echo "Turma: " . $resultado_linha['codTurma'] . '<br>';
			echo "Escola: " . $resultado_linha['noEsc']  . '</strong></pre>';
		}
	}
}	

if( ($codigo_docente = $_POST['codigo_docente']) != ''){
	$sql = "select * from docente where codDoc = '$codigo_docente';";

	if($resultado = mysqli_query($link, $sql)){
	   while($resultado_linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){

			if($resultado_linha['sexo']=='1'){
				$sexo = 'Masculino'; }
			if($resultado_linha['sexo']=='2'){
				$sexo = 'Feminino'; }

			if( $resultado_linha['corRaca']=='0'){ 
				$corRaca = 'Não Declarada'; }
			if( $resultado_linha['corRaca']=='1'){ 
				$corRaca = 'Branca'; }
			if($resultado_linha['corRaca']=='2'){ 
				$corRaca = 'Preta'; }
			if($resultado_linha['corRaca']=='3'){
				$corRaca = 'Parda'; }
			if($resultado_linha['corRaca']=='4'){
				$corRaca = 'Amarela'; }
			if($resultado_linha['corRaca']=='5'){
				$corRaca = 'Indígena'; }

			if($resultado_linha['nacio']=='1'){
				$nacio = 'Brasileira'; }
			if($resultado_linha['nacio']=='2'){
				$nacio = 'Brasileira - nascido no exterior ou naturalizado'; }
			if($resultado_linha['nacio']=='3'){
				$nacio = 'Estrangeira'; }
							

			echo "<pre><strong>Código do Docente: " . $resultado_linha['codDoc'] . '<br>';
			echo "Idade: " . $resultado_linha['idade'] . '<br>';
			echo "Sexo: " . $sexo . '<br>';
			echo "Cor/Raça: " . $corRaca . '<br>';
			echo "Nacionalidade: " . $nacio . '</strong></pre>';

		}
	}	

}

if( ($codigo_turma = $_POST['codigo_turma']) != ''){
	$sql = "select turma.*, escola.noEsc from turma
	left join escola on turma.codEsc=escola.codEsc 
	where codTurma = '$codigo_turma';";

	if($resultado = mysqli_query($link, $sql)){
	   while($resultado_linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			
			if( $resultado_linha['etEns']=='1'){ 
				$etEns = 'Educação Infantil - Creche'; }
			if( $resultado_linha['etEns']=='2'){ 
			$etEns = 'Educação Infantil - Pré-escola'; }
			if( $resultado_linha['etEns']=='3'){ 
				$etEns = 'Educação Infantil - Unificada'; }
			if( $resultado_linha['etEns']=='4'){ 
			$etEns = 'Educação Infantil e Ensino Fundamental (8 e 9 anos) Multietapa'; }
			if( $resultado_linha['etEns']=='5'){ 
				$etEns = 'Ensino Fundamental de 8 anos - 1ª Série'; }
			if( $resultado_linha['etEns']=='6'){ 
			$etEns = 'Ensino Fundamental de 8 anos - 3ª Série'; }
			if( $resultado_linha['etEns']=='7'){ 
				$etEns = 'Ensino Fundamental de 8 anos - 4ª Série'; }
			if( $resultado_linha['etEns']=='8'){ 
			$etEns = 'Ensino Fundamental de 8 anos - 5ª Série'; }
			if( $resultado_linha['etEns']=='9'){ 
				$etEns = 'Ensino Fundamental de 8 anos - 6ª Série'; }
			if( $resultado_linha['etEns']=='10'){ 
			$etEns = 'Ensino Fundamental de 8 anos - 7ª Série'; }
			if( $resultado_linha['etEns']=='11'){ 
				$etEns = 'Ensino Fundamental de 8 anos - 8ª Série'; }
			if( $resultado_linha['etEns']=='12'){ 
			$etEns = 'Ensino Fundamental de 8 anos - Multi'; }
			if( $resultado_linha['etEns']=='13'){ 
				$etEns = 'Ensino Fundamental de 8 anos - Correção de Fluxo'; }
			if( $resultado_linha['etEns']=='14'){ 
			$etEns = 'Ensino Fundamental de 9 anos - 1º Ano'; }
			if( $resultado_linha['etEns']=='15'){ 
				$etEns = 'Ensino Fundamental de 9 anos - 2º Ano'; }
			if( $resultado_linha['etEns']=='16'){ 
			$etEns = 'Ensino Fundamental de 9 anos - 3º Ano'; }

			echo "<pre><strong>Código da Turma: " . $resultado_linha['codTurma'] . '<br>';
			//echo "?: " . $resultado_linha['durTurma'] . '<br>';
			//echo "?: " . $resultado_linha['nuMats'] . '<br>';
			echo "Etapa de ensino da turma: " .$etEns . '<br>';
			echo "Nome da Escola: " . $resultado_linha['noEsc'] . '<br>';

		}
	}
}

if(($qtd_res = $_POST['qtd_res']) != ''){
	$sql = "select * from maisvelhos limit $qtd_res;";
	
	if($resultado = mysqli_query($link, $sql)){

		while($resultado_linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			
			if($resultado_linha['sexo']=='1'){
				$sexo = 'Masculino'; }
			if($resultado_linha['sexo']=='2'){
				$sexo = 'Feminino'; }

			echo "<pre><strong>Código do Docente: " . $resultado_linha['codDoc'] . '<br>';
			echo "Sexo: " . $sexo . '<br>';
			echo "Idade: " . $resultado_linha['idade'] . '</strong><br></pre>';
		}
	}	
}		

if((($cod_esc = $_POST['cod_esc']) != '')&&(($novo_noesc = $_POST['novo_noesc']) != '')){
	$sql = "update escola set noesc = '$novo_noesc' where codesc = $cod_esc;";
	mysqli_query($link, $sql);
	$sql = "select * from escnachange order by id desc limit 1;";
	if($resultado = mysqli_query($link, $sql)){

		while($resultado_linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			
			echo "<pre><strong>Nome antigo da Escola: " . $resultado_linha['oldNoEsc'] . '<br>';
			echo "Nome novo da Escola: " . $resultado_linha['newNoEsc'] . '<br>';
			echo "Data da mudança: " . $resultado_linha['changeTim'] . '</strong><br></pre>';
		}
	}	
}

if(($loc = $_POST['loc']) != ''){
	$sql = "call urbrur($loc);";
	if($resultado = mysqli_query($link, $sql)){

		while($resultado_linha = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
			if($loc == '1'){
				echo "<pre><strong>Codigo da Escola Urbana: " . $resultado_linha['codEsc'] . '<br>';
				echo "Nome da Escola Urbana: " . $resultado_linha['noEsc'] . '</strong><br></pre>';
			}
			if($loc == '2'){
				echo "<pre><strong>Codigo da Escola Rural: " . $resultado_linha['codEsc'] . '<br>';
				echo "Nome da Escola Rural: " . $resultado_linha['noEsc'] . '</strong><br></pre>';
		    }
		}
	}	
}

?>