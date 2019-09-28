<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCOAladiDdjjFactura.php v1.0 13/02/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCOAladiDdjjFactura {
    
    public function setGuardarCOAladiDdjjFactura(COAladiDdjjFactura $co_aladiddjjfactura){
        return $co_aladiddjjfactura->save();
    }
    
    public function getBuscarCOAladiDdjjFacturaPorId(COAladiDdjjFactura $co_aladiddjjfactura) {
        return $co_aladiddjjfactura->finder()->findbyPk($co_aladiddjjfactura->getId_co_aladiddjjfactura());
    }

    public function getBuscarCOAladiDdjjFacturaPorCoAladi(COAladiDdjjFactura $co_aladiddjjfactura) {
        return $co_aladiddjjfactura->finder()->findAll("id_co_aladi = ?", $co_aladiddjjfactura->getId_co_aladi());
    }
    
    public function getListarDdjjFacturasPorCoAladi(COAladiDdjjFactura $co_aladiddjjfactura) {
        $sql = "SELECT * FROM
                ((SELECT codjf.*, dj.*, f.numero_factura, da.codigo as clasif_arancelaria
                FROM co_aladiddjjfactura codjf JOIN declaracion_jurada dj on(codjf.id_ddjj=dj.id_ddjj)
                JOIN factura f on(f.id_factura=codjf.id_factura)
                JOIN detalle_arancel da on(da.id_detalle_arancel=dj.id_detalle_arancel)
                WHERE codjf.id_co_aladi=".$co_aladiddjjfactura->getId_co_aladi()." AND id_tipo_factura=1)
                UNION
                (SELECT codjf.*, dj.*, fnd.numero_factura, da.codigo as clasif_arancelaria
                FROM co_aladiddjjfactura codjf JOIN declaracion_jurada dj on(codjf.id_ddjj=dj.id_ddjj)
                JOIN factura_no_dosificada fnd on(fnd.id_factura_no_dosificada=codjf.id_factura)
                JOIN detalle_arancel da on(da.id_detalle_arancel=dj.id_detalle_arancel)
                WHERE codjf.id_co_aladi=".$co_aladiddjjfactura->getId_co_aladi()." AND id_tipo_factura=2)) as tabla
            ORDER BY numero_orden";

        $connection = $co_aladiddjjfactura->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
        //return $sistema_colas->finder()->findBySql($sql);
    }
    
    public function getListarFacturasConDistinctPorCoAladi(COAladiDdjjFactura $co_aladiddjjfactura) {
        $sql = "SELECT distinct(id_factura) FROM co_aladiddjjfactura WHERE id_co_aladi=".$co_aladiddjjfactura->getId_co_aladi();
        return $co_aladiddjjfactura->finder()->findAllBySql($sql);
    }
    
    public function setEliminarPorCoAladi(COAladiDdjjFactura $co_aladiddjjfactura){
        return $co_aladiddjjfactura->deleteAll("id_co_aladi=".$co_aladiddjjfactura->getId_co_aladi());
    }

}