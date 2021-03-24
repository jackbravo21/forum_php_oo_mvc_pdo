
<br><br>
<center>
<img src="configs/img/postagem.png">
</center>



<br>

<div class="container">


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


<form action="index.php" method="POST" id="editaperfil_form"  style="display: block;">

<div class="form-group">
<input class="form-control mb-4" type="hidden" class="form-control" name="id" id="id" aria-describedby="id" value="<?php echo $_SESSION["iduser"]; ?>" placeholder="<?php echo $_SESSION["iduser"]; ?>">
<input class="form-control mb-4" type="hidden" class="form-control" name="apelido" id="apelido" aria-describedby="apelido" value="<?php echo $_SESSION["apelido"]; ?>" placeholder="<?php echo $_SESSION["apelido"]; ?>">    
<input class="form-control mb-4" type="text" class="form-control" name="titulo" id="titulo" aria-describedby="titulo" placeholder="Título que irá aparecer aparecer nas postagens" required>
<textarea name="message" class="form-control" id="message" rows="4" placeholder="Digite uma mensagem" required></textarea>

                                </div>

                            </div>
                        </div>
    <div class="btn-toolbar justify-content-between">
    <div class="btn-group">
    <button type="submit" class="btn btn-primary" name="BTNnovapostagem">Publicar</button>
    </div>
</form>                            
                                
                            </div>
                       
                    </div>
                </div>
                <!-- Post /////-->

<center>
<br><br>

<p><b>Observação:<br>
</b>No título você coloca a dúvida que ficará visivel, por exempo: "Dúvida sobre Laravel".</p>
</center>


</div>




