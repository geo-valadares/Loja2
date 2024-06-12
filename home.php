<?php
session_start();




if (!isset($_SESSION['login']) || !isset($_SESSION['senha'])) {
    echo "<script> 
            alert('Esta página só pode ser acessada por usuário logado');
            window.location.href = 'Login.php';
          </script>";
} else {
  
    $login = $_SESSION['login'];
    $senha = $_SESSION['senha'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
   
    <title>Sistema Integrado de Manutenção de Celulares</title>

</head> 
<header>

<style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .card {
            background-color: black;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 
            
20px;
            margin: 
            margin
10px;
            width: 
            width
300px;
            text-align: center;
        }

        
    </style>
</header>
<body>
    <nav class="navbar">
        <div class="logo">Sistema Integrado de Manutenção de Celulares</div>
       <div> <ul class="navbar-nav">
               <li><a href="OrdemServico.php" class="nav-link">Ordens de Serviços</a></li>
                <li><a href="Listar_ordens.php" class="nav-link">Lista de Clientes</a></li>
            <li><a href="Tabela_relatorios.php" class="nav-link">Relatórios</a></li>
            
           
        </ul>
            </div>
    </nav>
    <br>
    
</body>
</html>
