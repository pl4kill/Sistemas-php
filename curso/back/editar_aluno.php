
<?php
require_once "connect.php";

if($_POST){
    $login = $_POST['login'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $antigo =$_POST['antigo'];
    
    $sql="SELECT * FROM aluno WHERE `email`='$antigo'";
    $result = $connect->query($sql);
    if($result->num_rows>0){
      while($linha=$result->fetch_assoc()){
         $id_alu=$linha['id_aluno'];
      }

    $sql="UPDATE aluno SET `login`='$login', `email`='$email',`senha`='$senha' WHERE `id_aluno` = '$id_alu'";
    if($connect->query($sql)===TRUE){
        echo "<p></p>Editado com Sucesso<p></p>
        <a href='../aluno.php'><button>Voltar</button></a>";
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
      }else{
        session_destroy();
        echo "Erro ao Cadastrar";
      }
       }
    }
  
?>