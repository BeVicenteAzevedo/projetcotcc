<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Qual é a boa?</title>
</head>

<?php

include("verifica_login.php");
include("banco.php"); // caminho do seu arquivo de conexão ao banco de dados 
$host = "127.0.0.1";  
$db   = "qualeaboa";     
$user = "root";       
$pass = "";           

require_once("banco.php");
$conn = mysqli_connect("$host","$user","$pass","$db") or die ("problemas na conexão");
$consulta = "SELECT * FROM usuario"; 
$con = $conn->query($consulta) or die($conn->error);
$operacao = $_GET["op"];
$entrada = $_GET["entrada"];


switch($operacao){
	

		case 1:  // incluir
			if($entrada == 1) 
				formIncluir();
			if($entrada == "CRIAR") 
				execIncluir();    
			break;
		case 2:  // listar
			execListar();
			break;
		case "Conferir":
			execPesquisar();   
			break;
		case 'Editar':  // alterar
			// $entrada = $_GET['entrada'];
			// if($entrada == 1)
			// 	formPesquisarAlterar();
			// if($entrada == 2)
				formAlterar();   
			// if($entrada == 3)
			// 	execAlterar();   
			break;
		case 'ExecAlterar':
			execAlterar();  
			break;
		case 'Excluir':  // excluir
			$entrada = $_GET['entrada'];            
			// if($entrada == 1)
			// 	formExcluir();
			if($entrada == 0)
			execConfirmacaoExcluir();
			if($entrada == 3)
				execExcluir();   
		break;
	}	

// function formIncluir() {
	
// 	echo "
//     <html>
//     <head>
// 	    <meta charset='utf-8'>
//     </head>
//     <body>
//     <center><h1>CRIAÇÃO DE EVENTOS</h1></center>
//     <HR>
// 	    <form action='evento.php' method='GET'>
// 		    PREENCHA OS DADOS: <BR>
// 			<br>NOME: <input type='text' name='nome_evento'> <br>
// 			<br>ENDEREÇO: <input type='text' name='local_evento'> <br>			
// 			<br>CIDADE: <input type='text' name='cidade'> <br>
// 			<br>DATA:<input type='date' name='data_evento'> <br>
// 			<br>HORA:<input type='time' name='hora'> <br>
// 			<br>PREÇO:<input type='text' name='preco'> <br>
// 			<br>CLASSIFICAÇÃO INDICATIVA:<input type='int' name='classificacao_indicativa'> <br>			
// 			<br>ASSUNTO:<input type='text' name='assunto'> <br>
// 			<br>DESCRIÇÃO:<input type='textarea' name='descricao'> <br><br>
//             <input type='hidden' name='op' value='1'>
// 		    <input type='hidden' name='entrada' value='2'>
// 		    <input type='submit' name='enviar' value='CRIAR'>
// 		    <input type='reset' name='limpar' value='LIMPAR'>
//         </form>
//     </body>
//     </html>	
//     ";

// }

function execIncluir() {
		
  	$host = "127.0.0.1";  
	$db   = "qualeaboa";     
	$user = "root";       
	$pass = ""; 
  

	$conn = mysqli_connect("$host","$user","$pass","$db") or die ("problemas na conexão");
  	$nome_evento = $_GET['nome_evento'];
  	$sql2 = "SELECT * FROM evento WHERE nome_evento='$nome_evento'";
	$result = mysqli_query($conn, $sql2);
	$row = mysqli_num_rows($result);

	if($row == 1) {
		header('Location: criarevento.php');
    	exit();
	}

	$local_evento = $_GET['local_evento'];
	$cidade = $_GET['cidade'];
	$data_evento = $_GET['data_evento'];
	$hora = $_GET['hora'];
	$preco = $_GET['preco'];
	$classificacao_indicativa = $_GET['classificacao_indicativa'];
	$assunto = $_GET['assunto'];
	$descricao = $_GET['descricao'];
	$autor = $_GET['autor'];
	
	$sql = "INSERT INTO evento (nome_evento, local_evento, cidade, data_evento, hora, preco, classificacao_indicativa, assunto, descricao, autor) values('$nome_evento', '$local_evento', '$cidade', '$data_evento', '$hora', '$preco', '$classificacao_indicativa', '$assunto', '$descricao', '$autor')";

	$status = mysqli_query($conn,$sql);
	
	if($status)      
	    echo "<script>
				alert('$nome_evento foi criado com sucesso');
				window.location.href='index.php';
			  </script>";
	else
	    echo "<script>
				alert('Erro ao criar seu evento');
				window.location.href='evento.php';
			  </script>";
}

