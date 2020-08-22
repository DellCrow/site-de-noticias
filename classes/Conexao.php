<?php

class Conexao {

private static $conexao=null;

/**
 * Método estático para retornar um objeto de conexao com o DB.
 * 
 * @author Cândido
 * @version 0.1
 * @access public
 * @copyright GPL 2020 INFO CIMOL
 * @since 09/07/2020
 */
    static public function getConexao(){
            if(!self::$conexao){
        return new PDO (SGBD.":host=".HOST_DB.";dbname=".DB."",USER_DB, PASS_DB);
            }
        return self::$conexao;
    }

}