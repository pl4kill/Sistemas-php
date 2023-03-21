<?php
require_once "connect.php";

?>
<table>
    <tr>
        <th>Curso</th>
        <th>Nome do Aluno</th>
        <th>E-mail do Aluno</th>
    </tr>
<?php
$idA = $_POST['id_aluno'];

$sql="SELECT a.login, a.email, c.nome_cursos, i.id_mat 
from aluno as a, cursos as c, inscricao as i
WHERE i.id_aluno = a.id_aluno and c.id_c = i.id_curso and i.id_aluno = $idA;";

$result=$connect->query($sql);

if($result->num_rows>0){
    while($linha=$result->fetch_assoc()){

echo "<tr>";
echo"<td>".$linha['nome_cursos']."</td>";
echo "<td>".$linha['login']."</td>";
echo "<td>".$linha['email']."</td>";
echo "</tr>";

    }
}

?>
<tr><a href='../relatorio.php'><button>Voltar</button></a></tr>
</table>