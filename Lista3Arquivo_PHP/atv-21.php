<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    
    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    if ($qtd_linhas > 0) {
        echo "<h2>Questão U: Palavra central</h2>";
        $fraseParaTeste = "Ted você brilha cinco estrelas de alegria.";
        echo "<p>Frase para teste: \"" . $fraseParaTeste . "\"</p>";

        $palavras = [];
        $palavraAtual = "";
        $len_frase = strlen($fraseParaTeste);

        for ($i = 0; $i < $len_frase; $i++) {
            $char = substr($fraseParaTeste, $i, 1);
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

        $qtd_palavras = 0;
        foreach ($palavras as $p) { 
            $qtd_palavras++; 
        }

        if ($qtd_palavras % 2 != 0) {
            $indiceCentral = ($qtd_palavras - 1) / 2;
            echo "<p>A palavra central é: <strong>" . $palavras[$indiceCentral] . "</strong></p>";
        } else {
            echo "<p style='color: orange;'>A frase não possui quantidade ímpar de palavras.</p>";
        }
    }
}
?>