<?php

/*
  Costructor:
 * - Metodo para crear un objeto de la clase.
 * - Podemos pasar parametros para darle valores a los atributos del objeto al instanciarlos
 * - Se puede crear con boton derecho insertar constructor(netbeans)
 *
  Destructos:
 * -Metodo para destruir un objeto de la clase
 * -Sirven para liberar recursos
 * -Permite definir acciones que se ejecuten al eliminar el objeto.
 * -Sera llamado cuando no haya referencia a un objeto determinado
 *
 */

class Empleados
{

    //Atributos
    private $nombre, $apellido, $edad, $notas;
    private static $numeroObjetosCreados = 0; //atributo estatico propio de la clase

    /* METODOS CONSTRUCTORES
     *
     *  Manera antigua(No es la mejor manera)
      public function Empleados ($nombre,$apellido,$edad, $notas)
      {
      $this->nombre=$nombre;
      $this->apellido=$apellido;
      $this->edad=$edad;
      $this->notas=$notas;

      }
     */

    /* Manera nueva(La recomendable)
     * -Se crean con __construct()
     * RECUERDA!!! con doble barra baja
     */

    public function __construct($nombre, $apellido, $edad, $notas)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->notas = $notas;
        self::$numeroObjetosCreados++; //Al crear un objeto el atributo sumara un valor. Al ser estatico se guardara en la propia clase
    }

    /* RECUERDA!!! El constructor puede tener como parametro un array
      -De esta manera facilito la creacion del objeto si quiero crearlo con los datos obtenido de una baseDatos
      le paso el array que obtengo al hacer una consulta a la base datos
      public function __construct($row) {
      $this->codigo = $row['nombre'];
      $this->nombre = $row['apellido'];
      $this->nombre_corto = $row['edad'];
      $this->PVP = $row['notas'];
      }
     */


    /* METODO DESTRUCTOR */

    public function __destruct()
    {
        self::$numeroObjetosCreados--;
    }

    //Metodo
    public function mostrarDatos()
    {
        echo "El nombre del empleado es " . $this->nombre . " y el apellido es " . $this->apellido . "<br>";
    }

    public static function getNumeroObjetosCreados()
    {
        echo "Tengo " . self::$numeroObjetosCreados . " objetos instaciados de la clase empleados . <br>";
    }
}

/* Instanciamos objetos.
  -RECUERDA: -Si quieres usar la clase en otro archivo primero tenemos que llamar a la clase con include o requiere
  -Tienes que usar todos los parametros del contructor
 */
$empleado1 = new Empleados("carlos", "rayon", 35, 10);
$empleado2 = new Empleados("ines", "Mayor", 30, 10);

Empleados::getNumeroObjetosCreados();

$empleado1->mostrarDatos();
$empleado2->mostrarDatos();
