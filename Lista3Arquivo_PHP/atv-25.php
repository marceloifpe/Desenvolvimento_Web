<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    
    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    if ($qtd_linhas > 0) {
        echo "<h2>Questão Y: Primeira e última palavra na vertical</h2>";
        $frase = $linhas[0];
        $len_frase = strlen($frase);

        $primeiraPalavra = '';
        for ($i = 0; $i < $len_frase; $i++) {
            $char = substr($frase, $i, 1);
            if ($char == ' ') break;
            $primeiraPalavra .= $char;
        }

        $tempUltimaPalavra = '';
        for ($i = $len_frase - 1; $i >= 0; $i--) {
            $char = substr($frase, $i, 1);
            if ($char == ' ') break;
            $tempUltimaPalavra = $char . $tempUltimaPalavra;
        }
        $ultimaPalavra = $tempUltimaPalavra;

        echo "<p>Primeira palavra na vertical:</p><pre>";
        $len_primeira = strlen($primeiraPalavra);
        for ($i = 0; $i < $len_primeira; $i++) {
            echo substr($primeiraPalavra, $i, 1) . "\n";
        }
        echo "</pre>";

        echo "<p>Última palavra na vertical:</p><pre>";
        $len_ultima = strlen($ultimaPalavra);
        for ($i = 0; $i < $len_ultima; $i++) {
            echo substr($ultimaPalavra, $i, 1) . "\n";
        }
        echo "</pre>";
    }
}
?>