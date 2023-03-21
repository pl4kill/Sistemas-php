<?php require_once("connect.php"); ?>
<table>
    <tr>
        <th>Curso</th>
        <th>Nome do Aluno</th>
        <th>E-mail do Aluno</th>
    </tr>

    <?php 

    $sql="SELECT a.login, a.email, c.nome_cursos, i.id_mat, i.id_curso,i.id_aluno, c.id_c
    FROM aluno as a, cursos as c, inscricao as i
    WHERE a.id = i.id_aluno and c.id_c = i.id_curso and i.id_curso = c.id_c";
    
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