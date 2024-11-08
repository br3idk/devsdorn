<?php

//mecanismo p/ buscar um associado por id e poder atualizar seus dados na tabela

include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_filiacao = $_POST['data_filiacao'];

    $sql = "UPDATE associados SET nome='$nome', email='$email', cpf='$cpf', data_filiacao='$data_filiacao' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Associado atualizado com sucesso!";
    } else {
        echo "ERRO: " . $conn->error;
    }
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM associados WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

$conn->close();

?>

<?php if (isset($row)): ?>

<form method="post" action="">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Nome: <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br>
    E-mail: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
    CPF: <input type="text" name="cpf" value="<?php echo $row['cpf']; ?>" maxlength="11" required><br>
    Data de Filiação: <input type="date" name="data_filiacao" value="<?php echo $row['data_filiacao']; ?>" required><br>
    <button type="submit">Atualizar Associado</button>

</form>

<?php else: ?>
    <p>Associado não encontrado</p>
<?php endif; ?>
