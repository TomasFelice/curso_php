<?php

class Persona {
    // Cómo declarar atributos??
    // protected:
    //      Solo se puede acceder desde la misma clase o clases hijas
    // private: 
    //      Solo se puede acceder desde la misma clase
    // public:
    //      Se puede acceder desde cualquier lugar
    private string   $nombre;
    private int      $edad;
    private string   $pais;

    // static
    public static int $cantPersonas = 0;

    // constructor
    // IMPORTANTE !! PHP solo permite tener UN UNICO constructor
    function __construct(string $nombre, int $edad, string $pais) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->pais = $pais;

        Persona::$cantPersonas++;
    }

    // declarar metodos
    public function mostrarInformacion() {
        return $this->nombre . ' tiene ' . $this->edad . ' años de edad y es de ' . $this->pais;
    }

    // encadenamiento de métodos
    // es necesario retornar el mismo objeto para poder realizar el encadenamiento
    public function mostrarNombre() {
        echo 'Su nombre es:' . $this->nombre . '<br>';
        return $this;
    }

    public function mostrarEdad() {
        echo 'Su edad es:' . $this->edad . '<br>';
        return $this;
    }

    public function mostrarPais() {
        echo 'Su pais es:' . $this->pais . '<br>';
        return $this;
    }
}

class Alumno extends Persona {
    private string   $carrera;

    function __construct(string $nombre, int $edad, string $pais, string $carrera) {
        parent::__construct($nombre, $edad, $pais);
        $this->carrera = $carrera;
    }

    public function mostrarInformacion() {
        return parent::mostrarInformacion() . '. Estudia ' . $this->carrera;
    }
}

$tomas = new Alumno('Tomas', 21, 'Argentina', 'Ing. en Informatica');

echo $tomas->mostrarInformacion();
echo '<br>';
$tomas->mostrarNombre()->mostrarEdad()->mostrarPais();

// static
echo Persona::$cantPersonas; // 1