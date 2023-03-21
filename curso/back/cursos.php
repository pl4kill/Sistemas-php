<?php
require_once "connect.php";
   if($_POST){
      session_start();
      $email=$_SESSION['email'];
      $senha=$_SESSION['senha'];
      $id_cs=$_POST['cursos'];

      $sql="SELECT *from aluno WHERE email='$email' and senha='$senha'";
      $result=$connect->query($sql);
      if($result->num_rows>0){
         while($row=$result->fetch_assoc()){
            $id_alu=$row['id_aluno'];
  
        }
        $sql="SELECT * FROM inscricao WHERE id_aluno = $id_alu and id_curso = $id_cs";
         $result=$connect->query($sql);
        if($result->num_rows>0){
         while($row=$result->fetch_assoc()){
            echo "Voce ja faz parte desse curso.<p>";
            echo "<br><a href='../cursos.php'><button>Voltar</button></a>";
         }
      }else{
         $sql="SELECT * FROM  cursos WHERE id_c = $id_cs";
         $result=$connect->query($sql);
            if($result->num_rows>0){
               while($row=$result->fetch_assoc()){
                  $vagas=$row['vagas_cursos'];
                  $fechada=$row['vagas_ocupadas'];
               } 
                  if($vagas==0){
                     echo "Sem vagas no curso, volte mais tarde<br>";
                     echo"<br><a href='../cursos.php'><button>Voltar</button></a>";
               }else{
                  
               $vagas-=1;
               $fechada+=1;
               $sql="UPDATE cursos SET vagas_cursos = $vagas, vagas_ocupadas = $fechada WHERE id_c = $id_cs";
               if($connect->query($sql)){
                           $sql="INSERT INTO inscricao values(null,$id_alu,$id_cs)";
                           if($connect->query($sql)===TRUE){
                              echo "Inscricao feita com sucesso<p>" ;
                              echo "<br><a href='../aluno.php'><button>Início</button></a>";

                     }
                  }
               }
            }
         }
      }
   }

 ?>