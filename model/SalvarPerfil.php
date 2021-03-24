<?php

class SalvarPerfil extends Conexao

{

	protected $perfilId;
	protected $perfilNome;
	protected $perfilEmail;
	protected $perfilApelido;
	protected $perfilConfSenha;
	protected $perfilNsenha;
	protected $perfilConfNsenha;
	protected $perfilDataEdicao;
	protected $senhabanco;

////////////////////////////////////////////////////////////

	public function __construct($id, $nome, $email, $apelido, $confsenha, $nsenha, $confnovasenha)
	{

		$this->perfilId 			= $id;
		$this->perfilNome 			= $nome;
		$this->perfilEmail			= $email;
		$this->perfilApelido		= $apelido;
		$this->perfilConfSenha		= $confsenha;
		$this->perfilNsenha			= $nsenha;
		$this->perfilConfNsenha		= $confnovasenha;
		$this->perfilDataEdicao		= date("d/m/Y") . " as " . date("H:i");

	}

////////////////////////////////////////////////////////////

	public function checarSenha()
	{

		$id = $this->perfilId;

		$conecta = new Conexao();
		$conecta->conectar();

		$stmt = $conecta->conectar()->prepare("SELECT senha FROM usuarios WHERE iduser = :ID;");

		$stmt->bindParam(":ID", $id);
		
		$stmt->execute();


		while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
		{

		$this->senhabanco = $lista['senha'];

		}

	}

////////////////////////////////////////////////////////////

	public function verificarSenhas()
	{

		$confsenha 			= $this->perfilConfSenha;
		$nsenha 			= $this->perfilNsenha;
		$confnovasenha 		= $this->perfilConfNsenha;
		$senhabanco			= $this->senhabanco;

		if($confsenha == $senhabanco)
		{

			if($nsenha != $confnovasenha)
			{
				echo "<script>alert('As novas senhas NÃO SÃO IGUAIS! Favor verificar e inserir as duas corretamente.'); location.replace('index.php?ac=editarperfil');</script>";
			}

			else
			{
				return TRUE;
			}

		}

		else
		{
			echo "<script>alert('A senha ANTIGA digitada está INCORRETA! Favor colocar a senha correta.'); location.replace('index.php?ac=editarperfil');</script>";
		}

	}


////////////////////////////////////////////////////////////

	public function verificarEmail()
	{

		$id 			=	$this->perfilId;
		$email 			=	$this->perfilEmail;

		$conecta = new Conexao();
		$conecta->conectar();

		$stmt = $conecta->conectar()->prepare("SELECT * FROM usuarios WHERE email = :EMAIL");

		$stmt->bindParam(":EMAIL", $email);

		$stmt->execute();

		$lista = array();

		while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
		{
		///////////////////// A PARTIR DAQUI CHECKAR EMAIL SE JA ESTA CADASTRADO.
		$lista['iduser'];
		$lista['email'];

		}

	}

////////////////////////////////////////////////////////////

	public function salvarDados()
	{

		$id 			=	$this->perfilId;
		$nome 			=	$this->perfilNome;
		$apelido 		=	$this->perfilApelido;
		$email 			=	$this->perfilEmail;
		$senha 			=	$this->perfilNsenha;
		$dataedicao 	=	$this->perfilDataEdicao;

		$conecta = new Conexao();
		$conecta->conectar();

		$stmt = $conecta->conectar()->prepare("UPDATE usuarios SET nome = :NOME, apelido = :APELIDO, email = :EMAIL, senha = :SENHA, dataedicao = :DATAEDICAO WHERE iduser = :ID");

		$stmt->bindParam(":ID", $id);
		$stmt->bindParam(":NOME", $nome);
		$stmt->bindParam(":APELIDO", $apelido);
		$stmt->bindParam(":EMAIL", $email);
		$stmt->bindParam(":SENHA", $senha);
		$stmt->bindParam(":DATAEDICAO", $dataedicao);

		$stmt->execute();

////////////////////////////////////////////////////////////

		$conecta->conectar();

		$stmtselect = $conecta->conectar()->prepare("SELECT * FROM usuarios WHERE email = :EMAIL AND senha = :SENHA");

		$stmtselect->bindParam(":EMAIL", $email);
		$stmtselect->bindParam(":SENHA", $senha);

		$stmtselect->execute();

		$lista = array();

		while($lista = $stmtselect->fetch(PDO::FETCH_ASSOC))
		{

		$_SESSION["iduser"] 	= $lista['iduser'];
		$_SESSION["nome"] 		= $lista['nome'];
		$_SESSION["apelido"] 	= $lista['apelido'];
		$_SESSION["nivel"] 		= $lista['nivel'];
		$_SESSION["email"] 		= $lista['email'];

		}

		echo "<script>alert('Dados alterados com sucesso!'); location.replace('index.php?ac=meuperfil');</script>";
	
	}

////////////////////////////////////////////////////////////

}

?>