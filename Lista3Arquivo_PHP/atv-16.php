<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$novoArquivo = 'arquivo/copap.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";
    $inverterPalavra = false;

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($i = 0; $i < $qtd_linhas; $i++) {
        $linhaAtual = $linhas[$i];
        $tamanhoLinha = strlen($linhaAtual);
        $palavraAtual = "";
        $linhaProcessada = "";

        for ($j = 0; $j < $tamanhoLinha; $j++) {
            $caractere = substr($linhaAtual, $j, 1);

            if ($caractere !== " ") {
                $palavraAtual .= $caractere;
            } else {
                if ($palavraAtual !== "") {
                    if ($inverterPalavra) {
                        $palavraInvertida = "";
                        $tam = strlen($palavraAtual);
                        for ($k = $tam - 1; $k >= 0; $k--) {
                            $palavraInvertida .= substr($palavraAtual, $k, 1);
                        }
                        $linhaProcessada .= $palavraInvertida;
                    } else {
                        $linhaProcessada .= $palavraAtual;
                    }
                    $inverterPalavra = !$inverterPalavra;
                    $palavraAtual = "";
                }
                $linhaProcessada .= " ";
            }
        }

        if ($palavraAtual !== "") {
            if ($inverterPalavra) {
                $palavraInvertida = "";
                $tam = strlen($palavraAtual);
                for ($k = $tam - 1; $k >= 0; $k--) {
                    $palavraInvertida .= substr($palavraAtual, $k, 1);
                }
                $linhaProcessada .= $palavraInvertida;
            } else {
                $linhaProcessada .= $palavraAtual;
            }
            $inverterPalavra = !$inverterPalavra;
        }
        $conteudoFinal .= $linhaProcessada . "\n";
    }

    file_put_contents($novoArquivo, $conteudoFinal);
    echo "<p style='color: green;'><strong>Letra P concluída com sucesso!</strong></p>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo não foi encontrado.</p>";
}
?>