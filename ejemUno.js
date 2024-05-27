function areaCuadrado(lado) {
    return lado * lado;
  }
  
  function perimetroCuadrado(lado) {
    return 4 * lado;
  }
  
  function areaRectangulo(base, altura) {
    return base * altura;
  }
  
  function perimetroRectangulo(base, altura) {
    return 2 * (base + altura);
  }
  
  function areaCirculo(radio) {
    return Math.PI * radio * radio;
  }
  
  function perimetroCirculo(radio) {
    return 2 * Math.PI * radio;
  }
  
  function calcularFigura() {
    const figura = prompt(
      'Seleccione una figura: cuadrado, rectangulo, circulo'
    ).toLowerCase();
    let area, perimetro;
  
    switch (figura) {
      case 'cuadrado':
        const lado = parseFloat(prompt('Ingrese el lado del cuadrado:'));
        area = areaCuadrado(lado);
        perimetro = perimetroCuadrado(lado);
        break;
      case 'rectangulo':
        const base = parseFloat(prompt('Ingrese la base del rectangulo:'));
        const altura = parseFloat(prompt('Ingrese la altura del rectangulo:'));
        area = areaRectangulo(base, altura);
        perimetro = perimetroRectangulo(base, altura);
        break;
      case 'circulo':
        const radio = parseFloat(prompt('Ingrese el radio del circulo:'));
        area = areaCirculo(radio);
        perimetro = perimetroCirculo(radio);
        break;
      default:
        console.log('Figura no válida');
        return;
    }
    console.log(`El área es: ${area}`);
    console.log(`El perímetro es: ${perimetro}`);
  }
  
  calcularFigura();
  