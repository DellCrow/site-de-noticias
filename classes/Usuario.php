<?php

class Usuario{

    /**
     * Identificador
     * @access private
     * @name id
     */
    private $id;

    /**
     * Nome usuário
     * @access private
     * @name nome
     */
    private $nome;

    /**
     * Email do usuario
     * @access private
     * @name email
     */
    private $email;

    /**
     * Senha
     * @access private
     * @name senha
     */
    private $senha;

    public function setId($id){
        $this->id=$id;
    }

    /**
     * @access public 
     * @return id
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @access public 
     * @param nome
     */
    public function setNome($nome){
        $this->nome=$nome;
    }
    
    /**
     * @access public 
     * @return nome
     */
    public function getNome(){
        return $this->nome;
    }

    /**
     * @access public 
     * @param email
     */
    public function setEmail($email){
        $this->email=$email;
    }

    /**
     * @access public 
     * @return email
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @access public 
     * @param senha
     */
    public function setSenha($senha){
        $this->senha=$senha;
    }
    
    /**
     * @access public 
     * @return senha
     */
    public function getSenha(){
        return $this->senha;
    }


    public function index(){

        if(isset($_SESSION['nome'])){
            $this->listar();
        }

        else{
            $this->logar();
        }
            
    }


    public function listar(){
        include HOME_DIR."view/paginas/usuarios/listar.php";
    }


    public function delete($user_id){
        
        $cnx=Conexao::getConexao();

        $id_find = $cnx->query(
            "SELECT id FROM noticia WHERE usuario_id='$user_id'");
            
        $id_ntc = $id_find->fetch(PDO::FETCH_ASSOC);
        $id_ntc = $id_ntc['id'];

            //apaga comentario

        $deletar = "DELETE FROM comentario WHERE noticia_id=$id_ntc";
        $resultado = $cnx->prepare($deletar);
        $resultado->execute();

            //apaga noticia

        $deletar = "DELETE FROM noticia WHERE usuario_id=$id";
        $resultado = $cnx->prepare($deletar);
        $resultado->execute();

        
            //apaga usuario

        $deletar = "DELETE FROM usuario WHERE id=$id";
        $resultado = $cnx->prepare($deletar);
        $resultado->execute();

        $this->listar(); 


    }


    public function salvar(){
        
        $envio = filter_input(INPUT_POST, 'button', FILTER_SANITIZE_STRING);

        if(isset($envio)){ 

            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
 
                $cnx=Conexao::getConexao();

                $insert = "INSERT INTO usuario (id, nome, email) VALUES (0, '$name', '$email')";
                var_dump($insert);
                $resultado = $cnx->prepare($insert);

                $resultado->execute();
                $this->listar(); 

        }

    }


    public function logValidate(){

        $envio = filter_input(INPUT_POST, 'button', FILTER_SANITIZE_STRING);

        if(isset($envio)){ 

            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	        $password = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

            //senha 123

            if($password == '202cb962ac59075b964b07152d234b70'){

                $cnx=Conexao::getConexao();
                $teste = $cnx->query(
                    "SELECT nome, email FROM usuario WHERE email='$email' AND senha='$password'");

                        $resultado = $teste->fetch(PDO::FETCH_ASSOC);
                        include HOME_DIR."view/paginas/usuarios/senha_padrao.php"; 
            }else{

                $cnx=Conexao::getConexao();      
                $sql = $cnx->query(
                    "SELECT id, nome, email FROM usuario WHERE email='$email' AND senha='$password'"
                );

                $resultado = $sql->fetch(PDO::FETCH_ASSOC);

                    $_SESSION['nome'] = $resultado['nome'];
                    $_SESSION['email'] = $resultado['email'];
                    $_SESSION['id'] = $resultado['id'];
                    $this->listar();

            }

        }
    }


    public function atualizar($id){

        $envio = filter_input(INPUT_POST, 'button', FILTER_SANITIZE_STRING);

        if(isset($envio)){  
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $id = intval($id);

            $cnx=Conexao::getConexao();
            $atualizar = "UPDATE usuario SET nome='$name', email='$email' where id = $id";
            $resultado = $cnx->prepare($atualizar);

            $resultado->execute();
                $_SESSION['nome'] = $name;
                $_SESSION['email'] = $email;
                $this->listar();

        } 
    }

    public function alterar(){

        $envio = filter_input(INPUT_POST, 'button', FILTER_SANITIZE_STRING);

        if(isset($envio)){  
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $senha = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
            $senhaconfirm = md5(filter_input(INPUT_POST, 'passwordconfirm', FILTER_SANITIZE_STRING));

            if($senha == $senhadnv && $senha != '202cb962ac59075b964b07152d234b70' ){

                $cnx=Conexao::getConexao();

                $alterar = "UPDATE usuario SET senha = '$senha' where email='$email'";
                $resultado = $cnx->prepare($alterar);
                $resultado->execute();
                             
                    $cnx=Conexao::getConexao();
                    $sql = $cnx->query(
                        "SELECT nome, id, cargo FROM usuario WHERE email='$email' AND senha='$senha'"
                    );
    
                        $resultado = $sql->fetch(PDO::FETCH_ASSOC);

                        $_SESSION['nome'] = $resultado['nome'];
                        $_SESSION['id'] = $resultado['id'];
                        $_SESSION['email'] = $email;
                        $this->listar();
            }
            else{
                include HOME_DIR."view/paginas/usuarios/senha_padrao.php";
            }

        } 
    }

    public function attuser($id){
        $_SESSION['id'] = $id;
        include HOME_DIR."view/paginas/usuarios/form_atualizar.php";
    }
 
    public function logar(){
        include HOME_DIR."view/paginas/usuarios/form_usuario.php";
    }

    public function deslogar(){

        //destruir session
        session_destroy();
        $this->logar();
    }


    public function criar(){
        include HOME_DIR."view/paginas/usuarios/form_cadastrar.php";
    }

    
}