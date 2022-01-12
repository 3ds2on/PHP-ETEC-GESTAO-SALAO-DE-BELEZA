<?php
class relatoriocontroller
{
    function recebimentos()
    {
    $this->logado();  
    include_once "view/rela_recebimentos.php"; //abrir PHP dos recebimentos
    }

    function gastos()
    {
    $this->logado();  
    include_once "view/rela_gastos.php"; //abrir PHP dos gastos
    }

    function saldo()
    {
    $this->logado();  
    include_once "view/rela_saldo.php"; //abrir PHP dos saldo
    }
	
    function estoque()
    {
        $this->logado();
        include "model/produto.php"; //incluir classe (arquivo)
        $prod = new produto(); //instância
		$prod->codcategoria = $_SESSION["cod_categoria"];  //Carrega a categoria logada		
        $dados = $prod->pesquisarparaEstoque(); //executa o método de pesquisarparavender
        include "view/rela_estoque.php"; //exibir a tela de  consulta (VIEW)
    }

    function logado()
    {
        if(!isset($_SESSION["cod_logado"])) //não existe
        {
            header("location:index.php"); //volta para o index o qual direcionará para o login
        }
    }
	
}

?>