<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pergunta 03 - Invasão no IFPE</title>
    <style>
        body {
            background-color: #2c3e50;
            color: #ecf0f1;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
        }

        h1 {
            color: #f1c40f;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        p strong {
            font-size: 1.3rem;
            color: #2ecc71;
        }
    </style>
</head>
<body>

    <h1>Pergunta 03 - Simulação de Gastos</h1>

    <?php
    $custoTotal = 0;
    $qtdBonecos = 0;
    $qtdTumulos = 0;
    $qtdMorcegos = 0;

    for ($i = 0; $i < 587; $i++) {
        $botao = rand(1, 3);
        if ($botao == 1) {
            $custoTotal += 350;
            $qtdBonecos++;
        } else if ($botao == 2) {
            $custoTotal += 120;
            $qtdTumulos++;
        } else if ($botao == 3) {
            $custoTotal += 50;
            $qtdMorcegos++;
        }
    }

    echo "<ul>";
    echo "<li>Bonecos de marshmallow (botão 1): $qtdBonecos</li>";
    echo "<li>Túmulos queimados (botão 2): $qtdTumulos</li>";
    echo "<li>Morcegos/Vampiros (botão 3): $qtdMorcegos</li>";
    echo "</ul>";
    echo "<p><strong>Gasto total gerado: R$ " . number_format($custoTotal, 2, ',', '.') . "</strong></p>";
    ?>

</body>
</html>