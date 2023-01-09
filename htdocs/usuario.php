<?php
require_once("banco.php");
$operacao = $_GET['op'];

switch($operacao){
		case "Registrar":
				execIncluir();    
			break;
		case 2:  // listar
			execListar();
			break;
		case 3:  // pesquisar
			$entrada = $_GET['entrada'];
			if($entrada == 1) 
				formPesquisar();
			if($entrada == 2)
				execPesquisar();   
			break;
		case "Editar":  // alterar
			// $entrada = $_GET['entrada'];
			// if($entrada == 1)
			// 	formPesquisarAlterar();
			// if($entrada == 2)
				formAlterar();   
			// if($entrada == 3)
			// 	execAlterar();   
			break;
		case "ExecEditar":
			execAlterar(); 
			break;
		case 5:  // excluir
			$entrada = $_GET['entrada'];            
			if($entrada == 1)
				formExcluir();
			if($entrada == 2)
				execConfirmacaoExcluir();
			if($entrada == 3)
				execExcluir();   
		break;
	}	
	
function formIncluir() {
	
	echo "
    <html>
    	<head>
	    	<meta charset='utf-8'>
    	</head>
    
		<body>
    		<h1>CADASTRO DE USUÁRIO</h1>
    		<HR>
	    
			<form action='usuario.php' method='GET'>
		    	PREENCHA OS DADOS: <BR>
					<br>LOGIN: <input type='text' name='login'> <br>
					<br>NOME: <input type='text' name='nome_usuario'> <br>
					<br>SOBRENOME: <input type='text' name='sobrenome'> <br>
					<br>E-MAIL: <input type=email name='email'> <br>			
					<br>SENHA: <input type='password' name='senha'> <br>
					<br>DATA DE NASCIMENTO: <input type='date' name='data_nascimento'> <br>
					<br>CPF:<input type='cpf' name='cpf'> <br>
            			<input type='hidden' name='op' value='1'>
		    			<input type='hidden' name='entrada' value='2'>
		    			<input type='submit' name='enviar' value='CRIAR'>
		    			<input type='reset' name='limpar' value='LIMPAR'>
        	</form>
    	</body>
    </html>	";
}

function execIncluir() {
	
	$host = "127.0.0.1";  
	$db   = "qualeaboa";     
	$user = "root";       
	$pass = ""; 

	$conn = mysqli_connect("$host","$user","$pass","$db") or die ("problemas na conexão");
	$login = $_GET['login'];
	$sql2 = "SELECT * FROM usuario WHERE login='$login'";
	$result = mysqli_query($conn, $sql2);
	$row = mysqli_num_rows($result);
	
	if($_GET['login'] == '' || $_GET['senha'] == '') {
		$_SESSION['nao_autenticado'] = true;    
		header('Location: cadastro.php');
    	exit();
	}
	if($row == 1) {
		$_SESSION['nao_autenticado'] = true;    
      
		header('Location: cadastro.php');
    	exit();
	}

	$login = $_GET['login'];
	$nome_usuario = $_GET['nome_usuario'];
	$sobrenome = $_GET['sobrenome'];
	$email = $_GET['email'];
	$senha = $_GET['senha'];
	$confirmsenha = $_GET['confirmsenha'];
	$data_nascimento = $_GET['data_nascimento'];
	$cpf = $_GET['cpf'];
	
	
	if($confirmsenha != $senha) {
		$_SESSION['nao_autenticado'] = true;  
      
		header('Location: cadastro.php');
    	exit();
		
	}
	
	$sql = "INSERT INTO usuario (login, nome_usuario, sobrenome, email, senha, data_nascimento, cpf) values('$login', '$nome_usuario', '$sobrenome', '$email', '$senha', '$data_nascimento', '$cpf')";
	$conn = conectar();	
	$dados = mysqli_query($conn,$sql2) or die (mysqli_error($conn));
	$total = mysqli_num_rows($dados);
	$status = mysqli_query($conn,$sql);
	
	$infos = "
	<head>
    	<meta charset='UTF-8'>
    	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
    	<title>Qual é a boa?</title>
	</head>
	
	<div class='modal fade' id='modalCadastro' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' >
    	<div class='modal-dialog' role='document'>
      		<div class='modal-content'>
        		<div class='modal-header'>
          		<h5 class='modal-title' id='exampleModalLabel'>Qual é a boa?</h5>
          		<button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
            	<span aria-hidden='true'>&times;</span></button>
        	</div>
        		
				<div class='modal-body'> Seu cadastro foi realizado com sucesso! </div>
        		<div class='modal-footer'>
          			<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
          			<button type='button' class='btn btn-primary'>Fazer Login</button>
        		</div>
      	</div>
    </div>
  </div>
	";
	
	echo $infos;
	
	if($status) {
	echo " 	<script>
				alert('Cadastro realizado com sucesso! ');
				window.location.href='index.php';
			</script>";
	}
	else " 	<script>
				alert(' Falha no cadastro. Tente novamente');
				window.location.href='cadastro.php';
			</script>";
        
}

