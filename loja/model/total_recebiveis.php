<?php 
    //Atrinuindo ao PHP a data e hora da região de Sao Paulo, com apresentação de caracteres especiais
    date_default_timezone_set("America/Sao_Paulo");
	setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
  
    //Criando as constantes com as credencias de acesso ao banco de dados
    $servername = 'localhost'; $username = 'u853940274_bdloja'; $password = 'Julh@89742583'; $database = 'u853940274_bdloja';
     
    //Criar a conexão com banco de dados 
    try {
    $conn = mysqli_connect($servername, $username, $password, $database);
    } catch (PDOException $e) {
    echo "Erro: Conexão com banco de dados não foi realizada com sucesso. Erro gerado " . $e->getMessage();
                              }
     					  
    //inserindo no banco de dados 
    $db = mysqli_select_db($conn, "u853940274_bdloja"); 
	
	header ('Content-type: text/html; charset=utf-8');
	
	//Configurando e iniciando o controle de sessões
	session_start();
	$setor = $_SESSION['cod_categoria'];

	//Obtendo a data atual
	$datacompleta = date("Y/m/d");
	//Obtendo o ano atual
	$ano = substr($datacompleta, 0, 4);
	//Obtendo o mes atual
	$mes = substr($datacompleta, 5, 2);
	
	$result_sub_cat = "SELECT sum(preco * quantidade) as total FROM vendas where setor = $setor and  data_venda between '$ano-$mes-01' and '$ano-$mes-31';";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'total'	=> number_format($row_sub_cat["total"],2,",","."),
		);
	}

	echo utf8_encode(json_encode($sub_categorias_post));
