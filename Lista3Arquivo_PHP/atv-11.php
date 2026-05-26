<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $maiorPalavra = "";

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($i = 0; $i < $qtd_linhas; $i++) {
        $linhaAtual = $linhas[$i];
        $tamanho = strlen($linhaAtual);
        $palavraAtual = "";

        for ($j = 0; $j < $tamanho; $j++) {
            $caractere = substr($linhaAtual, $j, 1);

            if ($caractere !== " " && $caractere !== "\t") {
                $palavraAtual .= $caractere;
            } else {
                if (strlen($palavraAtual) > strlen($maiorPalavra)) {
                    $maiorPalavra = $palavraAtual;
                }
                $palavraAtual = "";
            }
        }

        if (strlen($palavraAtual) > strlen($maiorPalavra)) {
            $maiorPalavra = $palavraAtual;
        }
    }

    echo "<p style='color: green;'><strong>Letra K concluída com sucesso!</strong></p>";
    echo "A maior palavra do arquivo é: <strong>$maiorPalavra</strong><br>";
    echo "Tamanho: <strong>" . strlen($maiorPalavra) . " caracteres</strong>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo não foi encontrado.</p>";
}
?>