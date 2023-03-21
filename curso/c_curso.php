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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cursos</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<body>
    <h3>Cadastrar curso</h3>
    <form action="back/c_curso.php" method="POST">
    <div class="form-row">
        <div class="col-md-2">
    <label>Nome do curso</label><p></p>
    <input type="text" name="nome_cursos" class="form-control" required><p></p>
        </div>
</div>

<div class="form-row">
        <div class="col-md-2">
    <label>Valor curso</label><p></p>
    <input type="text" name="preco_cursos" class="form-control" required><p></p>
    </div> 
</div>

<div class="form-row">
        <div class="col-md-2">
    <label>Quantidade curso</label><p></p>
    <input type="text" name="vagas_cursos" class="form-control" required><p></p>
    </div>
</div>

    <input type="submit">
    <a href="admin.php"><button type="button">Voltar</button></a>
</form>
</body>
</html>