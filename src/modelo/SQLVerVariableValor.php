<?php

class SQLVerVariableValor{
    public function getValor(VerVariableValor $verVariableValor){
        return $verVariableValor->finder()->findbyPk($verVariableValor->getId_ver_variable());
    }
    public function getValoresbyVariable(VerVariableValor $verVariableValor){
        return  $verVariableValor->finder()->findAll('id_ver_variable=?',$verVariableValor->getId_ver_variable());
    }
}