<?php
include('config/conexao.php');

if (isset($_POST['filtrar'])){
     
    
    $date_from   = $_POST['from'];
    $date_to     = $_POST['to'];

    $sql = "SELECT distinct `show`.id, descricao, `local`, nome, link 
    FROM `show`
    INNER JOIN horario
        ON `show`.id = horario.id_show
    WHERE DATE(horario.horario)
    BETWEEN  '$date_from' AND '$date_to'"; 

$result = $conn->query($sql);
echo mysqli_error($conn);

$shows = array();

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $shows[] = $row;
    }
}
}
else{
$sql = "SELECT id, descricao, `local`, nome, link FROM `show`";
$result = $conn->query($sql);
echo mysqli_error($conn);

$shows = array();

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $shows[] = $row;
    }
}
}





$conn->close();
?>

<?php include 'base_parte1.php';?>

    <div class="container">
        <div class="row">
        <?php foreach ($shows as $show) {?>
          <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src=<?php echo $show['link']?> class="card-img-top" alt=<?php echo $show['nome']?>>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $show['nome']?></h5>
                        <p class="card-text"><?php echo $show['descricao']?> 
                        </p>
                        <a href="detalhe_show.php?id=<?php echo $show['id']?>" class="btn btn-primary">Comprar</a>
                        <a href="editar_show.php?id=<?php echo $show['id']?>" class="btn btn-primary">Editar</a>
                    </div>
                </div>
            </div>
        <?php } ?>
            

               
        </div>
    </div>

<?php include 'base_parte2.php';?>
