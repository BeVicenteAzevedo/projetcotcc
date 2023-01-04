<?php
    include("verifica_login.php");
    include_once("banco.php"); // caminho do seu arquivo de conexão ao banco de dados 
    $host = "127.0.0.1";  
    $db   = "qualeaboa";     
    $user = "root";       
    $pass = "";           

    $conn = mysqli_connect("$host","$user","$pass","$db") or die ("problemas na conexão");
    $consulta = "SELECT * FROM evento"; 
    $con = $conn->query($consulta) or die($conn->error);

	if(!isset($_SESSION))
		{	
			header('Location: index.php');
			exit();
		}
		

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Qual é a boa?</title>
	<link REL="SHORTCUT ICON" HREF="assets/favicon.ico">

	<link rel="stylesheet" type="text/css" href="styles/util.css">
    <link rel="stylesheet" type="text/css" href="styles/main.css">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action ="usuario.php" method ="get">
					<span class="login100-form-title p-b-26">
						Atualizar meus dados
					</span>
					<span class="login100-form-title p-b-48">
						<!-- <i class="zmdi zmdi-font"></i> -->
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="login" value= '$login'>
						<!-- <span class="focus-input100" data-placeholder="Login"></span> -->
					</div>
					
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nome_usuario" value= '$nome_usuario'>
						<!-- <span class="focus-input100" data-placeholder="Primeiro nome"></span> -->
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="sobrenome" value= '$sobrenome'>
						<!-- <span class="focus-input100" data-placeholder="Sobrenome"></span> -->
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="email" name="email" value='$email'>
						<!-- <span class="focus-input100" data-placeholder="E-mail"></span> -->
					</div>

					<!-- <div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="senha">
						<span class="focus-input100" data-placeholder="Senha"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="senha">
						<span class="focus-input100" data-placeholder="Confirme sua senha"></span>
					</div> -->

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="date" name="data_nascimento" value='$data_nascimento'>
						<!-- <span class="focus-input100" data-placeholder=""></span> -->
					</div>

					<!-- <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="int" name="sobrenome">
						<span class="focus-input100" data-placeholder="CPF"></span>
					</div> -->

				<!-- <h5>Coloque um arquivo de foto sua aqui:</h5>
            	<label class="lab" for="arquivo">Enviar arquivo</label>
            	<input type="file" name="arquivo" id="arquivo" accept="image/*">
            	<h4> Selected file will get here </h4>
            	<script>
                $(document).ready(function() {
                $('input[type="file"]').change(function(e) {
                var arquivo = e.target.files[0].name; 
                $("h4").text('O arquivo ' + ( arquivo ) + ' foi selecionado.');
            });
            });
            </script> -->

					

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Alterar
							</button>
						</div>
					</div>			
				</form>
			</div>
		</div>
	</div>

</head>
<body>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
    <script src="styles/main.js"></script>
    <script src="./styles/main.js"></script> 
</body>
</html>