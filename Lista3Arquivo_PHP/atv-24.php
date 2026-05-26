<?php
$nomeDoArquivoCriptografado = 'arquivo/copa_criptografado.txt';
$nomeDoArquivoDescriptografado = 'arquivo/copa_descriptografado.txt';

if (file_exists($nomeDoArquivoCriptografado)) {
    $linhas = file($nomeDoArquivoCriptografado, FILE_IGNORE_NEW_LINES);
    echo "<h2>Questão X: Descriptografar</h2>";
    
    $conteudoDescriptografado = "";
    $deslocamento = 3;
    $alfabetoMin = "abcdefghijklmnopqrstuvwxyz";
    $alfabetoMai = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($i = 0; $i < $qtd_linhas; $i++) {
        $frase = $linhas[$i];
        $fraseDescriptografada = '';

        for ($j = 0; $j < strlen($frase); $j++) {
            $char = substr($frase, $j, 1);
            $charDescriptografado = $char; 

            for ($k = 0; $k < strlen($alfabetoMin); $k++) {
                if ($char === substr($alfabetoMin, $k, 1)) {
                    $novaPos = ($k - $deslocamento + 26) % 26;
                    $charDescriptografado = substr($alfabetoMin, $novaPos, 1);
                    break;
                } else if ($char === substr($alfabetoMai, $k, 1)) {
                    $novaPos = ($k - $deslocamento + 26) % 26;
                    $charDescriptografado = substr($alfabetoMai, $novaPos, 1);
                    break;
                }
            }
            $fraseDescriptografada .= $charDescriptografado;
        }
        $conteudoDescriptografado .= $fraseDescriptografada . "\n";
    }

    file_put_contents($nomeDoArquivoDescriptografado, $conteudoDescriptografado);
    echo "<p>Arquivo descriptografado salvo!</p>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo criptografado não foi encontrado.</p>";
}
?>