<?php
if (isset($_POST['btn_cadastar'])) {


    try {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $estoque = $_POST['estoque'];
        $categoria = $_POST['categoria'];
        $tamanho = $_POST['tamanho'];
        $cor = $_POST['cor'];
        $marca = $_POST['marca'];
    
        // Caminhos para armazenar as imagens
        $caminho1 = 'img/';  // Primeiro caminho
        $caminho2 = 'img/originais/';  // Segundo caminho (cópia de segurança)
    
        // Captura a extensão da imagem enviada para upload (Ex: .png .jpg)
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
    
        // Gera um hash aleatório para a imagem (nome aleatório)
        $hash = md5(uniqid($_FILES['imagem']['tmp_name'], true));
    
        // Junta o hash (nome aleatório) + extensão
        $nome_imagem = $hash . '.' . $extensao;
    
        // Executa o upload da imagem no primeiro caminho
        move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho1 . $nome_imagem);
    
        // Copia a imagem para o segundo caminho
        copy($caminho1 . $nome_imagem, $caminho2 . $nome_imagem);
    
        include "conexao.php";
    
        // Insere os dados do produto no banco de dados
        $sql = "INSERT INTO produtos (nome, descricao, preco, estoque, categoria, tamanho, cor, marca, imagem) 
                VALUES (:nome, :descricao, :preco, :estoque, :categoria, :tamanho, :cor, :marca, :imagem)";
    
        $stmt = $conn->prepare($sql);
    
        // Vincula os parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':preco', $preco);
        $stmt->bindParam(':estoque', $estoque);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':cor', $cor);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':imagem', $nome_imagem);
    
        // Executa a query
        $stmt->execute();
    
        echo "Cadastro realizado com sucesso";
    
    } catch (PDOException $err) {
        echo "Não foi possível realizar o cadastro" . $err->getMessage();
    }
}
?>




<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="css/cadastrar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include "menu.php";
    ?>

    <main class="form-container">
        <h2>Insira as informações do produto</h2>
        <form action="cadastrar_produto.php" method="POST" enctype="multipart/form-data" class="form-grid">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="preco">Preço (R$)</label>
                <input type="number" step="0.01" id="preco" name="preco" required>
            </div>

            <div class="form-group">
                <label for="estoque">Estoque</label>
                <input type="number" id="estoque" name="estoque" required>
            </div>

            <div class="form-group">
                <label for="categoria">Categoria</label>
                <input type="text" id="categoria" name="categoria" required>
            </div>

            <div class="form-group">
                <label for="tamanho">Tamanho</label>
                <input type="text" id="tamanho" name="tamanho" required>
            </div>

            <div class="form-group">
                <label for="cor">Cor</label>
                <input type="text" id="cor" name="cor" required>
            </div>

            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" id="marca" name="marca" required>
            </div>
            <!-- input -->
            <div class="form-group">
                <label for="imagem">Imagem do Produto</label>
                <div class="image-upload-container">
                    <label for="imagem" class="image-upload-label">
                        <i class="fas fa-upload image-upload-icon"></i> Escolher Imagem
                    </label>
                    <input type="file" id="imagem" name="imagem" accept="image/*" class="image-upload"
                        onchange="previewImage(event)">
                </div>
                <!-- Elemento para a pré-visualização -->
                <div class="preview-container">
                    <img id="preview" class="image-preview" src="" alt="Pré-visualização da imagem"
                        style="display: none;" />
                </div>
            </div>
            <button type="submit" name="btn_cadastar" class="btn-submit">Cadastrar Produto</button>
        </form>
    </main>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            const preview = document.getElementById('preview');

            reader.onload = function () {
                preview.src = reader.result;
                preview.style.display = 'block'; // Mostra a imagem após carregá-la
            }

            // Lê a imagem selecionada
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>

</body>

</html>