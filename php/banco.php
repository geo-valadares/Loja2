<?php
$nome_servidor = "db4free.net:3306";
$nome_usuario_bd = "loja_user";
$senha_banco = "loja131317";
$nome_banco = "db_loja";

$conecta = new mysqli($nome_servidor, $nome_usuario, $senha_banco, $nome_banco);

if ($conecta->connect_error) {
    die("Conexão falhou: " . $conecta->connect_error . "<br>");
}
echo "Conexão realizada com sucesso <br>";

if (isset($_POST['login'], $_POST['senha'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql_verifica = "SELECT * FROM servicos WHERE email = '$login' AND senha = '$senha'";
    $resultado = $conecta->query($sql_verifica);

    if ($resultado->num_rows > 0) {
        echo "<script language='javascript' type='text/javascript'>
            alert('Login realizado com sucesso');
            window.location.href='home.php';
        </script>";
    } else {
        echo "<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');
            window.location.href='Login.php';
        </script>";
    }
}

$conecta->close();
?>


