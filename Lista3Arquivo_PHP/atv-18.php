<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    
    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    if ($qtd_linhas > 0) {
        echo "<h2>Questão R: Separar sílabas</h2>";
        $frase = $linhas[$qtd_linhas - 1];
        echo "<p>Frase original: " . $frase . "</p>";

        $palavraAtual = '';
        $fraseSeparada = '';
        $len_frase = strlen($frase);

        for ($i = 0; $i < $len_frase; $i++) {
            $char = substr($frase, $i, 1);
            
            if ($char == ' ' || $i == $len_frase - 1) {
                if ($i == $len_frase - 1 && $char != ' ') {
                    $palavraAtual .= $char;
                }

                $len_palavra = strlen($palavraAtual);
                $palavraSeparada = '';
                
                for ($k = 0; $k < $len_palavra; $k++) {
                    $palavraSeparada .= substr($palavraAtual, $k, 1);
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
    }
}
?>