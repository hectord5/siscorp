<?php

namespace App\Http\Controllers;

use App\Services\Consume\CandadosApi\CandadosApiConsume;
use App\Traits\bitacora;
use App\Traits\FiltrosRespuesta;
use App\Traits\GeneraWord;
use App\Traits\GestionRoles;
use App\Traits\GestionUsuarios;
use App\Traits\ListadoControles;
use App\Traits\Repositories;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected const CONTROL_PARTICULAR = 'P';
    protected const CONTROL_MICRO = 'M';
    protected const CONTROL_CARGA = 'C';
    protected const CONTROL_LICENCIAS = 'L';
    protected const CONTROL_TAXI = 'T';
    protected const CONTROL_MOTO = 'O';
    protected const CONTROL_ANTIGUOS = 'A';
    protected const CONTROL_FINANZAS='F';
    protected const CONTROL_SABANAS='S';
    protected const CONTROL_ESTATUS='E';
    protected const CONTROL_DISTINTIVOS='D';
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, GeneraWord, FiltrosRespuesta,GestionRoles,GestionUsuarios,Repositories, ListadoControles, bitacora;

}
