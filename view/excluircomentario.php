
<div class="container">

<tbody>

<br><br>

      <div class="panel panel-heading">
        <center><h3 style="color:green"><b>Excluir este comentário:</b></h3></center>
      </div>

<br>

<!-- postagem original -->

<div class="card gedf-card">
    <div class="card-header">

    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-between align-items-center">
            <div class="ml-2">
                <div class="h4 m-0 text-primary"><?php echo $apelido; ?></div>
        <div class="text-muted h7 mt-1"><i class="fa fa-clock-o"></i>
        <b>Publicado:</b> <?php echo $datapostagem; ?>.

<!-- verifica o autor -->
<?php if($edicao != "Nunca"){ ?>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <i class="fa fa-clock-o"></i>
        <b>Editado:</b> <?php echo $edicao; ?>

<?php } ?>
<!-- verifica o autor -->

        </div>
            </div>
        </div>

    </div>



    </div>
    <div class="card-body">

        <p class="card-text">
            <?php echo $resptexto; ?>
        </p>
    </div>
</div>
<br>

<!-- //postagem original -->

</div>

<div class="container container-fluid col-6">


<div class="panel panel-primary">

      <div class="panel-body" width="95%">

        
<form action="index.php" name="confirmexcluirpost" method="POST">
          <!-- {$alerta} -->

  <div class="form-group">

   <p><h2 class="text-center" style="color:green">Tem certeza que deseja excluir o seu comentário?</h2><h3 class="text-center" style="color:red"><b>
   <br>

   </b></h3></p>

    <input type="hidden" class="form-control" name="idcomentario" id="idcomentario" aria-describedby="id" value="<?php echo $idconsulta ?>">


    <input type="hidden" class="form-control" name="idpostagem" id="idpostagem" aria-describedby="idpostagem" value="<?php echo $idpostagem ?>">


<div class="container">
<input type="submit" name="BTNexcluircomentario" id="BTNexcluircomentario" value="Excluir comentário" class="btn btn-danger float-left">

<a href="index.php?postagem&id=<?php echo $idpostagem; ?>"><input type="button" name="btn_voltar" value="Cancelar/Voltar" class="btn btn-success float-right"></a>
</div>

        </form>
      </div>
    </div>
  </div>

</div>
</tbody>
