<?php
    

    try{
        include 'conexao.php';

        // $id = $_GET['id'];

  $sql =  "SELECT * FROM produtos ";  

  $stmt = $conn->prepare($sql);

  $stmt->execute();

  $dados = $stmt->fetchAll((PDO::FETCH_ASSOC));
  
  
} catch (PDOException $err)  {

 
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Produtos</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>HIGH</h1>
        <nav>
            <ul>
                <li><a class="escrito" href="#">Início</a></li>
                <li><a class="escrito" href="#">Produtos</a></li>
                <li><a class="escrito" href="#">Contato</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="produtos">
            
            <?php foreach($dados as $item){?>
                
                    <div class="produto-card">
                        <img src="img/<?php echo $item['imagem']?>" alt="" class="credito-card" >
                        <h3><?php echo $item['nome']?></h3>
                        <p><?php echo $item['descricao']?></p>
                        <p class="preco"><?php echo $item['preco']?></p>
                        <a href="produto.php?id=<?php echo $item ['id']?> "><button >Comprar</button></a>
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
