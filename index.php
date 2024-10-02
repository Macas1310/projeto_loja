<?php

//iniciando a sessao 
session_start();

//verifica o tamanho do array do carrinho
if (isset($_SESSION['carrinho'])) {
    $qtd_carrinho = count(array_unique($_SESSION['carrinho']));
} else {
    $qtd_carrinho = 0;
}

try {
    include 'conexao.php';
    include 'menu.php';

    // $id = $_GET['id'];

    $sql = "SELECT * FROM produtos ";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $dados = $stmt->fetchAll((PDO::FETCH_ASSOC));


} catch (PDOException $err) {


}
?>

<body>
       
    <main>

        <section class="produtos">
            <?php foreach ($dados as $item) { ?>


                <div class="produto-card">
                    <img src="img/<?php echo $item['imagem'] ?>" alt="" class="credito-card">
                    <h3><?php echo $item['nome'] ?></h3>
                    <p><?php echo $item['descricao'] ?></p>
                    <p class="preco"><?php echo $item['preco'] ?></p>
                    <a href="produto.php?id=<?php echo $item['id'] ?> "><button>Saiba Mais</button></a>
                </div>
                <?php
            }
            ;
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Loja de Roupas. Todos os direitos reservados.</p>
    </footer>
</body>

</html>