<?php

include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM associados WHERE id=$id";

    if($conn->query($sql) === TRUE) {
        echo "Associado deletado com sucesso!";
    } else {
        echo "ERRO: " . $conn->error;
    }

}

$conn->close()

?>