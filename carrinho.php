<?php

// funcao que limpa o carrinho
if(isset($_POST['limparCarrinho'])){
    unset($_SESSION['carrinho']);
}

// inicia a sessao se ainda não foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o carrinho foi criado, caso contrario inicializa
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}

// cap
$produto = $_POST['id_produto'];

// adicionar o produto ao carrinho
$_SESSION['carrinho'][] = $produto;

// Separa os ids por virgula transformando o array em variavel em formato de lista
// Ex: 10,8
$ids = implode(",", $_SESSION['carrinho']);
if (!empty($ids)){
try {
    include 'conexao.php';
    include 'menu.php';

    // $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id IN ($ids)";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $dados = $stmt->fetchAll((PDO::FETCH_ASSOC));

} catch (PDOException $err) {

}
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
                    <a href="?id=<?php echo $item['id'] ?> "><button>Comprar</button></a>
                </div>
                <?php
            }
            ?>

        </section>
    </main>

    <div style="margin-top: 20px">

        <form action="carrinho.php" method="post">
            <button class="limpar-carrinho" type="submit" name="limparCarrinho">Limpar 
            Carrinho</button>
        </form>

        <a href="index.php"></a>
        <button class="voltar-carrinho" type="button" name="limparCarrinho">Voltar
        </button>
    </div>

    <footer>
        <p>&copy; 2024 Loja de Roupas. Todos os direitos reservados.</p>
    </footer>
</body>

</html>