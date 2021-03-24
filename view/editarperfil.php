

<div class="container">

<tbody>
<br><br>
  
<?php while($lista = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

<ul>
<form action="index.php" method="POST" id="editaperfil_form"  style="display: block;">
  <div class="form-group">

  <label for="inputtitulo"><h1 style="color:green"><b>Editar dados:</b></h1></label>

    <hr>

    <input type="hidden" class="form-control" id="idperfil" name="idperfil" placeholder="" value="<?php echo $lista['iduser']; ?>" required>
    </p>

    <p style="color:green"><b>Nome completo: &nbsp;&nbsp;&nbsp;&nbsp;</b>
    <input type="text" class="form-control" id="nomeperfil" name="nomeperfil" placeholder="" value="<?php echo $lista['nome']; ?>" required>
    </p>

    
    <p style="color:green"><b>Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
    <input type="email" class="form-control" id="emailperfil" name="emailperfil" placeholder="" value="<?php echo $lista['email']; ?>" required>
    </p>

    
    <p style="color:green"><b>Apelido no fórum: &nbsp;</b>
    <input type="text" class="form-control" id="apelidoperfil" name="apelidoperfil" placeholder="" value="<?php echo $lista['apelido']; ?>" required>
    </p>

<!--
    <p>
    <input type="hidden" class="form-control" id="senhaantiga" name="senhaantiga" placeholder="" value="<?php echo $lista['senha']; ?>" required>
    </p>
-->

    <p style="color:green"><b>Senha antiga: &nbsp;</b>
    <input type="password" class="form-control" id="confsenhaentiga" name="confsenhaentiga" placeholder="Senha antiga" required>
    </p>

    <p style="color:green"><b>Nova senha: &nbsp;</b>
    <input type="password" class="form-control" id="novasenha" name="novasenha" placeholder="Nova Senha" required>
    </p>


    <p style="color:green"><b>Confirmar nova senha: &nbsp;</b>
    <input type="password" class="form-control" id="confnovasenha" name="confnovasenha" placeholder="Confirmar nova senha" required>
    </p>
    <hr>

<a href="index.php?ac=meuperfil"><button type="button" class="btn btn-outline-info">Voltar</button>
</a>
  <button type="submit" class="btn btn-outline-info float-right" name="BTNeditarperfil">Enviar/Editar dados</button>
</form>

<br><br><br>
<center>
<p><b>Observação: &nbsp;&nbsp;</b>Se você não quiser modificar a senha (apenas os dados), coloque a mesma senha nos campos de senha.</p>
</center>

</ul>

<?php 
}
?>


<br><br><br>



</tbody>

</div>