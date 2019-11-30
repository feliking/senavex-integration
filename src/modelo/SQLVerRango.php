<?php

class SQLVerRango{
    public function getRango(VerRango $verVariableRango){
        return $verVariableRango->finder()->findbyPk($verVariableRango->getId_ver_rango());
    }
    public function getRangobyVariable(VerRango $verVariableRango){
        return  $verVariableRango->finder()->findAll('id_ver_variable=?',$verVariableRango->getId_ver_variable());
    }
}