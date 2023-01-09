<?php
session_start();
ob_start();
include_once "banco2.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Celke - Formulario upload imagem</title>
</head>

<body>
    <h2>Upload Foto</h2>

    <?php
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    
    if (!empty($dados['SalvarFoto'])) {
        $arquivo = $_FILES['foto_usuario'];
        
        $query_usuario = "INSERT INTO evento (foto_usuario) VALUES (:foto_usuario)";
        $cad_usuario = $conn->prepare($query_usuario);
        $cad_usuario->bindParam(':foto_usuario', $arquivo['name'], PDO::PARAM_STR);
        $cad_usuario->execute();

        
        if ($cad_usuario->rowCount()) {
            
            if ((isset($arquivo['name'])) and (!empty($arquivo['name']))) {
                
                $ultimo_id = $conn->lastInsertId();

                
                $diretorio = "imagens/$ultimo_id/";

                
                mkdir($diretorio, 0755);

                
                $nome_arquivo = $arquivo['name'];
                move_uploaded_file($arquivo['tmp_name'], $diretorio . $nome_arquivo);

                $_SESSION['msg'] = "<p style='color: green;'>Usuário e a foto cadastrada com sucesso!</p>";
                header("Location: index.php");
            } else {
                $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
                header("Location: index.php");
            }
        } else {
            echo "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>";
        }
    }
    ?>

    <form name="" method="POST" action="imagem.php" enctype="multipart/form-data">
        
        <label>Foto: </label>
        <input type="file" name="foto_usuario" id="foto_usuario"><br><br>

        <input type="submit" value="Cadastrar" name="SalvarFoto">

    </form>
</body>

</html>