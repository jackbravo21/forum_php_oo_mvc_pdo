<?php 

//error_reporting(E_ALL & ~E_NOTICE);

include_once("./controller/Controller.php");

session_start();

$usuario = new Controller();

////////////////////////////////////////////////////

if(isset($_SESSION["apelido"]))
	{

	include_once('./view/top.php');

		if(isset($_GET["ac"]) && $_GET["ac"]=="")
		{
			$usuario->exibirPostagens();
		}

		else if(isset($_GET["ac"]) && $_GET["ac"]=="postagens")
		{
			$usuario->exibirPostagens();
		}

		else if(isset($_GET["ac"]) && $_GET["ac"]=="meuperfil")
		{
			$usuario->meuPerfil();
		}

		else if(isset($_GET["ac"]) && $_GET["ac"]=="editarperfil")
		{
			$usuario->editarPerfil();
		}

		//ACTION Editar Perfil.
		if(isset($_POST["BTNeditarperfil"]))
		{
			$id 			= $_POST["idperfil"];
			$nome 			= $_POST["nomeperfil"];
			$email 			= $_POST["emailperfil"];
			$apelido 		= $_POST["apelidoperfil"];
			$confsenha 		= sha1($_POST["confsenhaentiga"]);
			$nsenha 		= sha1($_POST["novasenha"]);
			$confnovasenha 	= sha1($_POST["confnovasenha"]);

			$usuario->alterarDados($id, $nome, $email, $apelido, $confsenha, $nsenha, $confnovasenha);
		}

		else if(isset($_GET["ac"]) && $_GET["ac"]=="desativarperfil")
		{
			$usuario->desativarPerfil();
		}

		//Formulario desativar perfil.
		if(isset($_POST["BTNexcluirperfil"]))
		{
			$usuario->excluirPerfil();
		}

		else if(isset($_GET["ac"]) && $_GET["ac"]=="minhaspostagens")
		{
			$usuario->minhasPostagens();
		}		

		else if(isset($_GET["ac"]) && $_GET["ac"]=="novapostagem")
		{
			$usuario->novaPostagem();
		}	

		//Salvar Nova Postagem:
		if(isset($_POST["BTNnovapostagem"]))
		{
			$id 		=	$_POST["id"];
			$apelido	=	$_POST["apelido"];
			$titulo		=	$_POST["titulo"];
			$message	=	$_POST["message"];

			$usuario->salvarPostagem($id, $apelido, $titulo, $message);
		}	

		else if(isset($_GET["ac"]) && $_GET["ac"]=="publicarpost")
		{
			$nome = $_POST['nome'];
	    	$email = $_POST['email'];
	    	$mensagem = $_POST['mensagem'];

			$usuario->publicarPost();
		}	

		else if(isset($_GET["ac"]) && $_GET["ac"]=="contato")
		{
			$usuario->Formulario();
		}

		//ACTION Enviar Contato.
		else if(isset($_POST['BTEnvia']))
		{
			$nome = $_POST['nome'];
	    	$email = $_POST['email'];
	    	$mensagem = $_POST['mensagem'];
			
			$usuario->Contato($nome, $email, $mensagem);
		}

		else if(isset($_GET["ac"]) && $_GET["ac"]=="buscarpostagens")
		{
			$buscar = $_POST["txtbuscar"];
			$usuario->Buscar($buscar);
		}

		else if(isset($_GET["ac"]) && $_GET["ac"]=="logout")
		{
			$usuario->Logout();
		}

		else if(isset($_GET["postagem"]) &&(isset($_GET["id"])))
		{
			$id = $_GET["id"];
			$usuario->Postagem($id);
		}	

		if(isset($_POST["BTNcomentario"]))
		{
			$id 		= $_POST["idpost"];
			$resposta 	= $_POST["resposta"];
			$usuario->publicarComentario($id, $resposta);
		}

		else if(isset($_GET["editar"]) && (isset($_GET["id"])))
		{
			$idpost = $_GET["id"];
			$usuario->editarPostagem($idpost);
		}

		else if(isset($_GET["excluir"]) && (isset($_GET["id"])))	
		{
			$id = $_GET["id"];
			$usuario->confirmarExcluirPost($id);
		}

		//Editar Postagem (POST)
		else if(isset($_POST["BTNeditarpostagem"]))
		{
			$id 		= $_POST["idpost"];
			$titulo 	= $_POST["titulo"];
			$mensagem 	= $_POST["mensagem"];
			$usuario->salvarEdicaoPost($id, $titulo, $mensagem);
		}

		//Excluir Postagem (POST)
		else if(isset($_POST["BTNexcluirpostagem"]))
		{
			$id 		= $_POST["idpost"];
			$usuario->excluirPostagem($id);
		}

		else if(isset($_GET["editarcomentario"]) && (isset($_GET["id"])))
		{
			$id = $_GET["id"];
			$postagem = $_GET["post"];
			$usuario->editarComentario($id, $postagem);
		}

		//Editar Comentario (POST)
		else if(isset($_POST["BTNeditarcomentario"]))
		{
			$id 			= $_POST["idpost"];
			$idcomentario 	= $_POST["idcomentario"];
			$mensagem 		= $_POST["mensagem"];
			$usuario->salvarEdicaoComentario($id, $idcomentario, $mensagem);
		}

		else if(isset($_GET["excluircomentario"]) && (isset($_GET["id"])))	
		{
			$id 			= $_GET["id"];
			$idpostagem		= $_GET["post"];
			$usuario->confirmarExcluirComentario($id, $idpostagem);
		}

		//Excluir Comentario (POST)
		else if(isset($_POST["BTNexcluircomentario"]))
		{
			$idcomentario 		= $_POST["idcomentario"];
			$idpostagem 		= $_POST["idpostagem"];
			$usuario->salvarExclusaoComentario($idcomentario, $idpostagem);
		}

		if(empty($_GET) && empty($_POST))
		{
			$usuario->exibirPostagens();
		}

	include_once('./view/bot.php');

	}

////////////////////////////////////////////////////

else
{

//Logar:

if(isset($_POST["BTNlogin"]))
{
	if(isset($_POST["email"]) && isset($_POST["password"]))
	{
	$email = $_POST["email"];
	$password = sha1($_POST["password"]);

	$usuario->Logar($email, $password);
	}
	else
	{
	echo "<script>alert('Erro ao logar!'); location.replace('index.php');</script>";
	}
}

////////////////////////////////////////////////////

//Cadastrar:

if(isset($_POST["BTNregister"]))
{
	if($_POST["senha"] == $_POST["confirmarsenha"])
	{

	$nomecadastro 		=	$_POST["nome"];
	$apelidoc 			=	$_POST["apelido"];
	$emailcad 			= 	$_POST["emailcadastro"];
	$senhacad 			= 	sha1($_POST["senha"]);
	$confirmarsenhacad 	=	sha1($_POST["confirmarsenha"]);

	$usuario->Cadastrar($nomecadastro, $apelidoc, $emailcad, $senhacad);	

	}
	else
	{
	echo "<script>alert('As senhas não coicidem! Tente novamente.'); location.replace('index.php');</script>";
	}
}

////////////////////////////////////////////////////
	
	//Padrão caso nao haja nenhuma das alternativas.
	$usuario->Login();

}

?>