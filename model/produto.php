<?php
class produto
{
    //atributos de usuário
    private $codproduto;
    private $nomeproduto;
    private $codcategoria;
    private $preco;
    private $descricao;
    private $destaque;

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
        $comandoSQL = "INSERT INTO produto 
                    (nomeproduto,codcategoria,preco,descricao,destaque)
                    values 
                    (?,?,?,?,?)";
        
        //enviando os valores para serem inseridos
        $valores = array(
            $this->nomeproduto,
            $this->codcategoria,
            $this->preco,
            $this->descricao,
            $this->destaque
        );
        //preparando o comando a ser executado
        $exec = $this->con->prepare($comandoSQL);
        $exec->execute($valores); //executando o comando
    }
	
    //método consultar
    function consultar()
    {
        $comandoSQL = "SELECT * FROM produto WHERE codcategoria = ?";
        $valores = array(
            $this->codcategoria
        );
        $sql = $this->con->prepare($comandoSQL);
        $sql->execute($valores);
        return $sql->fetchAll(PDO::FETCH_OBJ); //transforma em matriz os dados que vierem do BD
    }
	
    //método pesquisarparavender
    function pesquisarparavender()
    {
        $comandoSQL = "SELECT * FROM produto WHERE codcategoria = ? ORDER BY codproduto";
        $valores = array(
            $this->codcategoria
        );
        $sql = $this->con->prepare($comandoSQL);
        $sql->execute($valores);
        return $sql->fetchAll(PDO::FETCH_OBJ); //transforma em matriz os dados que vierem do BD
    }
	
    //método pesquisarparaestoque
    function pesquisarparaestoque()
    {
        $comandoSQL = "SELECT * FROM produto WHERE codcategoria = ? ORDER BY codproduto";
        $valores = array(
            $this->codcategoria
        );
        $sql = $this->con->prepare($comandoSQL);
        $sql->execute($valores);
        return $sql->fetchAll(PDO::FETCH_OBJ); //transforma em matriz os dados que vierem do BD
    }

    //método excluir
    function excluir()
    {
        //comando de banco de dados (SQL)
        $comandoSQL = "DELETE FROM produto WHERE codproduto = ?";
        
        //enviando o código para base da exclusão
        $valores = array(
            $this->codproduto
        );
        //preparando o comando a ser executado
        $exec = $this->con->prepare($comandoSQL);
        $exec->execute($valores); //executando o comando
    }

    //método atualizar
    function atualizar()
    {
        //comando de banco de dados (SQL)
        $comandoSQL = "UPDATE produto SET
                    nomeproduto     = ?,
                    codcategoria    = ?,
                    preco           = ?,
                    descricao       = ?,
                    destaque        = ?
                    WHERE codproduto = ?";
        
        //enviando os valores para serem inseridos
        $valores = array(
            $this->nomeproduto,
            $this->codcategoria,
            $this->preco,
            $this->descricao,
            $this->destaque,
            $this->codproduto
        );
        //preparando o comando a ser executado
        $exec = $this->con->prepare($comandoSQL);
        $exec->execute($valores); //executando o comando
    }

    //método retornar
    function retornar()
    {
        $comandoSQL = "SELECT * FROM produto WHERE codproduto = ?";
        $valores = array(
            $this->codproduto
        );
        $sql = $this->con->prepare($comandoSQL);
        $sql->execute($valores);
        return $sql->fetch(PDO::FETCH_OBJ); //transforma em vetor os dados que vierem do BD
    }
}

?>