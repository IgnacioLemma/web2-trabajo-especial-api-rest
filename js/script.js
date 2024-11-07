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

        const roomsData = await response.json();
        showRooms(roomsData);
    } catch (error) {
        console.log(error);
        document.getElementById('showRooms').innerHTML = '<p>Error al cargar las habitaciones.</p>';
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
    const roomContainer = document.getElementById('showRooms');
    roomContainer.innerHTML = '';

    rooms.forEach(room => {
        const roomCard = `
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="${room.foto_habitacion}" class="card-img-top" alt="${room.Nombre}">
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

async function insertRoom(e){
    e.preventDefault();
    let data = new FormData(form);
    let room = {
        Nombre : data.get('Nombre'),
        Tipo: data.get('Tipo'),
        Capacidad: data.get('Capacidad'),
        Precio: data.get('Precio'),
        foto_habitacion: data.get('foto_habitacion')
    };
    try {
        let response = await fetch (BASE_URL, {  
            method: 'POST',
            headers : { 'Content-Type': 'application/json'},
            body: JSON.stringify(room)
        });
        if (!response.ok) {
            throw new Error('Error del servidor');
        }
        let nRoom = await response.json();

        rooms.push(nRoom);
        showRooms(rooms);

        form.reset();
    } catch(e) {
        console.log(e);
    }
}

getRooms();
