<?php
    include "./conexao.php";
    include "./cabecalho.php";  
    if(isset($_GET["mensagem"])&& !empty($_GET["mensagem"])){
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_GET["mensagem"];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
     
    }
?>

<h2 class="m-3">Questões de Formulário</h2>
<form action="./paginaResposta.php" method="POST">
    <?php

    $query = "select * from questoes order by rand() limit 10";
    $resultado = mysqli_query($conexao, $query);    

    while($linha = mysqli_fetch_array($resultado)){
        ?>

        <div class="offset-3 col-7">
            <div class="card bg-white text-dark border border-dark m-3">
                <div class="card-header">
                    <h2 class="text-center">
                    <?php echo $linha["pergunta"] ?>
                    </h2>
                </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <h5><input type="radio" class="m-3" name="<?php echo $linha["id"]?>" value="A">
                        <?php echo "A) ".  $linha["a"] ?>
                    </h5>
                    <h5><input type="radio" class="m-3" name="<?php echo $linha["id"]?>" value="B">
                        <?php echo "B) ".  $linha["b"] ?>
                    </h5>
                    <h5><input type="radio" class="m-3" name="<?php echo $linha["id"]?>" value="C">
                        <?php echo "C) ".  $linha["c"] ?>
                    </h5>
                    <h5><input type="radio" class="m-3" name="<?php echo $linha["id"]?>" value="D">
                        <?php echo "D) ".  $linha["d"] ?>
                    </h5>
                    <h5><input type="radio" class="m-3" name="<?php echo $linha["id"]?>" value="E">
                        <?php echo "E) ".  $linha["e"] ?>
                    </h5>
                </blockquote>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div class="offset-3 col-7">
        <div class="d-grid gap-2">
        <button class="m-3 btn btn-success" type="submit">Enviar</button>
        </div>
    </div>
</form>
<?php include "./rodape.php"; ?>