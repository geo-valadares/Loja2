
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
<html>
<head>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/listar.css">
    <title>Tabela de Dados</title>
 
</head>
<body>
    <h1>Tabela de Dados</h1>

    <?php include 'php/listar_ordens.php'; ?>
</body>
</html>