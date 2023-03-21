<?php require_once ("back/connect.php"); 
session_start();

$email=$_SESSION['email'];
$senha=$_SESSION['senha'];

$sql="SELECT * from aluno where email='$email' and senha='$senha'";
$result=$connect->query($sql);
    if($result->num_rows>0){
        while($linha=$result->fetch_assoc()){
            $email=$linha['email'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="center">
      <h1>Editar Perfil</h1>
      <form method="post" action="back/editar_aluno.php">
        <div class="txt_field">
          <input type="text" name="login" required>
          <span></span>
          <label>Nome usuario</label>
        </div>
        <div class="txt_field">
          <input type="email" name="email" value="<?php echo $email;?>" required>
          <span></span>
          <label>E-mail</label>
        </div>
        <div class="txt_field">
          <input type="password" name="senha" required>
          <span></span>
          <label>Senha</label>
        </div>
        <input type="hidden" name="antigo" value="<?php echo $email;?>" required>
        <input type="submit" value="Mudar perfil">
      </form>
    </div>

  </body>
</html>
<?php
}
?>
