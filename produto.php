<?php
    

    try{
        include 'conexao.php';

        $id = $_GET['id'];

  $sql =  "SELECT * FROM produtos WHERE id=:id";  

  $stmt = $conn->prepare($sql);

  $stmt->bindParam(':id',$id);

  $stmt->execute();

  $dados = $stmt->fetch((PDO::FETCH_ASSOC));
  
  
} catch (PDOException $err)  {

 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $dados['nome'];?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="item-detalhe">
            <img class="imagem"src="img/originais/<?php echo $dados['imagem'];?>" alt="<?php echo $dados['nome']; ?>">
            <h1><?php echo $dados['nome'];?></h1>
            <p>Preço: <?php echo $dados['preco'];?></p>
            <p><?php echo $dados['descricao'];?></p>
            <a href="index.php" class="btn">Voltar</a>
        </div>
    </main>
    
    
</body>
</html>