function execListar(){
	
	$sql = "select * from evento";
	$conn = conectar();	
	$status = mysqli_query($conn,$sql);
	$total = mysqli_num_rows($status);
	$linha = mysqli_fetch_array($status);
	
	for($i=0; $i<$total; $i++) {
        $nome_evento =    $linha['nome_evento'];		
		$local_evento = $linha['local_evento'];		
		$cidade = $linha['cidade'];		
		$data_evento =  $linha['data_evento'];		
		$hora = $linha['hora'];		
		$preco =   $linha['preco'];	
        $classificacao_indicativa = $linha['classificacao_indicativa'];		 
		$assunto = $linha['assunto'];
		$descricao = $linha['descricao'];
		$autor = $linha['autor'];
	}	
}

function formPesquisar() {
	
	echo "
    <html>
    <head>
	    <meta charset='utf-8'>
    </head>
    <body>
    <center><h1>PESQUISA DE EVENTOS</h1></center>
    <HR>
	    <form action='evento.php' method='GET'>
		    <br>DIGITE O NOME DO EVENTO:<input type='text' name='nome_evento' autocomplete='on'> <br>
            <input type='hidden' name='op' value='3'>
		    <input type='hidden' name='entrada' value='2'>
		    <input type='submit' name='enviar' value='ENVIAR'>
		    <input type='reset' name='limpar' value='LIMPAR'>
        </form>
    </body>
    </html>	
	";
}

function execPesquisar(){

    $entrada = $_GET["entrada"];
	$nome_evento = $entrada;
	$conn = conectar();
	$sql = "SELECT * FROM evento WHERE '$nome_evento'=nome_evento";
	$dados = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	$total = mysqli_num_rows($dados);
	
	if($total==0) {
		echo'<br>Evento não encontrado, revise o nome';
		echo"\n <br><hr><a href='perfil.php'>VOLTAR</a>";
		exit();
	}
	
		$linha = mysqli_fetch_array($dados);

		$login = $_SESSION['login'];
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

		if($classificacao_indicativa == 0) {
			$classificacao_indicativa = "Livre";
		}
        		
	echo "
	<head>
  
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

  	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
  	<link rel='stylesheet' href='./styles/styles.css'> 
  	<link rel='stylesheet' href='./styles/reset.css'>
	<link rel='stylesheet' href='./styles/eventostyle.css'>
  	<title>Qual é a boa?</title>
  	<link REL='SHORTCUT ICON' HREF='assets/favicon.ico'>
	</head>

<body>

<nav class='navbar'>
		<a class='navbar-brand' href='index.php'>
        	<img class='navbar-logo' src='assets/logofc.png' alt='Logo qual é a boa' >
        </a>

        <div class='event-creator-container'>
          <a class='event-creator-anchor' href='criarevento.php'>Criar um evento</a>
          <a class='event-creator-anchor' href='#'>$login</a>
        </div>
</nav>

<form action='evento.php' method ='get'>
			<div class='banner-container'>
          		<!--<img src='assets/bfrcrp.jpg' class='card-img-top' alt='...'> -->
      		</div>
            
            <p class='name-event'>$nome_evento</p>
            
            <div class='event-description'>
        		<div class='event-description-box-info'>
          		<h2 class='event-description-info-title'>Informações do evento:</h2>
                
          			<p class='event-description-info'><span>Endereço:</span> $local_evento</p> 
          			<p class='event-description-info'><span>Cidade:</span> $cidade </p>
          			<p class='event-description-info'><span>Data:</span> $data_evento </p>
          			<p class='event-description-info'><span>Hora:</span> $hora</p>
          			<p class='event-description-info'><span>Preço:</span> R$ $preco</p> 
          			<p class='event-description-info'><span>Classificação Indicativa:</span> $classificacao_indicativa anos</p> 
          			<p class='event-description-info'><span>Assunto:</span> $assunto</p>
          			<p class='event-description-info autor'><span>Autor:</span> $autor </p>
        	</div>

		<div class='event-text-description'>    
            <h2 class='event-text-description-title'>Descrição do evento:</h4>
            <p class='description-text'>$descricao</p>
		</div>

        </div>
			<input type='hidden' name='entrada' value='0'>
			<input type='hidden' name='nome_evento' value='$nome_evento'>"; 				
					
			
			if($autor == $login) :
				echo "
                <div class='alt'>
					<button name='op' value='Editar' class='aaa'>
						Editar meu evento
					</button>
					<button name='op' value='Excluir' class='aaa'>
						Excluir meu evento
					</button>
					<a href='imagem.php'> Adicionar imagem ao meu evento </a>
					<button name='op' value='' class='aaa'>
						Adicionar imagem ao meu evento
					</button>
                </div>";
					
				endif;
				echo "
			</div>
        </div>
      </div>
</form>
</body>

";
		 
	$linha = mysqli_fetch_assoc($dados);		
}
function formPesquisarAlterar() {
	
	echo "
    <html>
    <head>
	    <meta charset='utf-8'>
    </head>
    <body>
    <center><h1>ALTERAÇÃO DE EVENTO</h1></center>
    <HR>
	    <form action='evento.php' method='GET'>
		    <br>DIGITE O NOME DO EVENTO:<input type='text' name='nome_evento'> <br>
            <input type='hidden' name='op' value='4'>
		    <input type='hidden' name='entrada' value='2'>
		    <input type='submit' name='enviar' value='ENVIAR'>
		    <input type='reset' name='limpar' value='LIMPAR'>
        </form>
    </body>
    </html>	
	";	
	}

