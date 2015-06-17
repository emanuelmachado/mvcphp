<?php
require_once("/libraries/file.php");
require_once("/models/pessoa.php");

class Principal
{
	private $msg_retorno = "";
	private $pessoa = null;

	function __construct()
	{
		$this->pessoa = new Pessoa();
	}
	
	public function cadastrar()
	{

		
		if($_POST){
			$this->pessoa->nome = $_POST["txtNome"];
			$this->pessoa->cpf = $_POST["txtCPF"];
			$this->pessoa->senha = md5($_POST["pwdSenha"]);
			$this->pessoa->cidade = $_POST["txtCidade"];
			$this->pessoa->datanascimento = $_POST["txtDataNascimento"];
			$this->pessoa->pai = $_POST["txtPai"];
			$this->pessoa->mae = $_POST["txtMae"];
			$this->pessoa->observacoes = $_POST["txtObservacoes"];

			$msg_retorno = $this->pessoa->Salvar();
		}
		$arrPessoas = $this->pessoa->Listar();
		 require_once('views/cadastrar.php');
	}

	public function editar()
	{
		if($_POST){
			$this->pessoa->id = $_POST["hId"];
			$this->pessoa->nome = $_POST["txtNome"];
			$this->pessoa->cpf = $_POST["txtCPF"];
			$this->pessoa->senha = md5($_POST["pwdSenha"]);
			$this->pessoa->cidade = $_POST["txtCidade"];
			$this->pessoa->datanascimento = $_POST["txtDataNascimento"];
			$this->pessoa->pai = $_POST["txtPai"];
			$this->pessoa->mae = $_POST["txtMae"];
			$this->pessoa->observacoes = $_POST["txtObservacoes"];

			$msg_retorno = $this->pessoa->Salvar();
		}
		$data = $this->pessoa;
		require_once('views/editar.php');
	}

	public function detalhes()
	{
		$id = isset($_GET["id"])?$_GET["id"]:-1;

		if(isset($id) && $id!= -1){
			$data = $this->pessoa->listar($id);
			require_once('views/editar.php');
		}else{
			require_once('views/erro.php');
		}
			

	}

	public function deletar()
	{
		$id = isset($_GET["id"])? $_GET["id"] :-1;

		if(isset($id) && $id!= -1){
			
			$this->pessoa->Deletar($id);
			$this->listar();
			require_once('views/listar.php');
		}else{
			require_once('views/erro.php');
		}
	}

	public function listar()
	{
		$arrPessoas = $this->pessoa->Listar();

		require_once('views/listar.php');
	}

	public function erro()
	{
		require_once('views/erro.php');
	}
}
?>