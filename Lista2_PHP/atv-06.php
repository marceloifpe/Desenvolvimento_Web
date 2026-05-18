<?php
$palavra = "programacao";

echo "<strong>Palavra na vertical:</strong><br><br>";

for ($i = 0; $i < strlen($palavra); $i++) {
    echo substr($palavra, $i, 1) . "<br>";
}
?>