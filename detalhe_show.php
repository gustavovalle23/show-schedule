<?php
include('config/conexao.php');

if (isset($_POST['filtrar'])){
    echo $_POST['comprar'];
}

else{

$idShow = $_GET['id'];

$sql = "SELECT id, descricao, `local`, nome, link FROM `show` WHERE id = $idShow";
$result = $conn->query($sql);
echo mysqli_error($conn);

$show = mysqli_fetch_assoc($result);

$sql = "SELECT id, horario, valor, capacidade_disponivel FROM `horario` WHERE id_show = $idShow";
$result = $conn->query($sql);
echo mysqli_error($conn);

$horarios = array();


if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $horarios[] = $row;
    }
}

}
$conn->close();
?>

<?php include 'base_parte1.php';?>

<style>
#meiaEntradaCuidado { display: none;}

</style>

<div class = "container mb-5 text-center">
    <h1>
        Detalhes do Show
    </h1>

</div>

<div class = "container">

<div class = "container text-center">
    <h3>
        Nome:
        <?php echo $show['nome']?>
    </h3>
    <p>
        Descrição: 
    <?php echo $show['descricao']?>
    </p>
 
    <div>

<form action="detalhe_show.php" method="POST">
    <?php foreach ($horarios as $horario) {?>
        <div class="container card mb-5">
        <p class="mt-3">
            Data: 
                <?php echo $horario['horario']?>
        </p>
        <p>
            Valor: R$ <?php echo $horario['valor']?>
        </p>
        <p>
            Ingressos disponíveis: <?php echo $horario['capacidade_disponivel'] ?>
            <div class="form-floating mb-3">
            <input type="number"  min="0" max=<?php echo $horario['capacidade_disponivel'] ?> class="form-control" id="inteira<?php $horario['id']?>" placeholder="1">
            <label for="floatingInput">Ingressos</label>
            </div>

            <div class="form-floating mb-3">
            <input type="number" onchange="meiaEntrada()" min="0" max=<?php echo $horario['capacidade_disponivel'] ?> class="form-control" id="meia<?php $horario['id']?>" placeholder="1">
            <label for="floatingInput">Ingressos Meia Entrada</label>
            </div>
            

            <div id="meiaEntradaCuidado">
                <p>
                    Na compra de meia entrada será necessário apresentar documentos para validadção
                </p>
            </div>
        </p>
    </div>
    </div>
    <?php }?>

    <div class="mb-5">
      <input type="submit" class="btn btn-success" name="comprar" value="Comprar">
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </div>
</form>
    

</div>

</div>

<?php include 'base_parte2.php';?>

<script src="detalhes_show.js"></script>
