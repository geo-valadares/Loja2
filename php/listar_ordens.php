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


if (isset($_GET['clienteNome']) && isset($_GET['ordemServico']) && isset($_GET['acao'])) {
    $clienteNome = $_GET['clienteNome'];
    $ordemServico = $_GET['ordemServico'];
    $acao = $_GET['acao'];

    if ($acao === 'excluir') {
        // Excluir o registro correspondente
        $sql_delete = "DELETE FROM servicos WHERE clienteNome = '$clienteNome' AND ordemServico = '$ordemServico'";
        if ($conecta->query($sql_delete) === TRUE) {
            echo "Registro excluído com sucesso.<br>";
        } else {
            echo "Erro ao excluir o registro: " . $conecta->error . "<br>";
        }
    } elseif ($acao === 'atualizar') {
        // Redirecionar para a página de atualização com os parâmetros
        header("Location: OrdemServico.php?clienteNome=$clienteNome&oredemServico=$ordemServico");
        exit();
    }
}

// Consulta para recuperar todos os dados da tabela
$sql = "SELECT * FROM servicos";
$resultado = $conecta->query($sql);

// Exibir os dados em uma tabela
if ($resultado->num_rows > 0) {
    echo "<table>";
    echo "<tr>";

    // Obter os nomes das colunas
    $field_names = $resultado->fetch_fields();
    foreach ($field_names as $field) {
        echo "<th>" . $field->name . "</th>";
    }
    echo "<th>Ação</th>"; // Coluna para ação

    echo "</tr>";

    // Exibir os dados de cada linha
    while ($linha = $resultado->fetch_assoc()) {
        // Verificar se o nome está em branco
        if ($linha['clienteNome'] !== '') {
            echo "<tr>";

            foreach ($linha as $key => $value) {
                echo "<td>" . $value . "</td>";
            }

            $clienteNome= $linha['clienteNome'];
            $ordemServico = $linha['ordemServico'];
            echo "<td class='acoes-cell'>
                   
                      <a href='?clienteNome=$clienteNome&ordemServico=$ordemServico&acao=excluir' class='acao-excluir btn'>Excluir</a>
                      <a href='?clienteNome=$clienteNome&ordemServico=$ordemServico&acao=atualizar' class='acao-atualizar btn'>Atualizar</a>
                  </td>"; // Links para excluir e atualizar o registro

            echo "</tr>";
        }
    }

    echo "</table>";
} else {
    echo "Nenhum dado encontrado na tabela.";
}

// Fechar a conexão com o banco de dados
$conecta->close();
?>