function formAlterar() {
	
	$nome_evento = $_GET['nome_evento'];
	$login = $_SESSION['login'];
	$conn = conectar();
	$sql = "SELECT * FROM evento WHERE '$nome_evento' = nome_evento";	
	$dados = mysqli_query($conn,$sql);
	$total = mysqli_num_rows($dados);
	
	if($total==0) {
		echo'<br>Evento não encontrado. Tente novamente';
		echo"\n <br><hr><a href='index.php'>VOLTAR</a>";
		exit();
	}
	
    $linha = mysqli_fetch_array($dados);
	
	$nome_evento =    $linha['nome_evento'];		
	$local_evento = $linha['local_evento'];		
	$cidade = $linha['cidade'];		
	$data_evento =  $linha['data_evento'];		
	$hora = $linha['hora'];		
	$preco =   $linha['preco'];	
    $classificacao_indicativa = $linha['classificacao_indicativa'];		 
	$assunto = $linha['assunto'];
	$descricao = $linha['descricao'];
	$autor = $linha['autor'];
	
	if($autor != $login) {
	header('Location: index.php');
	exit();
	}


echo "
	
<html>
	<head>
	  	<title>Qual é a boa?</title>
	  	<link REL='SHORTCUT ICON' HREF='assets/favicon.ico'>
	  	<script src= 'https://code.jquery.com/jquery-1.12.4.min.js'></script>
	  	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.1/css/all.css' integrity='sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz' crossorigin='anonymous'>
	  	<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet'>
	  	
	<style>

		html, body {
		min-height: 100%;
		/* background-image: linear-gradient(to right, #a619b3, #4796a8, #bbff9c);; */
		background-color: rgb(255, 255, 255);
		}
		body, div, form, input, select, p { 
		padding: 0;
		margin: 0;
		outline: none;
		font-family: Roboto, Arial, sans-serif;
		font-size: 16px;
		color: rgb(0, 0, 0);
		}
		body {
		background: url('/uploads/media/default/0001/01/b5edc1bad4dc8c20291c8394527cb2c5b43ee13c.jpeg') no-repeat center;
		background-size: cover;
		}
		h1, h2 {
		text-transform: uppercase;
		font-weight: 400;
		}
		h2 {
		margin: 0 0 0 8px;
		}
		.main-block {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		height: 100%;
		padding: 25px;
		background: rgba(0, 0, 0, 0.5); 
		}
		.left-part, form {
		padding: 25px;
		}
		.left-part {
		text-align: center;
		}
		.fa-graduation-cap {
		font-size: 72px;
		}
		/* form {
		 background: rgba(0, 0, 0, 0.7);  
		} */
		.lab {
		padding: 8px 10px;
		height: 20px;
		width: 180px;
		background-color: #ffffff;
		/* background-color: #333; */
		color: rgb(0, 0, 0);
		font-family: 'Josefin Sans', sans-serif;
		text-transform: uppercase;
		text-align: center;
		display: block;
		margin-top: 5px;
		cursor: pointer;
		border-radius: 25px;
  }
		
		.title {
		display: flex;
		align-items: center;
		margin-bottom: 20px;
		}
		.info {
		display: flex;
		flex-direction: column;
		}
		input, select {
		padding: 5px;
		margin-bottom: 30px;
		background: transparent;
		border: none;
		border-bottom: 1px solid rgb(136, 116, 116);
		color: black;
		}
		input::placeholder {
		/* color: #cfbebe; */
		color: black;
		}
		option:focus {
		border: none;
		}
		option {
		background: white; 
		border: none;
		}
		#assunto, .espec, #cidade {
		  color: rgb(136, 116, 116);
		}
		.checkbox input {
		margin: 0 10px 0 0;
		vertical-align: middle;
		}
		.checkbox a {
		color: #26a9e0;
		}
		.checkbox a:hover {
		color: #85d6de;
		}
		.btn-item, button {
		padding: 10px 5px;
		margin-top: 20px;
		border-radius: 5px; 
		border: none;
		/* background: #26a9e0;  */
		background: black;
		text-decoration: none;
		font-size: 15px;
		font-weight: 400;
		color: #fff;
		}
		.btn-item {
		display: inline-block;
		margin: 20px 5px 0;
		}
		button {
		width: 100%;
		}
		/* button:hover, .btn-item:hover {
		background: #85d6de;
		} */
		@media (min-width: 568px) {
		html, body {
		height: 100%;
		}
		.main-block {
		flex-direction: row;
		height: calc(100% - 50px);
		}
		.left-part, form {
		flex: 1;
		height: auto;
		}
		}
	</style>
