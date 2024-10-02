<?php

// Inicia a sessão se ainda não foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Limpa o carrinho se a ação foi solicitada
if (isset($_POST['limparCarrinho'])) {
    unset($_SESSION['carrinho']);
}






// Remove todos os produtos com o ID solicitado do carrinho
if (isset($_POST['removerProduto'])) {
    $idRemover = $_POST['removerProduto'];
    
    // Filtra o carrinho, mantendo apenas os produtos que não têm o ID a ser removido
    $_SESSION['carrinho'] = array_filter($_SESSION['carrinho'], function($id) use ($idRemover) {
        return $id !== $idRemover;
    });
}




// if (($key = array_search($idRemover, $_SESSION['carrinho'])) !== false) {
//     unset($_SESSION['carrinho'][$key]);
// }






// Verifica se o carrinho foi criado, caso contrário, inicializa
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = array();
}


// Captura via POST o id do produto que será adicionado ao carrinho, se existir
if (isset($_POST['id_produto'])) {
    $produto = $_POST['id_produto'];
    $_SESSION['carrinho'][] = $produto;
}

// Separa os ids por vírgula, transformando o array em uma lista de ids
$ids = implode(",", $_SESSION['carrinho']);

$quantidade = 1;
// Realiza a busca dos produtos apenas se houver itens no carrinho
if (!empty($ids)) {
    try {
        include "conexao.php";

        // Comando SQL que será executado no banco de dados
        $sql = "SELECT * FROM produtos WHERE id IN ($ids)";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Obtém os dados dos produtos
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $err) {
        echo "Erro: " . $err->getMessage();
    }
}
?>
<?php
include "menu.php";

?>
<body>
    <div id="container">
        <h1 class="centro">Carrinho de compras</h1>
        <div id="carrinho">
              
           <table>
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>Total</th>
                    <th>Ação</th>
                </tr>
            <?php
            if (!empty($ids)) {
                foreach($dados as $produto){
            ?>
                <tr>
                    <td><?php echo $produto['id']?></td>
                    <td><img class="img-carrinho" src="img/<?php echo $produto['imagem']?>" alt="" srcset=""></td>
                    <td><?php echo $produto['nome']?></td>
                    <td><?php echo $quantidade?></td>
                    <td><?php echo $produto['preco']?></td>
                    <td><?php echo $produto['preco'] * $quantidade?></td>
                    <td>
                        <form action="carrinho.php" method="post">
                            <button type="submit" name="removerProduto" value="<?php echo $produto['id']?>"  class="remover-produto">
                                <i class="fa-solid fa-trash-can fa-2x"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php
               }//fecha o foreach
            }else{//fecha o if e trata o carrinho vazio  
            ?>
                <td colspan="7">Carrinho vazio!</td>
            <?php
            }//fecha o else do carrinho vazio
            ?>    

           </table>
        </div>

        <div style="margin-top: 20px">
        
            <form action="carrinho.php" method="post">
                <button class="limpar-carrinho" type="submit" name="limparCarrinho">Limpar Carrinho</button>
            </form>


            <a href="index.php">
                <button class="voltar-carrinho" type="button" name="limparCarrinho">Voltar</button>
            </a>
        </div>


    </div>    
</body>
</html>