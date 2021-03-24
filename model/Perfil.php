<?php

class Perfil extends Conexao

{

  protected $iduser; 
  protected $email;

  public function __construct()
  {

    $this->iduser   = $_SESSION["iduser"]; 
    $this->email    = $_SESSION["email"];

  }

  public function mostrarDados()
  {

    $id = $this->iduser;

    $conecta = new Conexao();
    $conecta->conectar();

    $stmt = $conecta->conectar()->prepare("SELECT * FROM usuarios WHERE iduser = :ID");

    $stmt->bindParam(":ID", $id);

    $stmt->execute();

    $lista = array();   

    include_once("./view/exibirperfil.php");

  }

  public function editarDados()
  {

    $id = $this->iduser;

    $conecta = new Conexao();
    $conecta->conectar();

    $stmt = $conecta->conectar()->prepare("SELECT * FROM usuarios WHERE iduser = :ID");

    $stmt->bindParam(":ID", $id);

    $stmt->execute();

    $lista = array();

    include_once("./view/editarperfil.php");    

  }

  public function confirmarExcluir()
  {

    $id = $this->iduser;

    $conecta = new Conexao();
    $conecta->conectar();

    $stmt = $conecta->conectar()->prepare("SELECT * FROM usuarios WHERE iduser = :ID");

    $stmt->bindParam(":ID", $id);

    $stmt->execute();

    $lista = array();

    include_once("./view/excluirperfil.php");

  }

  public function excluirDados()
  {

    $id = $_SESSION["iduser"];
    $nivel = 0;

    $conecta = new Conexao();
    $conecta->conectar();

    $stmt = $conecta->conectar()->prepare("UPDATE usuarios SET nivel = :NIVEL WHERE iduser = :ID");

    $stmt->bindParam(":ID", $id);
    $stmt->bindParam(":NIVEL", $nivel);

    $stmt->execute();

    echo "<script>alert('O usuário \"".$_SESSION["apelido"]. "\" foi desativado!'); location.replace('index.php');</script>";

    session_destroy();

  }


}

?>