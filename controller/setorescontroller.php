<?php
class setorescontroller
{
    function abrir()
    {
        include_once "view/cadsetores.php"; //abrir form de cadastro
    }

    function gravar()
    {
		
    $this->logado();
    $this->verificarAcesso();//verificar se não é administrador
    include_once "model/setores.php"; //incluir arquivo
    $set = new setores(); //referência / instância
    
    //enviar valores vindos do formulário para a objeto da classe
    $set->nomecategoria     = $_POST["nomecategoria"];
    
    //executar método de cadastro contido na classe (model)
    $set->cadastrar();
    echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');
    window.location='index.php?classe=setores&metodo=consultar';</script>";
		
    }

    function consultar()
    {
        $this->logado();
        include "model/setores.php"; //incluir classe (arquivo)
        $set = new setores(); //instância 
        $dados = $set->consultar(); //executa o método de consulta
        include "view/cons_setores.php"; //exibir a tela de  consulta (VIEW)
    }

    function excluir()
    {
		
    $this->logado();
    $this->verificarAcesso();//verificar se não é administrador
    include "model/setores.php"; //incluir classe (arquivo)
    $set = new setores(); //instância 
    //enviar o código do usuário para identificar qual será excluído
    $set->codcategoria = $_GET["codcategoria"];
    $set->excluir(); //executando método de exclusão da model
    header("location:index.php?classe=setores&metodo=consultar");//direcionar novamente para a tela de consulta
		
    }

    function editar()
    {
		
    $this->logado();
    $this->verificarAcesso();//verificar se não é administrador
    include "model/setores.php";
    $set = new setores();
    $set->codcategoria = $_GET["codcategoria"];
	$set->nomecategoria = $_GET["nomecategoria"];
    $dados = $set->retornar();
    //exibir a tela de edição
    include "view/edit_setor.php";
		
    }

    function atualizar()
    {
		
    $this->logado();
    $this->verificarAcesso();//verificar se não é administrador
    include_once "model/setores.php"; //incluir arquivo
    $set = new setores(); //referência / instância
    
    //enviar valores vindos do formulário para a objeto da classe
    $set->codcategoria    = $_POST["codcategoria"];
    $set->nomecategoria   = $_POST["nomecategoria"];
    
    //executar método de cadastro contido na classe (model)
    $set->atualizar();
    echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');
    window.location='index.php?classe=setores&metodo=consultar';</script>";	
		
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
        if($_SESSION["acesso_logado"] >= 0) //usuário limitado
        {
		echo "<script>alert('VOCÊ NÃO TEM ACESSO A ESSA FUNÇÃO!');
		window.location='index.php';</script>";		
		exit;
        }        
    }

}

?>