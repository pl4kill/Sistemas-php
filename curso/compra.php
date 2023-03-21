<?php require_once("back/connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
</head>
<body>
    <form action='back/compra.php' method='POST'>
    <table>
        <thead>
            <tr>
                <th> Nome </th>
                <th> Preço </th>
                <th> Estoque </th>
                <th> Quantidade </th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM cursos";
            $result = $connect->query($sql);
            if($result->num_rows){
                while($linha = $result->fetch_assoc()){
                    $qtd = $linha['qtd'];
                    $preco = $linha['preco'];

                    echo "<tr>
                    <td> <input type='checkbox' name='id_c' value=".$linha['id_c'].">".$linha['nome']."</td>
                    <td>" .' R$: '.$preco. "</td>
                    <td>" .$qtd. "</td>
                    <td> <input type = 'number' name='qtd_compra' value = '1' min='1' max='1'></td>
                    </tr>";
                }
            }
            ?>

        </tbody>
    </table>
    <input type="submit">
        </form>
</body>
</html>

