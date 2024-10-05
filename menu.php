<?php

//verifica o tamanho do array do carrinho
if (isset($_SESSION['carrinho'])) {
    $qtd_carrinho = count(array_unique($_SESSION['carrinho']));
} else {
    $qtd_carrinho = 0;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Produtos</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/carrinho.css">
    <link rel="stylesheet" href="css/loja.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
    integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>
    <header>
        <h1 class="nome-loja">HIGH</h1>
        <nav>
            
            <ul>
                <li><a class="escrito" href="index.php">Início</a></li>
                <li><a class="escrito" href="carrinho.php">Carrinho</a></li>
                <li><a class="escrito" href="cadastrar_produto.php">Adicionar Produto</a></li>
                <li><a href="carrinho.php" class="carrinho">
                <span class="quantidade"><?php echo $qtd_carrinho; ?></span>
                <i id="carrinho" class="fa-solid fa-cart-shopping fa-1x"></i>
            </a></li>
            </ul>
        </nav>
       
    </header>
</body>