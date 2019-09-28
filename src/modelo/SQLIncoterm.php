<?php

class SQLIncoterm{
    
    public function setGuardarIncoterm(Incoterm $incoterm){
        return $incoterm->save();
    }
    public function getIncotermPorId(Incoterm $incoterm)
    {
        return $incoterm->finder()->find('id_incoterm = ?', $incoterm->getId_incoterm());
    }
    public function getListarIncoterm(Incoterm $incoterm) {
        return $incoterm->findAll();
    }
}
