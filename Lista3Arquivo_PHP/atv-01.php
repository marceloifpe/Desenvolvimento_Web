<?php
$nomeDoArquivo = 'arquivo/copa.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    
    $totalDeLinhas = 0;
    for ($i = 0; isset($linhas[$i]); $i++) {
        $totalDeLinhas++;
    }

    if ($totalDeLinhas > 20) {
        echo "<p style='color: green;'><strong>Sucesso!</strong> O arquivo foi lido e possui $totalDeLinhas linhas.</p>";
        echo "<strong>Início do arquivo lido:</strong><br>";
        echo "Linha 0: " . $linhas[0] . "<br>";
        echo "Linha 1: " . $linhas[1] . "<br>";
        echo "Linha 2: " . $linhas[2] . "<br>";
    } else {
        echo "<p style='color: orange;'>Atenção: O arquivo foi lido, mas tem apenas $totalDeLinhas linhas. O exercício pede mais de 20!</p>";
    }
} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado. Verifique o caminho.</p>";
}
?>