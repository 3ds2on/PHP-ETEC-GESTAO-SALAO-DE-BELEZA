<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Cadastro de Usuário</title>
</head>
<body>

<?php include_once "topo.php"; ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-10 mx-auto">
            <div class="card">
            <h5 class="card-header bg-primary text-white"><i class="fas fa-plus"></i> Atualizando Usuários</h5>
            <div class="card-body">
            <form action="index.php?classe=usuario&metodo=atualizar" method="post">
                <input type="hidden" name="codusuario" value="<?php echo $dados->codusuario;?>">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Informe o nome" value="<?php echo $dados->nome;?>" required>
                </div>

                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="Informe o e-mail" value="<?php echo $dados->email;?>" required>
                </div>
            
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" class="form-control" name="senha" placeholder="Informe a senha" required>
                </div>

                <div class="form-group">
                    <label>Perfil</label>
                    <select name="acesso" id="acesso" class="form-control">
						<option value="0">Informe o Perfil</option>
                        <option value="1">Administrador</option>
                        <option value="2">Usuário</option>
                    </select>
                </div>
				
				<div class="form-group">
                    <label>Setor</label>
					<select name="codcategoria" id="codcategoria" class="form-control">
						<option value="">Selecione o Setor</option>
					</select>
                </div>
                <input type="submit" class="btn btn-primary" value="Gravar">
            </div>
            </div>
        </div>
    </div>
</div>





    
    </form>
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
 	$('#acesso').change(function(){
 		///alert(acesso);
 		if( $(this).val() ) {
 			$('#codcategoria').hide();
 			$('.carregando').show();
 			$.getJSON('model/listar_setores.php?search=',{acesso: $(this).val(), ajax: 'true'}, function(j){
 				var options = '<option value="">Escolha o Setor</option>';	
 				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].codcategoria + '">' + ' ' + j[i].nomecategoria + '</option>';
 				}			
 				$('#codcategoria').html(options).show();
 				$('.carregando').hide();
 			});
 		} else {
 			$('#codcategoria').html('<option value="">– Escolha um Perfil –</option>');
 		}
 	});
 });

$("#acesso").val("<?php echo $dados->acesso;?>");
</script>
</html>