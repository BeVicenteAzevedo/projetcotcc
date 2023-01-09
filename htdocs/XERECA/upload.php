<?php

    

    include("conexao.php");

    $msg = false;

    if(isset($_FILES['arquivo'])){

        $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
        
        $diretorio = "htdocs/ARQUIVOS/";

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio);

        $sql_code = "INSERT INTO arquivo (codigo, arquivo, data) VALUES(null, '$diretorio', NOW())";
        if($mysql-> query ($sql_code))
            $msg = "Xerca";
        else
            $msg = "Falha ao enviar arquivo";
        }

    

 ?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>IMAGEM</h1>
<form action="upload.php" method="POST" enctype="multipart/form-data">
arquivo: <input type="file" required name="arquivo">
        <input type="submit" value="SALVAR">
</form>

</body>
</html>