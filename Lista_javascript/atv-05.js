let nTermos = 6;

let S = 0;
let num = 2;
let den = 3;
let expressao = "S = ";

for (let i = 1; i <= nTermos; i++) {
    let valorTermo = num / den;
    let sinal = "";

    if (i % 3 === 0) {
        S += valorTermo;
        sinal = "+";
    } else {
        S -= valorTermo;
        sinal = "-";
    }

    if (i === 1) {
        expressao += "-" + num + "/" + den;
    } else {
        expressao += " " + sinal + " " + num + "/" + den;
    }

    num += 1;
    den += 2;
}

console.log("Expressão:", expressao);
console.log("Valor final de S:", S.toFixed(4));