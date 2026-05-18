<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);

    if (isset($linhas[14])) {

        $linha15 = $linhas[14];
        $tamanho = mb_strlen($linha15, 'UTF-8');

        echo "<p style='color: green;'><strong>Letra C - Linha 15 na vertical:</strong></p>";

        echo "<div style='background: #252526; color: #d4d4d4; padding: 10px; font-family: monospace; width: fit-content;'>";

        for ($i = 0; $i < $tamanho; $i++) {
            $letra = mb_substr($linha15, $i, 1, 'UTF-8');

            if ($letra === " ") {
                echo "&nbsp;<br>";
            } else {
                echo $letra . "<br>";
            }
        }

        echo "</div>";

    } else {
        echo "<p style='color: orange;'>Atenção: O arquivo tem menos de 15 linhas, não é possível exibir o resultado.</p>";
    }

} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>