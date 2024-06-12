<?php
session_start();


// Verifica se as variáveis de sessão estão definidas
if (!isset($_SESSION['login']) || !isset($_SESSION['senha'])) {
    echo "<script> 
            alert('Esta página só pode ser acessada por usuário logado');
            window.location.href = 'Login.php';
          </script>";
} else {
    // Variáveis de sessão estão definidas, pode usá-las
    $login = $_SESSION['login'];
    $senha = $_SESSION['senha'];
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Integrado de Manutenção de Celulares</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h2 text align="center">Sistema Integrado de Manutenção de Celulares</h2>
    <form action="php/tabela_clientes.php" method="post">
        <label for="clienteNome">Nome do Cliente:</label>
        <input type="text" id="clienteNome" name="clienteNome" required>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required>

        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required>

        <label for="defeito">Defeito Apresentado:</label>
        <textarea id="defeito" name="defeito" required></textarea>

        <input type="submit" value="Cadastrar">
    </form>

    <script src="javaScript/index.js"></script>
</body>
</html>
