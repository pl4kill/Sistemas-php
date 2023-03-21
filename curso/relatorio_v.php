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
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio alunos cursos</title>
</head>
<body>
<h3>Relatorio vagas</h3>
    <form action="back/relatorio_v.php" method="post">
        <label>Cursos disponiveis </label><select name="id_c">
        <?php 
            $sql = "SELECT * FROM cursos";
            $result = $connect->query($sql);
            if($result->num_rows){
                while($linha = $result->fetch_array()){
                    echo "<option value=".$linha['id_c'].">".$linha['nome_cursos']."</option>";
                }
            }
        ?>
        </select><p></p>
        <input type="submit">
        <a href="admin.php"><button type="button">Voltar</button></a>

    </form>
</body>
</html>