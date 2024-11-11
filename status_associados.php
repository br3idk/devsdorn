<?php
include 'conexao.php';

$sql = "
    SELECT associados.*, 
    CASE 
        WHEN NOT EXISTS (
            SELECT * 
            FROM anuidades 
            LEFT JOIN pagamentos ON anuidades.id = pagamentos.anuidade_id AND pagamentos.associado_id = associados.id
            WHERE anuidades.ano >= YEAR(associados.data_filiacao) AND pagamentos.id IS NULL
        ) THEN 'Em Dia'
        ELSE 'Em Atraso'
    END AS status_pagamento
    FROM associados
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Status dos Associados</title>
</head>
<body>
    <h2>Status dos Associados</h2>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>CPF</th>
            <th>Data de Filiação</th>
            <th>Status de Pagamento</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row['nome']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['cpf']); ?></td>
                <td><?php echo htmlspecialchars($row['data_filiacao']); ?></td>
                <td><?php echo $row['status_pagamento']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="listar_associados.php">Voltar para Lista de Associados</a>
</body>
</html>

<?php
$conn->close();
?>
