<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$novoArquivo = 'arquivo/copab.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($i = 0; $i < $qtd_linhas; $i++) {
        $linhaAtual = $linhas[$i];
        $linhaInvertida = "";
        $tamanho = strlen($linhaAtual);

        for ($j = $tamanho - 1; $j >= 0; $j--) {
            $linhaInvertida .= substr($linhaAtual, $j, 1);
        }

        $conteudoFinal .= $linhaInvertida . "\n";
    }

    file_put_contents($novoArquivo, $conteudoFinal);
    echo "<p style='color: green;'><strong>Letra B concluída com sucesso!</strong></p>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>