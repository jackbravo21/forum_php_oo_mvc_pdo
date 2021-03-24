

<tbody>
<br><br>
<center>
<img src="configs/img/postagens.png">
</center>

<div class="container col-md-11 col-lg-10 col-sm-11">
	<div>
		<a href="./novapostagem.php" class="btn btn-outline-info mt-4 mb-2">Nova Postagem</a>
	</div>

<br>

	<table class="table">
	  <thead class="thead table-info">
	    <tr>
	      <th scope="col">Pergunta:</th>
	      <th scope="col">Autor:</th>
	      <th scope="col">Postado:</th>
	      <th scope="col"><center>Opções:</center></th>
	    </tr>


	  </thead>

	<?php while($lista = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

		<tr>
	      	<td scope="col">
	      		
	      		<a href="./postagem.php?postagem&id=<?php echo $lista['idpost']; ?>" style="font-size:18px; color:green">
	      		<?php echo $lista['titulo']; ?></a>
	      		
	      	</td>
	     	<td scope="col" style="font-size:18px; color:green">
	     		<b><?php echo $lista['nickautor']; ?></b>
	     	</td>
	     	
	     	<td scope="col" style="font-size:15px; color:green">
	     		<?php echo $lista['data']; ?>
	     	</td>

<td>


<?php if(($lista['idautor']) == ($_SESSION["iduser"])){ ?>

<center>
<div class="dropdown">

   	<button class="btn btn-link dropdown-toggle border" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   		<i class="fa fa-ellipsis-h" style="color:green"></i>
   	</button>
	
	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
    	<div class="h6 dropdown-header">Opções:</div>

    		<a class="dropdown-item" 
    		href="./editarpostagem.php?editar&id=<?php echo $lista['idpost']; ?>" 
    		style="color:blue">Editar</a>

    		<a class="dropdown-item" 
    		href="./excluirpostagem.php?excluir&id=<?php echo $lista['idpost']; ?>" 
    		style="color:red">Excluir</a>
    	</div>
    </div>

</center>

<?php } } //while ?>

  </div>
</div>
</center>



</td>

</tr>

	
		</table>   
	  </tbody>


</div>
