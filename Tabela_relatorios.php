<?php
session_start();
$nome_servidor = "db4free.net:3306";
$nome_usuario_bd = "loja_user";
$senha_banco = "loja131317";
$nome_banco = "db_loja";

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


// Conectar ao banco de dados
$conecta = new mysqli($nome_servidor, $nome_usuario_bd, $senha_banco, $nome_banco);


if ($conecta->connect_error) {
    die("Conexão falhou: " . $conecta->connect_error . "<br>");
}

// Consulta para recuperar todos os dados da tabela
$sql = "SELECT * FROM servicos";
$resultado = $conecta->query($sql);

echo "<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Relatório Semanal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
           background: linear-gradient(to right, #3498db, #2c3e50);
            color: #fff;
            text-align: center;
        }
        .relatorio {
            margin: 20px;
            background: black;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .item-relatorio {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>";

echo "<div class='relatorio'>";

// Exibir os dados em um formato de relatório
if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        echo "<div class='item-relatorio'>";
        foreach ($linha as $key => $value) {
            echo "<strong>$key:</strong> $value<br>";
        }
        echo "</div>";
    }
} else {
    echo "<p>Nenhum dado encontrado na tabela.</p>";
}

echo "</div>";

// Fechar a conexão com o banco de dados
$conecta->close();

// Fechar o HTML do relatório
echo "</body>
</html>";
?>
