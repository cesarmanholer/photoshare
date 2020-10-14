<?php
require 'config.php';
$id_seguindo = array();
$query_seguindo = mysqli_query($con,"SELECT * FROM seguidores");
while($seguindo = mysqli_fetch_array($query_seguindo)){
    if($_COOKIE['id'] == $seguindo['id_user']){
        array_push($id_seguindo, $seguindo['id_seguindo']);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Photo Share</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/seguir.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="shortcut icon" href="icon.svg"> <!-- Favicon -->
        <script src="JavaScript/jquery.min.js"></script>
        <script src="JavaScript/pooper.min.js"></script>
        <script src="JavaScript/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div class="topo">
        <div class="dropdown show">
                <p>Usuario: <?php echo $_COOKIE['nome'] ?></p>
        </div>
        <h5 id="photoshare">Photo Share</h5>
        <button class="btn btn-primary" onclick="window.location.href='feed.php';">Voltar ao Feed</button>
    </div>

    <div class="container">
        <?php
        
            $query_usuarios = mysqli_query($con,"SELECT * FROM usuarios");
            while($resultado_usuarios = mysqli_fetch_array($query_usuarios)){
                ?>
                <div>
                    <p><?php echo $resultado_usuarios['usuario']; ?></p>
                    <?php 
                            if(in_array($resultado_usuarios['id'], $id_seguindo)){
                                ?>
                                <button class="btn btn-danger" onclick="window.location.href='seguir.php?unf=<?php echo $resultado_usuarios['id'] ?>'">Deixar de seguir</button>
                                <?php
                            }else{
                                ?>
                                <button class="btn btn-success" onclick="window.location.href='seguir.php?fol=<?php echo $resultado_usuarios['id'] ?>'">Seguir</button>
                                <?php
                            }
                    ?>
                </div>
                <?php
            }

        ?>
    </div>
    </body>
</html>

<?php

    if(isset($_GET['unf'])){
        $meu_id = $_COOKIE['id'];
        $usuario_id = $_GET['unf'];
        mysqli_query($con,"DELETE FROM seguidores WHERE id_user = $meu_id AND id_seguindo = $usuario_id");
        header('Refresh: 0; url = seguir.php');
    }

    if(isset($_GET['fol'])){
        $meu_id = $_COOKIE['id'];
        $usuario_id = $_GET['fol'];
        mysqli_query($con,"INSERT INTO seguidores (id_user,id_seguindo) VALUES ('$meu_id','$usuario_id')");
        header('Refresh: 0; url = seguir.php');
    }

?>