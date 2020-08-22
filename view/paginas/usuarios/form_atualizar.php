<main>
    <div class="centro">
    <form action="<?php echo HOME_URI . "usuario/atualizar/". $_SESSION['id']?>" method="POST">
        <fieldset>
        <h3>Atualizar dados de usuários</h3>


            <?php
                if(isset($_SESSION['id'])){
                    echo  "<p Id do usuário: ".$_SESSION['id']."</p>";  
                }
            ?>

            <div class="form-group">
                <input type="name" name="name" placeholder="Novo Nome" class="form-control" required/>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Novo Email" class="form-control" required/>
            </div>
    
            <div class="form-group">
                <input type="submit" name="button" value="Atualizar" class="btn btn-primary"/>
            </div>
        </fieldset>
    </form>
    </div>
</main>