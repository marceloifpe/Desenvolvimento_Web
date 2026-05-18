<?php
$frase = "o rato roeu a roupa do rei";
$qtdPalavras = 0;
$dentroDaPalavra = false;

for ($i = 0; $i < strlen($frase); $i++) {
    $letra = substr($frase, $i, 1);

    if ($letra != ' ') {
        if (!$dentroDaPalavra) {
            $qtdPalavras++;
            $dentroDaPalavra = true;
        }
    } else {
        $dentroDaPalavra = false;
    }
}

echo "<strong>Frase original:</strong> $frase <br>";
echo "<strong>Quantidade de palavras:</strong> $qtdPalavras";
?>