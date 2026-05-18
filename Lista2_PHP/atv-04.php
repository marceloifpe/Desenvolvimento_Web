<?php
$frase = "o rato roeu a roupa do rei";
$palavraBusca = "rato";
$palavraSubstituta = "gato";

$fraseSubstituida = "";
$tamanhoFrase = strlen($frase);
$tamanhoBusca = strlen($palavraBusca);
$i = 0;

while ($i < $tamanhoFrase) {
    $achouPalavra = true;

    for ($j = 0; $j < $tamanhoBusca; $j++) {
        if ($i + $j >= $tamanhoFrase || substr($frase, $i + $j, 1) != substr($palavraBusca, $j, 1)) {
            $achouPalavra = false;
            break;
        }
    }

    if ($achouPalavra) {
        $fraseSubstituida .= $palavraSubstituta;
        $i += $tamanhoBusca;
    } else {
        $fraseSubstituida .= substr($frase, $i, 1);
        $i++;
    }
}

echo "<strong>Frase original:</strong> $frase <br>";
echo "<strong>Nova frase:</strong> $fraseSubstituida";
?>