<?php

class SalvarPostagem extends Conexao

{

	protected $id;
	protected $apelido;
	protected $titulo;
	protected $mensagem;
	protected $data;
	protected $edicao = "Nunca";
	protected $valor = 1;

	public function __construct($id, $apelido, $titulo, $mensagem)
	{
		$this->id 		=	$id;
		$this->apelido 	=	$apelido;
		$this->titulo 	=	$titulo;
		$this->mensagem =	$mensagem;
		$this->data 	=	date("d/m/Y") . " as " . date("H:i");
	}

	public function salvarPost()
	{

		$id 		= $this->id;
		$apelido 	= $this->apelido;
		$titulo 	= $this->titulo;
		$mensagem 	= $this->mensagem;
		$data 		= $this->data;
		$edicao 	= $this->edicao;
		$valor 		= $this->valor;

		$conecta = new Conexao();
		$conecta->conectar();

		$stmt = $conecta->conectar()->prepare("INSERT INTO postagem ( idautor, nickautor, titulo, texto, data, postedicao, valor) VALUES( :IDAUTOR, :NICKNAME, :TITULO, :TEXTO, :DATA, :PDICAO, :VALOR)");

		//$stmt->bindParam(":ID", $id);
		$stmt->bindParam(":IDAUTOR", $id);
		$stmt->bindParam(":NICKNAME", $apelido);
		$stmt->bindParam(":TITULO", $titulo);
		$stmt->bindParam(":TEXTO", $mensagem);
		$stmt->bindParam(":DATA", $data);
		$stmt->bindParam(":PDICAO", $edicao);
		$stmt->bindParam(":VALOR", $valor);

		$stmt->execute();

		echo "<script>alert('Post publicado!'); location.replace('index.php?ac=postagens');</script>";

	}

	public function salvarEdicao()
	{

		$idpost 	= $this->id;
		$titulo 	= $this->titulo;
		$mensagem 	= $this->mensagem;
		$dataedit 	= $this->data;

		try {

		$conecta = new Conexao();
		$conecta->conectar();	
			
		$stmt = $conecta->conectar()->prepare("UPDATE postagem SET titulo = :TITULO, texto = :MESSAGE, postedicao = :DATA WHERE idpost = :IDPOST");

		$stmt->bindParam(":IDPOST", $idpost);
		$stmt->bindParam(":TITULO", $titulo);
		$stmt->bindParam(":MESSAGE", $mensagem);
		$stmt->bindParam(":DATA", $dataedit);

		$stmt->execute();


		echo "<script>location.replace('./index.php?postagem&id=$idpost');</script>";


		} catch (Exception $e) {

			echo $e;
			
		}

	}

}

?>