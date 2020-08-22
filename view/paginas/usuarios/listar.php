<main>
    <?php
        if(isset($_SESSION['erro'])){
            echo  "<div class='alert alert-warning' role='alert'>".$_SESSION['erro']."</div>";  
            unset($_SESSION['erro']);
        }
    ?>
    <table class="table table-bordered">

    <!-- add botoes -->
    <a href="<?php echo HOME_URI;?>usuario/criar" class="btn">Criar Usuário</a></br>
    <a href="<?php echo HOME_URI;?>usuario/deslogar" class="btn">Deslogar</a>
    
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Operações
                </th>
            </tr>
        </thead>            
            
    <?php

    $cnx=Conexao::getConexao();
    $usuario=$cnx->prepare("SELECT id,nome, email FROM usuario ORDER BY id");
    $usuario->execute();
    while($usuarios=$usuario->fetch(PDO::FETCH_ASSOC)):

    ?>

            <tr>
                <td><?php echo $usuarios["id"]; ?></td>
                <td><?php echo $usuarios["nome"]; ?></td>
                <td><?php echo $usuarios["email"]; ?></td>
                <td>
    <?php 
        
        echo "<a class='btn' href='" . HOME_URI . "usuario/attuser/" . $usuarios["id"] ."' >Alterar Dados</a>";
        echo "<a class='btn' href='" . HOME_URI . "usuario/delete/" . $usuarios["id"] ."' >Remover Usuário</a>";
         
        
    ?>
            </td>
            </tr>

<?php
endwhile;
?>

    </table>

</main>