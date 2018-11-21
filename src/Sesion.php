<?php

require_once "Database.php" ;
require_once "Usuario.php" ;


class Sesion {

    private $expire_time = 3600 ;

    private static $usuario   = null ; // información usuario
    private static $instancia = null ;	// instancia

    private function __construc() { }
    private function __clone()    { }

    public function __destroy(){
        // Destruimos las variables de sesión
        $_SESSION[] = array() ;

        // Cerramos la sesión
        session_destroy() ;
    }

    //
    // Creará una instancia del objeto Sesión e inicializará
    // la sesión de forma apropiada.
    public static function iniciarSesion() 
    {
        if (is_null(self::$instancia)):
            self::$instancia = new Sesion() ;
        endif ;

        // pone a nuestra disposición las variables de 
        // sesión de PHP. NOTA: debe ser la primera en
        // ejecutarse, antes de acceder a $_SESSION.
        session_start() ;

        //
        return self::$instancia ;
    }

    //
    private function isExpired()
    {
        $tme_log = $_SESSION["time"] ;
        $tme_act = time() ;

        return (($tme_act - $tme_log) > $this->expire_time) ;
    }

    //
    private function isLogged()
    {
        return !empty($_SESSION) ;
    }

    //
    public function checkActiveSession() 
    {
        // Comprobamos si el usuario está registrado
        if ($this->isLogged()):

            // Comprobamos si ha expirado la sesión
            if ($this->isExpired()):

                $this->__destroy() ;

                return false ; // no hay sesión activa

            else:

                return true ;	// hay sesión activa

            endif ;

        else:

            return false ; 	   // no hay sesión activa

        endif ;
    }

    //
    public function doLogin($usr, $pwd)
    {
        // Comprobamos si el usuario está logueado
        if ($this->isLogged()):
                return true ;
        else :

            // Obtenemos instancia de la base de datos
            $db = Database::getInstancia() ;

            // Comprobamos si el usuario existe en la base
            // de datos.
            $sql = "SELECT idUsuario, usuario, email, nombre, apellido, imagen, tipo
                    FROM usuario WHERE usuario='$usr' AND contrasena=MD5('$pwd') ;" ; 

            // Lanzamos la consulta y comprobamos si hay resultado
            if ($db->consulta($sql)):
                
                // Rescatamos el resultado de la base de datos
                self::$usuario = $db->getObjeto("usuario") ;

                //
                // El la variable de sesión guardamos la información
                // que estimemos necesaria.

                $_SESSION["idUsuario"] = self::$usuario->idUsuario;
                $_SESSION["usuario"] = self::$usuario->usuario;
                $_SESSION["nombre"] = self::$usuario->nombre;
                $_SESSION["apellido"] = self::$usuario->apellido;
                $_SESSION["email"] = self::$usuario->email;
                $_SESSION["imagen"] = self::$usuario->imagen;
                $_SESSION["tipo"] = self::$usuario->tipo;
                
                // Guardamos marca de tiempo de inicio de sesión
                $_SESSION["time"] = time() ;


                // 
                return true ;

            endif ;

        endif ;

        return false ;
    }

    //
    public function redirect($url)
    {
        if ($this->checkActiveSession()) header("Location: $url") ;
        else
            throw new Exception("Sesión no iniciada para el usuario") ;

        exit() ;
    }

    //
    public function close()
    {
        if ($this->checkActiveSession())	$this->__destroy() ;
    }

    //
    public function __toString()
    {
        return "<pre>".print_r($_SESSION,true)."</pre>" ;
    }



}