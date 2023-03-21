
<?php 
require_once("back/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<style>
  *{
    font-family: Arial;
  }
</style>
<body>
<?php 
session_start();
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
  header('location:index.php');
  }else{}
$email = $_SESSION['email'];

$sql = "SELECT * FROM `admin` WHERE `email` = '$email'";
$result = $connect->query($sql);
if($result -> num_rows > 0){
  while($linha = $result -> fetch_assoc()){
    $logado=$linha['login'];
  }
}
  
?>
<h1> <?php echo "Seja Bem-Vindo ".$logado; ?> </h1>
    <a href="c_curso.php"><button type="button" class="btn btn-secondary" style="margin: 0 15px;">Cadastrar Curso</button></a>
    <a href="relatorio.php"><button type="button" class="btn btn-secondary" style="margin: 0 15px;">Relatorio Alunos</button></a>
    <a href="relatorio_c.php"><button type="button" class="btn btn-secondary" style="margin: 0 15px;">Relatorio Cursos</button></a>
    <a href="relatorio_c.php"><button type="button" class="btn btn-secondary" style="margin: 0 15px;">Relatorio Vagas</button></a>
    <a href="sair.php"><button type="button" class="btn btn-danger" style="margin: 0 15px;">Sair</button></a>
</body>
</html>