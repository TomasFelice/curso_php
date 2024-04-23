let btnCargar = document.getElementById('btn_cargar_usuarios'),
    errorBox = document.getElementById('error_box'),
    tabla = document.getElementById('tabla'),
    loader = document.getElementById('loader');

let usuarioNombre,
    usuarioEdad,
    usuarioPais,
    usuariosCorreo;

function cargarUsuarios(){
    tabla.innerHTML = '<tr><th>ID</th><th>Nombre</th><th>Edad</th><th>Pais</th><th>Correo</th></tr>';

    let peticion = new XMLHttpRequest();
    peticion.open('GET', 'php/leer_datos.php');

    loader.classList.add('active');

    peticion.onload = function() {
        let datos = JSON.parse(peticion.responseText);

        if (datos.error) {
            errorBox.classList.add('active');
        } else {
            for (let i = 0; i < datos.length; i++) {
                let elemento = document.createElement('tr');
                elemento.innerHTML += ('<td>' + datos[i].id + '</td>');
                elemento.innerHTML += ('<td>' + datos[i].nombre + '</td>');
                elemento.innerHTML += ('<td>' + datos[i].edad + '</td>');
                elemento.innerHTML += ('<td>' + datos[i].pais + '</td>');
                elemento.innerHTML += ('<td>' + datos[i].correo + '</td>');

                tabla.appendChild(elemento);
            }
        }
    }

    peticion.onreadystatechange = function() {
        if (peticion.readyState == 4 && peticion.status == 200) {
            loader.classList.remove('active');
        }
    }

    peticion.send();
}

function formulario_valido() {
    if (usuarioNombre == '' || isNaN(usuarioEdad) || usuarioPais == '' || usuarioCorreo == '') {
        return false;
    }
    
    return true;
}

function agregarUsuarios(e) {
    e.preventDefault();

    let peticion = new XMLHttpRequest();
    peticion.open('POST', 'php/insertar_usuario.php');

    usuarioNombre = formulario.nombre.value.trim();
    usuarioEdad = parseInt(formulario.edad.value.trim());
    usuarioPais = formulario.pais.value.trim();
    usuarioCorreo = formulario.correo.value.trim();

    if (formulario_valido()) {
        errorBox.classList.remove('active');
        let parametros = 'nombre=' + usuarioNombre + '&edad=' + usuarioEdad + '&pais=' + usuarioPais + '&correo=' + usuarioCorreo;

        peticion.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        loader.classList.add('active');

        peticion.onload = function() {
            cargarUsuarios();
            formulario.nombre.value = '';
            formulario.edad.value = '';
            formulario.pais.value = '';
            formulario.correo.value = '';
        }

        peticion.onreadystatechange = function() {
            if (peticion.readyState == 4 && peticion.status == 200) {
                loader.classList.remove('active');
            }
        }

        peticion.send(parametros);
    } else {
        errorBox.classList.add('active');
        errorBox.innerHTML = 'Por favor completa el formulario correctamente';
    }

}

btnCargar.addEventListener('click', function() {
    cargarUsuarios();

});

formulario.addEventListener('submit', function(e) {
    agregarUsuarios(e);

});