</head>
	
	<body>
		<form action='evento.php' method='get'>
		  	<div class='title'>
				<i class='fas fa-pencil-alt'></i> 
					<h1>Editar meu evento</h1>
		  	</div>

		  	<div class='info'>
			  	<label>Nome do evento:</label>
				  	<input readonly class='fname' type='text' name='nome_evento' value='$nome_evento'>
			  	<label>Endereço: </label> 
				  	<input type='text' name='local_evento' value='$local_evento' required>
			  	<label>Cidade: </label>
			  		<select id='cidade' name='cidade' value='$cidade'>
				  		<option value='Niterói'>Niterói</option>
				  		<option value='Itaboraí'>Itaboraí</option>
				  		<option value='São Gonçalo'>São Gonçalo</option>
				  		<option value='Maricá'>Maricá</option>
				  		<option value='Rio de Janeiro'>Rio de Janeiro</option>
			  		</select>
			  	<label>Data: </label>
				  	<input type='date' name='data_evento' value='$data_evento' class='espec' required>
			  	<label>Hora: </label>
				  	<input type='time' name='hora' value='$hora' class='espec' required>
			  	<label>Preço: </label>
				  	<input type='text' name='preco' value='$preco' required>
			  	<label>Classificação Indicativa: </label>
				  	<input type='int' name='classificacao_indicativa' value='$classificacao_indicativa' required>
			  	<label>Assunto: </label>
			  		<select id='assunto' value='$assunto' name='assunto'>
				  		<option value='Acadêmico'>Acadêmico</option>
				  		<option value='Nerd/Geek'>Nerd/Geek</option>
				  		<option value='Artesanato'>Artesanato</option>
				  		<option value='Cinema'>Cinema</option>
				  		<option value='Show'>Show</option>
				  		<option value='Esportes'>Esportes</option>
				  		<option value='Gastronomia'>Gastronomia</option>
				  		<option value='Política'>Política</option>
				  		<option value='Saúde'>Saúde</option>
				  		<option value='Festa'>Festa</option>
				  		<option value='Tecnologia'>Tecnologia</option>
					</select>

				<label>Coloque um arquivo de foto do seu evento:</label>
			  		<!-- <label class='lab' for='arquivo'>Enviar arquivo</label> -->
			  		<input type='file' name='arquivo' id='arquivo' accept='image/*'>
			  		<h4><!-- Selected file will get here --></h4>
			  	<script>
				  $(document).ready(function() {
				  $('input[type='file']').change(function(e) {
				  var arquivo = e.target.files[0].name; 
				  $('h4').text('O arquivo ' + ( arquivo ) + ' foi selecionado');
			  	});
			  	});
			  	</script>
			  	
				<label>Descrição: </label><br>

				  	<textarea class='descricao' cols='35' rows='8' name='descricao' value='$descricao'> $descricao </textarea><br>
			  	<label>Autor: </label>
				  <input readonly required name='autor' value='$autor'>
				  <input type='hidden' name='op' value='1'>
		  	</div>

		  		<input type='hidden' name='op' value='ExecAlterar'>
				<input type='hidden' name='entrada' value='0'>
		    	<input type='submit' name='enviar' value='ENVIAR'>
		    	<input type='reset' name='limpar' value='LIMPAR'>
				<br><a href='index.php'>VOLTAR</a>
		</form>
	  </div>
	</body>
  </html>
