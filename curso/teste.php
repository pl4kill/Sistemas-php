<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/aluno.css">
    
</head>
<!-- php -->
<?php 
require_once("back/connect.php");
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
  header('location:index.php');
  }else{}
$email = $_SESSION['email'];

$sql = "SELECT * FROM `aluno` WHERE `email` = '$email'";
$result = $connect->query($sql);
if($result -> num_rows > 0){
  while($linha = $result -> fetch_assoc()){
    $logado=$linha['login'];
  }
}
?>

<!-- html -->
<body>
    <header>
        <h2 class="logo"> <?php echo "Seja bem vindo "."<br>".$logado; ?> </h2>
        <nav>
            <ul class="barra">
                <li><a href="cursos.php">Comprar cursos</a></li>
                <li><a href="relatorio_a.php">Meu relatorio</a></li>
                <li><a href="editar_aluno.php">Editar perfil</a></li>
            </ul>
        </nav>
        <a class="sair" href="#"><button>Sair</button></a>
    </header>
        <h2 class="curso">Cursos disponiveis</h2>
    <table class="table" >
    <tr>
        <th scope="col">Curso</th>
        <th scope="col">Valor Curso</th>
        <th scope="col">Vagas cursos</th>
    </tr>
<?php
$sql="SELECT * FROM cursos WHERE vagas_cursos>1";
$result=$connect->query($sql);
if($result->num_rows>0){
    while($linha=$result->fetch_assoc()){
      echo "<tr>";
      echo"<td>".$linha['nome_cursos']."</td>";
      echo"<td>"." R$ ".Number_format($linha["preco_cursos"],2,",",".") ."</td>";
      echo "<td>".$linha['vagas_cursos']."</td>";
      echo "</tr>";
    }
    }

?>
</table>
</body>
</html>