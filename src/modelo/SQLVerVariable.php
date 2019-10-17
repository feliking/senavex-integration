<?php

class SQLVerVariable{
    public function getVariable(VerVariable $verVariable){
        return $verVariable->finder()
            ->with_valores_booleanos()
            ->with_valores_rangos()
            ->findbyPk($verVariable->getId_ver_variable());
    }
    public function getVariablePorLetra(VerVariable $verVariable){
        return $verVariable->finder()
            ->with_valores_booleanos()
            ->with_valores_rangos('estado=true')
            ->find('variable=?',$verVariable->getVariable());
    }
    public function getVariables(VerVariable $verVariable){
        return  $verVariable->findAll();
    }
    public function getVariablesActivas(VerVariable $verVariable){
        $sql = "SELECT * FROM ver_variable WHERE estado=TRUE ORDER BY id_ver_variable ";
        $connection = $verVariable->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;

    }
    public function getVariablesActivasModulo(VerVariable $verVariable){
        return  $verVariable->findAll('modulo_dep=?',$verVariable->getModulo_dep());

        $sql = "SELECT * FROM ver_variable WHERE modulo_dep=".$verVariable->getModulo_dep()." ORDER BY id_ver_variable";
        $connection = $verVariable->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}