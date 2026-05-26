<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    
    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    if ($qtd_linhas > 0) {
        echo "<h2>Questão T: Soma dos índices de não vogais</h2>";
        $vogais = 'aeiouAEIOU';
        $len_vogais = strlen($vogais);
        $somaDosIndices = 0;

        for ($i = 0; $i < $qtd_linhas; $i++) {
            $frase = $linhas[$i];
            $len_frase = strlen($frase);

            for ($j = 0; $j < $len_frase; $j++) {
                $char = substr($frase, $j, 1);
                $isVogal = false;
                
                for ($k = 0; $k < $len_vogais; $k++) {
                    if ($char == substr($vogais, $k, 1)) {
                        $isVogal = true;
                        break;
                    }
                }
                if (!$isVogal) {
                    $somaDosIndices += $j;
                }
            }
        }
        echo "<p>A soma dos índices é: " . $somaDosIndices . "</p>";
    }
}
?>