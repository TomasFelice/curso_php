let btn = document.getElementById('btn_cargar_usuarios');
let loader = document.getElementById('loader');

btn.addEventListener('click', function(){
    let peticion = new XMLHttpRequest();

    // Conexion con un archivo JSON desde una URL
    // peticion.open('GET', 'https://api.npoint.io/917e6b88ee0d677d193b');
    // Conexion con un archivo JSON desde un archivo local simple
    peticion.open('GET', 'php/usuarios.php');

    loader.classList.add('active');

    peticion.onload = function(){
        let datos = JSON.parse(peticion.responseText);

        // Ventajas de usar el for en estos casos:
            // mayor control de la cantidad de registros que recorreomos
        for (let i = 0; i < datos.length; i++) {
            let elemento = document.createElement('tr');
            elemento.innerHTML += ("<td>" + datos[i]._id + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].nombre + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].edad + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].pais + "</td>");
            elemento.innerHTML += ("<td>" + datos[i].correo + "</td>");
            document.getElementById('tabla').appendChild(elemento);
        }

        // datos.forEach(persona => {
        //     let elemento = document.createElement('tr');
        //     elemento.innerHTML += ("<td>" + persona.id + "</td>");
        //     elemento.innerHTML += ("<td>" + persona.nombre + "</td>");
        //     elemento.innerHTML += ("<td>" + persona.edad + "</td>");
        //     elemento.innerHTML += ("<td>" + persona.pais + "</td>");
        //     elemento.innerHTML += ("<td>" + persona.correo + "</td>");
        //     document.getElementById('tabla').appendChild(elemento);
        // });
    };

    peticion.onreadystatechange = function(){
        // readyState:
            // 0: No inicializado
            // 1: Conexión establecida
            // 2: Recibido
            // 3: Procesando
            // 4: Respuesta lista
        // status:
            // 200: Correcto
            // ...
        if(peticion.readyState == 4 && peticion.status == 200) {
            loader.classList.remove('active');
        }
    };

    peticion.send();
});