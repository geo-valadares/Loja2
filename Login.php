<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Formulário de Login</title>
</head>
<body>
    <form action="php/processo_login.php" method="post">
        <?php
            $login = isset($_POST['login']) ? $_POST['login'] : '';
            $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
        ?>

        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>