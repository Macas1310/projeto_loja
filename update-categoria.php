<?php



try{
    // criar variaveis para receber os dados
    $id  = $_POST['id'];
    $nome = $_POST['nome'];
    $icone = $_POST['icone'];
    $imagem = $_POST['imagem'];
    $cor = $_POST['cor'];
    $desc = $_POST['desc'];

        include "conexao.php";
        
        $sql = "UPDATE tb_produto SET nome=:nome,icone=:icone,imagem=:imagem, cor=:cor,`desc`=:desc WHERE id=:id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':icone',$icone);
        $stmt->bindParam(':imagem',$imagem);
        $stmt->bindParam(':cor',$cor);
        $stmt->bindParam(':desc',$desc);

        $stmt->execute();

        echo "Cadastro realizado com sucesso!";

}catch(PDOException $err){
    echo "Não foi possivel realizar o cadastro!".$err->getMessage();

}



?>