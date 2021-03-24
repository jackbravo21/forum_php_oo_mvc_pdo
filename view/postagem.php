
<br><br>
<center>
<img src="configs/img/postagem.png">
</center>

<br>

<div class="container">


<!-- Post ////////////////////////////////////////////////////////////////-->

<?php while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
{ 
?>

	<div class="card gedf-card">
	    <div class="card-header">

	    <div class="d-flex justify-content-between align-items-center">
	        <div class="d-flex justify-content-between align-items-center">
	            <div class="ml-2">
	                <div class="h4 m-0 text-primary"><?php echo $lista['nickautor']; ?></div>
	        <div class="text-muted h7 mt-1"><i class="fa fa-clock-o"></i>
	        <b>Publicado:</b> <?php echo $lista['data']; ?>.

	<!-- verifica o autor -->
	<?php if(($lista['postedicao']) !== "Nunca")
	{ ?>
	        &nbsp;&nbsp;&nbsp;&nbsp;
	        <i class="fa fa-clock-o"></i>
	        <b>Editado:</b> <?php echo $lista['postedicao']; ?>.
	<?php 
	} ?>
	<!-- verifica o autor -->

	        </div>
	            </div>
	        </div>
	        <div>

	<?php if(($lista['idautor']) == ($_SESSION["iduser"]) || (($_SESSION["nivel"]) == 3 ))
	{ ?>
	            <div class="dropdown">
	                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                    <i class="fa fa-ellipsis-h"></i>
	                </button>
	                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
	                    <div class="h6 dropdown-header">Opções:</div>

    <?php if(($lista['idautor']) == ($_SESSION["iduser"]))
{ 
?>
	<a class="dropdown-item" href="./index.php?editar&id=<?php echo $lista['idpost']; ?>" style="color:blue">Editar</a>
<?php
} 
?>
	<a class="dropdown-item" href="./index.php?excluir&id=<?php echo $lista['idpost']; ?>" style="color:red">Excluir</a>
	                </div>
	            </div>
	<?php 
	} ?>

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


<?php
}  
?>


<br><br>

<!-- Post ////////////////////////////////////////////////////////////////-->

<?php 

$idrespostas = $_GET["id"];

$conecta = new Conexao();
$conecta->conectar();

$stmtr = $conecta->conectar()->prepare("SELECT * FROM respostas WHERE idprincipal = :IDR AND valor = 1");

$stmtr->bindParam(":IDR", $idrespostas);

$stmtr->execute();

$listar = array();

$nunca = "Nunca";

////////////////////////////////////////////////////

while($listar = $stmtr->fetch(PDO::FETCH_ASSOC))
{
?>

<div class="card gedf-card">
    <div class="card-header">

    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-between align-items-center">
            <div class="ml-2">
                <div class="h4 m-0 text-primary"><?php echo $listar['apelido']; ?></div>
        <div class="text-muted h7 mt-1"><i class="fa fa-clock-o"></i>
        <b>Publicado:</b> <?php echo $listar['datapost']; ?>.

<!-- verifica o autor -->
<?php if(($listar['respedicao']) !== $nunca){ ?>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <i class="fa fa-clock-o"></i>
        <b>Editado:</b> <?php echo $listar['respedicao']; ?>.
<?php } ?>
<!-- verifica o autor -->

        </div>
            </div>
        </div>
        <div>

<?php if(($listar['iduser']) == ($_SESSION["iduser"]))
{ 
?>
            <div class="dropdown">
                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                    <div class="h6 dropdown-header">Opções:</div>
                    <a class="dropdown-item" 
href="./index.php?editarcomentario&id=<?php echo $listar['idrespostas']; ?>&post=<?php echo $idconsulta; ?>" style="color:blue">Editar</a>
                    
                    <a class="dropdown-item" 
href="./index.php?excluircomentario&id=<?php echo $listar['idrespostas']; ?>&post=<?php echo $idconsulta; ?>" style="color:red">Excluir</a>

                </div>
            </div>

<?php 
}
?>

        </div>
    </div>



    </div>
    <div class="card-body">


        <p class="card-text">
            <?php echo $listar['restexto']; ?>
        </p>
    </div>
</div>
<br>

<?php
}
?>


<br><br>


<!--- \\\\\\\Post-->

<form name="postagem" id="postagem" action="./index.php<?php echo $lista['idpost']; ?>" method="POST" role="form">

<input class="form-control mb-4" type="hidden" class="form-control" name="idpost" id="idpost" aria-describedby="titulo" placeholder="Título que irá aparecer aparecer nas postagens" value="<?php echo $_GET["id"]; ?>" required>

<div class="card gedf-card">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
    <a class="nav-link active" name="posts-tab" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">
                Postagem
                </a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="form-group">
            <label class="sr-only" for="message">post</label>
    <textarea name="resposta" id="resposta" rows="3" type="text" class="form-control" placeholder="Digite uma mensagem" required></textarea>
            </div>
        </div>
        <div class="btn-toolbar justify-content-between">
            <div class="btn-group">
                <button type="submit" class="btn btn-primary" name="BTNcomentario" id="BTNcomentario">Publicar</button>
            </div>
</form> 
        </div>
    </div>
</div>


<!-- Post ////////////////////////////////////////////////////////////////-->


</div>