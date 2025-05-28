<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
</head>
<body>
    <form action="back/cadastrar_produto.php" method="post">
        <label for="sku">Sku:</label>
        <input type="number" min="1" name="sku" required>
        <label for="produto">Produto:</label>
        <input type="text" name="produto" required>
        <label for="Preço">Preço:</label>
        <input type="number" min="1" name="preco" required>
        <label for="Estoque">Estoque:</label>
        <input type="number" name="estoque_atual" required>
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" required>
        <input type="submit" value="Cadastrar" name="submit">

    </form>
</body>
</html>