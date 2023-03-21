<?php 
require_once("connect.php");
session_start(); 
$login = $_SESSION['email'];
$senha = $_SESSION['senha'];

$sql = "SELECT * FROM aluno WHERE `email` = '$login' AND `senha` = '$senha'";
$result = $connect->query($sql);
if($result -> num_rows > 0){
    while($linha = $result -> fetch_assoc()){
        $id_f = $linha['id'];
    }
}

if($_POST){
    $id_c = $_POST['id_c'];
    $qtd_c = $_POST['qtd_compra'];
    $qtd_p = $_POST['qtd'];

    $sql = "INSERT INTO compra VALUES
    (0,'$id_c','$id_f','$qtd_c')";
    if($connect->query($sql) === TRUE){

    }
}
?>