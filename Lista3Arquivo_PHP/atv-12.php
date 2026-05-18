<?php
$nomeDoArquivo = 'arquivo/copa.txt';

$novoArquivo = 'arquivo/copal.txt';

$palavraBusca = "Brasil";
$palavraSubstituta = "Hexa";

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";

    $tamanhoBusca = mb_strlen($palavraBusca, 'UTF-8');

    for ($l = 0; $l < count($linhas); $l++) {
        $linhaAtual = $linhas[$l];
        $tamanhoLinha = mb_strlen($linhaAtual, 'UTF-8');

        $linhaProcessada = "";
        $i = 0;

        while ($i < $tamanhoLinha) {
            $achouPalavra = true;

            for ($j = 0; $j < $tamanhoBusca; $j++) {
                $charLinha = mb_substr($linhaAtual, $i + $j, 1, 'UTF-8');
                $charBusca = mb_substr($palavraBusca, $j, 1, 'UTF-8');

                if (($i + $j) >= $tamanhoLinha || $charLinha !== $charBusca) {
                    $achouPalavra = false;
                    break;
                }
            }

            if ($achouPalavra) {
                $linhaProcessada .= $palavraSubstituta;
                $i += $tamanhoBusca;
            } else {
                $linhaProcessada .= mb_substr($linhaAtual, $i, 1, 'UTF-8');
                $i++;
            }
        }

        $conteudoFinal .= $linhaProcessada . PHP_EOL;
    }

    file_put_contents($novoArquivo, $conteudoFinal);

    echo "<p style='color: green;'><strong>Letra L concluída com sucesso!</strong></p>";
    echo "<p>Substituindo todas as ocorrências de <strong>'$palavraBusca'</strong> por <strong>'$palavraSubstituta'</strong>.</p>";

    echo "<strong>Como ficou o seu arquivo 'copal.txt':</strong><br><br>";
    echo "<pre style='background: #252526; color: #d4d4d4; padding: 10px; font-family: monospace; width: fit-content;'>";
    echo htmlspecialchars($conteudoFinal);
    echo "</pre>";

} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>