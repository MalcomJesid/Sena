class Persona {
    constructor({ nombre, cedula, fechaNacimiento, email, ciudadResidencia, ciudadOrigen, canciones }) {
      this.nombre = nombre;
      this.cedula = cedula;
      this.fechaNacimiento = fechaNacimiento;
      this.email = email;
      this.ciudadResidencia = ciudadResidencia;
      this.ciudadOrigen = ciudadOrigen;
      this.canciones = canciones;
    }
  
    mostrarInformacion() {
      console.log(`Nombre: ${this.nombre}`);
      console.log(`Identificación: ${this.cedula}`);
      console.log(`Fecha de Nacimiento: ${this.fechaNacimiento}`);
      console.log(`Correo Electrónico: ${this.email}`);
      console.log(`Ciudad de Residencia: ${this.ciudadResidencia}`);
      console.log(`Ciudad de Origen: ${this.ciudadOrigen}`);
      console.log("Canciones Favoritas:");
      this.canciones.forEach((cancion, index) => {
        console.log(`  - Artista: ${cancion.artista}, Título: ${cancion.titulo}`);
      });
    }
  }
  
  const personas = [];
  
  function agregarPersona() {
    const nombre = prompt("Nombre:");
    const cedula = prompt("Número de Identificación:");
    const fechaNacimiento = prompt("Fecha de Nacimiento (YYYY-MM-DD):");
    const email = prompt("Correo Electrónico:");
    const ciudadResidencia = prompt("Ciudad de Residencia:");
    const ciudadOrigen = prompt("Ciudad de Origen:");
    const canciones = [];
  
    for (let i = 0; i < 3; i++) {
      console.log(`Ingresa la información de la canción favorita #${i + 1}:`);
      const artista = prompt("  Artista:");
      const titulo = prompt("  Título:");
      canciones.push({ artista, titulo });
    }
  
    const persona = new Persona({ nombre, cedula, fechaNacimiento, email, ciudadResidencia, ciudadOrigen, canciones });
    personas.push(persona);
  }
  
  function mostrarPersona(posicion) {
    if (posicion >= 0 && posicion < personas.length) {
      personas[posicion].mostrarInformacion();
    } else {
      console.log("Posición inválida.");
    }
  }
  
  function mostrarMenu() {
    console.log("Menú:");
    console.log("a. Agregar una persona");
    console.log("b. Mostrar información de una persona");
  }
  
  function main() {
    while (true) {
      mostrarMenu();
      const opcion = prompt("Seleccione una opción (a/b):").trim().toLowerCase();
  
      if (opcion === 'a') {
        agregarPersona();
      } else if (opcion === 'b') {
        const posicion = parseInt(prompt("Ingrese la posición de la persona a mostrar:"), 10);
        mostrarPersona(posicion);
      } else {
        console.log("Opción no válida. Por favor, seleccione 'a' o 'b'.");
      }
    }
  }
  
  main();
  