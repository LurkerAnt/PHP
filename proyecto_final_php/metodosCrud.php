<?php
//https://www.youtube.com/watch?v=cOrmUAMTohE
//siguiendo esto y modificandolo porque desde la tienda no saque nada 21/06
//https://websitebeaver.com/prepared-statements-in-php-mysqli-to-prevent-sql-injection
//"mejorado" en base a esto
class metodos {

   /*private static function conectarMysqli(){
    $servidor="localhost";
    $usuario="root";
    $bd="batallaDioni";
    $password="1234";
    $mysqli=new mysqli($servidor,$usuario,$password,$bd);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
       return $mysqli;
   }

    public function mostrarPersonajesGuardados(){
       
        $mysqli=self::conectarMysqli();

        $statement=$mysqli->prepare("SELECT * FROM personajes");
        $statement->execute();
        $resultado=$statement->get_result();
        while($row=$resultado->fetch_assoc()){
            $array[]=$row;
        }
        return $array;
    }



    public function grabarPersonajeEnBaseDatos(String $charName, String $charClase,int $charPower,int $charHP){
       $mysqli=self::conectarMysqli();
       echo $charName;
       echo $charClase;
       echo $charPower;
       echo $charHP;
       $statement=$mysqli->prepare("INSERT INTO personajes (nombre_personaje, clase_personaje, poder_personaje, vida_personaje) VALUES ('?', '?', ?, ?);");
       if(!empty ($charName)) $statement->bind_param("s",$charName);
       if(!empty ($charClase)) $statement->bind_param("s",$charClase);
       if(!empty ($charPower)) $statement->bind_param("i",$charPower);
       if(!empty ($charHP)) $statement->bind_param("i",$charHP);
        $resultado=$statement->execute();

       return $resultado;
    }

    public function grabarPuntuacionEnBaseDatos(Personaje $personaje, $puntuacion){
        $sql = sprintf("INSERT INTO personajes (nombre_personaje, clase_personaje,puntos_personaje) VALUES ('%s', '%s', %d);",$personaje->getName(),$personaje->getClase(),$puntuacion);
    }

    public function grabrarPersonajeAPelo(){
        //probaturas, me falla haciendo sprintf y pruebo a ver si haciendo el statement entero entra.
        $sql="INSERT INTO personajes (nombre_personaje, clase_personaje, poder_personaje, vida_personaje) VALUES ('Mortito', 'Gatete',18,14);";
        
    }

*/
private static $pdo = null;


private static function obtenerPdoConexionBD()
{
    $servidor = "localhost";
    $identificador = "root";
    $contrasenna = "1234";
    $bd = "batallaDioni"; // Schema
    $opciones = [
        PDO::ATTR_EMULATE_PREPARES => false, // Modo emulación desactivado para prepared statements "reales"
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Que los errores salgan como excepciones.
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // El modo de fetch que queremos por defecto.
    ];

    try {
        $pdo = new PDO("mysql:host=$servidor;dbname=$bd;charset=utf8", $identificador, $contrasenna, $opciones);
    } catch (Exception $e) {
        error_log("Error al conectar: " . $e->getMessage());
        exit("Error al conectar" . $e->getMessage());
    }

    return $pdo;
}

private static function ejecutarConsulta(string $sql, array $parametros): array
{
    if (!isset(self::$pdo)) self::$pdo = self::obtenerPdoConexionBd();

    $select = self::$pdo->prepare($sql);
    $select->execute($parametros);
    return $select->fetchAll();
}

private static function ejecutarActualizacion(string $sql, array $parametros): bool
{
    if (!isset(self::$pdo)) self::$pdo = self::obtenerPdoConexionBd();

    $actualizacion = self::$pdo->prepare($sql);
    return $actualizacion->execute($parametros);
}

public function grabarPersonajeEnBaseDatos(String $name, String $clase,int $poder,int $vida){
    /*echo $name;
    echo $clase;
    echo $poder;
    echo $vida;
    Probaturas a ver si llegaban los parametros, el problema que tenía es que habia puesto comillas simples alrededor de las interrogaciones del PS '?'*/
    return self::ejecutarActualizacion("INSERT INTO personajes (nombre_personaje, clase_personaje, poder_personaje, vida_personaje) VALUES (?, ?, ?, ?)",
            [$name, $clase, $poder, $vida]);

}
public function grabarPuntuacionEnBaseDatos(String $name, String $clase,int $puntuacion){
    /*echo $name;
    echo $clase;
    echo $poder;
    echo $vida;
    Probaturas a ver si llegaban los parametros, el problema que tenía es que habia puesto comillas simples alrededor de las interrogaciones del PS '?'*/
    return self::ejecutarActualizacion("INSERT INTO puntuaciones (nombre_personaje, clase_personaje, puntos_personaje) VALUES (?, ?, ?)",
            [$name, $clase, $puntuacion]);

}

public function grabarPersonajeEnteroEnBaseDatos(Personaje $personaje){
    /*echo $name;
    echo $clase;
    echo $poder;
    echo $vida;
    Probaturas a ver si llegaban los parametros, el problema que tenía es que habia puesto comillas simples alrededor de las interrogaciones del PS '?'*/
    return self::ejecutarActualizacion("INSERT INTO personajes (nombre_personaje, clase_personaje, poder_personaje, vida_personaje) VALUES (?, ?, ?, ?)",
            [$personaje->getName(),$personaje->getClase(),$personaje->getPoder(),$personaje->getVida()]);

}

public function sacarPersonajesBaseDatos(){
    if (!isset(self::$pdo)) self::$pdo = self::obtenerPdoConexionBd();
    $select = self::$pdo->prepare("SELECT * FROM personajes;");
    $select->execute();
    
    $result=$select->fetchAll();
    return $result;
}

public function sacarPuntuacionesBaseDatos(){
    if (!isset(self::$pdo)) self::$pdo = self::obtenerPdoConexionBd();
    $select = self::$pdo->prepare("SELECT * FROM puntuaciones ORDER BY puntos_personaje DESC;");
    $select->execute();
    
    $result=$select->fetchAll();
    return $result;
}

public function sacarPersonajePorId(String $id){

    if (!isset(self::$pdo)) self::$pdo = self::obtenerPdoConexionBd();
    $select = self::$pdo->prepare("SELECT * FROM personajes where id_personaje=$id;");
    $select->execute();
    
    $result=$select->fetch();
    return $result;

}




}
