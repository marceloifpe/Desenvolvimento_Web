<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $totalDeLinhas = 0;
    for ($i = 0; isset($linhas[$i]); $i++) {
        $totalDeLinhas++;
    }

    if ($totalDeLinhas > 0) {
        echo "<h2>Questão U: Palavra central de uma frase com quantidade ímpar de palavras</h2>";
        $fraseParaTeste = "Ted você brilha cinco estrelas de alegria.";
        echo "<p>Frase para teste: \"" . $fraseParaTeste . "\"</p>";

        $palavras = [];
        $palavraAtual = "";
        $len_frase = 0;
        for ($i = 0; isset($fraseParaTeste[$i]); $i++) {
            $len_frase++;
        }

        for ($i = 0; $i < $len_frase; $i++) {
            $char = $fraseParaTeste[$i];
            if ($char == ' ' || $i == $len_frase - 1) {
                if ($i == $len_frase - 1 && $char != ' ') {
                    $palavraAtual .= $char;
                }
                if ($palavraAtual != "") {
                    $palavras[] = $palavraAtual;
                }
                $palavraAtual = "";
            } else {
                $palavraAtual .= $char;
            }
        }

        $numPalavras = 0;
        for ($i = 0; isset($palavras[$i]); $i++) {
            $numPalavras++;
        }

        if ($numPalavras % 2 != 0) {
            $indiceCentral = ($numPalavras - 1) / 2;
            echo "<p>A palavra central é: <strong>" . $palavras[$indiceCentral] . "</strong></p>";
        } else {
            echo "<p style=\'color: orange;\'>A frase não possui uma quantidade ímpar de palavras.</p>";
        }

    } else {
        echo "<p style=\'color: orange;\'>Atenção: O arquivo foi lido, mas está vazio.</p>";
    }
} else {
    echo "<p style=\'color: red;\'>Erro: O arquivo \'$nomeDoArquivo\' não foi encontrado. Verifique o caminho.</p>";
}
?>
