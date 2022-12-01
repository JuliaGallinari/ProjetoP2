<?php
    include "./conexao.php";
    include "./cabecalho.php";

    ?>
    <h2 class="m-3">Seu resultado</h2>
    <?php
    $pontuacao = 0;
    if(isset($_POST) && !empty($_POST)){

        $valoresArray = array_keys($_POST); 

        for($i=0; $i<count($valoresArray);$i++){
            //alternativa do usuario
            $alternativaSelecionada = lcfirst($_POST[$valoresArray[$i]]); 
            quebraLinha();

            $query = "select * from questoes where id =".$valoresArray[$i];
            $resultado = mysqli_query($conexao, $query);
            
            while($linha = mysqli_fetch_array($resultado)){
                $alternativaCorreta = lcfirst($linha["correta"]);
                ?>
                <div class="offset-3 col-7">
                    <div class="card m-3">
                        <div class="card-header text-center">
                            <strong>
                                <?php echo $linha["pergunta"] ?>
                            </strong>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <?php
                                    if(
                                    $alternativaCorreta == $alternativaSelecionada){
                                ?>
                                <div class="alert alert-success">
                                    <p>Resposta certa!</p>
                                    <p>Sua resposta foi: <?php echo $_POST[$valoresArray[$i]].") ". $linha[$alternativaSelecionada]?></p>
                                    <p>A resposta correta: <?php echo $linha["correta"].") ". $linha[$alternativaCorreta]?></p>
                                </div>
                                <?php
                                    $pontuacao++;
                                    }else{
                                    ?>
                                        <div class="alert alert-danger">
                                            <p>Infelizmente, você errou.</p>
                                            <p>Sua resposta foi: <?php echo $_POST[$valoresArray[$i]].") ". $linha[$alternativaSelecionada]?></p>
                                            <p>A resposta correta era: <?php echo $linha["correta"].") ". $linha[$alternativaCorreta]?></p>
                                        </div>
                                        <?php
                                        }
                                        ?>
                            </blockquote>
                        </div>
                    </div> 
                </div>
            <?php
            }
        }  
        
        if($pontuacao<5){
            ?>
            <div class="m-3 alert alert-danger">
                <h2 class="text-center">Sua pontuação total foi: <?php echo $pontuacao ?></h2>
                <br/>
            </div>
            <?php
        }else{
            ?>
            <div class="m-3 alert alert-success">
                <h2 class="text-center">Sua pontuação total foi: <?php echo $pontuacao ?></h2>
                <br/>
            </div>
            <?php
        }

    }else{
        header("Location: ./index.php?mensagem=Hey! Responda alguma coisa!!!");
        exit();
    }

    

    function quebraLinha(){
        ?>
        <br/>
        <?php
    }
    
?>
