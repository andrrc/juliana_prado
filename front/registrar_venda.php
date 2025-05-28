<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda</title>
</head>

<body>
    <header>
        <h1><a href="listar_venda.php">Black</a></h1>
        <nav>
            <ul>
                <li><a href="">Listar vendas</a></li>
                <li>Registrar Venda</li>
                <li>Listar estoque</li>
            </ul>
        </nav>
    </header>
    <form action="back/registrar_venda.php" method="GET">
        <label for="SKU">SKU:</label>
        <input type="number" name="sku" id="sku" required>
        <label for="quantidade_vendido">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" min="1" max="999" required>
        <input type="float" name="preco" id="preco">
        <select name="forma_pagamento" id="forma_pagamento" required>
            <option value="" disabled selected>Selecione a forma de pagamento</option>

            <option value="pix">Pix</option>
            <option value="debito">Débito</option>
            <option value="dinheiro">Dinheiro</option>

            <optgroup label="Cartão de Crédito">
                <option value="credito_avista">Crédito à vista</option>
                <option value="credito_1">Crédito em 1x</option>
                <option value="credito_2">Crédito em 2x</option>
                <option value="credito_3">Crédito em 3x</option>
            </optgroup>
        </select>

        <input type="date" name="data_venda" id="data_venda" required>
        <input type="submit" value="Registrar Venda" name="submit">
    </form>
</body>
<script>
    // Quando a página carregar
    window.onload = function() {
        const hoje = new Date();
        const dia = String(hoje.getDate()).padStart(2, '0');
        const mes = String(hoje.getMonth() + 1).padStart(2, '0'); // Janeiro é 0
        const ano = hoje.getFullYear();
        const dataFormatada = `${ano}-${mes}-${dia}`; // Formato YYYY-MM-DD
        document.getElementById('data_venda').value = dataFormatada;
    };
</script>

</html>