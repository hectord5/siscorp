<?php
function colorBoolean($estatus){
    if ($estatus){
        return 'success';
    }else{
        return 'danger';
    }
}

function txtColorBoolean($estatus){
    if ($estatus){
        return 'ACTIVO';
    }else{
        return 'INACTIVO';
    }
}
function colorEstatus($estatus){
    if ($estatus ==='#'){
        return 'danger';
    }else{
        return 'success';
    }
}

function colorBtnEstatus($estatus)
{
    if($estatus == 'A'){
        return 'danger';
    }

    if($estatus == 'B'){
        return 'warning';
    }

    if ($estatus ==='#'){
        return 'success';
    }else{
        return 'danger';
    }
}

function txtEstatus($estatus){
    if ($estatus ==='B'){
        return 'DESHABILITADO';
    }else{
        return 'HABILITADO';
    }
}
function getColorTabla($indice){
    if ($indice % 2 == 0){
        return "#28a745";
    }else{
        return "#263223";
    }
}
function colorBtnEstatusLc($estatus){
    if ($estatus ==='LC PAGADA'){
        return 'success';
    }else{
        return 'danger';
    }
}
