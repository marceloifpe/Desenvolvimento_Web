<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $totalPalavras = 0;

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($i = 0; $i < $qtd_linhas; $i++) {
        $linhaAtual = $linhas[$i];
        $tamanho = strlen($linhaAtual);
        $dentroDaPalavra = false;

        for ($j = 0; $j < $tamanho; $j++) {
            $caractere = substr($linhaAtual, $j, 1);

            if ($caractere !== " " && $caractere !== "\t" && $caractere !== "\r") {
                if (!$dentroDaPalavra) {
                    $totalPalavras++;
                    $dentroDaPalavra = true;
                }
            } else {
                $dentroDaPalavra = false;
            }
        }
    }

    echo "<p style='color: green;'><strong>Letra J concluída com sucesso!</strong></p>";
    echo "Total de palavras no arquivo: <strong>$totalPalavras</strong>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo não foi encontrado.</p>";
}
?>