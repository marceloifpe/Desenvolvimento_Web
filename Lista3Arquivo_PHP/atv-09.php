<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$novoArquivo = 'arquivo/copai.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";
    $vogais = "aeiouAEIOUáéíóúÁÉÍÓÚãõÃÕâêôÂÊÔàÀ";

    for ($i = 0; isset($linhas[$i]); $i++) {
        $linhaAtual = $linhas[$i];
        $linhaProcessada = "";

        for ($j = 0; $j < strlen($linhaAtual); $j++) {
            $caractere = substr($linhaAtual, $j, 1);
            $ehVogal = false;

            for ($k = 0; $k < strlen($vogais); $k++) {
                if ($caractere === substr($vogais, $k, 1)) {
                    $ehVogal = true;
                    break;
                }
            }

            if ($ehVogal) {
                $linhaProcessada .= "*";
            } else {
                $linhaProcessada .= $caractere;
            }
        }
        $conteudoFinal .= $linhaProcessada . "\n";
    }

    file_put_contents($novoArquivo, $conteudoFinal);
    echo "<p style='color: green;'><strong>Letra I concluída com sucesso!</strong> O resultado foi salvo no arquivo <strong>copai.txt</strong>.</p>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>