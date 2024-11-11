<?php
include 'conexao.php';

if (isset($_GET['associado_id']) && isset($_GET['anuidade_id'])) {
    $associado_id = $_GET['associado_id'];
    $anuidade_id = $_GET['anuidade_id'];

    // Verifica se o pagamento já existe para essa anuidade
    $check_sql = "SELECT * FROM pagamentos WHERE associado_id = ? AND anuidade_id = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("ii", $associado_id, $anuidade_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "Essa anuidade já foi paga.";
    } else {
        // Insere o pagamento
        $sql_pagamento = "INSERT INTO pagamentos (associado_id, anuidade_id) VALUES (?, ?)";
        $stmt_pagamento = $conn->prepare($sql_pagamento);
        $stmt_pagamento->bind_param("ii", $associado_id, $anuidade_id);

        if ($stmt_pagamento->execute()) {
            echo "Anuidade paga com sucesso!";
            header("refresh:2;url=cobrar_anuidade.php?id=$associado_id");
            exit();
        } else {
            echo "Erro ao registrar pagamento: " . $stmt_pagamento->error;
        }

        $stmt_pagamento->close();
    }

    $stmt_check->close();
} else {
    echo "Parâmetros de pagamento inválidos.";
}

$conn->close();
?>
