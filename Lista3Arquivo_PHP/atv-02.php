<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$novoArquivo = 'arquivo/copab.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";

    for ($i = 0; $i < count($linhas); $i++) {
        $linhaAtual = $linhas[$i];
        $linhaInvertida = "";

        $tamanho = mb_strlen($linhaAtual, 'UTF-8');

        for ($j = $tamanho - 1; $j >= 0; $j--) {
            $linhaInvertida .= mb_substr($linhaAtual, $j, 1, 'UTF-8');
        }

        $conteudoFinal .= $linhaInvertida . PHP_EOL;
    }

    file_put_contents($novoArquivo, $conteudoFinal);

    echo "<p style='color: green;'><strong>Letra B concluída com sucesso!</strong></p>";
    echo "<strong>Como ficou o seu arquivo 'copab.txt':</strong><br><br>";
    echo "<pre style='background: #252526; color: #d4d4d4; padding: 10px;'>";
    echo htmlspecialchars($conteudoFinal);
    echo "</pre>";

} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>