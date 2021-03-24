<?php

class Contato extends Conexao

{

    protected $nome;
    protected $email;
    protected $mensagem;

    public function __construct($nome, $email, $mensagem)
    {
        $this->nome         =   $nome;
        $this->email        =   $email;
        $this->mensagem     =   $mensagem;
    }    
    
    public function Formulario()
    {
    //if (isset($_POST['BTEnvia'])){}

    //REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
    //====================================================
    $email_remetente = "seuemail@email.com.br"; // deve ser um email do dominio
    //====================================================
 
    //Configurações do email, ajustar conforme necessidade
    //====================================================
    $email_destinatario = "seuemail@email.com.br"; // qualquer email pode receber os dados
    $email_reply = "Jack";
    $email_assunto = "Contato formmail do forum Portifolio";
    //====================================================
  
    //Variaveis de POST ou Atributos do Objeto, Alterar somente se necessário
    //====================================================
    $nome       = $this->nome;
    $email      = $this->email;
    $mensagem   = $this->mensagem;
    //====================================================
 
    //Monta o Corpo da Mensagem
    //====================================================
    $email_conteudo = "Nome = $nome \n"; 
    $email_conteudo .= "Email = $email \n"; 
    $email_conteudo .= "Mensagem: <br>" . "$mensagem" . "\n";
    //====================================================
 
    //Seta os Headers (Alerar somente caso necessario)
    //====================================================
    $email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
    //====================================================
 
    //Enviando o email
    //====================================================
    if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers))
    {
        //echo "</b><botton>E-Mail enviado com sucesso!</botton></b>";
        echo "<script>alert('E-mail enviado com sucesso! Obrigado pelo contato!'); location.replace('index.php?ac=contato');</script>"; 
    }

    else
    {
        echo "<script>alert('Falha no envio! Tente novamente.');</script>";
    }

    //====================================================

    }   

}


?>