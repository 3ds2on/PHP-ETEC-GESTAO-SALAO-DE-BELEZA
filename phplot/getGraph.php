<?php
// requisição da classe PHPlot
include_once("/var/www/html/EspacoVip/phplot/phplot.php");
  
// Array com dados de Ano x Índice de fecundidade Brasileira 1940-2000
// Valores por década
$data = array(
             array('1940' , 6.2 ), 
             array('1950' , 6.2 ),
             array('1960' , 6.3 ),
             array('1970' , 5.8 ),
             array('1980' , 4.4 ),
             array('1991' , 2.9 ),
             array('2000' , 2.3 )
             );     
# Cria um novo objeto do tipo PHPlot com 500px de largura x 350px de altura                 
$plot = new PHPlot(350 , 250);     
  
// Organiza Gráfico -----------------------------
$plot->SetTitle('Índice de lucro mes a mes');
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
$plot->SetXLabel("Índice de lucro mes a mes");
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
