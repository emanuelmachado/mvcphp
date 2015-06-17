<?php

class File
{
	private $dirFile;

	function __construct($file)
	{
		$this->dirFile = $file;
	}

	public function RetornaTodos()
	{
		$file = "";
		if(file_exists($this->dirFile)){
			$file = file_get_contents($this->dirFile, true);
		}else{
			die("Arquivo inexistente");
		}
		return $file;
	}

	public function RetornarLinhas($value='')
	{
		$arrLines = array();
		if(file_exists($this->dirFile)){
			$file = @fopen($this->dirFile, "r") or die("Não posso abrir o arquivo");

			if ($file) {
			    while (!feof($file)) {
			        array_push($arrLines, fgets($file, 4096));
			    }
			    fclose($file);
			}
		}else{
			die("Arquivo inexistente");
		}
		return $arrLines;
	}

	public function AtualizaArquivo($data)
	{
		if(file_exists($this->dirFile)){
			$file = @fopen($this->dirFile, 'w') or die("Não posso abrir o arquivo.");

			if(flock($file, LOCK_EX)) {    
			    ftruncate($file, 0);
			    rewind($file);      		    
			    fwrite($file, $data);
			    flock($file, LOCK_UN);
			} else {
			    echo "Não pude efetuar o bloqueio do arquivo.";
			}			
			fclose($file);
		}
	}
}

?>