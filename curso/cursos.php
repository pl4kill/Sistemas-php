<?php
require_once "back/connect.php";
?>
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
    <title>Comprar curso</title>

</head>
<body>
<h3>Comprar cursos</h3>
<form method="post" action="back/cursos.php">
<select name="cursos">
<?php

$sql="SELECT * FROM cursos";
$result=$connect->query($sql);
if($result->num_rows>0){
    while($linha=$result->fetch_assoc()){

echo "<option value=".$linha['id_c'].">".$linha["nome_cursos"]." -> Preço: R$".$linha["preco_cursos"]." Vagas: ".$linha["vagas_cursos"]."</option>";

    }
}

?>
</select>

<button type="submit">Escolher</button>
</form>
<br><br>
<a href="aluno.php"><button>Voltar</button></a>
</body>
</html>