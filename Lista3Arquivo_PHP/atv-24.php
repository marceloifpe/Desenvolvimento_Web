<?php
$nomeDoArquivoCriptografado = 'arquivo/copa_criptografado.txt';
$nomeDoArquivoDescriptografado = 'arquivo/copa_descriptografado.txt';

if (file_exists($nomeDoArquivoCriptografado)) {
    $linhasCriptografadas = file($nomeDoArquivoCriptografado, FILE_IGNORE_NEW_LINES);
    $totalDeLinhas = 0;
    for ($i = 0; isset($linhasCriptografadas[$i]); $i++) {
        $totalDeLinhas++;
    }

    if ($totalDeLinhas > 0) {
        echo "<h2>Questão X: Descriptografar o arquivo criptografado</h2>";
        $conteudoDescriptografado = [];
        $deslocamento = 3;

        for ($i = 0; $i < $totalDeLinhas; $i++) {
            $fraseCriptografada = $linhasCriptografadas[$i];
            $len_frase = 0;
            for ($j = 0; isset($fraseCriptografada[$j]); $j++) {
                $len_frase++;
            }
            $fraseDescriptografada = '';
            for ($j = 0; $j < $len_frase; $j++) {
                $char = $fraseCriptografada[$j];
                $ascii = ord($char);

                if ($ascii >= 65 && $ascii <= 90) {
                    $charDescriptografado = chr(((($ascii - 65) - $deslocamento + 26) % 26) + 65);
                } elseif ($ascii >= 97 && $ascii <= 122) {
                    $charDescriptografado = chr(((($ascii - 97) - $deslocamento + 26) % 26) + 97);
                } else {
                    $charDescriptografado = $char;
                }
                $fraseDescriptografada .= $charDescriptografado;
            }
            $conteudoDescriptografado[] = $fraseDescriptografada;
        }

        file_put_contents($nomeDoArquivoDescriptografado, implode("\n", $conteudoDescriptografado));
        echo "<p>Arquivo descriptografado salvo em: <strong>" . $nomeDoArquivoDescriptografado . "</strong></p>";
        echo "<h3>Conteúdo Descriptografado:</h3><pre>";
        foreach ($conteudoDescriptografado as $linha) {
            echo $linha . "\n";
        }
        echo "</pre>";

    } else {
        echo "<p style=\'color: orange;\'>Atenção: O arquivo criptografado foi lido, mas está vazio.</p>";
    }
} else {
    echo "<p style=\'color: red;\'>Erro: O arquivo criptografado \'$nomeDoArquivoCriptografado\' não foi encontrado. Verifique o caminho.</p>";
}
?>
