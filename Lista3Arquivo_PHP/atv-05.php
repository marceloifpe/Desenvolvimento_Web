<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    if ($qtd_linhas > 2) {
        $linha3 = $linhas[2];
        $tamanho = strlen($linha3);

        echo "<p style='color: green;'><strong>Letra E - Linha 3 na diagonal invertida:</strong></p>";
        echo "<div style='font-family: monospace; line-height: 1.5;'>";

        for ($i = 0; $i < $tamanho; $i++) {
            $qtdEspacos = $tamanho - $i - 1;

            for ($espaco = 0; $espaco < $qtdEspacos; $espaco++) {
                echo "&nbsp;&nbsp;";
            }

            $letra = substr($linha3, $i, 1);
            echo $letra . "<br>";
        }
        echo "</div>";
    } else {
        echo "<p style='color: orange;'>Atenção: O arquivo tem menos de 3 linhas.</p>";
    }
} else {
    echo "<p style='color: red;'>Erro: O arquivo não foi encontrado.</p>";
}
?>