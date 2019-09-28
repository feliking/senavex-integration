<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCOSgpDdjjFactura.php v1.0 25/02/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCOSgpDdjjFactura {
    
    public function setGuardarCOSgpDdjjFactura(COSgpDdjjFactura $co_sgpddjjfactura){
        return $co_sgpddjjfactura->save();
    }
    
    public function getBuscarCOSgpDdjjFacturaPorId(COSgpDdjjFactura $co_sgpddjjfactura) {
        return $co_sgpddjjfactura->finder()->findbyPk($co_sgpddjjfactura->getId_co_sgpddjjfactura());
    }

    public function getBuscarCOSgpDdjjFacturaPorCoSgp(COSgpDdjjFactura $co_sgpddjjfactura) {
        return $co_sgpddjjfactura->finder()->findAll("id_co_sgp = ?", $co_sgpddjjfactura->getId_co_sgp());
    }
    
    public function getListarDdjjFacturasPorCoSgp(COSgpDdjjFactura $co_sgpddjjfactura,$ac) {
        $sql = "SELECT * FROM
                ((SELECT codjf.*, dj.*, f.numero_factura, f.fecha_emision, f.peso_bruto, da.codigo as clasif_arancelaria, crit.descripcion as criterio
                FROM co_sgpddjjfactura codjf JOIN declaracion_jurada dj on(codjf.id_ddjj=dj.id_ddjj)
                JOIN ddjj_acuerdo djac on (dj.id_ddjj=djac.id_ddjj)
                JOIN criterio_origen crit on (crit.id_criterio_origen=djac.id_criterio_origen)
                JOIN factura f on(f.id_factura=codjf.id_factura)
                JOIN detalle_arancel da on(da.id_detalle_arancel=dj.id_detalle_arancel)
                WHERE codjf.id_co_sgp=".$co_sgpddjjfactura->getId_co_sgp()." AND id_tipo_factura=1 AND djac.id_acuerdo=".$ac.")
                UNION
                (SELECT codjf.*, dj.*, fnd.numero_factura, fnd.fecha_emision, fnd.peso_bruto, da.codigo as clasif_arancelaria, crit.descripcion as criterio
                FROM co_sgpddjjfactura codjf JOIN declaracion_jurada dj on(codjf.id_ddjj=dj.id_ddjj)
                JOIN ddjj_acuerdo djac on (dj.id_ddjj=djac.id_ddjj)
                JOIN criterio_origen crit on (crit.id_criterio_origen=djac.id_criterio_origen)
                JOIN factura_no_dosificada fnd on(fnd.id_factura_no_dosificada=codjf.id_factura)
                JOIN detalle_arancel da on(da.id_detalle_arancel=dj.id_detalle_arancel)
                WHERE codjf.id_co_sgp=".$co_sgpddjjfactura->getId_co_sgp()." AND id_tipo_factura=2 AND djac.id_acuerdo=".$ac.")) as tabla
            ORDER BY numero_orden";

        $connection = $co_sgpddjjfactura->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}