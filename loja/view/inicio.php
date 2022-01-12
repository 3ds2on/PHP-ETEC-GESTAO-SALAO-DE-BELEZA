<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Projeto Loja</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Loja Etec</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Início <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Quem Somos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Ofertas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contato</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar..." aria-label="Search">
      <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Pesquisar</button>
    </form>
  </div>
</nav>

<div class="container">
    <div class="row mt-1">
        <div class="col">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="view/arquivos/banner1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="view/arquivos/banner1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="view/arquivos/banner1.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
        </div>
    </div>

    <div class="row mt-1">
        <div class="col-4">
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action bg-secondary text-light">
                   <h5>Categorias</h5>
                </button>
                <a href="" class="list-group-item list-group-item-action">Categoria 1</a>
                <a href="" class="list-group-item list-group-item-action">Categoria 2</a>
                <a href="" class="list-group-item list-group-item-action">Categoria 3</a>
            </div>
        </div>
        <div class="col-8">
            
            <div class="row">
                <div class="col-sm-4 mt-1">
                    <a href="">
                    <div class="card">
                        <img src="view/arquivos/notebook2.jpg" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">Produto XYZ</h5>
                            <p class="card-text">R$ 670,00</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-4 mt-1">
                    <a href="">
                    <div class="card">
                        <img src="view/arquivos/notebook2.jpg" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">Produto XYZ</h5>
                            <p class="card-text">R$ 670,00</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-4 mt-1">
                    <a href="">
                    <div class="card">
                        <img src="view/arquivos/notebook2.jpg" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">Produto XYZ</h5>
                            <p class="card-text">R$ 670,00</p>
                        </div>
                    </div>
                    </a>
                </div>
                
            </div>


        </div>

        
    </div>

    <div class="row mt-3">
        <div class="col">
            <nav aria-label="...">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Voltar</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#">Avançar</a>
                    </li>
                </ul>
                </nav>
        </div>
    </div>



</div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</html>