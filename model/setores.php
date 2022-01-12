<?php
class setores
{
    //atributos de usuário
    private $codcategoria;
    private $nomecategoria;

    //método get (pegar valor da variável)
    function __get($atributo)
    {
        return $this->$atributo;
    }

    //método set (definir um valor para a variável)
    function __set($atributo,$valor)
    {
        $this->$atributo = $valor;
    }

    //acesso a conexão
    private $con; //atributo que será usado para carregar a conexão
    function __construct() //método construtor
    {
        //abertura da conexão
        include_once "conexao.php"; //incluir arquivo
        $obj_con = new conexao(); //referenciar a classe
        $this->con = $obj_con->conectar(); //executar método
    }

    //método cadastrar
    function cadastrar()
    {
        //comando de banco de dados (SQL)
        $comandoSQL = "INSERT INTO categoria 
                    ( nomecategoria)
                    values 
                    (?)";
        
        //enviando os valores para serem inseridos
        $valores = array(
            $this->nomecategoria
        );
        //preparando o comando a ser executado
        $exec = $this->con->prepare($comandoSQL);
        $exec->execute($valores); //executando o comando
    }

    //método consultar
    function consultar()
    {
        $comandoSQL = "SELECT * FROM categoria ORDER BY codcategoria";
        $sql = $this->con->prepare($comandoSQL);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ); //transforma em matriz os dados que vierem do BD
    } 

    //método excluir
    function excluir()
    {
        //comando de banco de dados (SQL)
        $comandoSQL = "DELETE FROM categoria WHERE codcategoria = ?";
        
        //enviando o código para base da exclusão
        $valores = array(
            $this->codcategoria
        );
        //preparando o comando a ser executado
        $exec = $this->con->prepare($comandoSQL);
        $exec->execute($valores); //executando o comando
    }

    //método atualizar
    function atualizar()
    {
        //comando de banco de dados (SQL)
        $comandoSQL = "UPDATE categoria SET
 					nomecategoria  = ?
                    WHERE codcategoria = ?";
        
        //enviando os valores para serem inseridos
        $valores = array(
            $this->nomecategoria,
            $this->codcategoria
        );
        //preparando o comando a ser executado
        $exec = $this->con->prepare($comandoSQL);
        $exec->execute($valores); //executando o comando
    }

    //método retornar
    function retornar()
    {
        $comandoSQL = "SELECT * FROM categoria WHERE codcategoria = ?";
        $valores = array(
            $this->codcategoria
        );
        $sql = $this->con->prepare($comandoSQL);
        $sql->execute($valores);
        return $sql->fetch(PDO::FETCH_OBJ); //transforma em vetor os dados que vierem do BD
    }


}

?>