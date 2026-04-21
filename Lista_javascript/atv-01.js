let jogador1 = "Darkseid";
let jogador2 = "Fênix";
let pontosJ1 = 0;
let pontosJ2 = 0;

let sorteio = Math.floor(Math.random() * 2);
let defensor = (sorteio === 0) ? jogador1 : jogador2;

console.log("O defensor é: " + defensor);

for (let i = 0; i < 3; i++) {

    let dadosJ1 = [
        Math.floor(Math.random() * 6) + 1,
        Math.floor(Math.random() * 6) + 1,
        Math.floor(Math.random() * 6) + 1
    ];

    let dadosJ2 = [
        Math.floor(Math.random() * 6) + 1,
        Math.floor(Math.random() * 6) + 1,
        Math.floor(Math.random() * 6) + 1
    ];

    let maiorJ1 = Math.max(...dadosJ1);
    let maiorJ2 = Math.max(...dadosJ2);

    if (maiorJ1 > maiorJ2) {
        pontosJ1++;
    } else if (maiorJ2 > maiorJ1) {
        pontosJ2++;
    } else {
        if (defensor === jogador1) pontosJ1++;
        else pontosJ2++;
    }
}

console.log("Combate entre Darkseid e Fênix");
console.log("O defensor é o " + defensor);
console.log("Pontos de " + jogador1 + ": " + pontosJ1);
console.log("Pontos de " + jogador2 + ": " + pontosJ2);
console.log("O vencedor é: " + ((pontosJ1 > pontosJ2) ? jogador1 : jogador2));