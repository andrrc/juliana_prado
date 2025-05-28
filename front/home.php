<?php
require '../vendor/autoload.php';
require_once '../back/listar_estoque.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Estoque</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>

<body class="bg-secondary decoration-none list-none">
    <header class="bg-black text-white px-6 py-4 flex justify-between items-center w-full h-20">
        <h1 class="text-2xl font-bold">BlackHat</h1>
        <nav>
            <ul class="flex gap-8 text-white text-lg">
                <li><a href="">Home</a></li>
                <li><a href="">Estoque</a></li>
                <li><a href="">Vendas</a></li>
                <li><a href="">Login</a></li>
            </ul>
        </nav>
    </header>


    <table class="table table-striped-columns table-hover table-bordered table-sm table-responsive table-dark">
        <thead>
            <tr>
                <th class="col">SKU</th>
                <th class="col">Produto</th>
                <th class="col">Tamanho</th>
                <th class="col">Preço</th>
                <th class="col">Estoque Atual</th>
                <th class="col">Tipo</th>
                <th class="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($produto->getSku()); ?></td>
                    <td><?php echo htmlspecialchars($produto->getProduto()); ?></td>
                    <td><?php echo htmlspecialchars($produto->getTamanho()); ?></td>
                    <td><?php echo htmlspecialchars($produto->getPreco()); ?></td>
                    <td><?php echo htmlspecialchars($produto->getEstoqueAtual()); ?></td>
                    <td><?php echo htmlspecialchars($produto->getTipo()); ?></td>
                    <td><a href="back/editar.php">Editar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

</html>