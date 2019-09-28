<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCOVenezuelaDdjjFactura.php v1.0 25/02/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCOVenezuelaDdjjFactura {
    
    public function setGuardarCOVenezuelaDdjjFactura(COVenezuelaDdjjFactura $co_venezueladdjjfactura){
        return $co_venezueladdjjfactura->save();
    }
    
    public function getBuscarCOVenezuelaDdjjFacturaPorId(COVenezuelaDdjjFactura $co_venezueladdjjfactura) {
        return $co_venezueladdjjfactura->finder()->findbyPk($co_venezueladdjjfactura->getId_co_venezueladdjjfactura());
    }

    public function getBuscarCOVenezuelaDdjjFacturaPorCoVenezuela(COVenezuelaDdjjFactura $co_venezueladdjjfactura) {
        return $co_venezueladdjjfactura->finder()->findAll("id_co_venezuela = ?", $co_venezueladdjjfactura->getId_co_venezuela());
    }
    
    public function getListarDdjjFacturasPorCoVenezuela(COVenezuelaDdjjFactura $co_venezueladdjjfactura) {
        $sql = "SELECT * FROM
                ((SELECT codjf.*, dj.*, f.numero_factura, da.codigo as clasif_arancelaria
                FROM co_venezueladdjjfactura codjf JOIN declaracion_jurada dj on(codjf.id_ddjj=dj.id_ddjj)
                JOIN factura f on(f.id_factura=codjf.id_factura)
                JOIN detalle_arancel da on(da.id_detalle_arancel=dj.id_detalle_arancel)
                WHERE codjf.id_co_venezuela=".$co_venezueladdjjfactura->getId_co_venezuela()." AND id_tipo_factura=1)
                UNION
                (SELECT codjf.*, dj.*, fnd.numero_factura, da.codigo as clasif_arancelaria
                FROM co_venezueladdjjfactura codjf JOIN declaracion_jurada dj on(codjf.id_ddjj=dj.id_ddjj)
                JOIN factura_no_dosificada fnd on(fnd.id_factura_no_dosificada=codjf.id_factura)
                JOIN detalle_arancel da on(da.id_detalle_arancel=dj.id_detalle_arancel)
                WHERE codjf.id_co_venezuela=".$co_venezueladdjjfactura->getId_co_venezuela()." AND id_tipo_factura=2)) as tabla
            ORDER BY numero_orden";

        $connection = $co_venezueladdjjfactura->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}