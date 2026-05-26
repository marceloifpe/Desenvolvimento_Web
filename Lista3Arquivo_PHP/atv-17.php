<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$novoArquivo = 'arquivo/copaq.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";

    $vogaisMinusculas = "aeiou";
    $vogaisMaiusculas = "AEIOU";
    $tamMapaVogais = strlen($vogaisMinusculas);

    $consoantesMaiusculas = "BCDFGHJKLMNPQRSTVWXYZ";
    $consoantesMinusculas = "bcdfghjklmnpqrstvwxyz";
    $tamMapaConsoantes = strlen($consoantesMaiusculas);

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($i = 0; $i < $qtd_linhas; $i++) {
        $linhaAtual = $linhas[$i];
        $tamanho = strlen($linhaAtual);
        $linhaProcessada = "";

        for ($j = 0; $j < $tamanho; $j++) {
            $caractere = substr($linhaAtual, $j, 1);
            $ehVogalMinuscula = false;
            $posicaoVogal = -1;

            for ($m = 0; $m < $tamMapaVogais; $m++) {
                if ($caractere === substr($vogaisMinusculas, $m, 1)) {
                    $ehVogalMinuscula = true;
                    $posicaoVogal = $m;
                    break;
                }
            }

            if ($ehVogalMinuscula) {
                $linhaProcessada .= substr($vogaisMaiusculas, $posicaoVogal, 1);
            } else {
                $ehConsoanteMaiuscula = false;
                $posicaoConsoante = -1;

                for ($c = 0; $c < $tamMapaConsoantes; $c++) {
                    if ($caractere === substr($consoantesMaiusculas, $c, 1)) {
                        $ehConsoanteMaiuscula = true;
                        $posicaoConsoante = $c;
                        break;
                    }
                }

                if ($ehConsoanteMaiuscula) {
                    $linhaProcessada .= substr($consoantesMinusculas, $posicaoConsoante, 1);
                } else {
                    $linhaProcessada .= $caractere;
                }
            }
        }
        $conteudoFinal .= $linhaProcessada . "\n";
    }

    file_put_contents($novoArquivo, $conteudoFinal);
    echo "<p style='color: green;'><strong>Letra Q ajustada com sucesso!</strong></p>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo não foi encontrado.</p>";
}
?>