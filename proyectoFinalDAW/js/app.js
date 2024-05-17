//Elementos
//Carro de la compra
const carro = document.querySelector("#carro");
//Viajes más buscados
const viajes = document.querySelector("#viajes");
//Botón borrar del carro
const vaciarCarro = document.querySelector("#vaciar-carro");
//donde van los viajes
const contenidoCarro = document.querySelector("#carro tbody");
//almacenar productos que el cliente quiera
let productos = [];

// poner a la escucha al hacer click
viajes.addEventListener("click", agregarViaje);
//poner a la escucha el boton de borrar del carro
//vaciarCarro.addEventListener("click", borrarCarro);
vaciarCarro.addEventListener("click", eliminarArrayCarro);
//poner el carro a la ecucha
carro.addEventListener("click", eliminarViaje);

// agregar los viajes al carro
function agregarViaje(e) {
  //target hace referencia  a agregar carro en este caso
  if (e.target.classList.contains("agregar-carro")) {
    getDatosViajes(e.target.parentElement.parentElement);
  }
}
//función para que muestre los datos de cada viaje
function getDatosViajes(v) {
  const datosViajes = {
    titulo_viaje: v.querySelector("h4").textContent,
    precio: v.querySelector(".precio span").textContent,
    id_viaje: v.querySelector("a").getAttribute("data-id"),
    cantidad: 1,
  };
  //recorrer el arri de productos para saber si se ha añadido algo
  for (let i = 0; i < productos.length; i++) {
    if (productos[i].id_viaje == datosViajes.id_viaje) {
      productos[i].cantidad++;
      agregarCarro();
      return;
    }
  }
  productos.push(datosViajes);
  agregarCarro();
}

//funcion para agregar al carro
function agregarCarro() {
  borrarCarro();
  console.log(productos);

  productos.forEach((viaje) => {
    //Creacion de una tabla dinamica para el carro
    const filaTabla = document.createElement("tr");
    filaTabla.innerHTML = `<td>${viaje.titulo_viaje}</td>
        <td>${viaje.precio}</td>
        <td>${viaje.cantidad}</td>
        <td><a href="#" class="borrar-viaje" data-id="${viaje.id_viaje}">X</a></td>`;
    contenidoCarro.appendChild(filaTabla); //para agregar al carro
  });
  //llamo a la función para que se vayan sumanos los viajes en caso de querer mas de uno
  precioTotal();
}

//Funcion para vaciar el carro visualmente
function borrarCarro() {
  contenidoCarro.innerHTML = "";
}

//eliminar carro, tanto el array como visualmente
function eliminarArrayCarro() {
  productos = [];
  borrarCarro();
}

//funcion para eliminar algun viaje
function eliminarViaje(e) {
  if (e.target.classList.contains("borrar-viaje")) {
    const viajeId = e.target.getAttribute("data-id");
    productos = productos.filter((viaje) => viaje.id_viaje !== viajeId);
    agregarCarro();
  }
  //llamo a la funcion precio total para eliminar viaje en caso de no quererlo
  precioTotal();
}

//Funcion para calcular el total del precio
function calcularTotal() {
  let total = 0;
  productos.forEach((producto) => {
    total += parseFloat(producto.precio) * producto.cantidad;
  });
  return total;
}

//mostrar en HTML
function precioTotal() {
  const precioTotal = document.querySelector("#total span");
  precioTotal.textContent = calcularTotal();
}

//
