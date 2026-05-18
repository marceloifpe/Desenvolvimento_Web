<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $totalDeLinhas = 0;
    for ($i = 0; isset($linhas[$i]); $i++) {
        $totalDeLinhas++;
    }

    if ($totalDeLinhas > 0) {
        echo "<h2>Questão T: Soma dos índices de caracteres não vogais</h2>";
        $vogais = 'aeiouAEIOU';
        $len_vogais = 0;
        for ($i = 0; isset($vogais[$i]); $i++) {
            $len_vogais++;
        }

        $somaDosIndices = 0;
        for ($i = 0; $i < $totalDeLinhas; $i++) {
            $frase = $linhas[$i];
            $len_frase = 0;
            for ($j = 0; isset($frase[$j]); $j++) {
                $len_frase++;
            }

            for ($j = 0; $j < $len_frase; $j++) {
                $char = $frase[$j];
                $isVogal = false;
                for ($k = 0; $k < $len_vogais; $k++) {
                    if ($char == $vogais[$k]) {
                        $isVogal = true;
                        break;
                    }
                }
                if (!$isVogal) {
                    $somaDosIndices += $j;
                }
            }
        }
        echo "<p>A soma dos índices de todos os caracteres que não são vogais é: " . $somaDosIndices . "</p>";

    } else {
        echo "<p style='color: orange;'>Atenção: O arquivo foi lido, mas está vazio.</p>";
    }
} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado. Verifique o caminho.</p>";
}
?>
