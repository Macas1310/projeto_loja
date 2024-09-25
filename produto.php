<?php


try {
    include 'conexao.php';
    include 'menu.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id=:id";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();

    $dados = $stmt->fetch((PDO::FETCH_ASSOC));


} catch (PDOException $err) {


}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $dados['nome']; ?></title>
    <link rel="stylesheet" href="css/produto.css">
</head>

<body>
    <main>
        <div class="item-detalhe">
            <img class="imagem" src="img/originais/<?php echo $dados['imagem']; ?>" alt="<?php echo $dados['nome']; ?>">
            <h1><?php echo $dados['nome']; ?></h1>
            <p>Preço: <?php echo $dados['preco']; ?></p>
            <p><?php echo $dados['descricao']; ?></p>

            <form action="carrinho.php" method="POST">
                <button class="btn" name="id_produto" value="<?php echo $dados['id']; ?>">Adicionar Ao Carrinho</button>
            </form>
            <a href="index.php"><button class="btn">Voltar</button></a>
        </div>
    </main>
</body>

</html>