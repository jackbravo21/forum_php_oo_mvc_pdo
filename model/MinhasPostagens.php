<?php

class MinhasPostagens extends Conexao

{

	public function mostrarPostagens()
	{

		$conecta = new Conexao();
		$conecta->conectar();

		//("SELECT * FROM portal ORDER BY idportal ASC ou DESC");

		$idcheck = $_SESSION["iduser"];

		$stmt = $conecta->conectar()->prepare("SELECT * FROM postagem WHERE idautor = :IDCHECK and valor = 1 ORDER BY idpost DESC");

		$stmt->bindParam(":IDCHECK", $idcheck);

		$conta_result = $stmt->rowCount();

		$stmt->execute();

		$lista = array();

		include_once("./view/minhaspostagens.php");

	}



}



?>