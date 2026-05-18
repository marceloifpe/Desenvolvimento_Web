<?php
$frase = "o rato roeu a roupa do rei";
$qtdVogais = 0;

for ($i = 0; $i < strlen($frase); $i++) {
    $letra = substr($frase, $i, 1);

    if ($letra == 'a' || $letra == 'e' || $letra == 'i' || $letra == 'o' || $letra == 'u' ||
        $letra == 'A' || $letra == 'E' || $letra == 'I' || $letra == 'O' || $letra == 'U') {
        $qtdVogais++;
    }
}

echo "<strong>Frase original:</strong> $frase <br>";
echo "<strong>Quantidade de vogais:</strong> $qtdVogais";
?>