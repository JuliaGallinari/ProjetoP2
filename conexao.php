<?php 
    $servidor = "201.55.32.20:6033";
    $user = "pw_user";
    $senha = "Fatec@123";
    $banco = "pw_user_db";

    $conexao = mysqli_connect($servidor, $user, $senha);
    mysqli_select_db($conexao, $banco);

?>