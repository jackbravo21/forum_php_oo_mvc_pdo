<!DOCTYPE html>
<html lang="pt-br">
<head>


	<title>Fórum</title>
	<link rel="stylesheet" type="text/css" href="estyle.css">
	<meta charset="utf-8">


<!-- Inicio conteudo de design (bootstrap, css, fontawesome, etc) -->

	<!-- Favicon -->
	<link rel="icon" type="imagem/png" href="configs/img/favicon/favicon-16x16.png">
	<link rel="icon" type="image/png" sizes="16x16" href="configs/img/templates/favicon/favicon-16x16.png">
	<link rel="icon" type="imagem/png" href="configs/img/templates/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="configs/img/templates/favicon/favicon-32x32.png">
	<link rel="icon" type="imagem/png" href="configs/img/templates/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="configs/img/templates/favicon/favicon-96x96.png">

    <!-- Bootstrap CSS (chamando bootstrap local)-->
    <link rel="stylesheet" href="configs/bootstrap/copiler/bootstrap.css">
    <!-- CSS Style criado por mim (chamando local)-->
    <link rel="stylesheet" href="style/css/style.css">
      <!-- Font Awesome -->
    <link rel="stylesheet" href="configs/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="configs/font-awesome_baixado/css/fontawesome.css">  
    <link rel="stylesheet" href="configs/font-awesome_baixado/css/solid.css">
 

    <!-- Font Awesome FUNCIONAL -->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">  
   
    <!-- script para "popover" funcionar -->  
    <script src="configs/popper.js/dist/umd/popper.min.js"></script>

	<script type="text/javascript" src="configs/js/jquery.js"></script>
	<script type="text/javascript" src="configs/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="configs/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="configs/js/dataTables.bootstrap.min.js"></script>
	

<!-- Fim do conteudo de design -->	



</head>
<body>



	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../"><img src="configs/img/letreirotiny.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <center>
	 <div class="container"> 
      <img class="mr-2" src="configs/img/forumntiny.png">
     </div> 
 </center>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li>&nbsp;</li>



	
      <li class="nav-item">
        <a class="nav-link" href="index.php?ac=postagens" style="color:black" onmouseover="style='color:red'" onmouseout="style='color:black'">Mural</a>
      </li>
      	&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="index.php?ac=meuperfil" style="color:black" onmouseover="style='color:red'" onmouseout="style='color:black'">Perfil</a>
      </li>
	  	&nbsp;
       <li class="nav-item">
        <a class="nav-link" href="index.php?ac=minhaspostagens" style="color:black" onmouseover="style='color:red'" onmouseout="style='color:black'">Minhas postagens</a>
      </li>
		&nbsp;
      <li class="nav-item">
        <a class="nav-link" href="index.php?ac=contato" style="color:black" onmouseover="style='color:red'" onmouseout="style='color:black'">Contato</a>
      </li>
      	&nbsp;
    </ul>






    <form class="form-inline my-2 my-lg-0" name="buscar" id="buscar" action="index.php?ac=buscarpostagens" method="POST" role="form">

        <a class="nav-link" style="color:blue" onmouseover="style='color:red'" onmouseout="style='color:blue'"><?php echo "Olá <b>\"". $_SESSION["apelido"] . "\"</b>" ?></a>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       
        <a class="mr-4" class="nav-link" href="index.php?ac=logout" style="color:black" onmouseover="style='color:red'" onmouseout="style='color:black'">Sair</a>
     

      <input class="form-control mr-sm-2 ml-3" type="search" placeholder="Buscar" aria-label="Search" name="txtbuscar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="buscar">Buscar postagem</button>
      
    </form>
  </div>
</nav>



