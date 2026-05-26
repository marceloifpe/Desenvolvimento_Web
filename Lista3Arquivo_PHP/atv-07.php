<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$novoArquivo = 'arquivo/copag.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($i = 0; $i < $qtd_linhas; $i++) {
        $linhaAtual = $linhas[$i];
        $tamanho = strlen($linhaAtual);
        $linhaLimpa = "";

        for ($j = 0; $j < $tamanho; $j++) {
            $caractere = substr($linhaAtual, $j, 1);

            if ($caractere !== " ") {
                $linhaLimpa .= $caractere;
            }
        }
        $conteudoFinal .= $linhaLimpa . "\n";
    }

    file_put_contents($novoArquivo, $conteudoFinal);
    echo "<p style='color: green;'><strong>Letra G concluída com sucesso!</strong></p>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo não foi encontrado.</p>";
}
?>