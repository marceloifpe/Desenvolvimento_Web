<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $totalDeLinhas = 0;
    $totalDeLinhas = count($linhas);

    if ($totalDeLinhas > 0) {
        echo "<h2>Questão R: Separar sílabas de palavras com sílabas de dois caracteres</h2>";
        $frase = $linhas[$totalDeLinhas - 1];
        echo "<p>Frase original: " . $frase . "</p>";

        $palavraAtual = '';
        $fraseSeparada = '';
        $len_frase = 0;
        for ($i = 0; isset($frase[$i]); $i++) {
            $len_frase++;
        }

        for ($i = 0; $i < $len_frase; $i++) {
            $char = $frase[$i];
            if ($char == ' ' || $i == $len_frase - 1) {
                if ($i == $len_frase - 1 && $char != ' ') {
                    $palavraAtual .= $char;
                }

                $len_palavra = 0;
                for ($j = 0; isset($palavraAtual[$j]); $j++) {
                    $len_palavra++;
                }

                $palavraSeparada = '';
                for ($k = 0; $k < $len_palavra; $k++) {
                    $palavraSeparada .= $palavraAtual[$k];
                    if (($k + 1) % 2 == 0 && ($k + 1) < $len_palavra) {
                        $palavraSeparada .= '-';
                    }
                }
                $fraseSeparada .= $palavraSeparada;
                if ($char == ' ' && $i != $len_frase - 1) {
                    $fraseSeparada .= ' ';
                }
                $palavraAtual = '';
            } else {
                $palavraAtual .= $char;
            }
        }
        echo "<p>Frase com sílabas separadas: " . $fraseSeparada . "</p>";

    } else {
        echo "<p style='color: orange;'>Atenção: O arquivo foi lido, mas está vazio.</p>";
    }
} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado. Verifique o caminho.</p>";
}
?>
