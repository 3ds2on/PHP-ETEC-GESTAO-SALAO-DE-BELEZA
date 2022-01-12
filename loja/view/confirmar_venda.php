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
            <h5 class="card-header text-white" style="background-color: #b4918f"><i class="fas fa-plus"></i> Vender produto</h5>
            <div class="card-body"> 
            <form action="controller/vender.php" method="post">
			
                <div class="form-group">
                    <input type="hidden" class="form-control" name="codcategoria" value=" <?php echo$codcategoria; ?>" readonly="true" required>
                </div>
			
                <div class="form-group">
                    <label>Código</label>
                    <input type="text" class="form-control" name="codproduto" value=" <?php echo$codproduto; ?>" readonly="true" required>
                </div>
			
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nomeproduto" placeholder="Informe o nome do produto" value=" <?php echo$nomeproduto; ?>" readonly="true" required>
                </div>

                <div class="form-group">
                    <label>Preço</label>
                    <input type="text" step="any" class="form-control" name="preco" placeholder="Informe o preço" value=" <?php echo$preco; ?>" readonly="true" required>
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <textarea name="descricao" class="form-control" readonly="true"><?php echo$descricao; ?> </textarea>
                </div>

				<div class="form-group">
                    <label>Quantidade para venda</label>
                    <input type="number" step="any" class="form-control" name="vendaQuantidade" id="vendaQuantidade" placeholder="Informe a quantidade" required>
                </div>    
                
                <input type="submit" class="btn text-white" style="background-color: #b4918f" value="Enviar">
    	    </form>
			</div>
            </div>
			
			<br></br>

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



</html>