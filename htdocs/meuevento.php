<?php

include("verifica_login.php");
include("banco.php"); 
$host = "127.0.0.1";  
$db   = "qualeaboa";     
$user = "root";       
$pass = "";           

require_once("banco.php");
$conn = mysqli_connect("$host","$user","$pass","$db") or die ("problemas na conexão");
$consulta = "SELECT * FROM evento"; 
$con = $conn->query($consulta) or die($conn->error);
$operacao = $_GET["op"];
$entrada = $_GET["entrada"];
?>

  $nome_evento = $_GET['nome_evento'];
	$local_evento = $_GET['local_evento'];
	$cidade = $_GET['cidade'];
	$data_evento = $_GET['data_evento'];
	$hora = $_GET['hora'];
	$preco = $_GET['preco'];
	$classificacao_indicativa = $_GET['classificacao_indicativa'];
	$assunto = $_GET['assunto'];
	$descricao = $_GET['descricao'];
	$autor = $_GET['autor'];

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/eventostyle.css">
    <link REL="SHORTCUT ICON" HREF="assets/favicon.ico">
    <title>Qual é a boa?</title>
</head>

<body>

      <nav class="navbar">
        <img class="navbar-logo" src="assets/logofc.png" alt="Logo qual é a boa" >
        <ul class="anchors-list">
          <li class="anchor"><a class="anchor-item">Niterói</a></li>
          <li class="anchor"><a class="anchor-item">Itaboraí</a></li>
          <li class="anchor"><a class="anchor-item">São Gonçalo</a></li>
          <li class="anchor"><a class="anchor-item">Maricá</a></li>
          <li class="anchor"><a class="anchor-item">Rio de Janeiro</a></li>
        </ul>
        
        <div class="event-creator-container">
          <a class="event-creator-anchor" href="criarevento.php">Criar um evento</a>
          <a class="event-creator-anchor" href="perfil.php">XXXXXXXXX</a>
        </div>
      </nav>
      
      <div class="banner-container">
          <img src="assets/bfrcrp.jpg" class="card-img-top" alt="..."> 
          <!-- <p class="name-event">BOTAFOGO X CRYSTAL PALACE</p> -->
      </div>

      <p class="name-event">$nome_evento</p>

      <div class="event-description">
        <div class="event-description-box-info">
          <h2 class="event-description-info-title">Informações do evento:</h2>

          <p class="event-description-info"><span>Endereço:</span> $local_evento </p> 
          <p class="event-description-info"><span>Cidade:</span> $cidade </p>
          <p class="event-description-info"><span>Data:</span> $data_evento </p>
          <p class="event-description-info"><span>Hora:</span> $hora </p>
          <p class="event-description-info"><span>Preço:</span> R$$preco</p> 
          <p class="event-description-info"><span>Classificação Indicativa:</span> $classificacao_indicativa</p> 
          <p class="event-description-info"><span>Assunto:</span> $assunto </p>
          <p class="event-description-info autor"><span>Autor:</span> $autor </p>
        </div>


          <div class="event-text-description">    
            <h2 class="event-text-description-title">Descrição do evento:</h4>
              
            <p class="description-text">$descricao</p>
          </div>
        </div>
</body>
</html>
