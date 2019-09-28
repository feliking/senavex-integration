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

    private $db     ;
    private $user   ;
    private $pwd    ;
    private $server ;
    private $driver ;
	
 public function getDbConnection() {
     $ini = parse_ini_file('config.ini');
     $this->db     = $ini['db_name'];
     $this->user   = $ini['db_user'];
     $this->pwd    = $ini['db_pwd'];
     $this->server = $ini['db_server'];
     $this->driver = 'pgsql';

     static $conn;
        if ($conn === null)
            $conn = new TDbConnection($this->driver . ":host=" . $this->server . ";dbname=" . $this->db, $this->user, $this->pwd);
        return $conn;
    }
}

?>