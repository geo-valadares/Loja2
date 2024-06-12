<?php
$nome_servidor = "db4free.net:3306";
$nome_usuario_bd = "loja_user";
$senha_banco = "loja131317";
$nome_banco = "db_loja";

// Conectar ao banco de dados
$conecta = new mysqli($nome_servidor, $nome_usuario_bd, $senha_banco, $nome_banco);

// Verificar a conexão
if ($conecta->connect_error) {
    die("Conexão falhou: " . $conecta->connect_error . "<br>");
}

echo "Conexão realizada com sucesso <br>";

// Verificar se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber dados do formulário
    $clienteNome = $_POST["clienteNome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $defeito = $_POST["defeito"];
    
    // Gera uma ordem de serviço numerada
    $ordemServico = sprintf("%03d", rand(1, 999));
    
    // Data de entrada formatada
    $dataEntrada = date("Y-m-d H:i:s");

    // Salvar os dados no banco de dados
    try {
        // Alteração aqui: Passar $ordemServico por referência
        salvarServico($clienteNome, $telefone, $email, $marca, $modelo, $defeito, $dataEntrada, $conecta, $ordemServico);
        
        // Redirecionar para a página "home.php"
        header("Location:../home.php");
        exit(); // Certifique-se de sair após o redirecionamento para evitar qualquer saída adicional
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
}

// Função para salvar serviço no banco de dados
function salvarServico($clienteNome, $telefone, $email, $marca, $modelo, $defeito, $dataEntrada, $conecta, &$ordemServico) {
    // Preparar a consulta SQL
    $sql = "INSERT INTO servicos (ordemServico, clienteNome, telefone, email, marca, modelo, defeito, dataEntrada)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
       
    $stmt = $conecta->prepare($sql);
    
    // Vincular parâmetros
    $stmt->bind_param("ssssssss", $ordemServico, $clienteNome, $telefone, $email, $marca, $modelo, $defeito, $dataEntrada);

    // Executar a consulta preparada
    if (!$stmt->execute()) {
        throw new Exception("Erro ao criar a ordem de serviço: " . $stmt->error);
    }

    // Fechar a consulta preparada
    $stmt->close();
}
// Fechar a conexão com o banco de dados
$conecta->close();
?>
