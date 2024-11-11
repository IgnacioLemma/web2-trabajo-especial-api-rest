"use strict";

const BASE_URL = "api/rooms";

let rooms = [];
let form = document.querySelector('#roomForm');
form.addEventListener('submit', insertRoom);

// Función para obtener habitaciones
async function getRooms(orderBy = 'id_habitacion', direction = 'ASC') {
    try {
        const response = await fetch(`${BASE_URL}?order_by=${orderBy}&direction=${direction}`);
        if (!response.ok) {
            throw new Error('Error al obtener las habitaciones');
        }

        const responseData = await response.json(); 
        const roomsData = responseData.rooms; 
        if (Array.isArray(roomsData)) {
            showRooms(roomsData);
        } else {
            document.getElementById('showRooms').innerHTML = '<p>Error al cargar las habitaciones: datos inválidos.</p>';
        }
    } catch (error) {
        console.log(error);
        document.getElementById('showRooms').innerHTML = '<p>Error al cargar las habitacionesssss.</p>';
    }
}





// funcion para ordenar las habitaciones
function orderRooms() {
    const roomValue = document.getElementById('roomValue').value;
    const direction = document.getElementById('direction').value;
    getRooms(roomValue, direction);
}

// Mostrar las habitaciones en el HTML
function showRooms(rooms) {
    // Verificación: asegurarnos de que 'rooms' es un arreglo
    if (!Array.isArray(rooms)) {
        console.error('showRooms recibió un valor que no es un arreglo:', rooms);
        return;
    }

    const roomContainer = document.getElementById('showRooms');
    roomContainer.innerHTML = '';

    // Ruta base para las imágenes
    const baseUrl = window.location.origin + '/';

    rooms.forEach(room => {
        const roomCard = `
            <div class="col-md-4">
                <div class="card mb-4">
                    <!-- Ajuste en la ruta de la imagen -->
                    <img src="${baseUrl}${room.foto_habitacion}" class="card-img-top" alt="${room.Nombre}">
                    <div class="card-body">
                        <h5 class="card-title">${room.Nombre}</h5>
                        <p class="card-text">Tipo: ${room.Tipo}</p>
                        <p class="card-text">Capacidad: ${room.Capacidad}</p>
                        <p class="card-text">Precio: $${room.Precio}</p>
                    </div>
                </div>
            </div>
        `;
        roomContainer.innerHTML += roomCard;
    });
}



async function insertRoom(e) {
    e.preventDefault();

    let form = document.getElementById('roomForm');
    let data = new FormData(form);

    try {
        let response = await fetch(BASE_URL, {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + YOUR_TOKEN,  // Si tu API usa token Bearer
                // Puedes añadir más cabeceras si las necesitas
            },
            body: data
        });

        if (!response.ok) {
            throw new Error('Error del servidor');
        }

        let nRoom = await response.json();
        rooms.push(nRoom);
        showRooms(rooms);

        form.reset();
    } catch (e) {
        console.log(e);
    }
}


getRooms();
