<?php
session_start();

$nome_usuario_bd = "loja_user";
$senha_banco = "loja131317";

if (isset($_POST['login'], $_POST['senha'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    // Verifica se o login e a senha correspondem às variáveis definidas
    if ($login === $nome_usuario_bd && $senha === $senha_banco) {
        // Define as variáveis de sessão
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;

        echo "<script language='javascript' type='text/javascript'>
            alert('Login realizado com sucesso');
            window.location.href='../home.php';
        </script>";
        exit();
    } else {
        echo "<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');
            window.location.href='../Login.php';
        </script>";
    }
}
?>
