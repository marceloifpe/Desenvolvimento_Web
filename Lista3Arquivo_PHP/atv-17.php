<?php
$nomeDoArquivo = 'arquivo/copa.txt';

$novoArquivo = 'arquivo/copaq.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";

    $vogaisMinusculas = "aeiouáéíóúãõâêôà";
    $vogaisMaiusculas = "AEIOUÁÉÍÓÚÃÕÂÊÔÀ";
    $tamMapaVogais    = mb_strlen($vogaisMinusculas, 'UTF-8');

    $consoantesMaiusculas = "BCDFGHJKLMNPQRSTVWXYZÇ";
    $consoantesMinusculas = "bcdfghjklmnpqrstvwxyzç";
    $tamMapaConsoantes    = mb_strlen($consoantesMaiusculas, 'UTF-8');

    for ($i = 0; $i < count($linhas); $i++) {
        $linhaAtual = $linhas[$i];
        $tamanho = mb_strlen($linhaAtual, 'UTF-8');
        $linhaProcessada = "";

        for ($j = 0; $j < $tamanho; $j++) {
            $caractere = mb_substr($linhaAtual, $j, 1, 'UTF-8');

            $ehVogalMinuscula = false;
            $posicaoVogal = -1;

            for ($m = 0; $m < $tamMapaVogais; $m++) {
                if ($caractere === mb_substr($vogaisMinusculas, $m, 1, 'UTF-8')) {
                    $ehVogalMinuscula = true;
                    $posicaoVogal = $m;
                    break;
                }
            }

            if ($ehVogalMinuscula) {
                $linhaProcessada .= mb_substr($vogaisMaiusculas, $posicaoVogal, 1, 'UTF-8');
            } else {
                $ehConsoanteMaiuscula = false;
                $posicaoConsoante = -1;

                for ($c = 0; $c < $tamMapaConsoantes; $c++) {
                    if ($caractere === mb_substr($consoantesMaiusculas, $c, 1, 'UTF-8')) {
                        $ehConsoanteMaiuscula = true;
                        $posicaoConsoante = $c;
                        break;
                    }
                }

                if ($ehConsoanteMaiuscula) {
                    $linhaProcessada .= mb_substr($consoantesMinusculas, $posicaoConsoante, 1, 'UTF-8');
                } else {
                    $linhaProcessada .= $caractere;
                }
            }
        }

        $conteudoFinal .= $linhaProcessada . PHP_EOL;
    }

    file_put_contents($novoArquivo, $conteudoFinal);

    echo "<p style='color: green;'><strong>Letra Q ajustada com sucesso!</strong> Apenas vogais estão em maiúsculo.</p>";

    // Exibe na tela
    echo "<strong>Como ficou o seu arquivo 'copaq.txt':</strong><br><br>";
    echo "<pre style='background: #252526; color: #d4d4d4; padding: 10px; font-family: monospace; width: fit-content;'>";
    echo htmlspecialchars($conteudoFinal);
    echo "</pre>";

} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>