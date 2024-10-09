<?php
try {
    // aqui iremos conectar ao banco de dados e listar as informações
    include 'conexao.php';

    // comando que sera executado no banco de dados
    $sql = "SELECT * FROM tb_produtos";

    // prepara a execucao da query
    $stmt = $conn->prepare($sql);

    // executa
    $stmt->execute();

    // guarda os dados retornados pelo comendo SELECT
    $dado = $stmt->fetchAll((PDO::FETCH_ASSOC));

    // echo "<pre>";
    // var_dump($dados);

} catch (PDOException $err) {
    // tratamento de erro
    echo "Não foi possivel listar os registros!".$err->getMessage();

}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/cadastrar-categoria.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Categoria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php
        include 'css-import.php';
    ?>
</head>
<body>
<?php
                include 'menu.php';
           ?>
    <main>
    <h1>Listagem De Categorias</h1>
    <table  class="tabela-zebrada">
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Icone</th>
                <th>Imagem</th>
                <th>Data Cadastro</th>
                <th>Ativo</th>
                <th>Descrição</th>
                <th>Cor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Estrutura de repetição(laço) para montar varias linhas da tabela
                    foreach($dado as $categoria){
            ?>
            <tr>
                <td><?php echo $categoria['id'];?></td>
                <td><?php echo $categoria['nome'];?></td>
                <td><?php echo $categoria['descricao'];?></td>
                <td><?php echo $categoria['preco'];?></td>
                <td><?php echo $categoria['estoque'];?></td>
                <td><?php echo $categoria['categoria'];?></td>
                <td><?php echo $categoria['tamanho'];?></td>
                <td><?php echo $categoria['cor'];?></td>
                <td><?php echo $categoria['marca'];?></td>
                <td><?php echo $categoria['imagem'];?></td>
                <td class ="linha">
                    <a href="deletar-categoria.php?id=<?php echo $categoria['id'];?>">
                        <button class="btn-deletar" type="button">Deletar</button>
                    </a>
                    <a href="alterar-categoria.php?id=<?php echo $categoria['id'];?>">
                        <button class="btn-alterar" type="button">Alterar</button>
                    </a>

                </td>
            </tr>
                          
            <?php
            // fecha o laço que monta as linhas da tabela
                    }
            ?>

        </tbody>
    </table>
    </main>
</body>
</html>