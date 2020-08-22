<main>
    <form action="<?php echo HOME_URI;?>usuario/alterar" method="POST">
        <fieldset>
            <legend>Atualização de Senha de usuário</legend>
            <?php
                if(isset($_SESSION['erro'])){
                    echo  "<div class='alert alert-warning' role='alert'>".$_SESSION['erro']."</div>";  
                    unset($_SESSION['erro']);
                }
            ?>

            <div class="form-group">
                <input type="name" name="name" placeholder="Nome" class="form-control"  required/>
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Email" class="form-control" required/>
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Nova Senha" class="form-control"required/>
            </div>

            <div class="form-group">
                <input type="password" name="passwordconfirm" placeholder="Repita a Nova Senha" class="form-control"required/>
            </div>
            
            <div class="form-group">
                <input type="submit" name="button" value="Alterar" class="form-control"/>
            </div>
        </fieldset>
    </form>
    <p>Não tem conta ainda? <a href="<?php echo HOME_URI;?>usuario/criar" class="btn">Cadastre-se</a></p>
</main>