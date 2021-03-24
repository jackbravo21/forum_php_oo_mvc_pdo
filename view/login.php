<!DOCTYPE html>
<html lang="pt-br">
<head>


	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="estyle.css">
	<meta charset="utf-8">



	<!-- Favicon -->
	<link rel="icon" type="imagem/png" href="configs/img/favicon/favicon-16x16.png">
	<link rel="icon" type="image/png" sizes="16x16" href="configs/img/templates/favicon/favicon-16x16.png">
	<link rel="icon" type="imagem/png" href="configs/img/templates/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="configs/img/templates/favicon/favicon-32x32.png">
	<link rel="icon" type="imagem/png" href="configs/img/templates/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="configs/img/templates/favicon/favicon-96x96.png">



      <!-- Font Awesome -->
    <link rel="stylesheet" href="configs/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="configs/font-awesome_baixado/css/fontawesome.css">  
    <link rel="stylesheet" href="configs/font-awesome_baixado/css/solid.css">
 

    <!-- Font Awesome FUNCIONAL -->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">  



</head>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="configs/login/estilo.css" rel="stylesheet" id="bootstrap-css">
<script src="configs/login/script.js"></script>


	&nbsp; &nbsp;
  	<img src="configs/img/letreirotiny.png">
  	&nbsp; &nbsp;
    <img src="configs/img/forumtiny.png">


<br><br>
<center>
    <img src="configs/img/logar.png">
<br><br>
</center>




<!------ Include the above in your HEAD tag ---------->

<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Registrar</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">

								<form id="login-form" action="index.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email de cadastro" value="" required>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Senha" required>
									</div>
									<br>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="BTNlogin" id="login-submit" tabindex="3" class="form-control btn btn-login" value="Logar">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="./view/recover.php" tabindex="4" class="forgot-password"><i class="fas fa-key"></i> Esqueceu a Senha?</a>
												</div>
											</div>
										</div>
									</div>
								</form>

								<form id="register-form" action="index.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<label>Nome completo:</label>
										<input type="text" name="nome" id="nome" tabindex="1" class="form-control" placeholder="Nome completo" value="" required>
									</div>
									<div class="form-group">
										<label>Apelido visivel aos usuários:</label>
										<input type="text" name="apelido" id="apelido" tabindex="2" class="form-control" placeholder="Apelido visivel aos usuários" value="" required>
									</div>
									<div class="form-group">
										<label>Email de cadastro:</label>
										<input type="emailcadastro" name="emailcadastro" id="emailcadastro" tabindex="3" class="form-control" placeholder="Email de cadastro" value="" required>
									</div>
									<div class="form-group">
										<label>Senha:</label>
										<input type="password" name="senha" id="senha" tabindex="4" class="form-control" placeholder="Senha"  required>
									</div>
									<div class="form-group">
										<label>Confirmar Senha:</label>
										<input type="password" name="confirmarsenha" id="confirmarsenha" tabindex="5" class="form-control" placeholder="Confirmar Senha"  required>
									</div>
									<br>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="BTNregister" id="BTNregister" tabindex="6" class="form-control btn btn-register" value="Registrar">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




<br><br><br><br>
<br><br><br><br>
<br><br><br><br>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
 
    <div class="col-sm-6 float-left">
      <p class="text-block">&copy; Copyright 2020 reserved to <span style="color: #EE3B24"><b>Jack Bravo </b></span></p>
    </div>

    <div class="col-sm-6">
      <p class="text-block float-right" style="text-align:right">Developed by<span style="color: #EE3B24"><b> Michael Douglas</b></span></p>
    </div>

</div>
</nav>




</body>
</html>