<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$novoArquivo = 'arquivo/copam.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";
    $min = "abcdefghijklmnopqrstuvwxyzáéíóúâêôãõç";
    $mai = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚÂÊÔÃÕÇ";

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($i = 0; $i < $qtd_linhas; $i++) {
        $linhaAtual = $linhas[$i];
        $linhaMaiuscula = "";

        for ($j = 0; $j < strlen($linhaAtual); $j++) {
            $caractere = substr($linhaAtual, $j, 1);
            $novoC = $caractere;
            
            for ($m = 0; $m < strlen($min); $m++) {
                if ($caractere === substr($min, $m, 1)) {
                    $novoC = substr($mai, $m, 1);
                    break;
                }
            }
            $linhaMaiuscula .= $novoC;
        }
        $conteudoFinal .= $linhaMaiuscula . "\n";
    }

    file_put_contents($novoArquivo, $conteudoFinal);
    echo "<p style='color: green;'><strong>Letra M concluída com sucesso!</strong> O resultado foi salvo no arquivo <strong>copam.txt</strong>.</p>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>