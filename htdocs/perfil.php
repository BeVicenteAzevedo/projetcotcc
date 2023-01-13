<?php
    include("verifica_login.php");
    include_once("banco.php"); // caminho do seu arquivo de conexão ao banco de dados 
    $host = "127.0.0.1";  
    $db   = "qualeaboa";     
    $user = "root";       
    $pass = "";           

    $conn = mysqli_connect("$host","$user","$pass","$db") or die ("problemas na conexão");
    $consulta = "SELECT * FROM usuario"; 
    $con = $conn->query($consulta) or die($conn->error);
  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/perfil2.css">
  <link REL="SHORTCUT ICON" HREF="assets/favicon.ico">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Qual é a boa?</title>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
      <img src="assets/logofc.png" width="80" height="80" class="d-inline-block align-top" alt="">
    </a>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="mr-auto"></div>
        <ul class="navbar-nav my-2 my-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-display="static" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['login']?>
            </a>
          
              <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdown">
                <h6 class="dropdown-header">Meu perfil</h6>
                  <form action="usuario.php" method ="get">
                    <button class="edit" name="op" value="Editar">
				              Editar dados
				            </button>
                  </form>
                <a class="dropdown-item" href="criarevento.php">Criar evento</a>
                <a class="dropdown-item" href="logout.php">Sair</a>
              </div>
          </li>
        </ul>
      </div>
</nav>

  <div class="xereca">
    <h3 class="pri">Meus Eventos</h3>
  </div>
<br>

  <div class='row-flex' style="display: flex; flex-flow: row wrap">
  
    <?php
       
      $autor = $_SESSION['login'];
      $sql = "select * from evento where autor = '$autor'";
      $conn = conectar();
      $status = mysqli_query($conn,$sql);
      $total = mysqli_num_rows($status);
       
      echo"<table border=1 width=80%>";
      
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
              <div class='card' style='width: 19rem;'>
                <!--<img src='./assets/image.png' class='card-img-top' alt='...'/>-->      
                  <div class='card-body'>
                    <h6 class='card-data'>$data_evento</h6>  
                    <h4 class='card-title'>$nome_evento</h4>
                    <h6 class='card-local'>$local_evento</h6>
                    <input type='hidden' name='entrada' value='$nome_evento'/>
                    <input type='submit' class='btn btn-success' name='op' value='Conferir'/>
                  </div>
              </div> 
            </div>
          </form>";
        
          $linha = mysqli_fetch_assoc($status);}
      ?>
  </div>
  </div>    
</body>
</html>