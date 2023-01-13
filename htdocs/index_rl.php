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

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/stylecidade.css"> 
  <link rel="stylesheet" href="./styles/city.css"> 
  <link REL="SHORTCUT ICON" HREF="assets/favicon.ico">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Qual é a boa?</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
      <img src="assets/logofc.png" width="100" height="100" class="d-inline-block align-top" alt="">
    </a>
      <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->

      <div class="dropdown">
  <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Escolha sua região
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <span class="dropdown-header">Regiões do RJ</span>
    <a class="dropdown-item" href="./index_nt.php">Niterói</a>
    <a class="dropdown-item" href="./index_rl.php">Região dos Lagos</a>
  </div>
</div>

  <div id="menu">
    <ul style="font-size: 9px">
        <li><a href="./eventos_rlar.php">Araruama</a></li>
        <li><a href="./eventos_rlac.php">Arraial do Cabo</a></li>
        <li><a href="./eventos_rlbz.php">Búzios</a></li>
        <li><a href="./eventos_rlcf.php">Cabo Frio</a></li>
        <li><a href="./eventos_rlig.php">Iguaba Grande</a></li>
        <li><a href="./eventos_rlsa.php">Saquarema</a></li>
        <li><a href="./eventos_rlsp.php">São Pedro da Aldeia</a></li>
    </ul>
  </div>

<!-- <div class="dropdown">
  <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Busque seu assunto
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <span class="dropdown-header">Assuntos</span>
    <span class="dropdown-item-text">Texto do item dropdown</span> 
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
</div> -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="mr-auto"></div>
        <ul class="navbar-nav my-2 my-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="criareventorl.php">Criar um evento <span class="sr-only">(current)</span></a>
          </li>
            <a class="nav-link dropdown-toggle" href="perfil.php" id="navbarDropdown" role="button" data-display="static" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['login']?>
            </a>
        </ul>
      </div>
</nav>

<div class="xereca">
  <h2 class="pri">Confira o que temos</h2>
</div>

<!-- <div class='row-flex'>

<a href="eventos1.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/acad.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Acadêmico</h4>
          </div>
      </div> 
    </div>
  </a>
  
  <a href="eventos2.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/acad.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Nerd/Geek</h4>
          </div>
      </div> 
    </div>
  </a>  

  <a href="eventos3.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/acad.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Artesanato</h4>
          </div>
      </div> 
    </div>
  </a>

  <a href="eventos4.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/acad.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Cinema/Teatro</h4>
          </div>
      </div> 
    </div>
  </a>

  <a href="eventos5.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/geek.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Show</h4>
          </div>
      </div> 
    </div>
  </a>

  <a href="eventos6.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/geek.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Esporte</h4>
          </div>
      </div> 
    </div>
  </a>

  <a href="eventos7.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/geek.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Gastronomia</h4>
          </div>
      </div> 
    </div>
  </a>

  <a href="eventos8.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/geek.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Política</h4>
          </div>
      </div> 
    </div>
  </a>

  <a href="eventos9.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/geek.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Saúde</h4>
          </div>
      </div> 
    </div>
  </a>

  <a href="eventos10.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/geek.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Festa</h4>
          </div>
      </div> 
    </div>
  </a>

  <a href="eventos11.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/geek.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Tecnologia</h4>
          </div>
      </div> 
    </div>
  </a>

  <a href="eventos12.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/geek.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Religião</h4>
          </div>
      </div> 
    </div>
  </a>

  <a href="eventos13.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/geek.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Comédia</h4>
          </div>
      </div> 
    </div>
  </a>

  <a href="eventos14.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/geek.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Passeio</h4>
          </div>
      </div> 
    </div>
  </a>

  <a href="eventos15.php">  
    <div class='flex-container'>
      <div class='card' >
        <img src='./assets/geek.png' class='card-img-top' alt='...'/>
          <div class='card-body' style='text-align: center'>
            <h4 class='card-title'>Infantil</h4>
          </div>
      </div> 
    </div>
  </a> -->

</div> <!-- fecha a div row flex dos assuntos -->
<div class="xereca">
  <h2 class="pri">Principais Eventos</h2>
</div>
    
<div class='row-flex'>
<?php
       
  $sql = "select * from evento where regiao='Região dos Lagos'";     
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
                    <img src='./assets/acad.png' class='card-img-top' alt='...'/>
                      <div class='card-body' style='text-align: center'>
                        <h6 class='card-data'>$data_evento</h6>  
                        <h4 class='card-title'>$nome_evento</h4>
                        <h6 class='card-local'>$cidade</h6>
                        <input type='hidden' name='entrada' value='$nome_evento'/>
                        <input type='submit' class='btn btn-success' name='op' value='Conferir'/>
                      </div>
                  </div> 
                </div>
            </form>";
    $linha = mysqli_fetch_assoc($status);
       }
?>
</div> 
</body>
</html>