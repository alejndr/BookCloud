<?php


class Database {

    //datos de acceso a la BBDD
    private $dbHost = "sql204.epizy.com" ;
    private $dbUser = "epiz_23035390" ;
    private $dbPass = "Iuzm6TjYz84L2L" ;
    private $dbName = "epiz_23035390_bookcloud" ;


    private static $resultado ;
    private static $instancia = null ;
    private static $db ;

    // El constructor es privado para que no se puedan crear otras estancias
    // del objeto
    private function __construct(){

        $this->conectar() ;
        
    }
    
    // Cerramos la conexión con la BBDD
    public function __destruct(){	
        
        Database::$db->close() ;

    }

    // hacemos privado el clone para evitar que se creen mas estancias
    private function __clone() { }

    // Restablecemos la conexion con la BBDD
    public function __wakeup(){

        $this->conectar() ;
        
    }
    
    // Si aun no existe, creamos una instancia de database
    public static function getInstancia(){
			if (is_null(self::$instancia)){
				self::$instancia = new Database() ;
			}
			
			return self::$instancia ;
    }

    // Conectamos con la BBDD
    private function conectar(){

			
			self::$db = new mysqli($this->dbHost, 
								   $this->dbUser, 
								   $this->dbPass)
							or die("**Se ha producido un error en la conexión con el motor de bases de datos.") ;

			self::$db->select_db($this->dbName) ;

			//self::$db->set_charset("utf8") ;
    }
    
    // Lanzamos una consulta y obtenemos los datos
    public function consulta($sql):bool {

        self::$resultado = self::$db->query($sql)  ;

        if (is_object(self::$resultado)){
            return (self::$resultado->num_rows > 0) ;

        } else {
            return (self::$db->affected_rows > 0) ;

        }

    }

    // Devuelve un objeto con el primer resultado obtenido tras la consulta, al
    // terminar devuelve null
    public function getObjeto($class="StdClass"){
        return self::$resultado->fetch_object($class) ;
        
    }

    




}