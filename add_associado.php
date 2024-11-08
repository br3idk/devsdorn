<?php

include 'conexao.php';

//comandos que irão refletir na criação do associado no banco de dados

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_filiacao = $_POST['data_filiacao'];

    $sql = "INSERT INTO associados (nome, email, cpf, data_filiacao) VALUES ('$nome', '$email', '$cpf', '$data_filiacao')";

    if ($conn->query($sql) === TRUE) {
        echo "Associado adicionado com sucesso!";
    } else {
        echo "ERRO: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>
<!--cria um forms em html para prenchimento-->
<form method="post" action="">
    Nome: <input type="text" name="nome" required><br>
    Email: <input type="email" name="email" required><br>
    CPF: <input type="text" name="cpf" maxlength="11" require><br>
    Data de filiação: <input type="date" name="data_filiacao" required><br>
    <button type="submit">Adicionar Associado</button>
</form>