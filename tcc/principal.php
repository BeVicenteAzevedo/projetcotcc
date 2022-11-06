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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Estilos/resset.css">
    <link rel="stylesheet" href="./Estilos/style_principal.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Qual é a boa?</title>
</head>
<body>
    <header>
        <h2 class="perf"> <a href="perfil.php" target="_self"> <?php echo $_SESSION['login']?> <img src="./assets/perfil.jpg" class="perfi"></a></h2>
    </header>

    <div class="cabecalho">
    <h1 class="titulo">PRINCIPAIS EVENTOS</h1>    
    <h2 class="filtro"><img src="./assets/filtro.png" class="filt" alt="filtro"> FILTROS</h2>
    </div>
    
    <?php while($dado = $con->fetch_array())?>

    <?php
       
    $sql = "select * from evento";
	
	$conn = conectar();
	
	$status = mysqli_query($conn,$sql);
	$total = mysqli_num_rows($status);
	
	echo"<center><table border=1 width=80%>";
	
	
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
                   
            
            echo "<div class='flex-container'>
            <div class='card' style='width: 18rem;'>
            <img src='./assets/bota.jfif' class='card-img-top' alt='...'>
            <div class='card-body'>
            <h6 class='card-data'>$data_evento</h6>  
            <h4 class='card-title'>$nome_evento</h4>
            <h6 class='card-local'>$local_evento</h6>
            <button action='evento.php' class='btn btn-success' name='op' value='3'>Conferir</button>
            </div>
            </div>";
            $linha = mysqli_fetch_assoc($status);
       }
       
    ?>
</div>

</body>
</html>

