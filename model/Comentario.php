<?php

class Comentario extends Conexao
{
	protected $idpostagem;
	protected $idcomentario;
	protected $resposta;
	protected $iduser;
	protected $apelido;
	protected $data;
	protected $datapost;
	protected $edicao;
	protected $valor;
	protected $idoriginal;

	public function Set($idpostagem, $resposta)
	{
		$this->idpostagem 	= $idpostagem;
		$this->resposta 	= $resposta;
		$this->iduser 		= $_SESSION["iduser"];
		$this->apelido 		= $_SESSION["apelido"];
		$this->data 		= date("d/m/Y") . " as " . date("H:i");
		$this->edicao 		= "Nunca";
		$this->valor 		= 1;
	}

	public function publicarComentario()
	{

		$idpostagem		= $this->idpostagem;
		$resposta 		= $this->resposta;
		$iduser 		= $this->iduser;
		$apelido 		= $this->apelido;
		$data 			= $this->data;
		$edicao 		= $this->edicao;
		$valor 			= $this->valor;

		$conecta = new Conexao();
		$conecta->conectar();

		try {
			
		$stmt = $conecta->conectar()->prepare("INSERT INTO respostas ( idprincipal, iduser, apelido, restexto, datapost, respedicao, valor) VALUES( :IDPRINCIPAL, :IDUSER, :APELIDO, :RESPOSTA, :DATA, :RDICAO, :VALOR)");

		//$stmt->bindParam(":ID", $id);
		$stmt->bindParam(":IDPRINCIPAL", $idpostagem);
		$stmt->bindParam(":IDUSER", $iduser);
		$stmt->bindParam(":APELIDO", $apelido);
		$stmt->bindParam(":RESPOSTA", $resposta);
		$stmt->bindParam(":DATA", $data);
		$stmt->bindParam(":RDICAO", $edicao);
		$stmt->bindParam(":VALOR", $valor);

		$stmt->execute();

		echo "<script>location.replace('./index.php?postagem&id=$idpostagem');</script>";


		} catch (Exception $e) {

		echo $e;
			
		}
	}

	public function editComent($idconsulta, $postagem)
	{

		$conecta = new Conexao();
		$conecta->conectar();

		$stmt = $conecta->conectar()->prepare("SELECT * FROM respostas WHERE idrespostas = :ID");

		$stmt->bindParam(":ID", $idconsulta);

		$stmt->execute();

		$lista = array();

		while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			if(($lista['iduser']) == ($_SESSION["iduser"]))
			{
				include_once("./view/editarcomentario.php");
			}
			else
			{
				?>
				<br><center><h1 style="color:red">
				Acesso não autorizado! Você não é o autor do comentário!
				</h1></center><br>
				<?php
			}
		}
	}

	public function salvarComentario($idpostagem, $idcomentario, $mensagem)
	{
		$dataedicao	= date("d/m/Y") . " as " . date("H:i");

		$conecta = new Conexao();
		$conecta->conectar();   
		    
		$stmt = $conecta->conectar()->prepare("UPDATE respostas SET restexto = :MESSAGE, respedicao = :DATA WHERE idrespostas = :IDCOMENT");

		$stmt->bindParam(":IDCOMENT", $idcomentario);
		$stmt->bindParam(":MESSAGE", $mensagem);
		$stmt->bindParam(":DATA", $dataedicao);

		$stmt->execute();

		echo "<script>location.replace('index.php?postagem&id=$idpostagem');</script>";
	}

	public function verificarDadosExclusao($idconsulta, $idpostagem)
	{

		$conecta = new Conexao();
		$conecta->conectar();

		$stmt = $conecta->conectar()->prepare("SELECT * FROM respostas WHERE idrespostas = :ID");

		$stmt->bindParam(":ID", $idconsulta);

		$stmt->execute();

		$lista = array();

		while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
		{
		$this->idcomentario	= $lista['idrespostas'];
		$this->idpostagem 	= $lista['idprincipal'];
		$this->idoriginal	= $lista['iduser'];
		$this->iduser 		= $_SESSION["iduser"];
		$this->apelido 		= $lista['apelido'];
		$this->respostas 	= $lista['restexto'];
		$this->valor 		= $lista['valor'];
		$this->datapost		= $lista['datapost'];
		$this->edicao 		= $lista['respedicao'];
		}
	}

	public function confirmarExclusaoComentario($idconsulta, $idpostagem)
	{
		$idcomentario		= $this->idcomentario;
		$idusuariobanco		= $this->iduser;
		$apelido 			= $this->apelido;
		$idsessao			= $_SESSION["iduser"];
		$nivelsessao		= $_SESSION["nivel"];
		$datapostagem		= $this->datapost;
		$edicao 			= $this->edicao;
		$resptexto			= $this->respostas;

		if($idusuariobanco == $idsessao || $nivelsessao > 1)
		{
			include_once("./view/excluircomentario.php");
		}

		else
		{
			?>
			<br><center><h1 style="color:red">
			Acesso não autorizado! Você não é o autor deste comentario!
			</h1></center><br>
			<?php
		}
	}

	public function excluirComentario($idcomentario, $idpostagem)
	{

		$dataedit = date("d/m/Y") . " as " . date("H:i");
		$valor = 0;

		try {

		$conecta = new Conexao();
		$conecta->conectar();	
			
		$stmt = $conecta->conectar()->prepare("UPDATE respostas SET valor = :VALOR, respedicao = :DATA WHERE idrespostas = :ID");

		$stmt->bindParam(":ID", $idcomentario);
		$stmt->bindParam(":DATA", $dataedit);
		$stmt->bindParam(":VALOR", $valor);

		$stmt->execute();

		echo "<script>alert('Comentario Excuido!'); location.replace('index.php?postagem&id=$idpostagem');</script>";

		} 

		catch (Exception $e) 
		{
			echo $e;
		}
	
	}

}

?>