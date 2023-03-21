
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
<h3><?php echo "Seu relatorio ".$logado; ?></h3>
<table>
    <tr>
       
        <th>Nome do Curso</th>
        <th>Valor do Curso</th>
        
    </tr>
<?php
$email=$_SESSION['email'];

$sql="SELECT * from aluno where email='$email'";
$result=$connect->query($sql);
if($result->num_rows>0){
    while($linha=$result->fetch_assoc()){
        $id=$linha['id_aluno'];
    }

$sql="SELECT c.nome_cursos, c.preco_cursos,a.login, i.id_mat, i.id_curso,i.id_aluno, c.id_c
FROM aluno as a, cursos as c, inscricao as i
where a.id_aluno = i.id_aluno and c.id_c = i.id_curso and a.id_aluno = $id order by  c.nome_cursos desc";
$result=$connect->query($sql);
$total=0.0;
if($result->num_rows>0){
    while($linha=$result->fetch_assoc()){
        $total+=$linha['preco_cursos'];

echo "<tr>";
echo "<td>".$linha['nome_cursos']."</td>";
echo"<td>"." R$ ".Number_format($linha["preco_cursos"],2,",",".") ."</td>";
echo "</tr>";
        }
    }
}

?>
</table>
<?php
echo "<br>Valor total a Pagar R$".$total;
?>
<br>
<a href='aluno.php'><button>Voltar</button></a>
</div>