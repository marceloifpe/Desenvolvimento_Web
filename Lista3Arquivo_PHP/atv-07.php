<?php
$nomeDoArquivo = 'arquivo/copa.txt';

$novoArquivo = 'arquivo/copag.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";

    for ($i = 0; $i < count($linhas); $i++) {
        $linhaAtual = $linhas[$i];
        $tamanho = mb_strlen($linhaAtual, 'UTF-8');
        $linhaLimpa = "";

        for ($j = 0; $j < $tamanho; $j++) {
            $caractere = mb_substr($linhaAtual, $j, 1, 'UTF-8');

            if ($caractere !== " ") {
                $linhaLimpa .= $caractere;
            }
        }

        $conteudoFinal .= $linhaLimpa . PHP_EOL;
    }

    file_put_contents($novoArquivo, $conteudoFinal);

    echo "<p style='color: green;'><strong>Letra G concluída com sucesso!</strong> O resultado foi salvo no arquivo <strong>copag.txt</strong>.</p>";

    echo "<strong>Como ficou o seu arquivo 'copag.txt':</strong><br><br>";
    echo "<pre style='background: #252526; color: #d4d4d4; padding: 10px; font-family: monospace; width: fit-content;'>";
    echo htmlspecialchars($conteudoFinal);
    echo "</pre>";

} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>