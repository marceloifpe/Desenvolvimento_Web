<?php
$palavra = "programacao";
$palavraInvertida = "";

for ($i = strlen($palavra) - 1; $i >= 0; $i--) {
    $palavraInvertida .= substr($palavra, $i, 1);
}

echo "<strong>Palavra original:</strong> $palavra <br>";
echo "<strong>De trás para frente:</strong> $palavraInvertida";
?>