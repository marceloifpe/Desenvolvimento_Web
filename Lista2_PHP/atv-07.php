<?php
$frase = "o rato roeu a roupa do rei";
$fraseColorida = "";

for ($i = 0; $i < strlen($frase); $i++) {
    $letra = substr($frase, $i, 1);

    if ($letra == 'a' || $letra == 'e' || $letra == 'i' || $letra == 'o' || $letra == 'u' ||
        $letra == 'A' || $letra == 'E' || $letra == 'I' || $letra == 'O' || $letra == 'U') {
        $fraseColorida .= "<span style='color: red; font-weight: bold;'>$letra</span>";
    } else {
        $fraseColorida .= $letra;
    }
}

echo "<strong>Frase original:</strong> $frase <br>";
echo "<strong>Resultado:</strong> $fraseColorida";
?>