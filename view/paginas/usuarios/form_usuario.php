<main>
    <div class="centro">
    <form action="<?php echo HOME_URI;?>usuario/logValidate" method="POST">
        
            <h3>Login de usuários</h3>
            <?php
                if(isset($_SESSION['erro'])){
                    echo  "<div class='alert alert-danger' role='alert'>".$_SESSION['erro']."</div>";  
                    unset($_SESSION['erro']);
                }
            ?>

            <div class="form-group">
                <input type="email" name="email" placeholder="Insira o Email" class="form-control" required />
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Insira a senha" class="form-control" required />
            </div>

            <div class="form-group">
                <input type="submit" name="button" value="Logar" class="btn btn-primary" />
            </div>
            <p>Novos usuários recebem senha 123</p>
        
    </form>
    </div>
</main>