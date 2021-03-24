
<br><br>

<div class="container">

<!-- postagem original -->


<div class="card gedf-card">
    <div class="card-header">

    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-between align-items-center">
            <div class="ml-2">
                <div class="h4 m-0 text-primary"><?php echo $lista['nickautor']; ?></div>
        <div class="text-muted h7 mt-1"><i class="fa fa-clock-o"></i>
        <b>Publicado:</b> <?php echo $lista['data']; ?>

<!-- verifica o autor -->
<?php if(($lista['postedicao']) !== $nunca){ ?>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <i class="fa fa-clock-o"></i>
        <b>Editado:</b> <?php echo $lista['postedicao']; ?>
<?php } ?>
<!-- verifica o autor -->

        </div>
            </div>
        </div>

    </div>

    </div>
    <div class="card-body">

            <h5 class="card-title text-primary">
                <?php echo $lista['titulo']; ?>
            </h5>

        <p class="card-text">
            <?php echo $lista['texto']; ?>
        </p>
    </div>
</div>
<br><br>

<!-- //postagem original -->


<!-- Form de envio -->


                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">
                                Postagem
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">


                    <form action="./index.php" method="POST" id="editaperfil_form"  style="display: block;">

                    <div class="form-group">

                    <input class="form-control mb-4" type="hidden" class="form-control" name="idpost" id="idpost" aria-describedby="titulo" placeholder="Título que irá aparecer aparecer nas postagens" value="<?php echo $_GET["id"]; ?>" required>

                    <input class="form-control mb-4" value="<?php echo $lista['titulo'];?>" type="text" class="form-control" name="titulo" id="titulo" aria-describedby="titulo" placeholder="Título que irá aparecer aparecer nas postagens" required>

                    <textarea class="form-control" name="mensagem" id="mensagem" value="<?php echo $lista['texto'];?>" rows="4" placeholder="Digite uma mensagem" required></textarea>

                    </div>

                    </div>
                    </div>
                        <div class="btn-toolbar justify-content-between">
                        <div class="btn-group">
                        <button type="submit" class="btn btn-primary" name="BTNeditarpostagem" id="BTNeditarpostagem">Publicar</button>



                        </div>
                        <a href="./index.php?ac=postagens"><button type="button" class="btn btn-danger float-right">Calcelar</button>
                    	</a>
                        </div>
                    </form>                            
                                
                            
                       
                    </div>
                </div>
                <!-- Post /////-->

</div>






<!-- Form de envio -->


</div> <!-- //Container -->




