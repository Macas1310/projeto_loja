<?php
// Podemos receber dados de algumas formas, as mais utilizadas e comuns usando PHP são:
    // POST: dados vindo atraves de formularios(forms)
    // GET: dados vindo da URL(endereço da pagina)

    try{
        include 'conexao.php';

        $id = $_GET['id'];

        $sql = "DELETE FROM tb_produtos WHERE id=:id";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':id',$id);

        $stmt->execute();

        echo "Registro removido com sucesso";

    }catch(PDOExpection $err){
        echo "Erro ao deletar o registro".$err->getMessage();
    }







?>