<?php require_once("connect.php"); ?>
<table>
    <tr>
        <th>Curso</th>
        <th>Valor Curso</th>
        <th>Vagas cursos</th>
        <th>Vagas ocupadas</th>
    </tr>

<?php 
if($_POST){

$id = $_POST["id_c"];

$sql="SELECT c.nome_cursos, c.preco_cursos ,c.vagas_cursos,c.vagas_ocupadas
FROM aluno as a, cursos as c, inscricao as i
WHERE c.id_c = i.id_curso AND i.id_curso = $id ";
    
    $result=$connect->query($sql);
    if($result->num_rows>0){
        while($linha=$result->fetch_assoc()){
    
    echo "<tr>";
    echo"<td>".$linha['nome_cursos']."</td>";
    echo"<td>"." R$ ".Number_format($linha["preco_cursos"],2,",",".") ."</td>";
    echo "<td>".$linha['vagas_cursos']."</td>";
    echo "<td>".$linha['vagas_ocupadas']."</td>";
    echo "</tr>";
    
        }
    }
}
    ?>
    <tr><a href="../relatorio_v.php"><button type="button">Voltar</button></a></tr>
</table>