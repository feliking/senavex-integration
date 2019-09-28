<?php

//control de acceso
defined('_ACCESO') or die('Acceso restringido');

/** CP|Certificado de Origen|19 **/
class Consulta_aux{
    public static function getSQL($clase){
        $clase_reflected=new ReflectionClass($clase);
        $propiedades=  Consulta::obtenerAtributosClase($clase,ReflectionProperty::IS_PRIVATE);
        foreach ($propiedades as $value) {
            $value->setAccessible(true);
            if (!empty($value->getValue($clase_object))){
                $prop[count($prop)]=$value->getValue($clase_object);
            }
        }
        $sql="SELECT * FROM ".$clase_reflected->getConstant("TABLE")." WHERE ";
        
        
        return $prop;
    }
    public static function obtenerDocumentacion($objeto){
        $doc=$objeto->getDocComment();
        $doc=trim($doc,'/**');
        $doc=substr($doc,1, strlen($doc) - 2);
        $doc_array=explode('|',$doc);
        return $doc_array;
    }
    
    //enlista los atributos de una clase instanciada
    public static function obtenerAtributosClase($clase,$tipo){
        $clase_reflected=new ReflectionClass($clase);
        return $clase_reflected->getProperties($tipo);
    } 
}

?>
