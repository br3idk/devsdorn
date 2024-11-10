<?php

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ano = $_POST['ano'];
    $valor = $_POST['valor'];

    $sql = "INSERT INTO anuidades (ano, valor) VALUES ($ano, $valor)";

    if ($conn->query($sql) === TRUE) {
        echo "Anuidade adicionada com sucesso!";
        header("refresh:2;url=listar_anuidades.php"); //Em 2 segundos irá redirecionar pra lista
        exit();
    } else {
        echo "Erro ao adicionar anuidade: " . $conn->error;
    }
}   else {
    echo "Acesso inválido";
}

$conn->close();

?>