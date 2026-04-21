let A = [1, 2, 3, 4, 5];
let B = [4, 5, 6, 7];

let inter = [];
let uniao = [];
let diff = [];
let indexInter = 0, indexUniao = 0, indexDiff = 0;

for (let i = 0; i < A.length; i++) {
    uniao[indexUniao] = A[i];
    indexUniao++;

    let pertenceAB = false;
    for (let j = 0; j < B.length; j++) {
        if (A[i] === B[j]) {
            pertenceAB = true;
            inter[indexInter] = A[i];
            indexInter++;
            break;
        }
    }
    if (!pertenceAB) {
        diff[indexDiff] = A[i];
        indexDiff++;
    }
}

for (let j = 0; j < B.length; j++) {
    let pertenceAA = false;
    for (let i = 0; i < A.length; i++) {
        if (B[j] === A[i]) {
            pertenceAA = true;
            break;
        }
    }
    if (!pertenceAA) {
        uniao[indexUniao] = B[j];
        indexUniao++;
    }
}

let aSubB = true;
for (let i = 0; i < A.length; i++) {
    let encontrou = false;
    for (let j = 0; j < B.length; j++) {
        if (A[i] === B[j]) {
            encontrou = true;
            break;
        }
    }
    if (!encontrou) {
        aSubB = false;
        break;
    }
}

let bSubA = true;
for (let j = 0; j < B.length; j++) {
    let encontrou = false;
    for (let i = 0; i < A.length; i++) {
        if (B[j] === A[i]) {
            encontrou = true;
            break;
        }
    }
    if (!encontrou) {
        bSubA = false;
        break;
    }
}

console.log("Vetor A:", A);
console.log("Vetor B:", B);

console.log("\nA ∩ B (Interseção):", inter);
console.log("A U B (União):", uniao);
console.log("A - B (Diferença):", diff);

if (aSubB) {
    console.log("A é subconjunto de B");
} else {
    console.log("A NÃO é subconjunto de B");
}

if (bSubA) {
    console.log("B é subconjunto de A");
} else {
    console.log("B NÃO é subconjunto de A");
}