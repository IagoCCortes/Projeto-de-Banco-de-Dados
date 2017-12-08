<?php

class bd{

	//host
	private $host = 'localhost'; 

	//usuario
	private $usuario = 'root';

	//senha
	private $senha = 'xbox0209'; //ADICIONE A SUA SENHA DO SEU BANCO DE DADOS AQUI

	//banco_de_dados
	private $database = 'ce2016co';

	public function conecta_mysql(){
		//criar conecxao
		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

		//ajustar o charset de comunicação
		mysqli_set_charset($con, 'utf-8');

		//verificar se houve erro de conexão
		if(mysqli_connect_errno()){
			echo "Erro ao tentar se conectar com Banco de Dados! Erro: ".mysqli_connect_error();	
		}

		return $con;
	}

}

?>