<?php
include('config/conexao.php');

if (isset($_POST['enviar'])){


$horaShow = mysqli_real_escape_string($conn,$_POST['horaShow']);
$diaShow = mysqli_real_escape_string($conn,$_POST['diaShow']);
$valorShow = mysqli_real_escape_string($conn,$_POST['valorShow']);
$idShow = mysqli_real_escape_string($conn,$_POST['show']);

$sql = "SELECT id, descricao, `local`, nome, link, capacidade FROM `show` WHERE id = $idShow";
$result = $conn->query($sql);
echo mysqli_error($conn);

$show = mysqli_fetch_assoc($result);

$idShow = $show['id'];
$capacidadeShow = $show['capacidade'];

//Query SQL
$sql = "INSERT INTO horario(horario,id_show, valor, capacidade_disponivel) VALUES('$diaShow $horaShow',$idShow, $valorShow, $capacidadeShow)";

// Salva no banco de dados
if (mysqli_query($conn, $sql)){

   header('Location:index.php');
} else {
    echo 'Erro na query: '.mysqli_error($conn);
}

}

$sql = "SELECT id, nome FROM `show`";
$result = $conn->query($sql);
echo mysqli_error($conn);

$shows = array();

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $shows[] = $row;
    }
}

$conn->close();
?>

<?php include 'base_parte1.php';?>

<div class = "container mb-5 text-center">
    <h1>
        Cadastro de Horário
    </h1>

</div>

<form action="cadastro_horarios.php" method="POST">

<div class = "container">

<div class="form-floating mb-3">
  <input type="time" class="form-control " id="nomeShow" name="horaShow" placeholder="Rock in Rio">
  <label for="floatingInput">Horario do Show</label>
</div>

<div class="form-floating mb-3">
  <input type="date" class="form-control" id="localShow" name="diaShow" placeholder="Maracana">
  <label for="floatingInput">Dia do Show</label>
</div>

<div class="form-floating mb-3">
  <input type="number" step="0.1" class="form-control" id="descricaoShow" name="valorShow" placeholder="Só para baixinhos">
  <label for="floatingInput">Valor do Ingresso</label>
</div>

<select name="show" class="form-select mb-3" aria-label="Default select example">
  <option selected>Selecione o Show</option>
  
  <?php foreach ($shows as $show) {?>
            <option value= <?php echo $show['id']?>> <?php echo $show['nome']?></option>
        <?php } ?>
</select>

<div class = "container  text-center">

    <input type="submit" class="btn btn-success" name="enviar" value="Cadastrar">
    <a href="index.php" class="btn btn-secondary">Voltar</a>

</div>

</div>
</form>

<?php include 'base_parte2.php';?>
