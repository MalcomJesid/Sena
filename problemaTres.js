function obtenerVectorOrdenado(n) {
    const vector = [];
    let num;
    for (let i = 0; i < n; i++) {
        do {
            num = parseInt(prompt(`Ingrese el número ${i + 1} (en orden ascendente):`), 10);
        } while (isNaN(num) || (i > 0 && num < vector[i - 1]));
        vector.push(num);
    }
    return vector;
}

function mezclarVectores(v1, v2) {
    const resultado = [];
    let i = 0, j = 0;
    
    while (i < v1.length && j < v2.length) {
        if (v1[i] < v2[j]) {
            resultado.push(v1[i]);
            i++;
        } else {
            resultado.push(v2[j]);
            j++;
        }
    }
    while (i < v1.length) resultado.push(v1[i++]);
    while (j < v2.length) resultado.push(v2[j++]);
    
    return resultado;
}

const v1 = obtenerVectorOrdenado(5);
const v2 = obtenerVectorOrdenado(5);
const mezcla = mezclarVectores(v1, v2);
console.log(`Vector mezclado: ${mezcla.join(' ')}`);