function execListar(){
	
	$sql = "select * from usuario";	
	$conn = conectar();
	$status = mysqli_query($conn,$sql);
	$total = mysqli_num_rows($status);
	$linha = mysqli_fetch_array($status);
	
	for($i=0; $i<$total; $i++) {

	$login = $linha['login'];
	$nome_usuario = $linha['nome_usuario'];
	$sobrenome = $linha['sobrenome'];
	$email = $linha['email'];
	$senha = $linha['senha'];
	$data_nascimento = $linha['data_nascimento'];
	$cpf = $linha['cpf'];

	}
}

function formPesquisar() {
	
echo "
    <html>
    	<head>
	    	<meta charset='utf-8'>
    	</head>
    
		<body>
    		<h1>PESQUISA DE EVENTOS</h1>
    		<HR>
	    		<form action='usuario.php' method='GET'>
		    		<br>DIGITE O SEU CPF:<input type='text' name='cpf' autocomplete='on'> <br>
            		<input type='hidden' name='op' value='3'>
		    		<input type='hidden' name='entrada' value='2'>
		    		<input type='submit' name='enviar' value='ENVIAR'>
		    		<input type='reset' name='limpar' value='LIMPAR'>
        		</form>
    	</body>
    </html>	";
}

function execPesquisar(){
    
	$cpf = $_GET['cpf'];	
	$conn = conectar();
	$sql = "SELECT * FROM usuario WHERE '$cpf'=cpf";
	$dados = mysqli_query($conn,$sql) or die (mysqli_error($conn));
	$total = mysqli_num_rows($dados);
	
	if($total==0) {
		echo'<br>Usuário não encontrado, revise o cpf';
		
		echo"\n <br><hr><a href='index.html'>VOLTAR</a>";
		exit();
	}
	$linha = mysqli_fetch_array($dados);
	
	for($i=0; $i<$total; $i++) {
		
	$login = $linha['login'];
	$nome_usuario = $linha['nome_usuario'];
	$sobrenome = $linha['sobrenome'];
	$email = $linha['email'];
	$senha = $linha['senha'];
	$data_nascimento = $linha['data_nascimento'];
	$cpf = $linha['cpf'];
	}
}

function formPesquisarAlterar() {
	
echo "
    <html>
    	<head>
	    	<meta charset='utf-8'>
    	</head>
    <body>
    	<h1>ALTERAÇÃO DE EVENTO</h1>
    <HR>
	    <form action='usuario.php' method='GET'>
		    <br>DIGITE O CPF:<input type='cpf' name='cpf'> <br>
            <input type='hidden' name='op' value='4'>
		    <input type='hidden' name='entrada' value='2'>
		    <input type='submit' name='enviar' value='ENVIAR'>
		    <input type='reset' name='limpar' value='LIMPAR'>
        </form>
    </body>
    </html>";	
}

