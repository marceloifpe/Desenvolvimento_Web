<?php
$frase = "o rato roeu a roupa do rei";
$vogaisMaiusculas = "";

for ($i = 0; $i < strlen($frase); $i++) {
    $letra = substr($frase, $i, 1);

    if ($letra == 'a') $letra = 'A';
    else if ($letra == 'e') $letra = 'E';
    else if ($letra == 'i') $letra = 'I';
    else if ($letra == 'o') $letra = 'O';
    else if ($letra == 'u') $letra = 'U';

    $vogaisMaiusculas .= $letra;
}

echo "<strong>Frase original:</strong> $frase <br>";
echo "<strong>Resultado:</strong> $vogaisMaiusculas";
?>