<?php
        //enviar valores vindos do formulário para a objeto da classe
		$codproduto = $_POST["codproduto"];
		$nomeproduto = $_POST["nomeproduto"];
		$preco = $_POST["preco"];
		$descricao = $_POST["descricao"];
		$vendaQuantidade = $_POST["vendaQuantidade"];
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

		if($vendaQuantidade >= 1)
		{
		include('../model/produtos_servicos.php'); //incluir arquivo 
		$v = new Vender(); //instância da classe 
		$v->codcategoria = $codcategoria; //Consumindo a clase para atribuir um valor
		$v->codproduto = $codproduto; //Consumindo a clase para atribuir um valor
		$v->vendaQuantidade = $vendaQuantidade; //Consumindo a clase para atribuir um valor
		$v->preco = $preco; //Consumindo a clase para atribuir um valor
		$nomeproduto = $nomeproduto;
		$descricao = $descricao ;
		$v->confirmarvenda(); //Consumindo a clase e acionando o metodo
		}
		else
		{
        echo "<script>alert('INFORME UMA QUANTIDADE MAIOR QUE 0 !');
        window.location='../index.php?classe=produto&metodo=quantidadeParaVender&codproduto=$codproduto &nomeproduto=$nomeproduto &preco=$preco &descricao=$descricao &codcategoria=$codcategoria';</script>";
		}
			
?>