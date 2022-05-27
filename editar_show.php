<?php
include('config/conexao.php');


if (isset($_POST['enviar'])){
    $idShow = $_POST['idShow'];
    $nomeShow = mysqli_real_escape_string($conn,$_POST['nomeShow']);
    $localShow = mysqli_real_escape_string($conn,$_POST['localShow']);
    $descricaoShow = mysqli_real_escape_string($conn,$_POST['descricaoShow']);
    $capacidadeShow = mysqli_real_escape_string($conn,$_POST['capacidadeShow']);
    $linkShow = mysqli_real_escape_string($conn,$_POST['linkShow']);
    
    
    $sql = "UPDATE `show` 
    SET nome = '$nomeShow',
    `local` = '$localShow',
    descricao = '$descricaoShow',
    link = '$linkShow',
    capacidade = $capacidadeShow
    WHERE id = $idShow";

//Salva no banco de dados
if (mysqli_query($conn, $sql)){
    //sucesso
    header('Location:index.php');
} else {
    echo 'Erro na query: '.mysqli_error($conn);
}

}

$idShow = $_GET['id'];

$sql = "SELECT id, descricao, `local`, nome, link, capacidade FROM `show` WHERE id = $idShow";
$result = $conn->query($sql);
echo mysqli_error($conn);

$show = mysqli_fetch_assoc($result);

$sql = "SELECT id, horario, valor FROM `horario` WHERE id_show = $idShow";
$result = $conn->query($sql);
echo mysqli_error($conn);

$horarios = array();

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $horarios[] = $row;
    }
}

$conn->close();
?>

<?php include 'base_parte1.php';?>


<div class = "container mb-5 text-center">
    <h1>
        Editar Show: <?php echo $show['nome'] ?>
    </h1>
    
</div>

<form action="editar_show.php" method="POST">
    <div class = "container">
        <div style="display: none">
            <input type="text" name="idShow"
            value="<?php echo $show['id'] ?>" 
            >
        </div>
        
<div class="form-floating mb-3">
  <input type="text" class="form-control " id="nomeShow" name="nomeShow" placeholder="Rock in Rio"
  value="<?php echo $show['nome'] ?>" 
  >
  <label for="floatingInput">Nome do Show</label>
</div>

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="localShow" name="localShow" placeholder="Maracana"
  value="<?php echo $show['local'] ?>"
  >
  <label for="floatingInput">Local do Show</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="descricaoShow" name="descricaoShow" placeholder="Só para baixinhos"
    value="<?php echo $show['descricao'] ?>"
    >
  <label for="floatingInput">Descrição do Show</label>
</div>

<div class="form-floating mb-3">
  <input type="number" class="form-control" id="capacidadeShow" name="capacidadeShow" placeholder="250 mil pessoas"
  value="<?php echo $show['capacidade'] ?>"
  >
  <label for="floatingInput">Capacidade do Show</label>
</div>

<div class="form-floating mb-3">
    <input type="text" class="form-control" id="linkShow" name="linkShow" placeholder="Link"
    value="<?php echo $show['link'] ?>" 
  >
  <label for="floatingInput">Link da Imagem do Show</label>
  <a target="_blank" href=<?php echo $show['link'] ?>>Visualizar imagem</a>
</div>



<div class = "container  text-center">

    <input type="submit" class="btn btn-success" name="enviar" value="Cadastrar">
    <a href="index.php" class="btn btn-secondary">Voltar</a>

</div>
</form>


</div>

    



<?php include 'base_parte2.php';?>

