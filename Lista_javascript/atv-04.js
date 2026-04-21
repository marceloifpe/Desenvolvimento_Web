let distancia = 295;
let precoGas = 0.75;

let morcego = {
    nome: "Morcego Preto",
    aluguel: 300,
    consumo: 16
};

let vampiro = {
    nome: "Vampiro Voador",
    aluguel: 500,
    consumo: 11
};

let custoGasolinaMorcego = (distancia / morcego.consumo) * precoGas;
let totalMorcego = morcego.aluguel + custoGasolinaMorcego;

let custoGasolinaVampiro = (distancia / vampiro.consumo) * precoGas;
let totalVampiro = vampiro.aluguel + custoGasolinaVampiro;

console.log(morcego.nome);
console.log("Custo do Aluguel: $" + morcego.aluguel);
console.log("Custo Total da Viagem: $" + totalMorcego.toFixed(2));
console.log("");

console.log(vampiro.nome);
console.log("Custo do Aluguel: $" + vampiro.aluguel);
console.log("Custo Total da Viagem: $" + totalVampiro.toFixed(2));