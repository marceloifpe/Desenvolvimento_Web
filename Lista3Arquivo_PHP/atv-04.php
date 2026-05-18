<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);

    if (isset($linhas[10])) {

        $linha11 = $linhas[10];
        $tamanho = mb_strlen($linha11, 'UTF-8');

        echo "<p style='color: green;'><strong>Letra D - Linha 11 na diagonal:</strong></p>";

        echo "<div style='background: #252526; color: #d4d4d4; padding: 20px; font-family: monospace; width: fit-content; line-height: 1.5;'>";

        for ($i = 0; $i < $tamanho; $i++) {

            for ($espaco = 0; $espaco < $i; $espaco++) {
                echo "&nbsp;&nbsp;";
            }

            $letra = mb_substr($linha11, $i, 1, 'UTF-8');
            echo $letra . "<br>";
        }

        echo "</div>";

    } else {
        echo "<p style='color: orange;'>Atenção: O arquivo tem menos de 11 linhas, não é possível exibir o resultado.</p>";
    }

} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>