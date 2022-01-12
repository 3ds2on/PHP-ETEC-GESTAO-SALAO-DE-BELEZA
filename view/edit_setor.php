<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title> Edição de Setores</title>
</head>
<body>

<?php include_once "topo.php"; ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-10 mx-auto">
            <div class="card">
            <h5 class="card-header bg-primary text-white"><i class="fas fa-plus"></i> Edição de Setores</h5>
            <div class="card-body">
            <form action="index.php?classe=setores&metodo=atualizar" method="post">

                <div class="form-group">
                    <label>Código do Setor</label>
                    <input type="text" readonly="true" class="form-control" name="codcategoria" placeholder="Informe o Setor" value="<?php echo $dados->codcategoria;?>" required>
                </div>

                <div class="form-group">
                    <label>Descrição do Setor</label>
                    <input type="text" class="form-control" name="nomecategoria" placeholder="Nome do Setor" value="<?php echo $dados->nomecategoria;?>" required>
                </div>
      
                <input type="submit" class="btn btn-primary" value="Gravar">
			</form>
            </div>
            </div>
        </div>
    </div>
</div>
    
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
    $("#acesso").val("<?php echo $dados->acesso;?>");
</script>
</html>