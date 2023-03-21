<?php 
require_once "connect.php";

if($_POST){
    $nome_c = $_POST['nome_cursos'];
    $preco_c = $_POST['preco_cursos'];
    $qtd_c = $_POST['vagas_cursos'];
    $vagas_ocupadas	= 0;
    
    $sql = "SELECT * FROM `cursos` WHERE `nome_cursos` = '$nome_c'";
        $result = $connect->query($sql);
            if($result -> num_rows > 0){
                while($linha = $result -> fetch_assoc()){
                    echo "<p></p>Esse curso já foi cadastrado!!!<p></p>";
                    echo "<a href='../c_curso.php'><button type='button'>Voltar</button></a>";
                }
            }else{

    $Sql = "INSERT INTO cursos VALUES
    (0,'$nome_c','$preco_c','$qtd_c',$vagas_ocupadas)";
    if($connect->query($Sql) === TRUE){
        echo "<p></p>Cadastro do curso feito com sucesso<p></p>";
        echo "<a href='../admin.php'><button type='button'>Voltar</button></a>";
    }
}
}

?>