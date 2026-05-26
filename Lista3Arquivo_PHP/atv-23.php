<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$nomeDoArquivoCriptografado = 'arquivo/copa_criptografado.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    echo "<h2>Questão W: Criptografar (Cifra de César)</h2>";
    
    $conteudoCriptografado = "";
    $deslocamento = 3;
    $alfabetoMin = "abcdefghijklmnopqrstuvwxyz";
    $alfabetoMai = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($i = 0; $i < $qtd_linhas; $i++) {
        $frase = $linhas[$i];
        $fraseCriptografada = '';

        for ($j = 0; $j < strlen($frase); $j++) {
            $char = substr($frase, $j, 1);
            $charCriptografado = $char;

            for ($k = 0; $k < strlen($alfabetoMin); $k++) {
                if ($char === substr($alfabetoMin, $k, 1)) {
                    $novaPos = ($k + $deslocamento) % 26;
                    $charCriptografado = substr($alfabetoMin, $novaPos, 1);
                    break;
                } else if ($char === substr($alfabetoMai, $k, 1)) {
                    $novaPos = ($k + $deslocamento) % 26;
                    $charCriptografado = substr($alfabetoMai, $novaPos, 1);
                    break;
                }
            }
            $fraseCriptografada .= $charCriptografado;
        }
        $conteudoCriptografado .= $fraseCriptografada . "\n";
    }

    file_put_contents($nomeDoArquivoCriptografado, $conteudoCriptografado);
    echo "<p>Arquivo criptografado salvo!</p>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo não foi encontrado.</p>";
}
?>