<?php

class DataHelpers {

    public static function converterDataParaBanco($data) {        
        list($dia, $mes, $ano) = explode('/', $data);
        return $ano.'-'.$mes.'-'.$dia;
    }

    public static function converterDataParaTela($dataBanco) {
        return date('d/m/Y', strtotime($dataBanco));
    }
}