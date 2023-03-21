<?php require_once("back/connect.php") ?>
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
  
?> <p>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Relatario aluno</title>
</head>
<body>
    <h3>Relatorio geral</h3>
<form action="back/relatorio.php" method="POST">
        <label id='nomec'> Nome do aluno </label><select name='id_aluno' class="form-select" aria-label="Default select example" id='cliente'>
        <?php
            $sql = "SELECT * from aluno"; //puxando dados no mysql
            $result = $connect -> query($sql); //abreviando o cod pra n ficar grande

            if($result -> num_rows){
                while($linha = $result -> fetch_assoc()){ //usado para puxar o dados e colocalos em array
                    echo "<option value=".$linha["id_aluno"].">" . $linha["login"] . "</option>"; //option 'puxa' id do cliente 'puxa' nome do cliente 
                   
                }
            }
        ?>
        </select> <p><p>
    <!-- enviar valores -->
<div class = "enviar" id='enviar'>
    <input type = "submit" class="btn btn-info" > 
    <a href = 'admin.php'><button type = 'button'> Voltar</button></a>
</div>
        </form>
</body>
</html>
