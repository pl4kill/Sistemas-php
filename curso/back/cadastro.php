<?php 
require_once("connect.php");

if($_POST){

    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM `aluno` WHERE `email` = '$email'";
        $result = $connect->query($sql);
            if($result -> num_rows > 0){
                while($linha = $result -> fetch_assoc()){
                    echo "<p></p>Esse E-mail já foi cadastrado, tente com outra E-mail<p></p>";
                    echo "<a href='../cadastro.php'><button type='button'>Voltar</button></a>";
                }
            }else{
                 $sql = "SELECT * FROM `aluno` WHERE `login` = '$login'";
                 $result = $connect->query($sql);
                    if($result -> num_rows > 0){
                        while($linha = $result -> fetch_assoc()){
                            echo "<p></p>Esse nome já foi cadastrado, tente com outro nome<p></p>";
                            echo "<a href='../cadastro.php'><button type='button'>Voltar</button></a>";
                        }                 
            }else{
                $Sql = "INSERT INTO aluno VALUES 
                (0,'$email','$login','$senha')";
                if($connect -> query($Sql) === TRUE){
                    echo "<p></p>Cadastro feito com sucesso<p></p>";
                    echo "<a href='../index.php'><button type='button'>Voltar</button></a>";
            }
        }
    }
}
        

?>