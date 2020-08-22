<main>
    <div class="centro">
    <form action="<?php echo HOME_URI;?>usuario/salvar" method="POST">
        <fieldset>
            <legend>Cadastro de usuários</legend>
            <?php
                if(isset($_SESSION['erro'])){
                    echo  "<div class='alert alert-danger' role='alert'>".$_SESSION['erro']."</div>";  
                    unset($_SESSION['erro']);
                }
            ?>

            <div class="form-group">
                <input type="name" name="name" placeholder="Nome Completo" class="form-control"required/>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control"required/>
            </div>
            
            <div class="form-group">
                <input type="submit" name="button" value="Cadastrar" class="btn btn-primary"/>
            </div>
            
        </fieldset>
    </form>
    </div>
</main>