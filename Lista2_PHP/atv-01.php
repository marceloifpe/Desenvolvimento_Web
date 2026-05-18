<?php
$frase = "o rato roeu a roupa do rei";
$ignoraEspaco = "";

for ($i = 0; $i < strlen($frase); $i++) {
    $letra = substr($frase, $i, 1);

    if ($letra != ' ') {
        $ignoraEspaco .= $letra;
    }
}

echo "<strong>Frase original:</strong> $frase <br>";
echo "<strong>Sem espaços:</strong> $ignoraEspaco";
?>