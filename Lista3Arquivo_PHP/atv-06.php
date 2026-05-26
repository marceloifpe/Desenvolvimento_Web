<?php
$nomeDoArquivo = 'arquivo/copa.txt';
$novoArquivo = 'arquivo/copaf.txt';

if (file_exists($nomeDoArquivo)) {
    $linhas = file($nomeDoArquivo, FILE_IGNORE_NEW_LINES);
    $conteudoFinal = "";
    $min = "abcdefghijklmnopqrstuvwxyzáéíóúâêôãõç";
    $mai = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚÂÊÔÃÕÇ";

    $virarMaiuscula = true;

    $qtd_linhas = 0;
    foreach ($linhas as $l) { 
        $qtd_linhas++; 
    }

    for ($i = 0; $i < $qtd_linhas; $i++) {
        $linhaAtual = $linhas[$i];
        $linhaProcessada = "";
        $palavraAtual = "";

        for ($j = 0; $j < strlen($linhaAtual); $j++) {
            $caractere = substr($linhaAtual, $j, 1);

            if ($caractere !== " ") {
                $palavraAtual .= $caractere;
            } else {
                if ($palavraAtual !== "") {
                    for ($k = 0; $k < strlen($palavraAtual); $k++) {
                        $c = substr($palavraAtual, $k, 1);
                        $novoC = $c;
                        for ($m = 0; $m < strlen($min); $m++) {
                            if ($virarMaiuscula && $c === substr($min, $m, 1)) {
                                $novoC = substr($mai, $m, 1);
                                break;
                            } else if (!$virarMaiuscula && $c === substr($mai, $m, 1)) {
                                $novoC = substr($min, $m, 1);
                                break;
                            }
                        }
                        $linhaProcessada .= $novoC;
                    }
                    $virarMaiuscula = !$virarMaiuscula;
                    $palavraAtual = "";
                }
                $linhaProcessada .= " ";
            }
        }

        if ($palavraAtual !== "") {
            for ($k = 0; $k < strlen($palavraAtual); $k++) {
                $c = substr($palavraAtual, $k, 1);
                $novoC = $c;
                for ($m = 0; $m < strlen($min); $m++) {
                    if ($virarMaiuscula && $c === substr($min, $m, 1)) {
                        $novoC = substr($mai, $m, 1);
                        break;
                    } else if (!$virarMaiuscula && $c === substr($mai, $m, 1)) {
                        $novoC = substr($min, $m, 1);
                        break;
                    }
                }
                $linhaProcessada .= $novoC;
            }
            $virarMaiuscula = !$virarMaiuscula;
        }

        $conteudoFinal .= $linhaProcessada . "\n";
    }

    file_put_contents($novoArquivo, $conteudoFinal);
    echo "<p style='color: green;'><strong>Letra F concluída com sucesso!</strong> O resultado foi salvo no arquivo <strong>copaf.txt</strong>.</p>";
} else {
    echo "<p style='color: red;'>Erro: O arquivo '$nomeDoArquivo' não foi encontrado.</p>";
}
?>