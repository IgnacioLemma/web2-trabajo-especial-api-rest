


## Endpoints de la API

### Listado completo de habitaciones
- **Verbo**: GET
- **URL**: `http://localhost/web2-trabajo-especial-api-rest/api/rooms?all=true`
- **Descripción**: Listado completo de todas las habitaciones disponibles, con su ID, nombre, tipo, capacidad, precio, y una imagen de cada habitación.

##### Ejemplo JSON: 
```json
{
    "totalitems": 20,
    "rooms": [
        {
            "id_habitacion": 1,
            "Nombre": "Habitación Individual - Vista al Mar",
            "Tipo": "Individual",
            "Capacidad": 1,
            "Precio": 500,
            "foto_habitacion": "public/img/FotoHabitaciones/6715577d87c7b0.14620296.jpg"
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
        {
            "id_habitacion": 4,
            "Nombre": "Suite - Lujo en París",
            "Tipo": "Suite",
            "Capacidad": 4,
            "Precio": 1500,
            "foto_habitacion": "public/img/FotoHabitaciones/671557b408b611.73779563.jpg"
        },
        {
            "id_habitacion": 5,
            "Nombre": "Habitación Compartida - Backpackers",
            "Tipo": "Compartida",
            "Capacidad": 8,
            "Precio": 2000,
            "foto_habitacion": "public/img/FotoHabitaciones/67155b75b082c2.24469727.jpg"
        }
        // Sigue el listado
    ]
}

```
### Listado con ordenamientos (ASC)
   ### Listado de habitaciones con ordenamiento ascendente por precio
- **Verbo**: GET
- **URL**: `http://localhost/web2-trabajo-especial-api-rest/api/rooms?order_by=Precio&direction=ASC&all=true`
- **Descripción**: Listado completo de las habitaciones ordenado de manera ascendente según, en este caso, el precio.

##### Ejemplo JSON:
```json
{
  "totalitems": 20,
  "rooms": [
    {
      "id_habitacion": 20,
      "Nombre": "Habitación Económica - Confort en Tandil",
      "Tipo": "Económica",
      "Capacidad": 2,
      "Precio": 450,
      "foto_habitacion": "public/img/FotoHabitaciones/671559bc9ada63.23188104.jpg"
    },
    {
      "id_habitacion": 1,
      "Nombre": "Habitación Individual - Vista al Mar",
      "Tipo": "Individual",
      "Capacidad": 1,
      "Precio": 500,
      "foto_habitacion": "public/img/FotoHabitaciones/6715577d87c7b0.14620296.jpg"
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
    {
      "id_habitacion": 6,
      "Nombre": "Habitación Individual - Relax en Buenos Aires",
      "Tipo": "Individual",
      "Capacidad": 1,
      "Precio": 600,
      "foto_habitacion": "public/img/FotoHabitaciones/6715581a157d90.52665819.jpg"
    }
  ]
  // Sigue el listado
}
```

### Listado con ordenamientos (DESC)
- Verbo: GET
- URL: http://localhost/web2-trabajo-especial-api-rest/api/rooms?order_by=Precio&direction=DESC
- Descripción: Listado completo de las habitaciones ordenado de manera descendente según, en este caso, la capacidad.

##### Ejemplo JSON: 
```json
{
    "totalitems": 20,
    "rooms": [
        {
            "id_habitacion": 5,
            "Nombre": "Habitación Compartida - Backpackers",
            "Tipo": "Compartida",
            "Capacidad": 8,
            "Precio": 2000,
            "foto_habitacion": "public/img/FotoHabitaciones/67155b75b082c2.24469727.jpg"
        },
        {
            "id_habitacion": 9,
            "Nombre": "Habitación Compartida - Aventura en Bariloche",
            "Tipo": "Compartida",
            "Capacidad": 6,
            "Precio": 1500,
            "foto_habitacion": "public/img/FotoHabitaciones/671558b06b0175.47992937.jpg"
        },
        {
            "id_habitacion": 14,
            "Nombre": "Habitación Compartida - Comunidad en Córdoba",
            "Tipo": "Compartida",
            "Capacidad": 6,
            "Precio": 1700,
            "foto_habitacion": "public/img/FotoHabitaciones/67155945df88a5.65631325.jpg"
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
            "id_habitacion": 15,
            "Nombre": "Habitación Familiar - Recuerdos en Tandil",
            "Tipo": "Familiar",
            "Capacidad": 5,
            "Precio": 3000,
            "foto_habitacion": "public/img/FotoHabitaciones/6715596354bca0.92991470.jpg"
        }
    ]
}

// sigue el listado
```

#### Lista de campos validos para el ordenamiento:
 - order_by:
    - id_habitacion
    - Nombre
    - Tipo
    - Capacidad
    - Precio
- direction:
    - ASC
    - DESC
   
### Obtener item por ID
- Verbo: GET
- URL: `http://localhost/web2-trabajo-especial-api-rest/api/room/4`
 - Descripción: Obtiene un item por su ID

