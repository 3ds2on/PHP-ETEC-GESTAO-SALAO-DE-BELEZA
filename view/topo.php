<nav class="navbar navbar-expand-lg navbar-dark text-white" style="background-color: #b4918f">
  <a class="navbar-brand" href="index.php">ESPAÇO VIP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Início</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cubes"></i> Setores
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?classe=setores&metodo=abrir">Cadastrar</a>
          <a class="dropdown-item" href="index.php?classe=setores&metodo=consultar">Consultar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-users"></i> Usuários  
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?classe=usuario&metodo=abrir">Cadastrar</a>
          <a class="dropdown-item" href="index.php?classe=usuario&metodo=consultar">Consultar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-archive"></i> Produtos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?classe=produto&metodo=abrir">Cadastrar</a>
          <a class="dropdown-item" href="index.php?classe=produto&metodo=consultar">Consultar</a>
		  <a class="dropdown-item" href="index.php?classe=produto&metodo=pesquisarParaVender">Vender</a>
		  <a class="dropdown-item" href="index.php?classe=produto&metodo=pesquisarParaComprar">Comprar</a>
        </div>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-chart-pie"></i> Relatorios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?classe=relatorio&metodo=recebimentos">Recebimentos</a>
          <a class="dropdown-item" href="index.php?classe=relatorio&metodo=gastos">Despesas</a>
          <a class="dropdown-item" href="index.php?classe=relatorio&metodo=saldo">Saldo</a>
          <a class="dropdown-item" href="index.php?classe=relatorio&metodo=estoque">Estoque</a>
        </div>
        <li class="nav-item">
          <a class="nav-link" href="index.php?classe=usuario&metodo=sair"><i class="fas fa-sign-out-alt"></i> Sair</a>
      </li>
      </li>
    </ul>
  </div>
</nav>