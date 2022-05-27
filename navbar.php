<!--
    Pesquisa
-->    

<nav  class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="imagens/logo1.png" class="d-block " alt="ShowFlix"
            width="100" 
            height="100"
        />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cadastro_show.php">Cadastro de Shows</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cadastro_horarios.php">Cadastro de Data</a>
          </li>

        </ul>
        <form action="index.php" method="POST">
        <input class="form-control me-2" type="date" placeholder="Search" name = "from" aria-label="Search">
          <input class="form-control me-2" type="date" placeholder="Search" name = "to" aria-label="Search">
          <input type="submit" class="btn btn-success" name="filtrar" value="Filtrar">
        </form>
      </div>
    </div>
  </nav>


