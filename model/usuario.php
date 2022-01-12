<?php
class Usuario
{
    //atributos de usuário
    private $codusuario;
    private $nome;
    private $email;
    private $senha;
    private $acesso;
    private $codcategoria;

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
        $comandoSQL = "INSERT INTO usuario 
                    (nome, email,senha,acesso,codcategoria)
                    values 
                    (?,?,?,?,?)";
        
        //enviando os valores para serem inseridos
        $valores = array(
            $this->nome,
            $this->email,
            $this->senha,
            $this->acesso,
            $this->codcategoria
        );
        //preparando o comando a ser executado
        $exec = $this->con->prepare($comandoSQL);
        $exec->execute($valores); //executando o comando
    }

    //método consultar
    function consultar()
    {
        $comandoSQL = "SELECT * FROM usuario ORDER BY nome";
        $sql = $this->con->prepare($comandoSQL);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_OBJ); //transforma em matriz os dados que vierem do BD
    }

    //método excluir
    function excluir()
    {
        //comando de banco de dados (SQL)
        $comandoSQL = "DELETE FROM usuario WHERE codusuario = ?";
        
        //enviando o código para base da exclusão
        $valores = array(
            $this->codusuario
        );
        //preparando o comando a ser executado
        $exec = $this->con->prepare($comandoSQL);
        $exec->execute($valores); //executando o comando
    }

    //método atualizar
    function atualizar()
    {
        //comando de banco de dados (SQL)
        $comandoSQL = "UPDATE usuario SET
                    nome    = ?,
                    email   = ?,
                    senha   = ?,
                    acesso  = ?,
					codcategoria  = ?
                    WHERE codusuario = ?";
        
        //enviando os valores para serem inseridos
        $valores = array(
            $this->nome,
            $this->email,
            $this->senha,
            $this->acesso,
            $this->codcategoria,
            $this->codusuario
        );
        //preparando o comando a ser executado
        $exec = $this->con->prepare($comandoSQL);
        $exec->execute($valores); //executando o comando
    }

    //método retornar
    function retornar()
    {
        $comandoSQL = "SELECT * FROM usuario WHERE codusuario = ?";
        $valores = array(
            $this->codusuario
        );
        $sql = $this->con->prepare($comandoSQL);
        $sql->execute($valores);
        return $sql->fetch(PDO::FETCH_OBJ); //transforma em vetor os dados que vierem do BD
    }

    //método logar
    function logar()
    {		
        $comandoSQL = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
        $valores = array(
		$this->email,
	    $this->senha
        );
        $sql = $this->con->prepare($comandoSQL);
        $sql->execute($valores);
        return $sql->fetch(PDO::FETCH_OBJ); //transforma em vetor os dados que vierem do BD
    }
}

?>