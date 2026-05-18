<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);

    $maiorPalavra = "";

    for ($i = 0; $i < count($linhas); $i++) {
        $linhaAtual = $linhas[$i];
        $tamanho = mb_strlen($linhaAtual, 'UTF-8');

        $palavraAtual = "";

        for ($j = 0; $j < $tamanho; $j++) {
            $caractere = mb_substr($linhaAtual, $j, 1, 'UTF-8');

            if ($caractere !== " ") {
                $palavraAtual .= $caractere;
            } else {
                if (mb_strlen($palavraAtual, 'UTF-8') > mb_strlen($maiorPalavra, 'UTF-8')) {
                    $maiorPalavra = $palavraAtual;
                }
                $palavraAtual = "";
            }
        }

        if (mb_strlen($palavraAtual, 'UTF-8') > mb_strlen($maiorPalavra, 'UTF-8')) {
            $maiorPalavra = $palavraAtual;
        }
    }

    echo "<p style='color: green;'><strong>Letra K concluída com sucesso!</strong></p>";

    echo "<div style='background: #252526; color: #d4d4d4; padding: 20px; font-family: monospace; width: fit-content; font-size: 1.2rem;'>";
    echo "A maior palavra do arquivo é: <strong style='color: #f1c40f;'>$maiorPalavra</strong><br><br>";
    echo "Tamanho: <strong>" . mb_strlen($maiorPalavra, 'UTF-8') . " caracteres</strong>";
    echo "</div>";

} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>