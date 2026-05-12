<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pergunta 02 - Operações com Vetores</title>
</head>
<body>
    <h1>Pergunta 02 - Conjuntos</h1>

    <?php
    $A = [];
    $B = [];
    $tamanhoA = rand(3, 10);
    $tamanhoB = rand(3, 10);

    for ($i = 0; $i < $tamanhoA; $i++) {
        $A[$i] = rand(1, 15);
    }
    for ($i = 0; $i < $tamanhoB; $i++) {
        $B[$i] = rand(1, 15);
    }

    function printVetor($nome, $vetor, $tamanho) {
        echo "<p>Vetor $nome: { ";
        for ($i = 0; $i < $tamanho; $i++) {
            echo $vetor[$i];
            if ($i < $tamanho - 1) echo ", ";
        }
        echo " }</p>";
    }

    printVetor("A", $A, $tamanhoA);
    printVetor("B", $B, $tamanhoB);

    // Interseção (A ∩ B)
    $intersecao = [];
    $idxInt = 0;
    for ($i = 0; $i < $tamanhoA; $i++) {
        $valA = $A[$i];
        $existeB = false;

        for ($j = 0; $j < $tamanhoB; $j++) {
            if ($valA == $B[$j]) {
                $existeB = true;
                break;
            }
        }

        if ($existeB) {
            $jaExiste = false;
            for ($k = 0; $k < $idxInt; $k++) {
                if ($intersecao[$k] == $valA) $jaExiste = true;
            }
            if (!$jaExiste) {
                $intersecao[$idxInt] = $valA;
                $idxInt++;
            }
        }
    }
    printVetor("Interseção (A ∩ B)", $intersecao, $idxInt);

    // União (A U B)
    $uniao = [];
    $idxUniao = 0;

    for ($i = 0; $i < $tamanhoA; $i++) {
        $valA = $A[$i];
        $jaExiste = false;
        for ($k = 0; $k < $idxUniao; $k++) {
            if ($uniao[$k] == $valA) $jaExiste = true;
        }
        if (!$jaExiste) {
            $uniao[$idxUniao] = $valA;
            $idxUniao++;
        }
    }

    for ($j = 0; $j < $tamanhoB; $j++) {
        $valB = $B[$j];
        $jaExiste = false;
        for ($k = 0; $k < $idxUniao; $k++) {
            if ($uniao[$k] == $valB) $jaExiste = true;
        }
        if (!$jaExiste) {
            $uniao[$idxUniao] = $valB;
            $idxUniao++;
        }
    }
    printVetor("União (A U B)", $uniao, $idxUniao);

    // Diferença (A - B)
    $diferenca = [];
    $idxDif = 0;
    for ($i = 0; $i < $tamanhoA; $i++) {
        $valA = $A[$i];
        $existeB = false;

        for ($j = 0; $j < $tamanhoB; $j++) {
            if ($valA == $B[$j]) {
                $existeB = true;
                break;
            }
        }

        if (!$existeB) {
            $jaExiste = false;
            for ($k = 0; $k < $idxDif; $k++) {
                if ($diferenca[$k] == $valA) $jaExiste = true;
            }
            if (!$jaExiste) {
                $diferenca[$idxDif] = $valA;
                $idxDif++;
            }
        }
    }
    printVetor("Diferença (A - B)", $diferenca, $idxDif);

    // Verificar se A contido em B ou B contido em A
    $A_contido_B = true;
    for ($i = 0; $i < $tamanhoA; $i++) {
        $existeB = false;
        for ($j = 0; $j < $tamanhoB; $j++) {
            if ($A[$i] == $B[$j]) $existeB = true;
        }
        if (!$existeB) {
            $A_contido_B = false;
            break;
        }
    }

    $B_contido_A = true;
    for ($j = 0; $j < $tamanhoB; $j++) {
        $existeA = false;
        for ($i = 0; $i < $tamanhoA; $i++) {
            if ($B[$j] == $A[$i]) $existeA = true;
        }
        if (!$existeA) {
            $B_contido_A = false;
            break;
        }
    }

    if ($A_contido_B && $tamanhoA > 0) {
        echo "<p>O conjunto A é subconjunto de B (A ⊂ B).</p>";
    } else if ($B_contido_A && $tamanhoB > 0) {
        echo "<p>O conjunto B é subconjunto de A (B ⊂ A).</p>";
    } else {
        echo "<p>Nenhum dos conjuntos é subconjunto do outro.</p>";
    }
    ?>
</body>
</html>