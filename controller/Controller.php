<?php

include_once("model/Conexao.php");

class Controller
{

	public function exibirPostagens()
	{
		include_once("model/Postagens.php");

		$acesso = new Postagens();
		$acesso->exibirPostagens();
	}

	public function Postagem($id)
	{
		include_once("model/Postagem.php");
		$acesso = new Postagem($id);
		$acesso->exibirPost();
	}

	public function novaPostagem()
	{		
		include_once("view/novapostagem.php");	
	}

	public function minhasPostagens()
	{
		include_once("model/MinhasPostagens.php");

		$acesso = new MinhasPostagens();
		$acesso->mostrarPostagens();
	}

	public function salvarPostagem($id, $apelido, $titulo, $message)
	{
		include_once("model/SalvarPostagem.php");
		$postagem = new SalvarPostagem($id, $apelido, $titulo, $message);
		$postagem->salvarPost();

	}

	public function editarPostagem($id)
	{
		include_once("model/Postagem.php");
		$postagem = new Postagem($id);
		$postagem->editarPost();
	}

	public function confirmarExcluirPost($id)
	{
		include_once("model/Postagens.php");
		$postagem = new Postagens();
		$postagem->capturarDados($id);
		$postagem->confirmarExclusaoPost();
	}

	public function excluirPostagem($id)
	{
		include_once("model/Postagens.php");
		$postagem = new Postagens();
		$postagem->excluirPostagem($id);
	}

	public function salvarEdicaoPost($id, $titulo, $mensagem)
	{
		include_once("model/SalvarPostagem.php");
		$postagem = new SalvarPostagem($id, $apelido = null, $titulo, $mensagem);
		$postagem->salvarEdicao();
		unset($postagem);
	}

	public function publicarComentario($id, $resposta)
	{
		include_once("model/Comentario.php");
		$postagem = new Comentario();
		$postagem->Set($id, $resposta);
		$postagem->publicarComentario();
		unset($postagem);
	}

	public function editarComentario($id, $postagem)
	{
		include_once("model/Comentario.php");
		$postagem = new Comentario();
		$postagem->editComent($id, $postagem);
	}

	public function salvarEdicaoComentario($id, $idcomentario, $mensagem)
	{
		include_once("model/Comentario.php");
		$comentario = new Comentario();
		$comentario->salvarComentario($id, $idcomentario, $mensagem);
	}

	public function confirmarExcluirComentario($id, $postagem)
	{
		include_once("model/Comentario.php");
		$comentario = new Comentario();
		$comentario->verificarDadosExclusao($id, $postagem);
		$comentario->confirmarExclusaoComentario($id, $postagem);
	}

	public function salvarExclusaoComentario($idcomentario, $idpostagem)
	{
		include_once("model/Comentario.php");
		$comentario = new Comentario();
		$comentario->excluirComentario($idcomentario, $idpostagem);
	}

	public function Login()
	{
		include_once("view/login.php");
	}

	public function Logout()
	{
		session_destroy();
		echo "<script>alert('Sessão Finalizada!'); location.replace('index.php?ac=login');</script>";
	}

	public function Logar($email, $password)
	{

		include_once("model/Logar.php");

		$userlogin = new Logar($email, $password);
		$userlogin->CheckLogin();

	}

	public function Cadastrar($nomecad, $apelidocad, $emailcad, $senhacad)
	{
		
		include_once("model/Cadastrar.php");

		$cadastro = new Cadastrar();
		$cadastro->Cadastro($nomecad, $apelidocad, $emailcad, $senhacad);

	}

	public function meuPerfil()
	{

		include_once("model/Perfil.php");

		$perfil = new Perfil();
		$perfil->mostrarDados();

	}

	public function editarPerfil()
	{

		include_once("model/Perfil.php");

		$perfil = new Perfil();
		$perfil->editarDados();

	}

	public function desativarPerfil()
	{

		include_once("model/Perfil.php");

		$perfil = new Perfil();
		$perfil->confirmarExcluir();

	}

	public function excluirPerfil()
	{
		include_once("model/Perfil.php");

		$perfil = new Perfil();
		$perfil->excluirDados();
	}

	public function alterarDados($id, $nome, $email, $apelido, $confsenha, $nsenha, $confnovasenha)
	{
		include_once("model/SalvarPerfil.php");

		$perfil = new SalvarPerfil($id, $nome, $email, $apelido, $confsenha, $nsenha, $confnovasenha);

		$perfil->checarSenha();

		$perfil->verificarSenhas();

		//$perfil->verificarEmail();

		if($perfil->verificarSenhas() == True)
		{
			$perfil->salvarDados();
		}
	}

	public function Contato($nome, $email, $mensagem)
	{
		include_once("model/Contato.php");	
		$contato = new Contato($nome, $email, $mensagem);
		$contato->Formulario();

		include_once("./view/contato.php");
	}

	public function Formulario()
	{
		include_once("./view/contato.php");
	}

	//Botao search:
	public function Buscar($buscar)
	{
		include_once("model/Postagens.php");
		$acesso = new Postagens();
		$acesso->buscarPostagem($buscar);
	}

}

?>