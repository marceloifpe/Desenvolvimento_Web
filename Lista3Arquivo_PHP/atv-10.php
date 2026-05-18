<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);

    $totalPalavras = 0;

    for ($i = 0; $i < count($linhas); $i++) {
        $linhaAtual = $linhas[$i];
        $tamanho = mb_strlen($linhaAtual, 'UTF-8');

        $dentroDaPalavra = false;

        for ($j = 0; $j < $tamanho; $j++) {
            $caractere = mb_substr($linhaAtual, $j, 1, 'UTF-8');

            if ($caractere !== " ") {
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

    echo "<div style='background: #252526; color: #d4d4d4; padding: 20px; font-family: monospace; width: fit-content; font-size: 1.2rem;'>";
    echo "Total de palavras no arquivo: <strong>$totalPalavras</strong>";
    echo "</div>";

} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>