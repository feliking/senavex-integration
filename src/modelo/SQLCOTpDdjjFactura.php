<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCOTpDdjjFactura.php v1.0 25/02/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2015 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCOTpDdjjFactura {
    
    public function setGuardarCOTpDdjjFactura(COTpDdjjFactura $co_tpddjjfactura){
        return $co_tpddjjfactura->save();
    }
    
    public function getBuscarCOTpDdjjFacturaPorId(COTpDdjjFactura $co_tpddjjfactura) {
        return $co_tpddjjfactura->finder()->findbyPk($co_tpddjjfactura->getId_co_tpddjjfactura());
    }

    public function getBuscarCOTpDdjjFacturaPorCoTp(COTpDdjjFactura $co_tpddjjfactura) {
        return $co_tpddjjfactura->finder()->findAll("id_co_tp = ?", $co_tpddjjfactura->getId_co_tp());
    }
    
    public function getListarDdjjFacturasPorCoTp(COTpDdjjFactura $co_tpddjjfactura) {
        $sql = "SELECT * FROM
                ((SELECT codjf.*, dj.*, f.numero_factura, f.fecha_emision, da.codigo as clasif_arancelaria
                FROM co_tpddjjfactura codjf JOIN declaracion_jurada dj on(codjf.id_ddjj=dj.id_ddjj)
                JOIN factura f on(f.id_factura=codjf.id_factura)
                JOIN detalle_arancel da on(da.id_detalle_arancel=dj.id_detalle_arancel)
                WHERE codjf.id_co_tp=".$co_tpddjjfactura->getId_co_tp()." AND id_tipo_factura=1)
                UNION
                (SELECT codjf.*, dj.*, fnd.numero_factura, fnd.fecha_emision, da.codigo as clasif_arancelaria
                FROM co_tpddjjfactura codjf JOIN declaracion_jurada dj on(codjf.id_ddjj=dj.id_ddjj)
                JOIN factura_no_dosificada fnd on(fnd.id_factura_no_dosificada=codjf.id_factura)
                JOIN detalle_arancel da on(da.id_detalle_arancel=dj.id_detalle_arancel)
                WHERE codjf.id_co_tp=".$co_tpddjjfactura->getId_co_tp()." AND id_tipo_factura=2)) as tabla
            ORDER BY numero_orden";

        $connection = $co_tpddjjfactura->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}