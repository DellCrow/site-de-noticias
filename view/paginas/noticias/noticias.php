<html>
<main>

    <div class="centro">
        <h2>Notícias Recentes</h2>
    </div>


    <?php
        if(isset($noticias)){
            foreach($noticias AS $noticia){
    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3><?php echo $noticia->titulo?></h3>
        </div>
        <?php echo substr($noticia->descricao,0,180)."..." ?>
        <a href="<?php echo HOME_URI."noticia/ver/".$noticia->id;?>">Ler mais</a>

        <div class='data'>
            <div>
                <span class="label label-primary"><?php echo $noticia->data ?></span>
                <span class="label label-primary"><?php echo "Por:".$noticia->nome_usuario ?></span>
                <?php 
                            if(isset($_SESSION['nome']) && $_SESSION['nome'] == $noticia->nome_usuario){
                            echo "<a class='btn' href='" . HOME_URI . "noticia/delete/" . $noticia->id ."' >Deletar</a>"; 
                            }
                        ?>
            </div>
        </div>

    </div>
    <?php
        }}
        if(isset($_SESSION['nome'])){
            echo "<a href='" .HOME_URI. "noticia/addNoticia' class='btn'>Cadastrar nova notícia</a>";
        }
    ?>


</main>

</html>