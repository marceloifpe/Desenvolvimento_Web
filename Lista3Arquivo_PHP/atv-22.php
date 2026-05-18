<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $totalDeLinhas = 0;
    for ($i = 0; isset($linhas[$i]); $i++) {
        $totalDeLinhas++;
    }

    if ($totalDeLinhas > 0) {
        echo "<h2>Questão V: Primeira e última palavra na diagonal</h2>";
        $frase = $linhas[0];
        echo "<p>Frase original: \"" . $frase . "\"</p>";

        $len_frase = 0;
        for ($i = 0; isset($frase[$i]); $i++) {
            $len_frase++;
        }

        $primeiraPalavra = '';
        $ultimaPalavra = '';

        for ($i = 0; $i < $len_frase; $i++) {
            if ($frase[$i] == ' ') {
                break;
            }
            $primeiraPalavra .= $frase[$i];
        }

        $tempUltimaPalavra = '';
        for ($i = $len_frase - 1; $i >= 0; $i--) {
            if ($frase[$i] == ' ') {
                break;
            }
            $tempUltimaPalavra = $frase[$i] . $tempUltimaPalavra;
        }
        $ultimaPalavra = $tempUltimaPalavra;

        echo "<p>Primeira palavra na diagonal:</p><pre>";
        $len_primeira = 0;
        for ($i = 0; isset($primeiraPalavra[$i]); $i++) {
            $len_primeira++;
        }
        for ($i = 0; $i < $len_primeira; $i++) {
            for ($j = 0; $j < $i; $j++) {
                echo " ";
            }
            echo $primeiraPalavra[$i] . "\n";
        }
        echo "</pre>";

        echo "<p>Última palavra na diagonal:</p><pre>";
        $len_ultima = 0;
        for ($i = 0; isset($ultimaPalavra[$i]); $i++) {
            $len_ultima++;
        }
        for ($i = 0; $i < $len_ultima; $i++) {
            for ($j = 0; $j < $i; $j++) {
                echo " ";
            }
            echo $ultimaPalavra[$i] . "\n";
        }
        echo "</pre>";

    } else {
        echo "<p style=\'color: orange;\'>Atenção: O arquivo foi lido, mas está vazio.</p>";
    }
} else {
    echo "<p style=\'color: red;\'>Erro: O arquivo \'$nomeDoArquivo\' não foi encontrado. Verifique o caminho.</p>";
}
?>
