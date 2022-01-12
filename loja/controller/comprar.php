<?php
        //enviar valores vindos do formulário para a objeto da classe
		$codproduto = $_POST["codproduto"];
		$nomeproduto = $_POST["nomeproduto"];
		$preco = $_POST["preco"];
		$descricao = $_POST["descricao"];
		$compraQuantidade = $_POST["compraQuantidade"];
		$codcategoria = $_POST["codcategoria"];
		
		//Configurando e iniciando o controle de sessões
		session_start();
		
		function verificarAcesso()
		{
			if($_SESSION["acesso_logado"] == 2) //usuário limitado
			{
				echo "<script>alert('VOCÊ NÃO TEM ACESSO A ESSA FUNÇÃO!');
				window.location='index.php';</script>";		
				exit;
			}        
		}

		if($compraQuantidade >= 1)
		{
		include('../model/produtos_servicos.php'); //incluir arquivo 
		$v = new Comprar(); //instância da classe 
		$v->codcategoria = $codcategoria; //Consumindo a clase para atribuir um valor
		$v->codproduto = $codproduto; //Consumindo a clase para atribuir um valor
		$v->compraQuantidade = $compraQuantidade; //Consumindo a clase para atribuir um valor
		$v->preco = $preco; //Consumindo a clase para atribuir um valor
		$nomeproduto = $nomeproduto;
		$descricao = $descricao ;
		$v->confirmarcompra(); //Consumindo a clase e acionando o metodo
		}
		else
		{
        echo "<script>alert('INFORME UMA QUANTIDADE MAIOR QUE 0 !');
        window.location='../index.php?classe=produto&metodo=quantidadeParaComprar&codproduto=$codproduto &nomeproduto=$nomeproduto &preco=$preco &descricao=$descricao &codcategoria=$codcategoria';</script>";
		}
		

		
?>