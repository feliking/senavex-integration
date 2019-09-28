<?php

include_once(PATH_BASE . DS . 'config' . DS . 'Db.php');

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

class EscalaCO extends Db {
        
    const TABLE = 'escala_co';

    public static $RELATIONS = array
    (
        'tipo_co'=>array(self::BELONGS_TO,'TipoCertificadoOrigen','id_tipo_co'),
    );
    
    public static function finder($className=__CLASS__) {
        return parent::finder($className);
    }

    private $id_escala_co;
    private $id_tipo_co;
    private $monto_fob_inicial;
    private $monto_fob_final;
    private $estado;
    private $importe;
    
    public function setId_escala_co($id_escala_co) {
        $this->id_escala_co = $id_escala_co;
    }
    public function getId_escala_co() {
        return $this->id_escala_co;
    }

    public function setId_tipo_co($id_tipo_co) {
        $this->id_tipo_co = $id_tipo_co;
    }
    public function getId_tipo_co() {
        return $this->id_tipo_co;
    }
    
    public function setMonto_fob_inicial($monto_fob_inicial) {
        $this->monto_fob_inicial = $monto_fob_inicial;
    }
    public function getMonto_fob_inicial() {
        return $this->monto_fob_inicial;
    }
    
    public function setMonto_fob_final($monto_fob_final) {
        $this->monto_fob_final = $monto_fob_final;
    }
    public function getMonto_fob_final() {
        return $this->monto_fob_final;
    }
    
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function getEstado() {
        return $this->estado;
    }
    
    public function setImporte($importe) {
        $this->importe = $importe;
    }
    public function getImporte() {
        return $this->importe;
    }
    
}

?>
