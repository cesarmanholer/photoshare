<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Photo Share</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/comentarios.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="shortcut icon" href="icon.svg"> <!-- Favicon -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div class="topo">
        <div class="dropdown show">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Usuario: <?php echo $_COOKIE['nome'] ?>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="seguir.php">Seguir Usuarios</a>
            </div>
        </div>
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
        header('Refresh: 0;');
    }

?>