<?php 
require_once "connect.php";
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$result = $connect->query("SELECT * FROM `aluno` WHERE `email` = '$email' AND `senha` = '$senha'");
if(mysqli_num_rows ($result) > 0){
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header('location:../aluno.php');
}else if(!mysqli_num_rows ($result) > 0){


$result = $connect->query("SELECT * FROM `admin` WHERE `email` = '$email' AND `senha` = '$senha'");
if(mysqli_num_rows ($result) > 0){
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header('location:../admin.php');
}else{
    unset ($_SESSION['email']);
    unset ($_SESSION['senha']);
    header('location:../index.php');
}
}
?>