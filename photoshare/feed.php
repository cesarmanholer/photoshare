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
        <link rel="stylesheet" href="css/feed.min.css">
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
            <button class="btn btn-primary" onclick="nova_publicacao();">Nova publicação</button>
        </div>

        <script>
            var i = 0;
            function nova_publicacao(){
                if(i == 0){
                    document.getElementById('nova_publicacao').style.display = "block";
                    i++;
                }else if(i == 1){
                    document.getElementById('nova_publicacao').style.display = "none";
                    i--;
                }
            }
        </script>

        <div class="nova_publicacao" id="nova_publicacao">
            <h3>Nova Publicação</h3>
                <form method="POST" class="col" enctype="multipart/form-data" action="publicar.php">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="foto" onchange="$('#inputCont').html(this.files[0].name)">
                    <label class="custom-file-label" for="foto" id="inputCont">Imagem</label>
                </div>
                <label for="descricao" id="lbdescricao">Descrição</label><br>
                <textarea name="descricao" id="descricao" class="form-control" maxlength="200"></textarea>
                <input type="submit" name="publicar" id="publicar" value="Publicar" class="btn btn-success form-control">
            </form>
        </div>

        <div class="posts">
            <?php
            $query_post = mysqli_query($con,"SELECT * FROM post ORDER BY id DESC");
            while($post = mysqli_fetch_array($query_post)){
                foreach($id_seguindo as $x){
                    if($post['id_user'] == $x or $post['id_user'] == $_COOKIE['id']){
                        ?>
                        <p><b>Usuario: </b><?php echo $post['nome_user']; ?></p>
                        <img src="imagens/<?php echo $_COOKIE['nome']; ?>/<?php echo $post['foto']; ?>" height="350" width="100%">
                        <p><?php echo $post['descricao']; ?></p>
                        <p id="comentarios"><a href="comentarios.php?post=<?php echo $post['id']; ?>">Comentarios</a></p>
                        <?php
                    }
                }
            }
            ?>
        </div>
    </body>
</html>