<?php

class Cadastrar

{

	public function Cadastro($nomecad, $apelidocad, $emailcad, $senhacad)
	{

		/////////////////////////////////////--- checagem ---////////////////////////////////////////

		$conecta_v = new Conexao();
		$conecta_v->conectar();

		$stmt_check = $conecta_v->conectar()->prepare("SELECT * FROM usuarios WHERE email = :EMAIL");

		$stmt_check->bindParam(":EMAIL", $emailcad);

		$stmt_check->execute();

		//contar resultados
		$contar_resultados = $stmt_check->rowCount();

		if($contar_resultados>0)
		{

		echo "<script>alert('Este usuário ja está cadastrado! Favor realizar Login!'); location.replace('index.php');</script>";

		}

		/////////////////////////////////////--- cadastro pos checagem ---////////////////////////////////////////

		elseif($contar_resultados==0)
		{

		///////////////////////////
		//Data:
		$data = date("d/m/Y");
		$data .= " as ";
		$data .= date("H:i");
		$datafinal = $data;
		///////////////////////////

		$login = $nomecad;
		$apelido = $apelidocad;
		$email = $emailcad;
		$senha = sha1($senhacad);
		$datacadastro = $datafinal;
		$edicao = "Nunca";
		$nivel = 1;

		$conecta = new Conexao();
		$conecta->conectar();

		//modo de escrever para a classe, variavel instanciada+funcao;
		$stmt = $conecta->conectar()->prepare("INSERT INTO usuarios ( nome, apelido, email, senha, datacadastro, dataedicao, nivel) VALUES( :LOGIN, :NICKNAME, :EMAIL, :SENHA, :DATA, :EDICAO, :NIVEL)");

		//$stmt->bindParam(":ID", $id);
		$stmt->bindParam(":LOGIN", $login);
		$stmt->bindParam(":NICKNAME", $apelido);
		$stmt->bindParam(":EMAIL", $email);
		$stmt->bindParam(":SENHA", $senha);
		$stmt->bindParam(":DATA", $datacadastro);
		$stmt->bindParam(":EDICAO", $edicao);
		$stmt->bindParam(":NIVEL", $nivel);

		$stmt->execute();

		echo "<script>alert('Cadastro realizado com sucesso! Faça o Login na área de Login!'); location.replace('index.php');</script>";

		////////////////////////////////////////////// Destruir variaveis //////////////////////////////////////////////////

/*
		unset($_POST["nome"]);
		unset($_POST["apelido"]);
		unset($_POST["email"]);
		unset($_POST["password"]);
*/		
		unset($login);
		unset($apelido);
		unset($email);
		unset($senha);
		unset($datacadastro);
		unset($edicao);
		unset($nivel);

		}

		//////////////////////////////////////////

	}


}


?>