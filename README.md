

## Listado completo de entidades (GET)
### Listado de Habitaciones
    - Verbo: GET
    - URL: http://localhost/web2-trabajo-especial-api-rest/api/rooms
    - Descripción: El endpoint devuelve el listado completo de habitabiciones.

##### Ejemplo JSON: 
```json
[
    {
        "id_habitacion": 1,
        "Nombre": "Habitación Delux - Delux en Bahamas updated",
        "Tipo": "Delux",
        "Capacidad": 5,
        "Precio": 1000,
        "foto_habitacion": ""
    },
    {
        "id_habitacion": 2,
        "Nombre": "Habitación Doble - Cama King",
        "Tipo": "Doble",
        "Capacidad": 2,
        "Precio": 750,
        "foto_habitacion": "public/img/FotoHabitaciones/671557988fecc3.17522671.jpg"
    },
    {
        "id_habitacion": 3,
        "Nombre": "Habitación Doble - Cama Queen",
        "Tipo": "Doble",
        "Capacidad": 2,
        "Precio": 600,
        "foto_habitacion": "public/img/FotoHabitaciones/671557a04cebe8.88236537.jpg"
    },
// continua el listado
```
### Listado con ordenamientos (ASC)
    - Verbo: GET
    - URL: http://localhost/web2-trabajo-especial-api-rest/api/rooms?order_by=Precio&direction=ASC
    - Descripción: Ordena  de manera ascendente las habitaciones por su precio

##### Ejemplo JSON: 
```json
[
    {
        "id_habitacion": 20,
        "Nombre": "Habitación Económica - Confort en Tandil",
        "Tipo": "Económica",
        "Capacidad": 2,
        "Precio": 450,
        "foto_habitacion": "public/img/FotoHabitaciones/671559bc9ada63.23188104.jpg"
    },
    {
        "id_habitacion": 17,
        "Nombre": "Habitación Económica - Ahorro en La Plata",
        "Tipo": "Economica",
        "Capacidad": 2,
        "Precio": 500,
        "foto_habitacion": "public/img/FotoHabitaciones/67155988eaa6b1.01686013.jpg"
    },
    {
        "id_habitacion": 3,
        "Nombre": "Habitación Doble - Cama Queen",
        "Tipo": "Doble",
        "Capacidad": 2,
        "Precio": 600,
        "foto_habitacion": "public/img/FotoHabitaciones/671557a04cebe8.88236537.jpg"
    },
// continua el listado
```

### Listado con ordenamientos (ASC)
    - Verbo: GET
    - URL: http://localhost/web2-trabajo-especial-api-rest/api/rooms?order_by=Precio&direction=DESC
    - Descripción: Ordena  de manera ascendente las habitaciones por su precio
##### Ejemplo JSON: 
```json
[
    {
        "id_habitacion": 15,
        "Nombre": "Habitación Familiar - Recuerdos en Tandil",
        "Tipo": "Familiar",
        "Capacidad": 5,
        "Precio": 3000,
        "foto_habitacion": "public/img/FotoHabitaciones/6715596354bca0.92991470.jpg"
    },
    {
        "id_habitacion": 10,
        "Nombre": "Habitación Familiar - Escape a la Costa",
        "Tipo": "Familiar",
        "Capacidad": 5,
        "Precio": 2500,
        "foto_habitacion": "public/img/FotoHabitaciones/671558bfa3ee81.64071381.jpg"
    },
    {
        "id_habitacion": 18,
        "Nombre": "Habitación Premium - Lujo en Las Vegas",
        "Tipo": "Premium",
        "Capacidad": 4,
        "Precio": 2500,
        "foto_habitacion": "public/img/FotoHabitaciones/67155994eb2650.80407998.jpg"
    },
// continua el listado
```

#### Lista de campos  validos para el ordenamiento:
    - id_habitacion
    - Nombre
    - Tipo
    - Capacidad
    - Precio
