<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$novoArquivo = 'arquivo/copah.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";
    $vogais = "aeiouAEIOUáéíóúÁÉÍÓÚãõÃÕâêôÂÊÔàÀ";

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($i = 0; $i < $qtd_linhas; $i++) {
        $linhaAtual = $linhas[$i];
        $linhaSemVogais = "";

        for ($j = 0; $j < strlen($linhaAtual); $j++) {
            $caractere = substr($linhaAtual, $j, 1);
            $ehVogal = false;

            for ($k = 0; $k < strlen($vogais); $k++) {
                if ($caractere === substr($vogais, $k, 1)) {
                    $ehVogal = true;
                    break;
                }
            }

            if (!$ehVogal) {
                $linhaSemVogais .= $caractere;
            }
        }
        $conteudoFinal .= $linhaSemVogais . "\n";
    }

    file_put_contents($novoArquivo, $conteudoFinal);
    echo "<p style='color: green;'><strong>Letra H concluída com sucesso!</strong> O resultado foi salvo no arquivo <strong>copah.txt</strong>.</p>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>