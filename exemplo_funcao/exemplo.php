<?php
// include do arquivo de conexao
include "../conexao.php";


// funcao cadastrar
if(isset($_POST['btn_cadastrar'])){
try{
    $categoria = $_POST['categoria'];
    $sql = "INSERT INTO tb_categoria (categoria) VALUES (:categoria);";

    $stmt = $conn->prepare($sql);
    // bindParam
    $stmt->bindParam(":categoria",$categoria);
    // .exe
    $stmt->execute();
}catch(PDOException $err){
    echo "Não foi possivel inserir a categoria $err";
}
}
$lista_categoria = listaCategoria($conn);
function listaCategoria($conn){
// listar categorias
try{
    $sql = "SELECT * FROM tb_categoria";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
catch(PDOException $err){
    return [];
   
}
}



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="exemplo.css">
    <title>Exemplo - Função PHP</title>
</head>
<body>
    <header>
        <h1>Loja de Roupas - Admin</h1>
    </header>
    <h1>Cadastro de Categoria</h1>
    <form action="exemplo.php" method="POST">
        <div class="categoria">
            <label for="categoria">Categoria</label>
            <input type="text" name="categoria" id="categoria">
            
        </div>
        <button type="submit" class="button-85" name="btn_cadastrar" >Cadastrar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($lista_categoria as $categoria){
            ?>
            <tr>
                <td><?php echo $categoria['id'] ?></td>
                <td><?php echo $categoria['categoria'] ?></td>
                <td><?php echo $categoria['data_cad'] ?></td>
                <td>
                    <button type="button" class="btn-deletar">Alterar
                    </button>
                    <button type="button" class="btn-deletar">
                    </button>
                </td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</body>
</html>