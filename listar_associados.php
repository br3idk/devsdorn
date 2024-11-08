<?php

include 'conexao.php';

//usará um select para mostrar todos os associados da tabela

$sql = "SELECT * FROM associados";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . "- Email: "  . $row["email"] . " - CPF: " . $row["cpf"] . " - Data de filiação: " . $row["data_filiacao"] . "<br>";
    }

} else {
    echo "Nenhum associado encontrado.";
}

$conn->close();

?>
