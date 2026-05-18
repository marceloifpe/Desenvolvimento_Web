<?php
$nomeDoArquivo = 'arquivo/copa.txt';

$caractereBusca = "a";

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);

    $contador = 0;

    $buscaMinusculo = mb_strtolower($caractereBusca, 'UTF-8');

    for ($i = 0; $i < count($linhas); $i++) {
        $linhaAtual = $linhas[$i];
        $tamanho = mb_strlen($linhaAtual, 'UTF-8');

        for ($j = 0; $j < $tamanho; $j++) {
            $charAtual = mb_substr($linhaAtual, $j, 1, 'UTF-8');

            $charLinhaMinusculo = mb_strtolower($charAtual, 'UTF-8');

            if ($charLinhaMinusculo === $buscaMinusculo) {
                $contador++;
            }
        }
    }

    echo "<p style='color: green;'><strong>Letra O concluída com sucesso!</strong></p>";

    echo "<div style='background: #252526; color: #d4d4d4; padding: 20px; font-family: monospace; width: fit-content; font-size: 1.2rem;'>";
    echo "Buscando pelo caractere: <strong style='color: #3498db;'>'$caractereBusca'</strong><br><br>";

    if ($contador > 0) {
        echo "Ele aparece <strong>$contador vezes</strong> no arquivo.";
    } else {
        echo "Este caractere não foi encontrado no arquivo.";
    }

    echo "</div>";

} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>