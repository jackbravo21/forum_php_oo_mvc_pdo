
<div class="container">

<tbody>




<br><br><br>




</div>




<div class="container container-fluid col-6">


<div class="panel panel-primary">
      <div class="panel panel-heading">
        <center><h3 style="color:green"><b>Excluir Cadastro:</b></h3></center>
      </div>
      <div class="panel-body" width="95%">

<?php while($lista = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
        
<form action="index.php" name="excluirusuario" method="POST">
          <!-- {$alerta} -->

  <div class="form-group">

   <p><h2 class="text-center" style="color:green">Deseja realmente desativar seu Cadastro? </h2><h3 class="text-center" style="color:red">
   <br>
   <b>
   <p><?php echo $lista['email']; ?></p>
   
   <p><?php echo $lista['nome']; ?></p>
     
   </b></h3></p>

    <input type="hidden" class="form-control" name="idportal" id="idportal" aria-describedby="emailHelp" value="<?php echo $lista['iduser']; ?>">

<br>

<div class="container">
<input type="submit" name="BTNexcluirperfil" id="BTNexcluirperfil" value="Desativar Cadastro" class="btn btn-danger float-left">

<a href="index.php?ac=meuperfil"><input type="button" name="btn_voltar" value="Cancelar/Voltar" class="btn btn-success float-right"></a>
</div>

        </form>
      </div>
    </div>
  </div>

<?php 
}
?>

</div>


</tbody>
