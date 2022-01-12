<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <title>Projeto Loja</title>
</head>
<body>

<?php include_once "topo.php"; ?>

<div class="container">
    <div class="row mt-3">
            <div class="col">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Bem-vindo!</strong> <?php echo $_SESSION["nome_logado"]; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
    </div>
	
    <div class="row mt-3">
            <div class="col">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Você esta associado(a) ao setor: </strong> 
					<?php 
					
					$desc_categoria = $_SESSION["cod_categoria"];
					if($desc_categoria == 1)
					{						
					echo "MANICURE";
					}
					else if ($desc_categoria == 3) 
					{
					echo "ESTETICA";
					}
					else if ($desc_categoria == 4) 
					{
					echo "MAQUIAGEM";
					}
					else 
					{
					echo "CAPILAR";
					}
					
					?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
    </div>
	
    <div class="row mt-3">
	
        <div class="col-sm-4">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"><i class="far fa-arrow-alt-circle-down"></i> Recebiveis do mês atual</h4>	
			    <h1 class="display-4"><span name="total_recebiveis_final" id="total_recebiveis_final"> </span></h1>
                <hr>
                <p class="mb-0"><a href="index.php?classe=relatorio&metodo=recebimentos">Detalhes...</a></p>
            </div>
        </div>
		
        <div class="col-sm-4">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading"><i class="far fa-arrow-alt-circle-up"></i> Gastos do mês atual</h4>
			    <h1 class="display-4"><span name="total_gastos_final" id="total_gastos_final"> </span></h1>
                <hr>
                <p class="mb-0"><a href="index.php?classe=relatorio&metodo=gastos">Detalhes...</a></p>
            </div>
        </div>
		
        <div class="col-sm-4">
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading"><i class="fas fa-balance-scale"></i> Saldo do mês atual</h4>
			    <h1 class="display-4"><span name="total_saldo_final" id="total_saldo_final"> </span></h1>
                <hr>
                <p class="mb-0"><a href="index.php?classe=relatorio&metodo=saldo">Detalhes...</a></p>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script type="text/javascript" charset="UTF-8">

$(document).ready(function(){

 			$('#total_recebiveis_final').hide();
 			$('.carregando').show();
 			$.getJSON('model/total_recebiveis.php?search=',{total_recebiveis: $(this).val(), ajax: 'true'}, function(j){
 				var optionsr = ' ';	
 				for (var i = 0; i < j.length; i++) {
					optionsr += j[i].total;
 				}			
 				$('#total_recebiveis_final').html(optionsr).show();
 				$('.carregando').hide();
 			});
			
			
});

$(document).ready(function(){

 			$('#total_gastos_final').hide();
 			$('.carregando').show();
 			$.getJSON('model/total_gastos.php?search=',{total_gastos: $(this).val(), ajax: 'true'}, function(j){
 				var optionsg = ' ';	
 				for (var i = 0; i < j.length; i++) {
					optionsg += j[i].total;
 				}			
 				$('#total_gastos_final').html(optionsg).show();
 				$('.carregando').hide();
 			});
			
});

$(document).ready(function(){
			
 			$('#total_saldo_final').hide();
 			$('.carregando').show();
 			$.getJSON('model/total_saldo.php?search=',{total_saldo: $(this).val(), ajax: 'true'}, function(j){
 				var optionss = ' ';	
 				for (var i = 0; i < j.length; i++) {
					optionss += j[i].total;
 				}			
 				$('#total_saldo_final').html(optionss).show();
 				$('.carregando').hide();
 			});

});
 </script>

</html>