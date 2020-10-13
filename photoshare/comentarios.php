<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Photo Share</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/comentarios.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="shortcut icon" href="icon.svg"> <!-- Favicon -->
        <script src="JavaScript/jquery.min.js"></script>
        <script src="JavaScript/pooper.min.js"></script>
        <script src="JavaScript/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div class="topo">
        <h5>Usuario: <?php echo $_COOKIE['nome'] ?></h5>
        <h5 id="photoshare">Photo Share</h5>
        <button class="btn btn-primary" onclick="window.location.href='feed.php';">Voltar ao Feed</button>
    </div>

    <div class="comentarios">
        <?php
            $query_coment = mysqli_query($con,"SELECT * FROM comentarios");
            while($comentario = mysqli_fetch_array($query_coment)){
                if($comentario['id_post'] == $_GET['post']){
                    ?>
                        <p><b>Usuario: </b><?php echo $comentario['nome_user']; ?></p>
                        <p><?php echo $comentario['descricao']; ?></p>
                    <?php
                }
            }
        ?>
    </div>

    <div class="comentar">
        <form method="POST">
            <textarea name="coment" class="form-control" maxlength="200"></textarea>
            <input type="submit" name="enviar" id="enviar" class="btn btn-primary form-control">
        </form>
    </div>
    </body>
</html>

<?php

    if(isset($_POST['enviar'])){
        $id_user = $_COOKIE['id'];
        $id_post = $_GET['post'];
        $nome_user = $_COOKIE['nome'];
        $coment = $_POST['coment'];
        mysqli_query($con,"INSERT INTO comentarios (id_user,id_post,nome_user,descricao) VALUES ('$id_user','$id_post','$nome_user','$coment')");
    }

?>