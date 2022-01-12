<?php 
//Atrinuindo ao PHP a data e hora da região de Sao Paulo, com apresentação de caracteres especiais
date_default_timezone_set("America/Sao_Paulo");
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
				

class VincularFilho
{
	public $cadSetor;
	public $cadPai;
	public $cadFilho;
    public $servername = 'localhost'; public $username = 'u853940274_bdloja'; public $password = 'Julh@89742583'; public $database = 'u853940274_bdloja';
	
    function vincular_pai_filho()
    {
        //if ($this->cadSetor >= 1)
		if(!empty($this->cadSetor) && !empty($this->cadPai) && !empty($this->cadFilho))
		{
		//Criar a conexão com banco de dados 
		try {$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);} 
		catch (PDOException $e) 
		{
		echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();
		}
		
		//Verificando se vnculo já existe
		$ccadSetor = 0; $ccadPai = 0; $ccadFilho = 0;
		$sqll = "SELECT * FROM vinculo where SETOR = $this->cadSetor and PAI = $this->cadPai and FILHO = $this->cadFilho;";
		$result = mysqli_query($conn,$sqll);
		while($data = mysqli_fetch_array($result)){
		$ccadSetor = $data[0]; $ccadPai = $data[1]; $ccadFilho = $data[2];
		}
		
		if($ccadSetor == $this->cadSetor && $ccadPai == $this->cadPai && $ccadFilho == $this->cadFilho)
		{
	    echo "<script>
		alert('Este vinculo já foi realizado !!!')
		window.location.href = '../index.php?classe=produto&metodo=abrir';
		 </script>";
	    } else {
  	           $sql = "INSERT INTO vinculo (SETOR,PAI,FILHO)VALUES ('$this->cadSetor','$this->cadPai','$this->cadFilho')";
			   if ($conn->query($sql)) {
			   echo "<script>
			   alert('Vinculo realizado com sucesso!')
			   window.location.href = '../index.php?classe=produto&metodo=abrir';
			   </script>";
			   }else{
                    }
			   }
		}
		echo "<script>
			  alert('Escolha o setor, e produtos pai e filho !!!')
			  window.location.href = '../index.php?classe=produto&metodo=abrir';
			  </script>";		
	}
}


class Comprar
{
		public $codcategoria;
		public $codproduto;
		public $preco;
		public $compraQuantidade;
		public $servername = 'localhost'; public $username = 'u853940274_bdloja'; public $password = 'Julh@89742583'; public $database = 'u853940274_bdloja';
	
    function confirmarcompra()
    {
		//Criar a conexão com banco de dados 
		try {$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);} 
		catch (PDOException $e) 
		{
		echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();
		}		//Criar a conexão com banco de dados 
		try {$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);} 
		catch (PDOException $e) 
		{
		echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();
		}		
		
		
		//Buscando a quantidade do produto 		
		$quantidade  = 0;
		$sqlq = "SELECT quantidade FROM produto where codcategoria = $this->codcategoria and codproduto = $this->codproduto;";
		$resultq = mysqli_query($conn,$sqlq);
		while($data = mysqli_fetch_array($resultq))
		{
		$quantidade = $data[0];

		//Calcula nova quantidade	
		$newQuantidade = $quantidade + $this->compraQuantidade;		
		
		//Atualizando a quantidade no estoque
		$sqlu = "UPDATE produto SET quantidade = $newQuantidade where codcategoria = $this->codcategoria and codproduto = $this->codproduto;";
		if ($conn->query($sqlu) === TRUE) {
			
		} else {
		echo "Error updating record: " . $conn->error;
			   }
		}
		
	
		//Inserindo a compra do KIT
		$query = "INSERT INTO compra (setor,id,preco,quantidade) VALUES ('$this->codcategoria','$this->codproduto','$this->preco','$this->compraQuantidade')";
		if ($conn->query($query)) {
		echo "<script>alert('compra realizada, estoque atualizado !!!');</script>";		
		echo "<script>window.location.href = '../index.php?classe=produto&metodo=pesquisarParaComprar';</script>";
		}else{
		echo $conn->error;
		}
		
	}
}


