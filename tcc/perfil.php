<?php
    include("verifica_login.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=";./Estilos/reset.css">
    <link rel="stylesheet" href="./Estilos/style_perfil.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 

    <title>Meu perfil</title>
</head>
<body>


<header>
        <div class="cabecalho">
    <h1>MEU PERFIL</h1>
        <div class="aaa">
        <h6> <a href="logout.php" target="_self"> Sair <img src="./assets/saida.png" class="saida"> </a></h6>
        </div>   
        <br><br>
        </div>

        <img src="./assets/perfilsemfoto.png" class="psf" alt="...">
        <span class="snome"> <?php echo $_SESSION['login']?> </span>
        <br><br>
</header>
<h6> <a href="principal.php" target="_self"> Principais Eventos </a></h6>
<div class="cabecalho">
    <h1 class="titulo">MEUS EVENTOS</h1>    
    <h6 class="admais"> 
        <a href="./criarevento.html" target="_self"> 
        <img src="./assets/mais.png" class="mais" alt="filtro"> CRIAR EVENTOS</h6>
        </a>
</div>

    <div class="flex-container">
        <div class="card" style="width: 18rem;">
            <img src="./assets/ifmusica.png" class="card-img-top" alt="...">
            <div class="card-body">
            <!-- <h6 class="card-tipo">Tipo: ....</h6> -->
            <h6 class="card-data">Ter, 02 Ago  ·  19:00</h6>  
            <h4 class="card-title">If In Concert</h4>
            <h6 class="card-local">Sala 07</h6>
            <a href="#" class="btn btn-success">Conferir</a>
        </div>
    </div>


    
    
    
    
</body>

</html>