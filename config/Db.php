<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Db.php v1.0 19-06-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

include_once(PATH_BASE . DS . 'lib' . DS . 'prado' . DS . 'pradolite.php');
include_once(PATH_BASE . DS . 'lib' . DS . 'prado' . DS . 'Data' . DS . 'ActiveRecord' . DS . 'TActiveRecord.php');

class Db extends TActiveRecord { 
	
    private $db     = 'vortex_final'; 
    private $user   = 'postgres';
    private $pwd    = 'enex.2015';
    private $server ='10.240.230.229';
    //private $server = '107.178.208.220';
    private $driver = 'pgsql';
	
 public function getDbConnection() {
        static $conn;
        if ($conn === null)
            $conn = new TDbConnection($this->driver . ":host=" . $this->server . ";dbname=" . $this->db, $this->user, $this->pwd);
        return $conn;
    }
}

?>