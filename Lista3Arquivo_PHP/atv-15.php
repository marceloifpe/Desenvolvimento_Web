<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$buscaMin = "a";
$buscaMai = "A";

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $contador = 0;

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($i = 0; $i < $qtd_linhas; $i++) {
        $linhaAtual = $linhas[$i];

        for ($j = 0; $j < strlen($linhaAtual); $j++) {
            $charAtual = substr($linhaAtual, $j, 1);

            if ($charAtual === $buscaMin || $charAtual === $buscaMai) {
                $contador++;
            }
        }
    }

    echo "<p style='color: green;'><strong>Letra O concluída com sucesso!</strong></p>";
    echo "<div style='font-family: monospace;'>";
    echo "Buscando pela letra 'a' ou 'A': Aparece <strong>$contador vezes</strong>.";
    echo "</div>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>