class Vender
{
		public $codcategoria;
		public $codproduto;
		public $preco;
		public $vendaQuantidade;
		public $servername = 'localhost'; public $username = 'u853940274_bdloja'; public $password = 'Julh@89742583'; public $database = 'u853940274_bdloja';

		function confirmarvenda()
		{
		//Criar a conexão com banco de dados 
		try {$conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);} 
		catch (PDOException $e) 
		{
		echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();
		}

		//Buscando o produto filho		
		$idFilho = 0;
		$sqlf = "SELECT FILHO FROM vinculo where SETOR = $this->codcategoria and PAI = $this->codproduto;";
		$resultf = mysqli_query($conn,$sqlf);
		while($data = mysqli_fetch_array($resultf))
		{
		$idFilho = $data[0];
		
		//Verificando se o produto tem "filho" associado
		if($idFilho >= 1) //possui filhos
		{
			
		//Buscando a quantidade do produto filho		
		$quantidade  = 0;
		$sqlq = "SELECT quantidade FROM produto where codcategoria = $this->codcategoria and codproduto = $idFilho;";
		$resultq = mysqli_query($conn,$sqlq);
		while($data = mysqli_fetch_array($resultq))
		{
		$quantidade = $data[0];

		//Calcula nova quantidade	
		$newQuantidade = $quantidade - $this->vendaQuantidade;		
		
		//Atualizando a quantidade no estoque
		$sqlu = "UPDATE produto SET quantidade = $newQuantidade where codcategoria = $this->codcategoria and codproduto = $idFilho";
		if ($conn->query($sqlu) === TRUE) {
			
		} else {
		echo "Error updating record: " . $conn->error;
			   }
		}
		}
		}
		
		
		//Verificando se o produto tem "filho" associado
		if($idFilho >= 1) //possui filhos
		{
		//Inserindo a venda do KIT
		$query = "INSERT INTO vendas (setor,id,preco,quantidade) VALUES ('$this->codcategoria','$this->codproduto','$this->preco','$this->vendaQuantidade')";
		if ($conn->query($query)) {
		echo "<script>alert('Venda realizada, estoque atualizado !!!');</script>";		
		echo "<script>window.location.href = '../index.php?classe=produto&metodo=pesquisarParaVender';</script>";
		}else{
		echo $conn->error;
		}
		}
		
		
		if($idFilho <= 0)  // não possui filhos
		{
		//Buscando a quantidade do produto		
		$quantidade  = 0;
		$sqlqq = "SELECT quantidade FROM produto where codcategoria = $this->codcategoria and codproduto = $this->codproduto;";
		$resultqq = mysqli_query($conn,$sqlqq);
		while($data = mysqli_fetch_array($resultqq))
		{
		$quantidade = $data[0];
		}
		
		//Calcula nova quantidade	
		$newQuantidade = $quantidade - $this->vendaQuantidade;		
		
		//Atualizando a quantidade no estoque
		$sqluu = "UPDATE produto SET quantidade = $newQuantidade where codcategoria = $this->codcategoria and codproduto = $this->codproduto";
		if ($conn->query($sqluu) === TRUE) {
			
		//Inserindo a venda
		$queryvv = "INSERT INTO vendas (setor,id,preco,quantidade) VALUES ('$this->codcategoria','$this->codproduto','$this->preco','$this->vendaQuantidade')";
		if ($conn->query($queryvv)) {
		echo "<script>alert('Venda realizada, estoque atualizado !!!');</script>";		
		echo "<script>window.location.href = '../index.php?classe=produto&metodo=pesquisarParaVender';</script>";
		}else{
		echo $conn->error;
		}
		} 
		else {
		echo "Error updating record: " . $conn->error;
		     }
		}
		}
		
}


?>