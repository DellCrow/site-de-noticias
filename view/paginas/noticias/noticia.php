<html>
<main>


    <?php
        if(isset($_SESSION['erro'])){
            echo  "<div class='alert alert-danger' role='alert'>".$_SESSION['erro']."</div>";  
            unset($_SESSION['erro']);
        }
    ?>


    <div class="panel panel-primary">

        <div class="panel-heading">
            <h1><?php echo $noticia->titulo ?></h1>
        </div>
        <p><?php echo $noticia->descricao?></p>

        <div class='data'>
            <span class="label label-primary"><?php echo $noticia->data ?></span>
            <span class="label label-primary"><?php echo "Por:".$noticia->nome_usuario ?></span>
        </div>

    </div>

    <div class="panel panel-primary">
        <h6 class="panel-heading">Comentarios</h6>

        <?php 
        
        if(isset($comentarios)){?>

        <div class="coments">

            <?php   
            foreach($comentarios AS $comentario){
            ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <p><?php echo $comentario->nome ?></p>
                </div>
                <p class="coment-user"><?php echo $comentario->comentario ?></p>
            </div>

            <?php
            }
            ?>

        </div>

        <?php } 
        ?>

        <form class="form" action="<?php echo HOME_URI."noticia/novoComentario/".$_SESSION['id-noticia'];?>"
            method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="coment" placeholder="Comente">
                <div class="input-form">
                    <button type="submit" name="button" value="Publicar" class="btn btn-primary btn-sm">Publicar</button>
                </div>
            </div>

        </form>

    </div>



    </div>


</main>

</html>