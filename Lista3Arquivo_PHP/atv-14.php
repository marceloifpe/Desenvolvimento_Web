<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    
    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    if ($qtd_linhas > 21) {
        $linha22 = $linhas[21];
        $tamanho = strlen($linha22);

        $palavras = [];
        $palavraAtual = "";

        for ($i = 0; $i < $tamanho; $i++) {
            $caractere = substr($linha22, $i, 1);

            if ($caractere !== " ") {
                $palavraAtual .= $caractere;
            } else {
                if ($palavraAtual !== "") {
                    $palavras[] = $palavraAtual;
                    $palavraAtual = "";
                }
            }
        }
        if ($palavraAtual !== "") {
            $palavras[] = $palavraAtual;
        }

        echo "<p style='color: green;'><strong>Letra N - Linha 22 com cada palavra na vertical:</strong></p>";
        echo "<div style='font-family: monospace; display: flex; gap: 40px; width: fit-content; line-height: 1.5;'>";

        $qtd_palavras = 0;
        foreach ($palavras as $p) { 
            $qtd_palavras++; 
        }

        for ($p = 0; $p < $qtd_palavras; $p++) {
            $palavra = $palavras[$p];
            echo "<div style='text-align: center; font-weight: bold;'>";

            $tamanhoPalavra = strlen($palavra);
            for ($j = 0; $j < $tamanhoPalavra; $j++) {
                echo substr($palavra, $j, 1) . "<br>";
            }
            echo "</div>";
        }
        echo "</div>";
    } else {
        echo "<p style='color: orange;'>Atenção: O arquivo tem menos de 22 linhas.</p>";
    }
} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>