<?php
class categoriacontroller
{
    function abrir()
    {
        $this->logado();
        include_once "view/cadcategoria.php"; //abrir form de cadastro
    }

    function gravar()
    {
        $this->logado();
		$this->verificarAcesso();//verificar se não é administrador
        include_once "model/categoria.php"; //incluir arquivo
        $cat = new categoria(); //referência / instância

        //enviar valores vindos do formulário para a objeto da classe
        $cat->nomecategoria     = $_POST["nomecategoria"];

        //executar método de cadastro contido na classe (model)
        $cat->cadastrar();
        echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');
        window.location='index.php';</script>";
    }

    function consultar()
    {
        $this->logado();
        include "model/categoria.php"; //incluir classe (arquivo)
        $cat = new categoria(); //instância 
        $dados = $cat->consultar(); //executa o método de consulta
        include "view/cons_categoria.php"; //exibir a tela de  consulta (VIEW)
    }

    function excluir()
    {
        $this->logado();
		$this->verificarAcesso();//verificar se não é administrador
        include "model/categoria.php"; //incluir classe (arquivo)
        $cat = new categoria(); //instância 
        //enviar o código do usuário para identificar qual será excluído
        $cat->codcategoria = $_GET["codcategoria"];
        $cat->excluir(); //executando método de exclusão da model
        header("location:index.php?classe=categoria&metodo=consultar");//direcionar novamente para a tela de consulta
    }

    function editar()
    {
        $this->logado();
		$this->verificarAcesso();//verificar se não é administrador
        include "model/categoria.php";
        $cat = new categoria();
        $cat->codcategoria = $_GET["codcategoria"];
        $dados = $cat->retornar();
        //exibir a tela de edição
        include "view/edit_categoria.php";
    }

    function atualizar()
    {
        $this->logado();
		$this->verificarAcesso();//verificar se não é administrador
        include_once "model/categoria.php"; //incluir arquivo
        $cat = new categoria(); //referência / instância

        //enviar valores vindos do formulário para a objeto da classe
        $cat->codcategoria          = $_POST["codcategoria"];
        $cat->nomecategoria         = $_POST["nomecategoria"];

        //executar método de cadastro contido na classe (model)
        $cat->atualizar();
        echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');
        window.location='index.php?classe=categoria&metodo=consultar';</script>";
    }

    function logado()
    {
        if(!isset($_SESSION["cod_logado"])) //não existe
        {
            header("location:index.php"); //volta para o index o qual direcionará para o login
        }
    }
    
    function verificarAcesso()
    {
        if($_SESSION["acesso_logado"] == 2) //usuário limitado
        {
		echo "<script>alert('VOCÊ NÃO TEM ACESSO A ESSA FUNÇÃO!');
		window.location='index.php';</script>";		
		exit;
        }        
    }

}

?>