<?php
require 'config.php';
if(isset($_POST['publicar'])){
    $descricao = $_POST['descricao'];
    $id_user = $_COOKIE['id'];
    $nome_user = $_COOKIE['nome'];
    date_default_timezone_set('America/Sao_Paulo');
    $data = date('y-m-d-H-i-s', time());
    $dir = 'imagens/' . $nome_user . '/';
    $file = $_FILES["foto"];
    if (move_uploaded_file($file["tmp_name"], "$dir/".$file["name"])) {
        $nome_arquivo = $file['name'];
        mysqli_query($con,"INSERT INTO post (id_user,nome_user,foto,descricao,curtidas) VALUES ('$id_user','$nome_user','$nome_arquivo','$descricao','0')");
        header('Location:feed.php');
    }
}
?>