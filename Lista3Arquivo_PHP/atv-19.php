<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    
    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    if ($qtd_linhas > 0) {
        echo "<h2>Questão S: Última posição de uma vogal</h2>";
        $vogais = 'aeiouAEIOU';
        $len_vogais = strlen($vogais);

        for ($i = 0; $i < $qtd_linhas; $i++) {
            $frase = $linhas[$i];
            $len_frase = strlen($frase);
            $ultimaPosicaoVogal = -1;

            for ($j = $len_frase - 1; $j >= 0; $j--) {
                $char = substr($frase, $j, 1);
                $isVogal = false;
                
                for ($k = 0; $k < $len_vogais; $k++) {
                    if ($char == substr($vogais, $k, 1)) {
                        $isVogal = true;
                        break;
                    }
                }
                if ($isVogal) {
                    $ultimaPosicaoVogal = $j;
                    break;
                }
            }
            echo "<p>Frase: \"" . $frase . "\" -> Última vogal no índice: " . ($ultimaPosicaoVogal != -1 ? $ultimaPosicaoVogal : "Nenhuma") . "</p>";
        }
    }
}
?>