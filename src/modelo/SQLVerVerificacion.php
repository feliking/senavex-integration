<?php

class SQLVerVerificacion{
    public function getVerificacion(VerVerificacion $verVerificacion){
        return $verVerificacion->finder()
            ->with_estado()
            ->with_regional()
            ->with_ddjj()
            ->findbyPk($verVerificacion->getId_ver_verificacion());
    }
    public function getListarVerificacionesPorEstado(VerVerificacion $verificacion,$id_persona = false) {
        $rule = '';
        if($id_persona) $rule .= 'id_persona_verificacion = '.$id_persona.' AND ';


        return $verificacion->finder()
            ->with_estado()
            ->with_regional()
            ->with_ddjj()
            ->findAll($rule.'id_ver_estado_verificacion = ?',$verificacion->getId_ver_estado_verificacion());
    }

  public function getVerificacionesAntiguasPorEmpresa(VerVerificacion $verificacion, $except_id = null)
  {
    $exclude_id = '';
    if($except_id !== null){
      $exclude_id = 'id_ver_verificacion != ' . $except_id . ' AND ';
    }

    return $verificacion->finder()
      ->with_estado()
      ->with_regional()
      ->with_ddjj()
      ->with_empresa()
      ->findAll($exclude_id.'id_ver_estado_verificacion != 4 AND id_empresa=?', $verificacion->getId_empresa());// restringimos solo para asignar
  }
}