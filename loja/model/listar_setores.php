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

	$acesso = $_REQUEST['acesso'];
	
	$result_sub_cat = "SELECT codcategoria , nomecategoria FROM categoria ORDER BY codcategoria;";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$nomecategoria[] = array(
			'codcategoria'	=> $row_sub_cat["codcategoria"],
			'nomecategoria'	=> $row_sub_cat["nomecategoria"],
		);
	}

	echo utf8_encode(json_encode($nomecategoria));
