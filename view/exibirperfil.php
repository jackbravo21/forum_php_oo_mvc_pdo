
<div class="container">

<tbody>
<br><br>
  

<?php while($lista = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

<ul>
	
	<h1 style="color:green"><b>Dados do Perfil:</b></h1>
	<hr>
	<p style="color:green"><b>Membro des de: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
  <?php echo $lista['datacadastro']; ?></p>
	<hr>
  	<p style="color:green"><b>Última edição: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
    <?php echo $lista['dataedicao']; ?></p>
  	<hr>
  	<p style="color:green"><b>Nome completo: &nbsp;&nbsp;&nbsp;&nbsp;</b>
    <?php echo $lista['nome']; ?></p>
  	<hr>
 	<p style="color:green"><b>Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
  <?php echo $lista['email']; ?></p>
 	<hr>
  	<p style="color:green"><b>Apelido no fórum: &nbsp;</b>
    <?php echo $lista['apelido']; ?></p>
  	<hr>

    <br>
  
  <!--  
  <a href="./editarperfil.php?id=<?php /*echo $lista['iduser'];*/?>" class="float-left"><button type="button" class="btn btn-outline-info">Editar Dados</button></a>
  -->

  <a href="index.php?ac=editarperfil" class="float-left"><button type="button" class="btn btn-outline-info">Editar dados</button></a>

  <a href="index.php?ac=desativarperfil" class="float-right"><button type="button" class="btn btn-outline-danger">Desativar usuário</button></a>


<!--  
  <a href="./excluirperfil.php?id=<?php /*echo base64_encode($lista['iduser']);*/?>" class="float-right"><button type="button" class="btn btn-outline-danger">Excluir Cadastro</button></a>
-->  

</ul>

<?php 
}
?>


<br><br><br>

</tbody>

</div>
