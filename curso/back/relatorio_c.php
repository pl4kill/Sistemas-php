<?php require_once("connect.php"); ?>
<table>
    <tr>
        <th>Curso</th>
        <th>Valor Curso</th>
        <th>Nome do Aluno</th>
        <th>E-mail do Aluno</th>
    </tr>

    <?php 
if($_POST){

$id = $_POST["id_c"];

    $sql="SELECT a.login, a.email, c.nome_cursos, c.preco_cursos ,c.vagas_cursos,c.vagas_ocupadas
    FROM aluno as a, cursos as c, inscricao as i
    WHERE a.id_aluno = i.id_aluno and c.id_c = i.id_curso and i.id_curso = '$id'";
    
    $result=$connect->query($sql);
    if($result->num_rows>0){
        while($linha=$result->fetch_assoc()){
     $v = $linha['vagas_cursos'];
     $o = $linha['vagas_ocupadas'];
     
    echo "<tr>";
    echo"<td>".$linha['nome_cursos']."</td>";
    echo"<td>"." R$ ".Number_format($linha["preco_cursos"],2,",",".") ."</td>";
    echo "<td>".$linha['login']."</td>";
    echo "<td>".$linha['email']."</td>";
    echo "</tr>";
    
        }
    }
}
    ?>
    <tr><a href="../relatorio_c.php"><button type="button">Voltar</button></a></tr>
</table>
<?php 

echo "<p>"."Vagas do curso = ".$v."<p>";
echo "Vagas ocupadas no curso = ".$o."<p>";
?>