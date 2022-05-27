<?php
include('config/conexao.php');

if (isset($_POST['enviar'])){


$nomeShow = mysqli_real_escape_string($conn,$_POST['nomeShow']);
$localShow = mysqli_real_escape_string($conn,$_POST['localShow']);
$descricaoShow = mysqli_real_escape_string($conn,$_POST['descricaoShow']);
$capacidadeShow = mysqli_real_escape_string($conn,$_POST['capacidadeShow']);
$linkShow = mysqli_real_escape_string($conn,$_POST['linkShow']);

//Query SQL
$sql = "INSERT INTO `show`(nome,`local`,descricao, link, capacidade) VALUES('$nomeShow','$localShow','$descricaoShow', '$linkShow' , $capacidadeShow)";

//Salva no banco de dados
if (mysqli_query($conn, $sql)){
    //sucesso
    header('Location:index.php');
} else {
    echo 'Erro na query: '.mysqli_error($conn);
}

}



$conn->close();
?>


<?php include 'base_parte1.php';?>

<div class = "container mb-5 text-center">
    <h1>
        Cadastro de Show
    </h1>

</div>

<form action="cadastro_show.php" method="POST">
<div class = "container">

<div class="form-floating mb-3">
  <input type="text" class="form-control " id="nomeShow" name="nomeShow" placeholder="Rock in Rio">
  <label for="floatingInput">Nome do Show</label>
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="localShow" name="localShow" placeholder="Maracana">
  <label for="floatingInput">Local do Show</label>
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="descricaoShow" name="descricaoShow" placeholder="Só para baixinhos">
  <label for="floatingInput">Descrição do Show</label>
</div>

<div class="form-floating mb-3">
  <input type="number" class="form-control" id="capacidadeShow" name="capacidadeShow" placeholder="250 mil pessoas">
  <label for="floatingInput">Capacidade do Show</label>
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="linkShow" name="linkShow" placeholder="Link">
  <label for="floatingInput">Link da Imagem do Show</label>
</div>

<div class = "container  text-center">

    <input type="submit" class="btn btn-success" name="enviar" value="Cadastrar">
    <a href="index.php" class="btn btn-secondary">Voltar</a>

</div>
</form>


</div>

<?php include 'base_parte2.php';?>
    
