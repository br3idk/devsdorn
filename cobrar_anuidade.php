<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $associado_id = $_GET['id'];

    $sql_associado = "SELECT * FROM associados WHERE id = ?";
    $stmt_associado = $conn->prepare($sql_associado);
    $stmt_associado->bind_param("i", $associado_id);
    $stmt_associado->execute();
    $result_associado = $stmt_associado->get_result();
    $associado = $result_associado->fetch_assoc();

    $sql_anuidades = "
        SELECT anuidades.id, anuidades.ano, anuidades.valor, 
        CASE 
            WHEN pagamentos.id IS NULL THEN 'Devido'
            ELSE 'Pago'
        END AS status
        FROM anuidades
        LEFT JOIN pagamentos ON anuidades.id = pagamentos.anuidade_id AND pagamentos.associado_id = ?
        WHERE anuidades.ano >= YEAR(?)
    ";
    $stmt_anuidades = $conn->prepare($sql_anuidades);
    $stmt_anuidades->bind_param("is", $associado_id, $associado['data_filiacao']);
    $stmt_anuidades->execute();
    $result_anuidades = $stmt_anuidades->get_result();
} else {
    echo "Associado não encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cobrança de Anuidades</title>
</head>
<body>
    <h2>Cobrança de Anuidades - <?php echo htmlspecialchars($associado['nome']); ?></h2>
    <table border="1">
        <tr>
            <th>Ano</th>
            <th>Valor</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
        <?php while ($anuidade = $result_anuidades->fetch_assoc()) : ?>
            <tr>
                <td><?php echo htmlspecialchars($anuidade['ano']); ?></td>
                <td><?php echo htmlspecialchars($anuidade['valor']); ?></td>
                <td><?php echo $anuidade['status']; ?></td>
                <td>
                    <?php if ($anuidade['status'] == 'Devido') : ?>
                        <a href="pagar_anuidade.php?associado_id=<?php echo $associado_id; ?>&anuidade_id=<?php echo $anuidade['id']; ?>">Pagar</a>
                    <?php else : ?>
                        Pago
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="listar_associados.php">Voltar para Lista de Associados</a>
</body>
</html>

<?php
$stmt_associado->close();
$stmt_anuidades->close();
$conn->close();
?>
