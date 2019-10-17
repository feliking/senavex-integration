<?php

class SQLVerAdmision{
    public function getAdmision(VerAdmision $verAdmision){
        return $verAdmision->finder()->findbyPk($verAdmision->getId_ver_admision());
    }
    public function getAdmisionesActivas(VerAdmision $verAdmision){
        return  $verAdmision->finder()->findAll('estado=TRUE');
    }
}