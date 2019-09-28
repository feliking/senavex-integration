<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     SQLCOMercosurDdjjFactura.php v1.0 25/02/2015
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2015 Servicio Nacional de Verificación de Exportaciones
 */

class SQLCOMercosurDdjjFactura {
    
    public function setGuardarCOMercosurDdjjFactura(COMercosurDdjjFactura $co_mercosurddjjfactura){
        return $co_mercosurddjjfactura->save();
    }
    
    public function getBuscarCOMercosurDdjjFacturaPorId(COMercosurDdjjFactura $co_mercosurddjjfactura) {
        return $co_mercosurddjjfactura->finder()->findbyPk($co_mercosurddjjfactura->getId_co_mercosurddjjfactura());
    }

    public function getBuscarCOMercosurDdjjFacturaPorCoMercosur(COMercosurDdjjFactura $co_mercosurddjjfactura) {
        return $co_mercosurddjjfactura->finder()->findAll("id_co_mercosur = ?", $co_mercosurddjjfactura->getId_co_mercosur());
    }
    
    public function getBuscarFacturaPorCOMercosur(COMercosurDdjjFactura $co_mercosurddjjfactura) {
        return $co_mercosurddjjfactura->finder()->find("id_co_mercosur = ?", $co_mercosurddjjfactura->getId_co_mercosur());
    }
    
    public function getListarDdjjFacturasPorCoMercosur(COMercosurDdjjFactura $co_mercosurddjjfactura) {
        $sql = "SELECT * FROM
                ((SELECT codjf.*, dj.*, f.numero_factura, da.codigo as clasif_arancelaria
                FROM co_mercosurddjjfactura codjf JOIN declaracion_jurada dj on(codjf.id_ddjj=dj.id_ddjj)
                JOIN factura f on(f.id_factura=codjf.id_factura)
                JOIN detalle_arancel da on(da.id_detalle_arancel=dj.id_detalle_arancel)
                WHERE codjf.id_co_mercosur=".$co_mercosurddjjfactura->getId_co_mercosur()." AND id_tipo_factura=1)
                UNION
                (SELECT codjf.*, dj.*, fnd.numero_factura, da.codigo as clasif_arancelaria
                FROM co_mercosurddjjfactura codjf JOIN declaracion_jurada dj on(codjf.id_ddjj=dj.id_ddjj)
                JOIN factura_no_dosificada fnd on(fnd.id_factura_no_dosificada=codjf.id_factura)
                JOIN detalle_arancel da on(da.id_detalle_arancel=dj.id_detalle_arancel)
                WHERE codjf.id_co_mercosur=".$co_mercosurddjjfactura->getId_co_mercosur()." AND id_tipo_factura=2)) as tabla
            ORDER BY numero_orden";

        $connection = $co_mercosurddjjfactura->getDbConnection();
        $connection->Active = true;
        $command = $connection->createCommand($sql);
        $dataReader = $command->query();
        $rows = $dataReader->readAll();
        return $rows;
    }
}