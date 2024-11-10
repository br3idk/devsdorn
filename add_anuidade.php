<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="UTF-8">
        <title>Adicionar anuidade</title>

    </head>

    <!--Forms usado pra coletar o ano e o valor para cadastrar-->

    <body>
        <h2>Adicionar anuidade</h2>
        <form action="salvar_anuidade.php" method="POST">
            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" required><br><br>

            <label for="valor">Valor (R$): </label>
            <input type="number" id="valor" name="valor" step="0.01" required><br><br>

            <button type="submit">Adicionar anuidade</button>
        </form>
    </body>
</html>