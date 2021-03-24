<?php

class Logar extends Conexao
{

	protected $email;
	protected $senha;

	public function __construct($email, $senha)
	{
		$this->email = $email;
		$this->senha = $senha;
	}

	public function CheckLogin()
	{
		$email = $this->email;
		$senha = $this->senha;
		
		// BLOCO 1: //

		$conecta = new Conexao();
		$conecta->conectar();

		$stmt = $conecta->conectar()->prepare("SELECT * FROM usuarios WHERE email = :EMAIL AND senha = :SENHA");

		$stmt->bindParam(":EMAIL", $email);
		$stmt->bindParam(":SENHA", $senha);

		$stmt->execute();

		////////////////////////////

		// BLOCO 2: //

		$conta_resultados = $stmt->rowCount();

		if($conta_resultados>0)
		{

		while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
		{

		$_SESSION["iduser"] 	= $lista['iduser'];
		$_SESSION["nome"] 		= $lista['nome'];
		$_SESSION["apelido"] 	= $lista['apelido'];
		$_SESSION["nivel"] 		= $lista['nivel'];
		$_SESSION["email"] 		= $lista['email'];

		$id 		= $_SESSION["iduser"];
		$nome 		= $_SESSION["nome"];
		$usuario 	= $_SESSION["apelido"];
		$nivel 		= $_SESSION["nivel"];

		$verificar = $lista['nivel'];

		//verifica se usuario esta desabilitado;
		if($verificar == 0)
		{

		echo "<script>alert('O usuário \"".$usuario. "\" foi desativado!'); location.replace('index.php');</script>";

		session_destroy();

		}//fim do verificar;

		else
		{

		echo "<script>alert('Usuário logado. Bem vindo usuário \"".$usuario. "\"!'); location.replace('index.php?ac=postagens');</script>";

		}

		}//final while;
		}//final if>0;

		////////////////////////////

		// BLOCO 3: //

		elseif($conta_resultados==0)
		{
		
		echo "<script>alert('Usuário ou senha incorretos! Favor realizar Login novamente ou cadastrar-se!'); location.replace('index.php');</script>";
		
		}

	}

}

?>