<?php
// requisição da classe PHPlot
include_once("../phplot.php");
  
//Container (Estabelecendo conexão com o banco de dados) -->
//Criando as constantes com as credencias de acesso ao banco de dados
$servername = 'localhost'; $username = '**********************'; $password = '**********************'; $database = '**********************';

//Criar a conexão com banco de dados 
try {
$conn = mysqli_connect($servername, $username, $password, $database);
} catch (PDOException $e) {
echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();
                          }
					  
//inserindo no banco de dados 
$db = mysqli_select_db($conn, "**********************");   

//Configurando e iniciando o controle de sessões
session_start();
$setorVenda = $_SESSION['cod_categoria'];

//Obtendo o ano atual
$datacompleta = date("Y/m/d");
$ano = substr($datacompleta, 0, 4);
		  
//vendas no mes 01/2021	 
$sql = "SELECT sum(preco * quantidade) FROM vendas WHERE setor = $setorVenda and  data_venda between '$ano-01-01' and '$ano-01-31';";
$result = mysqli_query($conn,$sql);while($data = mysqli_fetch_array($result)){$vendas01 = $data[0];} 
//vendas no mes 02/2021	
$sql = "SELECT sum(preco * quantidade) FROM vendas WHERE setor = $setorVenda and  data_venda between '$ano-02-01' and '$ano-02-29';";
$result = mysqli_query($conn,$sql);while($data = mysqli_fetch_array($result)){$vendas02 = $data[0];} 
//vendas no mes 03/2021	
$sql = "SELECT sum(preco * quantidade) FROM vendas WHERE setor = $setorVenda and  data_venda between '$ano-03-01' and '$ano-03-31';";
$result = mysqli_query($conn,$sql);while($data = mysqli_fetch_array($result)){$vendas03 = $data[0];} 
//vendas no mes 04/2021	
$sql = "SELECT sum(preco * quantidade) FROM vendas WHERE setor = $setorVenda and  data_venda between '$ano-04-01' and '$ano-04-30';";
$result = mysqli_query($conn,$sql);while($data = mysqli_fetch_array($result)){$vendas04 = $data[0];} 
//vendas no mes 05/2021	
$sql = "SELECT sum(preco * quantidade) FROM vendas WHERE setor = $setorVenda and  data_venda between '$ano-05-01' and '$ano-05-31';";
$result = mysqli_query($conn,$sql);while($data = mysqli_fetch_array($result)){$vendas05 = $data[0];} 
//vendas no mes 06/2021	
$sql = "SELECT sum(preco * quantidade) FROM vendas WHERE setor = $setorVenda and  data_venda between '$ano-06-01' and '$ano-06-30';";
$result = mysqli_query($conn,$sql);while($data = mysqli_fetch_array($result)){$vendas06 = $data[0];} 
//vendas no mes 07/2021	
$sql = "SELECT sum(preco * quantidade) FROM vendas WHERE setor = $setorVenda and  data_venda between '$ano-07-01' and '$ano-07-31';";
$result = mysqli_query($conn,$sql);while($data = mysqli_fetch_array($result)){$vendas07 = $data[0];} 
//vendas no mes 08/2021	
$sql = "SELECT sum(preco * quantidade) FROM vendas WHERE setor = $setorVenda and  data_venda between '$ano-08-01' and '$ano-08-31';";
$result = mysqli_query($conn,$sql);while($data = mysqli_fetch_array($result)){$vendas08 = $data[0];} 
//vendas no mes 09/2021	
$sql = "SELECT sum(preco * quantidade) FROM vendas WHERE setor = $setorVenda and  data_venda between '$ano-09-01' and '$ano-09-30';";
$result = mysqli_query($conn,$sql);while($data = mysqli_fetch_array($result)){$vendas09 = $data[0];} 
//vendas no mes 10/2021	
$sql = "SELECT sum(preco * quantidade) FROM vendas WHERE setor = $setorVenda and  data_venda between '$ano-10-01' and '$ano-10-31';";
$result = mysqli_query($conn,$sql);while($data = mysqli_fetch_array($result)){$vendas10 = $data[0];} 
//vendas no mes 11/2021	
$sql = "SELECT sum(preco * quantidade) FROM vendas WHERE setor = $setorVenda and  data_venda between '$ano-11-01' and '$ano-11-31';";
$result = mysqli_query($conn,$sql);while($data = mysqli_fetch_array($result)){$vendas11 = $data[0];} 
//vendas no mes 12/2021	
$sql = "SELECT sum(preco * quantidade) FROM vendas WHERE setor = $setorVenda and  data_venda between '$ano-12-01' and '$ano-12-31';";
$result = mysqli_query($conn,$sql);while($data = mysqli_fetch_array($result)){$vendas12 = $data[0];} 

  
// Array com dados de Ano x Índice de fecundidade Brasileira 1940-2000
// Valores por década
$data = array(
             array('Jan' , $vendas01), 
             array('Fev' , $vendas02),
             array('Mar' , $vendas03),
     	     array('Abr' , $vendas04),
             array('Mai' , $vendas05),
             array('Jun' , $vendas06),
             array('Jul' , $vendas07),
             array('Ago' , $vendas08),
             array('Set' , $vendas09),
             array('Out' , $vendas10),
             array('Nov' , $vendas11),
             array('Dez' , $vendas12)
             );     
# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura                 
$plot = new PHPlot(300 , 170);     
  
// Organiza Gráfico -----------------------------
$plot->SetTitle(''); //AQUI PODE COLOCAR O TITULO DO GASTO 
# Precisão de uma casa decimal
$plot->SetPrecisionY(1);
# tipo de Gráfico em barras (poderia ser linepoints por exemplo)
$plot->SetPlotType("bars");
# Tipo de dados que preencherão o Gráfico text(label dos anos) e data (valores de porcentagem)
$plot->SetDataType("text-data");
# Adiciona ao gráfico os valores do array
$plot->SetDataValues($data);
// -----------------------------------------------
  
// Organiza eixo X ------------------------------
# Seta os traços (grid) do eixo X para invisível
$plot->SetXTickPos('none');
# Texto abaixo do eixo X
$plot->SetXLabel("Total de vendas em cada mes");
# Tamanho da fonte que varia de 1-5
$plot->SetXLabelFontSize(2);
$plot->SetAxisFontSize(2);
// -----------------------------------------------
  
// Organiza eixo Y -------------------------------
# Coloca nos pontos os valores de Y
$plot->SetYDataLabelPos('plotin');
// -----------------------------------------------
  
// Desenha o Gráfico -----------------------------
$plot->DrawGraph();
// -----------------------------------------------
?>
