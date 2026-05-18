<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$nomeDoArquivoCriptografado = 'arquivo/copa_criptografado.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $totalDeLinhas = 0;
    for ($i = 0; isset($linhas[$i]); $i++) {
        $totalDeLinhas++;
    }

    if ($totalDeLinhas > 0) {
        echo "<h2>Questão W: Criptografar o arquivo lido (Cifra de César com deslocamento 3)</h2>";
        $conteudoCriptografado = [];
        $deslocamento = 3;

        for ($i = 0; $i < $totalDeLinhas; $i++) {
            $frase = $linhas[$i];
            $len_frase = 0;
            for ($j = 0; isset($frase[$j]); $j++) {
                $len_frase++;
            }
            $fraseCriptografada = '';
            for ($j = 0; $j < $len_frase; $j++) {
                $char = $frase[$j];
                $ascii = ord($char);

                if ($ascii >= 65 && $ascii <= 90) {
                    $charCriptografado = chr(((($ascii - 65) + $deslocamento) % 26) + 65);
                } elseif ($ascii >= 97 && $ascii <= 122) {
                    $charCriptografado = chr(((($ascii - 97) + $deslocamento) % 26) + 97);
                } else {
                    $charCriptografado = $char;
                }
                $fraseCriptografada .= $charCriptografado;
            }
            $conteudoCriptografado[] = $fraseCriptografada;
        }

        file_put_contents($nomeDoArquivoCriptografado, implode("\n", $conteudoCriptografado));
        echo "<p>Arquivo criptografado salvo em: <strong>" . $nomeDoArquivoCriptografado . "</strong></p>";
        echo "<h3>Conteúdo Criptografado:</h3><pre>";
        foreach ($conteudoCriptografado as $linha) {
            echo $linha . "\n";
        }
        echo "</pre>";

    } else {
        echo "<p style=\'color: orange;\'>Atenção: O arquivo foi lido, mas está vazio.</p>";
    }
} else {
    echo "<p style=\'color: red;\'>Erro: O arquivo \'$nomeDoArquivo\' não foi encontrado. Verifique o caminho.</p>";
}
?>
