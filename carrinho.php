<?php

try {
    include 'conexao.php';
    include 'menu.php';

    // $id = $_GET['id'];

    $sql = "SELECT * FROM produtos WHERE id IN (3, 8)";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $dados = $stmt->fetchAll((PDO::FETCH_ASSOC));

} catch (PDOException $err) {

}
?>

<body>
    <main>
        <section class="produtos">
            
            <?php foreach($dados as $item){?>

                
                    <div class="produto-card">
                        <img src="img/<?php echo $item['imagem']?>" alt="" class="credito-card" >
                        <h3><?php echo $item['nome']?></h3>
                        <p><?php echo $item['descricao']?></p>
                        <p class="preco"><?php echo $item['preco']?></p>
                        <a href="?id=<?php echo $item ['id']?> "><button >Comprar</button></a>
                    </div>
                <?php
                };
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Loja de Roupas. Todos os direitos reservados.</p>
    </footer>
</body>
</html>