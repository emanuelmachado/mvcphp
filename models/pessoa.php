<?php

class Pessoa 
{
	
	public $id;
	public $nome;
	public $senha;
	public $datanascimento;
	public $cidade;
	public $cpf;
	public $pai;
	public $mae;
	public $observacoes;
	public $deletado = false;

	private $bd;
	private $base;

	function __construct()
	{
		$this->bd = new File("arquivos/bd.txt");
		$this->base =json_decode($this->bd->RetornaTodos());		
	}

	public function Salvar()
	{
		$mensagem = "";

		$it = 1;
		if($this->base==null){
			$this->base = array();
		}
		else{
			$it = count($this->base) + 1;
		}

		if($this->id!=null)
		{
			$pos = $this->RetornaPosicao($this->id);
			
			$p = new Pessoa();
			$p->id = $this->id;
			$p->nome = $this->nome;
			$p->cpf = $this->cpf;
			$p->senha = $this->senha;
			$p->cidade = $this->cidade;
			$p->pai = $this->pai;
			$p->mae = $this->mae;
			$p->datanascimento = $this->datanascimento;
			$p->observacoes = $this->observacoes;

			$this->Deletar($p->id);
			array_push($this->base, $p);

			$mensagem = "Edição realizado com sucesso da pessoa: ".$this->nome;
		}else{

			$p = new Pessoa();
			$p->id = $it;
			$p->nome = $this->nome;
			$p->cpf = $this->cpf;
			$p->senha = $this->senha;
			$p->cidade = $this->cidade;
			$p->pai = $this->pai;
			$p->mae = $this->mae;
			$p->datanascimento = $this->datanascimento;
			$p->observacoes = $this->observacoes;
			array_push($this->base, $p);
			$mensagem = "Cadastro realizado com sucesso da pessoa: " .$this->nome; 
		}
		$this->bd->AtualizaArquivo(json_encode($this->base));
   
  		$this->base = json_decode($this->bd->RetornaTodos());

		return $mensagem; 
	}

	public function RetornaPessoaId($id='')
	{
		$objeto  = null;

		if($id!= '')
			$objeto = $this->ValidaObjeto($this->objArraySearch('id',$id));

		return $objeto;
	}

	public function RetornaPessoaCPF($cpf='')
	{
		$objeto  = null;
		if($cpf!= '')
			$objeto = $this->ValidaObjeto($this->objArraySearch('cpf',$id));

		return $objeto;
	}

   	public function RetornaPosicao($id)
	{
        $pessoas = $this->base;
        foreach($pessoas as $chave => $item){ 
            if($item!=null){
            	if($item->id == $id)
               	return $chave;
            }        
       	}
  	}

	public function Deletar($id='')
	{
		if($id!= '')	
			$this->objArrayDelete($id);
	}

	public function Listar($id='')
	{
		$objeto  = null;

		$objeto = $this->base;
		if($id!= '')	
			$objeto = $this->ValidaObjeto($this->objArraySearch('id',$id));
		
 		return $objeto;
	}

	private function ValidaObjeto($objeto)
	{
		if(!isset($objeto->nome))
			$objeto->nome = "";
		if(!isset($objeto->cpf))
			$objeto->cpf = "";
		if(!isset($objeto->cidade))
			$objeto->cidade = "";
		if(!isset($objeto->senha))
			$objeto->senha = "";
		if(!isset($objeto->pai))
			$objeto->pai = "";
		if(!isset($objeto->mae))
			$objeto->mae = "";
		if(!isset($objeto->datanascimento))
			$objeto->datanascimento = "";
		if(!isset($objeto->observacoes))
			$objeto->observacoes = "";
		return $objeto;
	}

	public function objArraySearch($atributo,$valor)
	{
        $objeto = null;
        $pessoas = $this->base; 
        foreach($pessoas as $chave => $item) {
        	if($item!=null){
            	if($item->{$atributo}==$valor)
               		$objeto = $item;
        	}
        }
       return $objeto;
    }

    public function objArrayDelete($valor)
	{
		$this->base =json_decode($this->bd->RetornaTodos());
       	$posObjeto = $this->RetornaPosicao($valor);
		
		$this->base[$posObjeto] = null;
		
        $this->bd->AtualizaArquivo(json_encode($this->base));
        $this->base =json_decode($this->bd->RetornaTodos());

    }
}

?>