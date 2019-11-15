<?php
/**
 * @sistema     Sistema de Certificación de Origen - SICO
 * @version     Login.php v1.0 01-11-2014
 * @autor       José Alfredo Arroyo Santa Cruz
 * @copyright	Copyright (C) 2014 Servicio Nacional de Verificación de Exportaciones
 */

/* Controlar el acceso de los usuarios*/
defined('_ACCESO') or die('Acceso restringido');
include_once(PATH_TABLA . DS . 'DdjjDocumentos.php');
include_once(PATH_MODELO . DS . 'SQLDdjjDocumentos.php');



class AdmUploader extends Principal {

    public function AdmUploader() {
        $target_dir = "documents/";
        $target_files = $target_dir."ddjj/";
        $target_tmp = $target_dir."tmp/";
        if (!file_exists($target_tmp.session_id())) {

            
            
            
            $oldmask = umask(0);
            mkdir($target_tmp.session_id(), 0777,true);

            chmod($target_tmp.session_id(), 0777);

            umask($oldmask);
        }
        $target_sesion = $target_tmp.session_id()."/";

        if ($_REQUEST['tarea'] == 'filesUpload') {
            $target_file = $target_sesion. basename($_FILES['file']['name']);
            $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $upload=1;
            $message = '';
            if (file_exists($target_file)) {
                $message.= "El archivo ya existe";
                $upload = 0;//already exist
            }
            if($_FILES["file"]["error"]!=0){
                $message.= "Se produjo un error.";
                $upload = 0;//error
            }

            if ($_FILES["file"]["size"] > 5000000) {
                $message.= "Lo sentimos el documento es muy pesado".$_FILES["file"]["size"] ;
                $upload = 0;//error
            }
            $validExtensions = array('jpg', 'jpeg', 'png','pdf');
            $fileExtension = strrchr($_FILES['fotoupload']['name'], ".");
            if (!in_array($fileType, $validExtensions)){
                $message.= "Por favor suba un formato (jpg,png,pdf)";
                $upload =0;//error
            }
            switch ($upload) {
                case 0:
                    $message.= " No se pudo subir el archivo.";
                    header("HTTP/1.0 400 Bad Request");
                    echo '{"status":"'.$upload.'","message":"'.$message.'"}';
                break;
                case 1:
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                        $message.='El archivo '. basename( $_FILES["file"]["name"]). ' se guardo correctamente.';
                        echo '{"status":"'.$upload.'","message":"'.$message.'"}';
                    } else {
                        header("HTTP/1.0 400 Bad Request");
                        echo '{"status":"0","message":"Lo sentimos, se produjo un error."}';
                    }
                break;
                default:
                break;
            }
            exit;
        }
        if ($_REQUEST['tarea'] == 'fileDelete'){
            $documento = new DdjjDocumentos();
            $SQLDdjjDocumentos = new SQLDdjjDocumentos();

            $documento->setId_ddjj_documentos($_REQUEST['id_ddjj_documentos']);
            $documento = $SQLDdjjDocumentos->getbyId($documento);
            $file = $target_files.'/'.$documento->getTitle();
            if (!unlink($file)) echo '{"status":"0","message":"Error al eliminar '.$file.'"}';
            else {
                if($documento) $documento->delete();
                echo '{"status":"1","message":"Eliminado Correctamente"}';
            }
            exit;
        }
        if ($_REQUEST['tarea'] == 'tmpFileDelete'){
            $file = $target_sesion.'/'.$_REQUEST['name'];
            if (!unlink($file))  echo '{"status":"0","message":"Error al eliminar '.$file.'"}';
            else  echo '{"status":"1","message":"Eliminado Correctamente"}';
            exit;
        }
    }
    public function DeleteSessionFolder() {
        $target_dir = "documents/";
        $target_tmp = $target_dir."tmp/";
        if (file_exists($target_tmp.session_id())){
            $fileToDelete = glob($target_tmp.session_id().'/*');
            foreach($fileToDelete as $file){
                if(is_file($file))  unlink($file);
            }
        }
    }
    public function saveDocuments($documents, $id_ddjj){
        $target_dir = "documents/";
        $target_files = $target_dir."ddjj/";
        $target_tmp = $target_dir."tmp/";
        if (!file_exists($target_tmp.session_id())) {

            $oldmask = umask(0);

            mkdir($target_tmp.session_id(), 0777,true);
            chmod($target_tmp.session_id(), 0777);

            umask($oldmask);
        }
        $target_sesion = $target_tmp.session_id()."/";
        $hoy=date("Y-m-d H:i:s");

        $files=json_decode($documents);
        foreach($files as $file){
            $documento = new DdjjDocumentos();
            $documento->setId_ddjj($id_ddjj);
            $documento->setNombre($file->name);
            $documento->setFormato($file->format);
            $documento->setTitle($id_ddjj.'__'.$file->name);
            $documento->setFecha_Creacion($hoy);
            $documento->setSize($file->size);

            if($file->edit!=1){
                if(file_exists ( $target_sesion.$file->name ) && rename($target_sesion.$file->name, $target_files.$documento->getTitle())) $documento->save();
            }
        }
    }
    public function rrmdir($dir) {
//        echo 'is dir?'.$dir.'------'.is_dir($dir).;
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir."/".$object) == "dir")
                        $this->rrmdir($dir."/".$object);
                    else{
//                        echo 'this is the object that will be removed';
                        unlink   ($dir."/".$object);
                    }
                }
            }
            reset($objects);
//            echo 'this is the dir that will be removed'.$dir;
            rmdir($dir);
        }
    }
}