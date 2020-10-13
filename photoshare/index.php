<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Photo Share</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="shortcut icon" href="icon.svg"> <!-- Favicon -->
        <script src="JavaScript/jquery.min.js"></script>
        <script src="JavaScript/pooper.min.js"></script>
        <script src="JavaScript/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        if(isset($_GET['reg'])){
            ?>
            <div class="container">
            <form method="POST">
                <h1>Photo Share</h1>
                <label for="nome"><b>Usuario:</b></label>
                <input type="text" name="nome" id="nome" maxlength="20">
                <label for="email" class="email"><b>E-mail:</b></label>
                <input type="email" name="email" id="email" maxlength="30">
                <label for="senha" class="senha"><b>Senha:</b></label>
                <input type="password" name="senha" id="senha" maxlength="20">
                <input type="submit" name="registrar" id="registrar" value="Registrar" class="btn btn-primary form-control">
                <p><a href="index.php">Já possui uma conta? Entrar</a></p>
            </form>
        </div>
        <?php
        }else{
            ?>
        <div class="container">
            <form method="POST">
                <h1>Photo Share</h1>
                <label for="nome"><b>Usuario:</b></label>
                <input type="text" name="nome" id="nome" maxlength="20">
                <label for="senha" class="senha"><b>Senha:</b></label>
                <input type="password" name="senha" id="senha" maxlength="20">
                <input type="submit" name="entrar" id="entrar" value="Entrar" class="btn btn-primary form-control">
                <p><a href="index.php?reg">Não possui uma conta? Registre-se</a></p>
            </form>
        </div>
        <?php
        }
        ?>
    </body>
</html>

<?php

    if(isset($_POST['entrar'])){
        $usuario = $_POST['nome'];
        $senha = $_POST['senha'];
        $query = mysqli_query($con,"SELECT * FROM usuarios");
        while($resultado = mysqli_fetch_array($query)){
            if($usuario == $resultado['usuario'] && $senha == $resultado['senha']){
                setcookie('id',$resultado['id']);
                setcookie('nome',$resultado['usuario']);
                header('Location:feed.php');
            }
        }
    }else if(isset($_POST['registrar'])){
        $usuario = $_POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        mysqli_query($con,"INSERT INTO usuarios (usuario,email,senha) VALUES ('$usuario','$email','$senha')");
        mkdir("imagens/" . $usuario);
    }

?>
<!-- 

    CREATE DATABASE photoshare;
    CREATE TABLE usuarios (id INT(255) AUTO_INCREMENT PRIMARY KEY,
                           usuario VARCHAR(20) NULL,
                           email VARCHAR(30) NULL,
                           senha VARCHAR(20) NULL);
    CREATE TABLE post (id INT(255) AUTO_INCREMENT PRIMARY KEY,
                       id_user INT(255) NULL,
                       nome_user VARCHAR(20) NULL,
                       foto VARCHAR(20) NULL,
                       descricao VARCHAR(200) NULL);
    CREATE TABLE comentarios (id INT(255) AUTO_INCREMENT PRIMARY KEY,
                              id_user INT(255) NULL,
                              id_post INT(255) NULL,
                              nome_user VARCHAR(20) NULL,
                              descricao VARCHAR(200) NULL);
    CREATE TABLE seguidores (id INT(255) AUTO_INCREMENT PRIMARY KEY,
                             id_user INT(255) NULL,
                             id_seguindo INT(255) NULL);

 -->