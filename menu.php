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
</head>

<body>
    <header>
        <h1>HIGH</h1>
        <nav>
            <ul>
                <li><a class="escrito" href="index.php">Início</a></li>
                <li><a class="escrito" href="carrinho.php">Carrinho</a></li>
                <li><a href="carrinho.php" class="carrinho">
                <span class="quantidade"><?php echo $qtd_carrinho; ?></span>
                <i id="carrinho" class="fa-solid fa-cart-shopping fa-2x"></i>
            </a></li>
            </ul>
        </nav>
    </header>
</body>