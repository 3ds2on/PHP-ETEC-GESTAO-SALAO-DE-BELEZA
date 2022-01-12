<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Cadastro de Produto</title>
</head>
<body>

<?php include_once "topo.php"; ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-10 mx-auto">
		
            <div class="card">
            <h5 class="card-header bg-primary text-white"><i class="fal fa-prescription-bottle"></i> Recebimentos Mês a Mês</h5>
            <div class="card-body">
            <form action="index.php?classe=produto&metodo=gravar" method="post">
 
 			<fieldset>
				<a href="index.php"><img src="phplot/relatorios/venda.php" /></a><br><p>
			</fieldset>  
 
    	    </form>
			</div>
            </div>
			
        </div>
    </div>
</div>
    

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript" charset="UTF-8">
///REALIZAÇÂO DA BUSCA PELA SUB CATEGORIA PARA CADASTRO ASSOCIAÇÂO
 $(function(){
 	$('#id_categoria_z').change(function(){
 		///alert(id_categoria_z);
 		if( $(this).val() ) {
 			$('#id_sub_categoria_z').hide();
 			$('.carregando').show();
 			$.getJSON('model/sub_categorias_cadastro_pai.php?search=',{id_categoria_z: $(this).val(), ajax: 'true'}, function(j){
 				var options = '<option value="">Escolha o KIT</option>';	
 				for (var i = 0; i < j.length; i++) {
 					options += '<option value="' + j[i].codproduto + '">' +' '+ j[i].nomeproduto +' - R$: '+ j[i].preco +' - QTD: '+ j[i].quantidade +'</option>';
 				}			
 				$('#id_sub_categoria_z').html(options).show();
 				$('.carregando').hide();
 			});
 		} else {
 			$('#id_sub_categoria_z').html('<option value="">– Escolha um setor –</option>');
 		}
 	});
 });

 ///REALIZAÇÂO DA BUSCA PELA SUB CATEGORIA PARA CADASTRO ASSOCIAÇÂO
 $(function(){
 	$('#id_categoria_z').change(function(){
 		///alert(id_categoria_z);
 		if( $(this).val() ) {
 			$('#id_sub_categoria_zz').hide();
 			$('.carregando').show();
 			$.getJSON('model/sub_categorias_cadastro_filho.php?search=',{id_categoria_z: $(this).val(), ajax: 'true'}, function(j){
 				var options = '<option value="">Escolha o produto</option>';	
 				for (var i = 0; i < j.length; i++) {
 					options += '<option value="' + j[i].codproduto + '">' +' '+ j[i].nomeproduto +' - R$: '+ j[i].preco +' - QTD: '+ j[i].quantidade +'</option>';
 				}			
 				$('#id_sub_categoria_zz').html(options).show();
 				$('.carregando').hide();
 			});
 		} else {
 			$('#id_sub_categoria_zz').html('<option value="">– Escolha um setor –</option>');
 		}
 	});
 });
 </script>

</html>