function obtenerEdades() {
    const edades = [];
    for (let i = 0; i < 10; i++) {
        let edad;
        do {
            edad = parseInt(prompt(`Ingrese la edad de la persona ${i + 1} (entre 1 y 120):`), 10);
        } while (isNaN(edad) || edad < 1 || edad > 120);
        edades.push(edad);
    }
    return edades;
}

function analizarEdades(edades) {
    let menores = 0, mayores = 0, adultosMayores = 0;
    let suma = 0, edadMinima = 120, edadMaxima = 0;
    
    edades.forEach(edad => {
        if (edad < 18) menores++;
        else if (edad >= 18 && edad < 60) mayores++;
        else adultosMayores++;
        
        if (edad < edadMinima) edadMinima = edad;
        if (edad > edadMaxima) edadMaxima = edad;
        suma += edad;
    });
    
    const promedio = suma / edades.length;
    
    console.log(`Menores de edad: ${menores}`);
    console.log(`Mayores de edad: ${mayores}`);
    console.log(`Adultos mayores: ${adultosMayores}`);
    console.log(`Edad mínima: ${edadMinima}`);
    console.log(`Edad máxima: ${edadMaxima}`);
    console.log(`Promedio de edades: ${promedio.toFixed(2)}`);
}

const edades = obtenerEdades();
analizarEdades(edades);