";

}
function execAlterar() {
	
	$nome_evento = $_GET['nome_evento'];		
	$local_evento = $_GET['local_evento'];		
	$cidade = $_GET['cidade'];		
	$data_evento =  $_GET['data_evento'];		
	$hora = $_GET['hora'];		
	$preco =   $_GET['preco'];	
    $classificacao_indicativa = $_GET['classificacao_indicativa'];		 
	$assunto = $_GET['assunto'];
	$descricao = $_GET['descricao'];	
	$autor = $_SESSION['login'];
	
	$sql = "UPDATE evento SET nome_evento='$nome_evento', local_evento='$local_evento', cidade='$cidade', data_evento='$data_evento', hora='$hora', preco='$preco', classificacao_indicativa='$classificacao_indicativa', assunto='$assunto', descricao='$descricao' WHERE '$nome_evento' = nome_evento";
	$conn = conectar();	
	$status = mysqli_query($conn,$sql);
	
	if($status) {
      
	    echo "<script>
				alert('Evento alterado com sucesso');
				window.location.href='index.php';
			  </script>";
	}
  	else {
	    echo "<script>
				alert('Erro na alteração do evento. Tente novamente!');
				window.location.href='perfil.php';
			  </script>";	
	}	}
function formExcluir() {
	
	echo "
    <html>
    	<head>
	    	<meta charset='utf-8'>
        	<link REL='SHORTCUT ICON' HREF='assets/favicon.ico'>
    	</head>
    <body>
    <center><h1>EXCLUSÃO DE EVENTO</h1></center>
    <HR>
	    <form action='evento.php' method='GET'>
		    <br>DIGITE O NOME DO EVENTO:<input type='text' name='nome_evento'> <br>
            <input type='hidden' name='op' value='5'>
		    <input type='hidden' name='entrada' value='2'>
		    <input type='submit' name='enviar' value='ENVIAR'>
		    <input type='reset' name='limpar' value='LIMPAR'>			
        </form>
    </body>
    </html>	
	";
	}

function execConfirmacaoExcluir() {
    $nome_evento = $_GET['nome_evento'];
	$conn = conectar();
    $sql = "SELECT * FROM evento WHERE '$nome_evento' = nome_evento";
    $dados = mysqli_query($conn,$sql) or die (mysqli_error($conn));
    $total = mysqli_num_rows($dados);
 
    if($total==0) {
        echo '<br>EVENTO não encontrado';
        echo "\n <br><hr><a href='index.php'>VOLTAR</A>"; 
        exit();
    }

    $linha = mysqli_fetch_array($dados); 

	$nome_evento =    $linha['nome_evento'];		
	$local_evento = $linha['local_evento'];		
	$cidade = $linha['cidade'];		
	$data_evento =  $linha['data_evento'];		
	$hora = $linha['hora'];		
	$preco =   $linha['preco'];	
    $classificacao_indicativa = $linha['classificacao_indicativa'];		 
	$assunto = $linha['assunto'];
	$descricao = $linha['descricao'];
	$autor = $linha['autor'];


    echo
    "
    <!DOCTYPE html>
		<html lang='pt-br'>
			<head>
    			<meta charset='UTF-8'>
    			<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    			<link rel='stylesheet' type='text/css' href='styles/main.css'>
    			<link REL='SHORTCUT ICON' HREF='assets/favicon.ico'>
    			<title>Document</title>
			</head>

		<body>
    		<div class='limiter'>
				<div class='container-login100'>
					<div class='wrap-login100'>
						<form class='login100-form validate-form' action='evento.php' method='GET'>
							<span class='login100-form-title p-b-26'>Deseja realmente excluir [$nome_evento]?</span>
							<span class='login100-form-title p-b-48'>
								<img src='./assets/logofc.png' style='height: 100px; width: 100px;'>
							</span>
							
							<div class='container-login100-form-btn'>
							<div class='wrap-login100-form-btn'>
							<div class='login100-form-bgbtn'></div>
							<button class='login100-form-btn'>Deletar</button>
                            <input type='hidden' name='op' value='Excluir'> 
            				<input type='hidden' name='entrada' value='3'>   
							<input type='hidden' name='nome_evento' value='$nome_evento'>  
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
";
}

function execExcluir() {
	
	$nome_evento = $_GET['nome_evento'];
	$conn = conectar();
	$sql = "DELETE FROM evento WHERE '$nome_evento' = nome_evento";
	$status = mysqli_query($conn,$sql);
	
	if($status)
	    echo "<script>
				alert('Evento excluído com sucesso');
				window.location.href='index.php';
			</script>";
	else
	    echo "<script>
				alert('Erro na exclusão do seu evento. Tente novamente!');
				window.location.href='index.php';
			  </script>";
}	
?>