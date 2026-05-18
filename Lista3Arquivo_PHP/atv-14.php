<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);

    if (isset($linhas[21])) {

        $linha22 = $linhas[21];
        $tamanho = mb_strlen($linha22, 'UTF-8');

        $palavras = [];
        $palavraAtual = "";

        for ($i = 0; $i < $tamanho; $i++) {
            $caractere = mb_substr($linha22, $i, 1, 'UTF-8');

            if ($caractere !== " ") {
                $palavraAtual .= $caractere;
            } else {
                if ($palavraAtual !== "") {
                    $palavras[] = $palavraAtual;
                    $palavraAtual = "";
                }
            }
        }
        if ($palavraAtual !== "") {
            $palavras[] = $palavraAtual;
        }

        echo "<p style='color: green;'><strong>Letra N - Linha 22 com cada palavra na vertical:</strong></p>";

        echo "<div style='background: #252526; color: #d4d4d4; padding: 20px; font-family: monospace; display: flex; gap: 40px; width: fit-content; line-height: 1.5;'>";

        foreach ($palavras as $palavra) {
            echo "<div style='text-align: center; font-weight: bold;'>";

            $tamanhoPalavra = mb_strlen($palavra, 'UTF-8');

            for ($j = 0; $j < $tamanhoPalavra; $j++) {
                echo mb_substr($palavra, $j, 1, 'UTF-8') . "<br>";
            }

            echo "</div>";
        }

        echo "</div>";

    } else {
        echo "<p style='color: orange;'>Atenção: O arquivo tem menos de 22 linhas, não é possível exibir o resultado.</p>";
    }

} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>