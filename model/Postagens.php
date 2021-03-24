<?php

class Postagens extends Conexao
{
	protected $idpost;
	protected $idautor;
	protected $nickautor;
	protected $titulo;
	protected $texto;
	protected $data;
	protected $postedicao;
	protected $valor;
	protected $arraylist = array();

	public function exibirPostagens()
	{
		$conecta = new Conexao();
		$conecta->conectar();

		//("SELECT * FROM portal ORDER BY idportal ASC ou DESC");

		$stmt = $conecta->conectar()->prepare("SELECT * FROM postagem WHERE valor = 1 ORDER BY idpost DESC");

		$stmt->execute();

		$lista = array();

		include_once("./view/postagens.php");
	}

	public function minhasPostagens()
	{
		$conecta = new Conexao();
		$conecta->conectar();

		$idcheck = $_SESSION["iduser"];

		$stmt = $conecta->conectar()->prepare("SELECT * FROM postagem WHERE idautor = :IDCHECK and valor = 1 ORDER BY idpost DESC");

		$stmt->bindParam(":IDCHECK", $idcheck);

		$conta_result = $stmt->rowCount();

		$stmt->execute();

		$lista = array();

		include_once("../view/minhaspostagens.php");
	}

	public function capturarDados($id)
	{
	
		$conecta = new Conexao();
		$conecta->conectar();

		$stmt = $conecta->conectar()->prepare("SELECT * FROM postagem WHERE idpost = :ID");

		$stmt->bindParam(":ID", $id);

		$stmt->execute();

		$lista = array();

			while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
			{
			$this->idpost		= $lista["idpost"];
			$this->idautor		= $lista["idautor"];
			$this->nickautor	= $lista["nickautor"];
			$this->titulo		= $lista["titulo"];
			$this->texto 		= $lista["texto"];
			$this->data 		= $lista["data"];
			$this->postedicao	= $lista["postedicao"];
			$this->valor 		= $lista["valor"];
			}

	}

	public function confirmarExclusaoPost()
	{
		$idpost			= $this->idpost;
		$idautor 		= $this->idautor;
		$nickautor 		= $this->nickautor;
		$titulo 		= $this->titulo;
		$texto 			= $this->texto;
		$data 			= $this->data;
		$postedicao		= $this->postedicao;
		$valor 			= $this->valor;

		$conecta = new Conexao();
		$conecta->conectar();

		$stmt = $conecta->conectar()->prepare("SELECT * FROM postagem WHERE idpost = :ID");

		$stmt->bindParam(":ID", $id);

		$stmt->execute();

		$lista = array();

			if($idautor == $_SESSION["iduser"]  || $_SESSION["nivel"] > 1)
				{
					include_once("view/confirmexcluirpost.php");
				}

				else
				{
					?>
					<br><center><h1 style="color:red">
					Acesso não autorizado! Você não é o autor da postagem!
					</h1></center><br>
					<?php
				}
	}

	public function excluirPostagem($idconsulta)
	{
		
		$id 		= $idconsulta;
		$dataedit 	= date("d/m/Y") . " as " . date("H:i");
		$valor 		= 0;

		$conecta = new Conexao();
		$conecta->conectar();	
			
		$stmt = $conecta->conectar()->prepare("UPDATE postagem SET valor = :VALOR, postedicao = :DATA WHERE idpost = :ID");

		$stmt->bindParam(":ID", $id);
		$stmt->bindParam(":DATA", $dataedit);
		$stmt->bindParam(":VALOR", $valor);

		$stmt->execute();

		echo "<script>alert('Postagem excluída!'); location.replace('index.php?ac=postagens');</script>";

	}

	public function buscarPostagem($buscar)
	{
		$conecta = new Conexao();
		$conecta->conectar();

		$stmt = $conecta->conectar()->prepare("SELECT * FROM postagem WHERE valor = 1 AND titulo LIKE '%$buscar%' ORDER BY idpost DESC");

		$stmt->bindParam(":BUSCAR", $buscar);

		$stmt->execute();

		$lista = array();

		$conta_resultados = $stmt->rowCount();

		if($conta_resultados>0)
			{
			include_once("view/buscar.php");
			}
		else
		{
			?>
			<br><br>
			<h1 style="color:green"><center>...Nenhum resultado encontrado. <img src="./configs/img/emoticontriste.jpg" width="30" height="30"></center></h1>
			<br>
			<?php
		}
	}

}

?>