<?php
    include("verifica_login.php");
    include("banco.php"); // caminho do seu arquivo de conexão ao banco de dados 
    $host = "127.0.0.1";  
    $db   = "qualeaboa";     
    $user = "root";       
    $pass = "";           

    $conn = mysqli_connect("$host","$user","$pass","$db") or die ("problemas na conexão");
    $consulta = "SELECT * FROM usuario"; 
    $con = $conn->query($consulta) or die($conn->error);

   

?>

<!doctype html>
<html lang="pt-br">

<!-- https://startbootstrap.com/snippets/navbar-logo
https://codepen.io/girraj-ch/details/yLBdjNX -->


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/stylecidade.css">
  <link rel="stylesheet" href="./styles/city.css">  
  
  <title>Qual é a boa?</title>
  <link REL="SHORTCUT ICON" HREF="assets/favicon.ico">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
    <img src="assets/logofc.png" width="100" height="100" class="d-inline-block align-top" alt="">
  </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

	<div id="menu">
    <ul>
        <li><a href="./eventos_nit.php">Niterói</a></li>
        <li><a href="./eventos_ita.php">Itaboraí</a></li>
        <li><a href="./eventos_sg.php">São Gonçalo</a></li>
        <li><a href="./eventos_mar.php">Maricá</a></li>
        <li><a href="./eventos_rj.php">Rio de Janeiro</a></li>
    </ul>
</div>

<div class="dropdown">
  <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Busque seu assunto
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <span class="dropdown-header">Assuntos</span>
    <!-- <span class="dropdown-item-text">Texto do item dropdown</span> -->
    <a class="dropdown-item" href="./eventos1.php">Acadêmico</a>
    <a class="dropdown-item" href="./eventos2.php">Nerd/Geek</a>
    <a class="dropdown-item" href="./eventos3.php">Artesanato</a>
    <a class="dropdown-item" href="./eventos4.php">Cinema/Teatro</a>
    <a class="dropdown-item" href="./eventos5.php">Show</a>
    <a class="dropdown-item" href="./eventos6.php">Esportes</a>
    <a class="dropdown-item" href="./eventos7.php">Gastronomia</a>
    <a class="dropdown-item" href="./eventos8.php">Política</a>
    <a class="dropdown-item" href="./eventos9.php">Saúde</a>
    <a class="dropdown-item" href="./eventos10.php">Festa</a>
    <a class="dropdown-item" href="./eventos11.php">Tecnologia</a>
    <a class="dropdown-item" href="./eventos12.php">Religião</a>
    <a class="dropdown-item" href="./eventos13.php">Comédia</a>
    <a class="dropdown-item" href="./eventos14.php">Passeio</a>
    <a class="dropdown-item" href="./eventos15.php">Infantil</a>    
  </div>
</div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="mr-auto"></div>
      <ul class="navbar-nav my-2 my-lg-0">
<li class="nav-item active">
        <a class="nav-link" href="criarevento.php">Criar um evento <span class="sr-only">(current)</span></a>
      </li>

      

      
      <a class="nav-link dropdown-toggle" href="perfil.php" id="navbarDropdown" role="button" data-display="static" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $_SESSION['login']?>
      </a>
      
    </ul>

      </div>
      
  </nav>

  <div class="xereca">
    <h2 class="pri">Eventos Acadêmicos</h2>
</div>
    
<div class='row-flex' >
<?php
       
       $sql = "select * from evento where assunto = 'Acadêmico'";
       
       $conn = conectar();
       $status = mysqli_query($conn,$sql);
       $total = mysqli_num_rows($status);
       $linha = mysqli_fetch_array($status);
       
       for($i=0; $i<$total; $i++) {
           
           $nome_evento = $linha['nome_evento'];		
           $local_evento = $linha['local_evento'];		
           $cidade = $linha['cidade'];		
           $data_evento =  $linha['data_evento'];		
           $hora = $linha['hora'];		
           $preco =   $linha['preco'];	
           $classificacao_indicativa = $linha['classificacao_indicativa'];		 
           $assunto = $linha['assunto'];
           $descricao = $linha['descricao'];
           $autor = $linha['autor'];
           
           
           echo "
           
           <form action='evento.php' method='get'>
                <div class='flex-container'>
                  <div class='card'>
                    <img src='./assets/image.png' class='card-img-top' alt='...'/>
                      <div class='card-body'>
                        <h6 class='card-data'>$data_evento</h6>  
                        <h4 class='card-title'>$nome_evento</h4>
                        <h6 class='card-local'>$local_evento</h6>
                        <input type='hidden' name='entrada' value='$nome_evento'/>
                        <input type='submit' class='btn btn-success' name='op' value='Conferir'/>
                      </div>
                  </div> 
                </div>
            </form>
           
           ";
            $linha = mysqli_fetch_assoc($status);
       }
       
    ?>
</div> 
</body>
</html>