<?php

class SQLZonasEspeciales {

  public function getAll(ZonasEspeciales $zonas_especiales) {
    return $zonas_especiales->findAll();
  }
  public function getById(ZonasEspeciales $zonas_especiales) {
    return $zonas_especiales->finder()->find('id_zonas_especiales=?',$zonas_especiales->getId_zonas_especiales());
  }

}