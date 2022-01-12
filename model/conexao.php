<?php
class conexao
{
    //função para conectar com o banco de dados
    function conectar()
    {
        $con = new pdo("mysql:host=localhost;dbname=**********************",
                        "=**********************",","=**********************",");
        //atividar recursos de exibição de erros de BD
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    }
}
?>