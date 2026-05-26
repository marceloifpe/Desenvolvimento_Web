<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$novoArquivo = 'arquivo/copal.txt';

$palavraBusca = "Brasil";
$palavraSubstituta = "Hexa";

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";
    $tamanhoBusca = strlen($palavraBusca);

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($l = 0; $l < $qtd_linhas; $l++) {
        $linhaAtual = $linhas[$l];
        $tamanhoLinha = strlen($linhaAtual);
        $linhaProcessada = "";
        $i = 0;

        while ($i < $tamanhoLinha) {
            $achouPalavra = true;

            for ($j = 0; $j < $tamanhoBusca; $j++) {
                $charLinha = substr($linhaAtual, $i + $j, 1);
                $charBusca = substr($palavraBusca, $j, 1);

                if (($i + $j) >= $tamanhoLinha || $charLinha !== $charBusca) {
                    $achouPalavra = false;
                    break;
                }
            }

            if ($achouPalavra) {
                $linhaProcessada .= $palavraSubstituta;
                $i += $tamanhoBusca;
            } else {
                $linhaProcessada .= substr($linhaAtual, $i, 1);
                $i++;
            }
        }
        $conteudoFinal .= $linhaProcessada . "\n";
    }

    file_put_contents($novoArquivo, $conteudoFinal);
    echo "<p style='color: green;'><strong>Letra L concluída com sucesso!</strong></p>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo não foi encontrado.</p>";
}
?>