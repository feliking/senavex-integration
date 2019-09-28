<?php

class SQLBitacora_ws {
    
    public function setGuardarBitacora_ws(Bitacora_ws $bitacora_ws){        
        return $bitacora_ws->save();
    }
}