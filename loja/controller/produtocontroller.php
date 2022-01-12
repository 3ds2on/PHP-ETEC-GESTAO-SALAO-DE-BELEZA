<?php
class produtocontroller
{
    function abrir()
    {
        $this->logado();
		
        //buscar os dados da categoria
        include_once "model/categoria.php";
        $cat = new categoria();
        $dados_categoria = $cat->consultar();

        include_once "view/cadproduto.php"; //abrir form de cadastro
    }

    function gravar()
    {
        $this->logado();	
		$this->verificarAcesso();//verificar se não é administrador
        include_once "model/produto.php"; //incluir arquivo
        $prod = new produto(); //referência / instância

        //enviar valores vindos do formulário para a objeto da classe
        $prod->nomeproduto      = $_POST["nomeproduto"];
        $prod->codcategoria     = $_POST["codcategoria"];
        $prod->preco            = $_POST["preco"];
        $prod->descricao        = $_POST["descricao"];
        if(!empty($_POST["destaque"]))$prod->destaque = $_POST["destaque"]; else $prod->destaque = 0;

        //executar método de cadastro contido na classe (model)
        $prod->cadastrar();
        echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');
        window.location='index.php';</script>";
    }

    function consultar()
    {
        $this->logado();
        include "model/produto.php"; //incluir classe (arquivo)
        $prod = new produto(); //instância 
		$prod->codcategoria = $_SESSION["cod_categoria"];  //Carrega a categoria logada
        $dados = $prod->consultar(); //executa o método de consulta
        include "view/cons_produtos.php"; //exibir a tela de  consulta (VIEW)
    }
	
    function pesquisarParaVender()
    {
        $this->logado();
        include "model/produto.php"; //incluir classe (arquivo)
        $prod = new produto(); //instância 
		$prod->codcategoria = $_SESSION["cod_categoria"];  //Carrega a categoria logada
        $dados = $prod->pesquisarparavender(); //executa o método de pesquisarparavender
        include "view/vender_produtos.php"; //exibir a tela de  consulta (VIEW)
    }
		
    function pesquisarParaComprar()
    {
        $this->logado();
        include "model/produto.php"; //incluir classe (arquivo)
        $prod = new produto(); //instância 
		$prod->codcategoria = $_SESSION["cod_categoria"];  //Carrega a categoria logada
        $dados = $prod->pesquisarparavender(); //executa o método de pesquisarparavender
        include "view/comprar_produtos.php"; //exibir a tela de  consulta (VIEW)
    }
		
    function quantidadeParaVender()
    {
		//Verifica se o usuario esta logado
		$this->logado();
		$this->verificarAcesso();//verificar se não é administrador

        //enviar valores vindos do formulário para a objeto da classe
		$codproduto = $_GET["codproduto"];
		$nomeproduto = $_GET["nomeproduto"];
		$preco = $_GET["preco"];
		$descricao = $_GET["descricao"];
		$codcategoria = $_GET["codcategoria"];

        include_once "view/confirmar_venda.php"; //abrir form de cadastro

    }
	
    function quantidadeParaComprar()
    {
		//Verifica se o usuario esta logado
		$this->logado();
		$this->verificarAcesso();//verificar se não é administrador

        //enviar valores vindos do formulário para a objeto da classe
		$codproduto = $_GET["codproduto"];
		$nomeproduto = $_GET["nomeproduto"];
		$preco = $_GET["preco"];
		$descricao = $_GET["descricao"];
		$codcategoria = $_GET["codcategoria"];

        include_once "view/confirmar_compra.php"; //abrir form de cadastro

    }
	
    function confirmacaoParaVender()
    {
		

		//Verifica se o usuario esta logado
		$this->logado();
		$this->verificarAcesso();//verificar se não é administrador
		
        //enviar valores vindos do formulário para a objeto da classe
		$codproduto = $_POST["codproduto"];
		$nomeproduto = $_POST["nomeproduto"];
		$preco = $_POST["preco"];
		$descricao = $_POST["descricao"];
		$vendaQuantidade = $_POST["vendaQuantidade"];
		$codcategoria = $_POST["codcategoria"];

		if($vendaQuantidade >= 1)
		{
		include_once "model/produto.php"; //incluir arquivo
        $prod = new produto(); //referência / instância
        $prod->confirmarvenda(); //executar método de cadastro contido na classe (model)
        echo "<script>alert('VENDA REALIZADA COM SUCESSO!');
        window.location='index.php?classe=produto&metodo=pesquisarParaVender';</script>";				
		}
		else
		{
        echo "<script>alert('INFORME UMA QUANTIDADE MAIOR QUE 0 !');
        window.location='index.php?classe=produto&metodo=quantidadeParaVender&codproduto=$codproduto &nomeproduto=$nomeproduto &preco=$preco &descricao=$descricao';</script>";
		}
    }
	
    function excluir()
    {
        $this->logado();	
		$this->verificarAcesso();//verificar se não é administrador
        include "model/produto.php"; //incluir classe (arquivo)
        $prod = new produto(); //instância 
        //enviar o código do usuário para identificar qual será excluído
        $prod->codproduto = $_GET["codproduto"];
        $prod->excluir(); //executando método de exclusão da model
        header("location:index.php?classe=produto&metodo=consultar");//direcionar novamente para a tela de consulta
    }

    function editar()
    {
        $this->logado();
		$this->verificarAcesso();//verificar se não é administrador
        //buscar os dados da categoria
        include_once "model/categoria.php";
        $cat = new categoria();

		$codproduto = $_GET["codproduto"];
		$nomeproduto = $_GET["nomeproduto"];
		$preco = $_GET["preco"];
		$descricao = $_GET["descricao"];
        include_once "view/edit_produto.php"; //abrir form de cadastro
    }
	
    function atualizar()
    {
        $this->logado();
		$this->verificarAcesso();//verificar se não é administrador
        include_once "model/produto.php"; //incluir arquivo
        $prod = new produto(); //referência / instância

        //enviar valores vindos do formulário para a objeto da classe
        $prod->codproduto        = $_POST["codproduto"];
        $prod->nomeproduto      = $_POST["nomeproduto"];
        $prod->codcategoria     = $_POST["codcategoria"];
        $prod->preco            = $_POST["preco"];
        $prod->descricao        = $_POST["descricao"];
        $prod->destaque         = $_POST["destaque"];

        //valida se usuario selecionou categoria e setor
		if($prod->destaque <> 5 && $prod->codcategoria <> 5)
		{
        //executar método de cadastro contido na classe (model)
        $prod->atualizar();
        echo "<script>alert('DADOS GRAVADOS COM SUCESSO!');
        window.location='index.php?classe=produto&metodo=consultar';</script>";
		}
		else
		{
		echo "<script>alert('SELECIONE O SETOR E A CATEGORIA!');
        window.location='index.php?classe=produto&metodo=consultar';</script>";
		}
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