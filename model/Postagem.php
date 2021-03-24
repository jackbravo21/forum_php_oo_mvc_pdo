<?php

class Postagem extends Conexao
{

	protected $id;

	public function __construct($id)
	{
		$this->id = $id;
	}

	public function exibirPost()
	{
		$idconsulta = $this->id;

		$conecta = new Conexao();
		$conecta->conectar();

		$stmt = $conecta->conectar()->prepare("SELECT * FROM postagem WHERE idpost = :ID AND valor = 1");

		$stmt->bindParam(":ID", $idconsulta);

		$stmt->execute();

		$lista = array();

		include_once("view/postagem.php");
	}

	public function editarPost()
	{
		$id = $this->id;

		$conecta = new Conexao();
		$conecta->conectar();

		$stmt = $conecta->conectar()->prepare("SELECT * FROM postagem WHERE idpost = :ID");

		$stmt->bindParam(":ID", $id);

		$stmt->execute();

		$lista = array();

		$nunca = "Nunca";

		while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
		{

			if(($lista['idautor']) == ($_SESSION["iduser"]))
			{
				include_once("view/editarpostagem.php");
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
	}

}

?>