<?php

include 'conexao.php';

$sql = "SELECT * FROM anuidades";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <title>Listar Anuidades</title>
        </head>

        <body>
            <h2>Anuidades cadastradas</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Ano</th>
                    <th>Valor (R$)</th>
                </tr>

                <?php
                
                if($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["ano"] . "</td>";
                        echo "<td>" . $row["valor"] . "</td>";
                        echo "</tr>";
                    }
                    
                } else {
                    echo "<tr><td colspan='3'>Nenhuma anuidade encontrada</td></tr>";
                }
                
                ?>

            </table>
        </body>
    </html>

    <?php $conn->close(); ?>