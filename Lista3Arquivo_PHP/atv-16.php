<?php
$nomeDoArquivo = 'arquivo/copa.txt';

$novoArquivo = 'arquivo/copap.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";

    $inverterPalavra = false;

    for ($i = 0; $i < count($linhas); $i++) {
        $linhaAtual = $linhas[$i];
        $tamanhoLinha = mb_strlen($linhaAtual, 'UTF-8');

        $palavraAtual = "";
        $linhaProcessada = "";

        for ($j = 0; $j < $tamanhoLinha; $j++) {
            $caractere = mb_substr($linhaAtual, $j, 1, 'UTF-8');

            if ($caractere !== " ") {
                $palavraAtual .= $caractere;
            } else {
                if ($palavraAtual !== "") {
                    if ($inverterPalavra) {
                        $palavraInvertida = "";
                        $tam = mb_strlen($palavraAtual, 'UTF-8');
                        for ($k = $tam - 1; $k >= 0; $k--) {
                            $palavraInvertida .= mb_substr($palavraAtual, $k, 1, 'UTF-8');
                        }
                        $linhaProcessada .= $palavraInvertida;
                    } else {
                        $linhaProcessada .= $palavraAtual;
                    }

                    $inverterPalavra = !$inverterPalavra;

                    $palavraAtual = "";
                }

                $linhaProcessada .= " ";
            }
        }

        if ($palavraAtual !== "") {
            if ($inverterPalavra) {
                $palavraInvertida = "";
                $tam = mb_strlen($palavraAtual, 'UTF-8');
                for ($k = $tam - 1; $k >= 0; $k--) {
                    $palavraInvertida .= mb_substr($palavraAtual, $k, 1, 'UTF-8');
                }
                $linhaProcessada .= $palavraInvertida;
            } else {
                $linhaProcessada .= $palavraAtual;
            }

            $inverterPalavra = !$inverterPalavra;
        }

        $conteudoFinal .= $linhaProcessada . PHP_EOL;
    }

    file_put_contents($novoArquivo, $conteudoFinal);

    echo "<p style='color: green;'><strong>Letra P concluída com sucesso (Sequência Contínua)!</strong> O resultado foi salvo no arquivo <strong>copap.txt</strong>.</p>";

    echo "<strong>Como ficou o seu arquivo 'copap.txt':</strong><br><br>";
    echo "<pre style='background: #252526; color: #d4d4d4; padding: 10px; font-family: monospace; width: fit-content;'>";
    echo htmlspecialchars($conteudoFinal);
    echo "</pre>";

} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>