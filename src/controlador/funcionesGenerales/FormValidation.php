<?php

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');

class FormValidation{
    public function text($data,$length = 201) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $numlength = strlen((string)$data);
        if(!is_string($data)){
            var_dump(http_response_code(400));
            exit;
        }
        if($numlength>$length){
            var_dump(http_response_code(400));
            exit;
        }
        return $data;
    }
    public function number($data,$length = 201){
        $data = trim($data);
        $numlength = strlen((string)$data);
        if(is_numeric($data) && $numlength>$length){
            var_dump(http_response_code(400));
            exit;
        }
        return $data;
    }
    public function is_inArray($data,$array){
        if (!in_array($data, (array)$array)) {
            var_dump(http_response_code(400));
            exit;
        }
        return $data;
    }
}