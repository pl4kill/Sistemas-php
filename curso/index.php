<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela do Login</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="center">
      <h1>Login</h1>
      <form method="post" action="back/login.php">
        <div class="txt_field">
          <input type="email" name="email" required>
          <span></span>
          <label>E-mail</label>
        </div>
        <div class="txt_field">
          <input type="password" name="senha" required>
          <span></span>
          <label>Senha</label>
        </div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Crie uma conta <a href="cadastro.php">Cadastrar</a>
        </div>
      </form>
    </div>

  </body>
</html>

