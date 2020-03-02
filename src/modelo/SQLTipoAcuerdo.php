<?php

class SQLTipoAcuerdo {
    
    public function getListarTipoAcuerdo(TipoAcuerdo $tipoAcuerdo) {
        return $tipoAcuerdo->findAll();
    }
    public function getIdsTipoAcuerdo(TipoAcuerdo $tipoAcuerdo){
        $sql='SELECT id_tipo_acuerdo FROM tipo_acuerdo';
        $connection = $tipoAcuerdo->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        $array = [];
        foreach ($rows as $key=>$val){
            array_push($array, $val['id_tipo_acuerdo']);
        }
        return $array;
    }

}