<?php

try {
    // aqui iremos conectar ao banco de dados e listar as informações
    include 'conexao.php';

    $id = $_GET['id'];

    // comando que sera executado no banco de dados
    $sql = "SELECT * FROM tb_produtos WHERE id=:id";

    // prepara a execucao da query
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id',$id);

    // executa
    $stmt->execute();

    // guarda os dados retornados pelo comendo SELECT
    $alterar = $stmt->fetchAll((PDO::FETCH_ASSOC));

    //  echo "<pre>";
    //  var_dump($dados);

} catch (PDOException $err) {
    // tratamento de erro
    echo "Não foi possivel listar os registros!".$err->getMessage();

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Categorias</title>
    <link rel="stylesheet" href="css/cadastrar-categoria.css">
</head>
<body>
    <div id="container">
    <?php
                include 'menu.php';
           ?>
            <main>
                <div id="cadastrar-categoria">
                    <h1>Alterar Categoria</h1>
                    <a id="btnListagem" href="listar-categoria.php">Listagem</a>
                    
                </div>
                <form action="php/update-categoria.php" method="POST">
                    <div id="grid">
                    <input type="hidden" name="id" id="id" value="<?php echo $alterar[0]['id'];?>">
                        <div>
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="nome" value="<?php echo $alterar[0]['nome'];?>">
                        </div>
                        <div>
                            <label for="icone">Icone:</label>
                            <input type="text" name="icone" id="icone"value="<?php echo $alterar[0]['icone'];?>">
                        </div>
                        <div>
                            <label for="Imagem">Imagem:</label>
                            <input type="text" name="imagem" id="imagem"value="<?php echo $alterar[0]['imagem'];?>">
                        </div>
                        <div>
                            <label for="icone">Cor:</label>
                            <input type="color" name="cor" id="cor"value="<?php echo $alterar[0]['cor'];?>">
                        </div>
                        <div>
                            <label for="desc">Descrição:</label>
                            <textarea name="desc" id="desc" <?php echo $alterar[0]['desc'];?>></textarea>
                        </div>
                    </div> <!-- final da grid-->
                    <button type="submit" id="btnCadastrar">Salvar</button>
                </form>




            </main>



    </div>
    <script src="js/cadastrar-categoria.js"></script>
</body>
</html>