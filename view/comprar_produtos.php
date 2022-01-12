<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
    <title>Comprar de Produtos</title>
	
<style type="text/css">

/* Table Base */

table {
  font-family: arial;
  max-width: 100%;
  background-color: transparent;
  border-collapse: collapse;
  border-spacing: 0;
}

.table { 
  width: 100%;
  margin-bottom: 20px;
}

.table th,
.table td {
  font-weight: normal;
  font-size: 12px;
  padding: 8px 15px;
  line-height: 20px;
  text-align: left;
  vertical-align: middle;
  border-top: 1px solid #dddddd;
}
.table thead th {
  background: #eeeeee;
  vertical-align: bottom;
}   
.table tbody > tr:nth-child(odd) > td,
.table tbody > tr:nth-child(odd) > th {
  background-color: #fafafa;
}    
.table .t-small {
  width: 5%;
}
.table .t-medium {
  width: 15%;
}
.table .t-status {
  font-weight: bold;
}
.table .t-active {
  color: #46a546;
}
.table .t-inactive {
  color: #e00300;
}
.table .t-draft {
  color: #0a0102;
}
.table .t-scheduled {
  color: #049cdb;
}

/* Small Sizes */
@media (max-width: 480px) { 
  .table-action thead {
    display: none;
  }
  .table-action tr {
    border-bottom: 1px solid #dddddd;
  }
  .table-action td {
    border: 0;
  }
  .table-action td:not(:first-child) {
    display: block;
  }
}
</style>
	
</head>
<body>

<?php include_once "topo.php"; ?>

<div class="container">
    <div class="row mt-3">
        <div class="col-10 mx-auto">
            <div class="card">
            <h5 class="card-header bg-primary text-white"><i class="fas fa-plus"></i> Comprar produto</h5>
            <div class="card-body">
              <table class="table table-striped table-action" id="tabelaConsulta">
                    <thead>
					<th class='t-small'>Código</th>
                    <th class='t-small'>Produto</th>
                    <th class='t-small'>Preço</th>
                    <th class='t-small'>Descrição</th>
                    <th class='t-small'>kit</th>
                    <th class='t-small'>Categoria</th>
                    <th class='t-small'>Ação</th>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($dados as $value):
                            if($value->destaque == 1) $value->destaque = "Sim";
                            else $value->destaque = "Não";
							if($value->codcategoria == 1) 
							$value->codcategorian = "MANICURE";
							else if ($value->codcategoria == 3) 
							$value->codcategorian = "ESTETICA";
							else if ($value->codcategoria == 4) 
							$value->codcategorian = "MAQUIAGEM";
							else 
							$value->codcategorian = "CAPILAR";
						?>
                            <tr>
								<td class="t-status t-draft"> <?php echo $value->codproduto; ?> </td>
                                <td class="t-status t-draft"> <?php echo $value->nomeproduto;?> </td>
                                <td class="t-status t-draft"> <?php echo $value->preco; ?> </td>
                                <td class="t-status t-draft"> <?php echo $value->descricao; ?> </td>
                                <td class="t-status t-draft"> <?php echo $value->destaque; ?> </td>
                                <td class="t-status t-draft"> <?php echo $value->codcategorian; ?> </td>
                                <td class="t-status t-draft"> 
									<a class="btn btn-success btn-sm" href="index.php?classe=produto&metodo=quantidadeParaComprar&codproduto=<?php echo $value->codproduto;?> &nomeproduto=<?php echo $value->nomeproduto;?> &preco=<?php echo $value->preco;?> &descricao=<?php echo $value->descricao;?>  &codcategoria=<?php echo $value->codcategoria;?>"><i class="fas fa-check"></i>Compra</a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script>
$(document).ready(function() {
    $('#tabelaConsulta').DataTable( {
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Resultados por página _MENU_",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            "select": {
                "rows": {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            }
        },
    } );
} );
</script>
</html>