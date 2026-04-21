let palavras = ["friend", "amico", "prijatelj", "Freund", "ven", "ystävä", "пријатељ", "Mellon", "amigo", "barát"];

let alvo = "Mellon";

let contagem = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
let tentativas = 0;
let acertou = false;

while (!acertou) {
    let indice = Math.floor(Math.random() * 10);
    contagem[indice]++;
    tentativas++;

    if (palavras[indice] === alvo) {
        acertou = true;
    }
}

let maisRepetida = "";
let maxRepeticoes = 0;

for (let i = 0; i < 10; i++) {
    if (palavras[i] !== alvo && contagem[i] > maxRepeticoes) {
        maxRepeticoes = contagem[i];
        maisRepetida = palavras[i];
    }
}

console.log("Palavra correta:", alvo);
console.log("Tentativas totais até acertar:", tentativas);

if (maxRepeticoes > 0) {
    console.log("A palavra errada que mais se repetiu foi:", maisRepetida, "(" + maxRepeticoes + " vezes)");
} else {
    console.log("Nenhuma palavra errada se repetiu.");
}