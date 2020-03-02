<?php

class SQLVerFormula{
    public function getFormula(VerFormula $verFormula){
        return $verFormula->finder()->find('id_bloqueo = ?', $verFormula->getId_ver_formula());
    }
    public function getFormulaVigente(VerFormula $verFormula){
        return $verFormula->finder()->find('estado=true');
    }
    public function getFormulas(VerFormula $verFormula){
        $criteria = new TActiveRecordCriteria;
//        $criteria->setCondition($condiciones);
        $criteria->OrdersBy['id_ver_formula'] = 'desc';
        return $verFormula->finder()->findAll($criteria);
    }
//    public function desactivarFormulas(VerFormula $verFormula){
//        $sql = "UPDATE ver_formula SET estado = false;";
//        $connection = $verFormula->getDbConnection();
//        $connection->Active = true;
//        $command = $connection->createCommand($sql);
//        $dataReader = $command->query();
//        $rows = $dataReader->readAll();
//        return $rows;
//    }
}