##### Ejemplo JSON: 
```json
{
    "id_habitacion": 4,
    "Nombre": "Suite - Lujo en París",
    "Tipo": "Suite",
    "Capacidad": 4,
    "Precio": 1500,
    "foto_habitacion": "public/img/FotoHabitaciones/671557b408b611.73779563.jpg"
}
```
### Agregar Item (POST)
- Verbo: POST
- URL: `http://localhost/web2-trabajo-especial-api-rest/api/rooms/`
- Descripción: Agrega una habitación
- Body: Ejmplo JSON para agregar habitación
```json
{
  "Nombre": "Habitación Económica - Cabañas en Tandil",
  "Tipo": "Económica",
  "Capacidad": 2,
  "Precio": 450,
  "foto_habitacion": "public/img/FotoHabitaciones/fotohabitaciontandil.jpg"
}
```
- Aclaración: Requiere token (Bearer [token])
- 
- ### Modificar Item (PUT)
- Verbo: PUT
- URL: `http://localhost/web2-trabajo-especial-api-rest/api/rooms/{id_habitacion}`
- Descripción: Actualiza una habitación
- Body: Ejmplo JSON para actualizar una habitación
```json
{
  "Nombre": "Habitación Económica - Cabañas en Tandil Actualizada",
  "Tipo": "Económica",
  "Capacidad": 3,
  "Precio": 500,
  "foto_habitacion": "public/img/FotoHabitaciones/fotohabitaciontandil_actualizada.jpg"
}
```
- Aclaración: Requiere token (Bearer [token])

### PAGINACIÓN
- Verbo: GET
- URL: `http://localhost/web2-trabajo-especial-api-rest/api/rooms?order_by=Nombre&direction=ASC&page=2&itemspage=6`
- Descripción: Muestra un listado completo de habitaciones paginado
#### Aclaraciones:
- Paginación: 
    - page: Muestra el número de la página (página 1 como predeterminado)
    - itemspage: Muestra la cantidad de items en la página (por defecto 6)
    - totalitems: Muestra la cantidad de items que hay.
    - totalpages: Muestra la cantidad de páginas que hay.
    - all: si all = true, muestra el listado completo de las habitaciones sin paginar
    - ej: *endpoint*&page=1&itemspage=8
#### Ejemplo JSON:
```json
{
  "page": 2,
  "itemspage": 6,
  "totalitems": 20,
  "totalpages": 4,
  "rooms": [
    {
      "id_habitacion": 3,
      "Nombre": "Habitación Doble - Cama Queen",
      "Tipo": "Doble",
      "Capacidad": 2,
      "Precio": 600,
      "foto_habitacion": "public/img/FotoHabitaciones/671557a04cebe8.88236537.jpg"
    },
    {
      "id_habitacion": 12,
      "Nombre": "Habitación Doble - Oasis en Dubai",
      "Tipo": "Doble",
      "Capacidad": 2,
      "Precio": 850,
      "foto_habitacion": "public/img/FotoHabitaciones/67155916e66168.27036484.jpg"
    },
    {
      "id_habitacion": 7,
      "Nombre": "Habitación Doble - Romántica en Mendoza",
      "Tipo": "Doble",
      "Capacidad": 2,
      "Precio": 800,
      "foto_habitacion": "public/img/FotoHabitaciones/671558701e7a10.55558760.jpg"
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
      "id_habitacion": 20,
      "Nombre": "Habitación Económica - Confort en Tandil",
      "Tipo": "Económica",
      "Capacidad": 2,
      "Precio": 450,
      "foto_habitacion": "public/img/FotoHabitaciones/671559bc9ada63.23188104.jpg"
    },
    {
      "id_habitacion": 10,
      "Nombre": "Habitación Familiar - Escape a la Costa",
      "Tipo": "Familiar",
      "Capacidad": 5,
      "Precio": 2500,
      "foto_habitacion": "public/img/FotoHabitaciones/671558bfa3ee81.64071381.jpg"
    }
  ]
}
```
### Filtrar Items (GET)
- Verbo: GET
- URL: `http://localhost/web2-trabajo-especial-api-rest/api/room?filter=Capacidad&type=2`
- Descripción: Filtra las habitaciones por un campo especificado
- Campos validos: Nombre, Tipo, Capacidad, Precio, foto_habitacion.
- El parámetro filter define el campo y type el valor a buscar.
#### Ejemplo JSON:
```json
[
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
  {
    "id_habitacion": 7,
    "Nombre": "Habitación Doble - Romántica en Mendoza",
    "Tipo": "Doble",
    "Capacidad": 2,
    "Precio": 800,
    "foto_habitacion": "public/img/FotoHabitaciones/671558701e7a10.55558760.jpg"
  }
]
```
### TOKEN
- Verbo: GET
- URL: `http://localhost/web2-trabajo-especial-api-rest/api/user/token`
- Descripción: Obtiene el token para agregar y modificar habitaciones
- Authorization:
   - Type: Basic Auth
         - Username: webadmin@unicen.tudai
         - Password: admin
- Se obtiene:
```json
  {
  "token": "[TOKEN]"
 }
```
- Utilización:
    - En las peticiones PUT y POST:
          - Authorization : Bearer Token
              - Colocar el token dado en *TOKEN*         