function formAlterar() {
	
	include("verifica_login.php");
    include_once("banco.php"); // caminho do seu arquivo de conexão ao banco de dados 
    $host = "127.0.0.1";  
    $db   = "qualeaboa";     
    $user = "root";       
    $pass = "";           

    $conn = mysqli_connect("$host","$user","$pass","$db") or die ("problemas na conexão");
    $consulta = "SELECT * FROM usuario"; 
    $con = $conn->query($consulta) or die($conn->error);
	$conn = conectar();
	$login = $_SESSION['login'];
	$sql = "SELECT * FROM usuario WHERE '$login' = login";
	$dados = mysqli_query($conn,$sql);
	$total = mysqli_num_rows($dados);
	
	if($total==0) {
		echo'<br>Evento não encontrado. Tente novamente';
		
		echo"\n <br><hr><a href='index.php'>VOLTAR</a>";
		exit();
	}
	
    $linha = mysqli_fetch_array($dados);
	
	$login = $linha['login'];
	$nome_usuario = $linha['nome_usuario'];
	$sobrenome = $linha['sobrenome'];
	$email = $linha['email'];
	$senha = $linha['senha'];
	$data_nascimento = $linha['data_nascimento'];
	$cpf = $linha['cpf'];
	
	
echo "

<!DOCTYPE html>
	<html lang='en'>
	
		<head>
    		<meta charset='UTF-8'>
    		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<title>Qual é a boa?</title>
			<link REL='SHORTCUT ICON' HREF='assets/favicon.ico'>
			<link rel='stylesheet' type='text/css' href='styles/util.css'>
			<link rel='stylesheet' type='text/css' href='styles/main.css'>
	
    	<div class='limiter'>
			<div class='container-login100'>
				<div class='wrap-login100'>
					<form class='login100-form validate-form' action ='usuario.php' method='get'>
						<span class='login100-form-title p-b-26'>
							Atualizar meus dados ($login)
						</span>
					
						<span class='login100-form-title p-b-48'></span>

					<div class='wrap-input100 validate-input'>
						<label>CPF: </label>
                    		<input class='input100' SIZE=10 MAXLENGTH=11 MinLENGTH=11 type='text' name='cpf' value='$cpf'>
							<span class='focus-input100'></span>
					</div>
					<div class='wrap-input100 validate-input'>
                    	<label>Primeiro nome: </label>
							<input class='input100' type='text' value='$nome_usuario' name='nome_usuario'>
							<span class='focus-input100'></span>
					</div>
					<div class='wrap-input100 validate-input'>
                    	<label>Sobrenome: </label>
							<input class='input100' type='text' value='$sobrenome' name='sobrenome'>
							<span class='focus-input100'></span>
					</div>
					<div class='wrap-input100 validate-input' data-validate = 'Valid email is: a@b.c'>
                    	<label>E-mail: </label>
							<input class='input100' type='email' value='$email' name='email'>
							<span class='focus-input100'></span>
					</div>
					<input class='input100' type='hidden' value='$login' name='login'>
            </script>
					<div class='container-login100-form-btn'>
						<div class='wrap-login100-form-btn'>
							<div class='login100-form-bgbtn'></div>
							<button value='ExecEditar' name='op' class='login100-form-btn'>Alterar</button>
						</div>
					</div>			
				</form>
			</div>
		</div>
	</div>
</head>
</html>
    ";

}
function execAlterar() {
	
	$login = $_GET['login'];
	$nome_usuario = $_GET['nome_usuario'];
	$sobrenome = $_GET['sobrenome'];
	$email = $_GET['email'];
	$cpf = $_GET['cpf'];

	$sql = "UPDATE usuario SET cpf='$cpf', nome_usuario='$nome_usuario', sobrenome='$sobrenome', email='$email' WHERE '$login' = login";
	$conn = conectar();	
	$status = mysqli_query($conn,$sql);
	
	if($status) {
		session_start();
		$_SESSION['login'] = $login;
	    echo " <script>
		alert(' Dados pessoais alterados com sucesso!');
		window.location.href='perfil.php';
        </script>";
      }
  else {
	    echo " <script>
        alert('Erro na alteração, tente novamente');
        window.location.href='perfil.php';
        </script>";	
  }	
}
function formExcluir() {
	
	echo "
    <html>
    	<head><meta charset='utf-8'></head>
    <body>
    	<h1>EXCLUSÃO DE USUARIO</h1>
    	<HR>
	    	<form action='usuario.php' method='GET'>
		    	<br>DIGITE O CPF:<input type='text' name='cpf'> <br>
            	<input type='hidden' name='op' value='5'>
		    	<input type='hidden' name='entrada' value='2'>
		    	<input type='submit' name='enviar' value='ENVIAR'>
		    	<input type='reset' name='limpar' value='LIMPAR'>			
        	</form>
    </body>
    </html>";
	}
function execConfirmacaoExcluir() {

	$cpf = $_GET['cpf'];
	$conn = conectar();
    $sql = "SELECT * FROM usuario WHERE '$cpf' = cpf";
    $dados = mysqli_query($conn,$sql) or die (mysqli_error($conn));
    $total = mysqli_num_rows($dados);
 
    if($total==0) {
        echo '<br>USUARIO não encontrado';
        echo "\n <br><hr><a href='index.html'>VOLTAR</A>"; 
        exit();
    }

    $linha = mysqli_fetch_array($dados); 

	$login = $linha['login'];
	$nome_usuario = $linha['nome_usuario'];
	$sobrenome = $linha['sobrenome'];
	$email = $linha['email'];
	$senha = $linha['senha'];
	$data_nascimento = $linha['data_nascimento'];
	$cpf = $linha['cpf'];

    echo "
	
<html>
    <head><meta charset='utf-8'></head>

    <body>
    	<h1>EXCLUSÃO DE USUARIO</h1>
    	<HR>
        	<form action='usuario.php' method='GET'>
            	PREENCHA OS DADOS: <BR>
					<br>LOGIN:<input type='text' name='login' value='$login'> <br>
					<br>Nome:<input type='text' name='nome_usuario' value='$nome_usuario'> <br>
		    		<br>Sobrenome:<input type='text' name='sobrenome' value='$sobrenome'> <br>
		    		<br>E-mail:<input type='email' name='email' value='$email'> <br>
					<br>SENHA:<input type='password' name='password' value='$senha'> <br>
					<br>DATA DE NASCIMENTO:<input type='date' name='data' value='$data_nascimento'> <br>
					<br>CPF:<input type='cpf' name='cpf' value='$cpf'> <br>	
				DESEJA REALMENTE EXCLUIR SEU PERFIL? <br><br>    
			
					<input type='hidden' name='op' value='5'> 
            		<input type='hidden' name='entrada' value='3'>    
            		<input type='submit' name='enviar' value='EXCLUIR'>
            		<br><hr><a href='index.html'>VOLTAR</A>
        	</form>
    </body>
</html>";
}

function execExcluir() {
	
	$cpf = $_GET['cpf'];
	$conn = conectar();
	$sql = "DELETE FROM usuario WHERE '$cpf' = cpf";
	$status = mysqli_query($conn,$sql);
	
	if($status)
	    echo "<br>Registro de usuario excluído";
	else
	    echo "<br>Erro na exclusão";
		echo "<br><hr><a href='index.html'>VOLTAR</a>";		
}	
